<?php

namespace Database;

class Actions 
{

	protected static $instance = NULL;

	protected $model     = NULL;
	protected $data      = NULL;
	protected $action    = NULL;
	protected $timestamp = true;
	protected $record_id = NULL;
	protected $form      = NULL;

	public static function make()
	{
		return self::$instance = new Actions();
	}

	public function __call($method, $args)
	{
		if(! property_exists($this, $method))
		{
			throw new \Exception(__CLASS__ . '. Property ' . $method . ' unknown.');
		}
		if( isset($args[0]) )
		{
			$this->{$method} = $args[0];
			return $this;
		}
		return $this->{$method};
	}

	protected function feedback( $type )
	{
		return $this->form->feedback->{$this->action}->{$type};
	}

	protected function rules()
	{
		$rules = $this->form->rules->{$this->action};
		if($this->action == 'update')
		{
			foreach($rules as $i => $rule)
			{
				$rules[$i] = str_replace(':id:', $this->record_id, $rule);
			}
		}
		return $rules;	
	}

	protected function messages()
	{
		return $this->form->messages->{$this->action};	
	}

	public function execute_insert()
	{
		$validator = \Validator::make( $this->data, $this->rules(), $this->messages());
		if ($validator->fails())
		{
			return \Result::make()->success(false)->fieldserrors($validator->messages());
		}
		try
		{
			$record = call_user_func( [$this->model, 'createRecord'], $this->data); 
            if( $record )
            {
                return \Result::make()->success(true)->message( $this->feedback('success') );
            }
            return \Result::make()->success(false)->message( $this->feedback('error'));
        }
		catch(\Exception $e)
		{
			return \Result::make()->success(false)->message([$this->feedback('error'), $e->getMessage()]);
		}
	}

	public function execute_update()
	{
		$validator = \Validator::make( $this->data, $this->rules(), $this->messages());
		if ($validator->fails())
		{
			return \Result::make()->success(false)->fieldserrors($validator->messages());
		}
		try
		{
			$record = call_user_func( [$this->model, 'updateRecord'], $this->record_id, $this->data); 
            if( $record )
            {
                return \Result::make()->success(true)->message($this->feedback('success'));
            }
            return \Result::make()->success(false)->message($this->feedback('error'));
        }
		catch(\Exception $e)
		{
			return \Result::make()->success(false)->message([$this->feedback('error'), $e->getMessage()]);
		}
	}

	public function execute_delete()
	{
		try
		{
			$record = call_user_func( [$this->model, 'deleteRecord'], $this->record_id, $this->data); 
            if( $record )
            {
                return \Result::make()->success(true)->message($this->feedback('success'));
            }
            return \Result::make()->success(false)->message( $this->feedback('error') );
        }
		catch(\Exception $e)
		{
			return \Result::make()->success(false)->message([$this->feedback('error'), $e->getMessage()]);
		}
	}

	protected function escapedata()
	{
		foreach($this->data as $key => $data)
		{
			if( is_string($data) )
			{
				$this->data[$key] = e($data);
			}
			else 
				if( is_array( $this->data[$key] ) )
				{
					foreach($this->data[$key] as $i => $val)
					{
						$this->data[$key][$i] = e($val);	
					}
				}
		}
	}

	public function execute()
	{
		$this->escapedata();
		if( $this->timestamp )
		{
			$now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
			if($this->action == 'insert')
			{	
				$this->data['created_at'] = $now;
			}
			$this->data['updated_at'] = $now;
		}
		$result = $this->{"execute_" . $this->action}();
		return \Response::json(  [
			'success'      => $result->success(), 
			'message'      => $result->message(), 
			'fieldserrors' => $result->fieldserrors()
		] );
	}

	public function upload( $file, $config )
	{
		if( is_null($file) )
		{
			return \Response::json(['error' => 'Fişier inexistent. Mai încercaţi ...']);
		}
		$data     = [
		    'file'      => $file,
		    'extension' => strtolower($file->getClientOriginalExtension()),
		];
		$rules    = [
		    'file'      => 'required|max:' . $config['max-size'],
		    'extension' => 'in:' . $config['allowed-extensions'],
		];
		$messages = [
		    'file.required' => 'Vă rog selectaţi un fişier cu extensia: ' . $config['allowed-extensions'],
		    'extension.in' => 'Extensiile acceptate sunt: ' . $config['allowed-extensions'],
		    'file.max' => 'Dimensiunea maximă a unui fişier: ' . _toFloat($config['max-size']) . ' KB. Fişierul încărcat de dumneavostră are ' . _toFloat($file->getClientSize()/1024) . 'KB.',
		];
		$validator = \Validator::make($data, $rules, $messages);
		if( $validator->fails() )
		{
			return \Response::json(['error' => $validator->messages()->all()]);
		}
		try
		{
			$upload_path = $config['path'];
			$id 		 = $config['id_name'];
			$upload_path = str_replace('{{'.$id.'}}', $this->data[$id], $upload_path);

			$file_name = $config['file-name-pattern'];
			$file_name = str_replace('{{original}}', basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension() ), $file_name);
			$file_name = str_replace('{{'.$id.'}}', $this->data[$id], $file_name);
			$file_name = str_replace('{{date}}', \Carbon\Carbon::now()->format('Y-m-d'), $file_name);
			$file_name = str_replace('{{extension}}', $file->getClientOriginalExtension(), $file_name);
			$file_name = strtolower($file_name);

			$file->move( $upload_path,  $file_name);
			$inserted = call_user_func( [$this->model, 'createRecord'], $this->data + [
				'file'      => $file_name, 
				'path'      => $upload_path, 
				'extension' => $file->getClientOriginalExtension(), 
				'size'      => $file->getClientSize() 
			]);
			$result = \Response::json(['success' => true, 'message' => 'Upload. OK', 'object' => $inserted]);
		}
		catch(\Exception $e)
		{
			$result = \Response::json(['error' => $e->getMessage()]);
		}
		return $result;
	}

} 