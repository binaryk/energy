<?php namespace System;

class Cell 
{

	const TYPE_FIELD 		   = 'field';
	const TYPE_FIELD_DATE 	   = 'field-date';
	const TYPE_FIELD_DATE_TIME = 'field-date-time';
	const TYPE_FIELD_FLOAT 	   = 'field-float';
	const TYPE_FIELD_INT 	   = 'field-int';
	const TYPE_FIELD_FILE_SIZE = 'field-file-size';
	const TYPE_VIEW            = 'view';
	const TYPE_ROW_NUMBER      = 'row-number';
	const TYPE_ROW_CHECK       = 'row-check';

	protected static $instance = NULL;

	protected $id     = NULL;

	protected $type    = NULL;
	protected $source  = true;
	protected $visible = true;


	public function __construct($id)
	{
		$this->id = $id;
	}

	public static function make($id)
	{
		return self::$instance = new Cell($id);
	}

	public function __call($method, $args)
	{
		if(! property_exists($this, $method))
		{
			throw new \Exception(__CLASS__ .'. Property ' . $method . ' unknown.');
		}
		if( isset($args[0]) )
		{
			$this->{$method} = $args[0];
			return $this;
		}
		return $this->{$method};
	}

	public function out($record, $row_number)
	{
		if(! $this->visible )
		{
			return NULL;
		}
		$result = '?';
		switch($this->type)
		{
			case self::TYPE_FIELD :
				$result = $record->{$this->source};
				break;
			case self::TYPE_FIELD_FLOAT :
				$result = _toFloat($record->{$this->source});
				break;
			case self::TYPE_FIELD_INT :
				$result = _toInt($record->{$this->source});
				break;
			case self::TYPE_FIELD_FILE_SIZE :
				$result = _toFileSize($record->{$this->source});
				break;
			case self::TYPE_FIELD_DATE :
				$value = $record->{$this->source};
				if( empty($value) )
				{
					$result = '-';
				}
				else
				{
					$value = substr($value, 0, 10);
					$result = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
				}
				break;
			case self::TYPE_FIELD_DATE_TIME :
				$value = $record->{$this->source};
				if( empty($value) )
				{
					$result = '-';
				}
				else
				{
					$result = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d.m.Y H:i:s');
				}
				break;
			case self::TYPE_VIEW :
				$result = \View::make($this->source)->with('record', $record)->render();
				break;
			case self::TYPE_ROW_NUMBER :
				$result = $row_number . '.';
				break;
			case self::TYPE_ROW_CHECK :
				$result = '<input type="checkbox" />';
				break;
		}
		return $result;
	}

}