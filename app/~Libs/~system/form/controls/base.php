<?php

namespace Easy\Form;

class Base extends \Easy\HTML\HTML
{
	
	const FEEDBACK_SUCCESS = 'success';
	const FEEDBACK_WARNING = 'warning';
	const FEEDBACK_ERROR   = 'error';

	protected static $instance = NULL;
	
	protected $data = 
		[
			'addon'          => ['before' => '@', 'after' => '#'],
			'buttonclass'    => '',
			'options'        => [],
			'editable_caption' => '',
			'caption'        => '',
			'checked'        => false,
			'controlsource'  => NULL,
			'controltype'    => NULL,
			'class'          => '',
			'cols'           => NULL,
			'recordid'       => NULL,
			'enabled'        => true,
			'feedback'       => '',
			'groupsize'      => '',
			'help'           => '',
			'maxlength'      => NULL,
			'multiple'       => false,
			'name'           => '',
			'id'           => '',
			'model'          => '',
			'placeholder'    => '',
			'rows'           => '',
			'readonly'       => false,
			'style'          => '',
			'tabindex'       => '',
			'value'          => NULL,
			'min'          => NULL,
			'max'          => NULL,
		];
	
	public static function make($view, $data = [])
	{
		return self::$instance = new Base($view, $data);
	}

	protected function attributes()
	{
		$result = [];
		if($this->class)
		{
			$result['class'] = $this->class;
		}
		if($this->style)
		{
			$result['style'] = $this->style;
		}
		if( ! $this->enabled)
		{
			$result['disabled'] = 'disabled';
		}
		if( $this->readonly )
		{
			$result['readonly'] = 'readonly';
		}
		if($this->placeholder)
		{
			$result['placeholder'] = $this->placeholder;
		}
		if($this->tabindex)
		{
			$result['tabindex'] = $this->tabindex;
		}
		if($this->maxlength)
		{
			$result['maxlength'] = $this->maxlength;
		}
		if($this->id){//am nevoie pentru radiobutton sa pun label separat
			$result['id'] = $this->id;
		}
			else
		if($this->name)
		{
			$result['id'] = $this->name;
		}
		if($this->rows)
		{
			$result['rows'] = $this->rows;
		}
		if($this->cols)
		{
			$result['cols'] = $this->cols;
		}
		if($this->multiple)
		{
			$result['multiple'] = 'multiple';
		}
		if($this->controlsource)
		{
			$result['data-control-source'] = $this->controlsource;
		}
		if($this->controltype)
		{
			$result['data-control-type'] = $this->controltype;
		}
		if($this->recordid)
		{
			$result['data-record-id'] = $this->recordid;	
		}
		if($this->model)
		{
			$result['data-model'] = $this->model;	
		}
		if($this->min)
		{
			$result['min'] = $this->min;
		}
		if($this->max)
		{
			$result['max'] = $this->max;
		}
		return $result;
	}

    public function angular()
    {
        $result = [];
        foreach($this->data as $key => $data){
            if(! is_array($data)){
                if(strpos($key, 'ng_') !== false || strpos($key, 'ui_') !== false){
                    $result[str_replace('_','-',$key)] = $data;
                }
            }
        }
        return $result;
    }

	protected function beforeOut()
	{
		$this->with('attributes', $this->attributes());
	}

    protected function withAngular(){
        $this->with('angular', $this->angular());
    }
}