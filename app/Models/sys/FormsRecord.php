<?php

namespace System;

class FormsRecord
{

	protected static $instance = NULL;

	public $id       = NULL;
	protected $captions = [
		'insert' => '', 
		'update' => '', 
		'delete' => '',
	];
	protected $buttons  = [
		'insert' => 'Adaugă <i class="m-icon-swapleft"></i>',
		'update' => 'Salvează <i class="m-icon-swapleft"></i>',
		'delete' => 'Şterge <i class="fa fa-trash-o"></i>',
	];
	protected $feedback = [
		'insert' => [
			'success' => '', 
			'error'   => ''
		], 
		'update' => [
			'success' => '', 
			'error'   => ''
		], 
		'delete' => [
			'success' => '', 
			'error'   => ''
		],
	];
	protected $rules    = [
		'insert' => [],  
		'update' => [], 
		'delete' => [],
	];
	protected $messages = [
		'insert' => [], 
		'update' => [], 
		'delete' => [],
	];

	public function __construct($id)
	{
		$this->id = $id;
	}

	public static function make($id)
	{
		return self::$instance = new FormsRecord($id);
	}

	public function setCaption($action, $caption)
	{
		$this->captions[$action] = $caption;
		return $this;
	}

	public function setButton($action, $caption)
	{
		$this->buttons[$action] = $caption;
		return $this;
	}

	public function setFeedback($action, $result, $message)
	{
		$this->feedback[$action][$result] = $message;
		return $this;
	}

	public function addRule($action, $field, $rule)
	{
		$this->rules[$action][$field] = $rule;
		return $this; 
	}

	public function addMessage($action, $rule, $message)
	{
		$this->messages[$action][$rule] = $message;
		return $this; 
	}

	public function captions()
	{
		$result = new \StdClass();
		foreach(['insert', 'update', 'delete'] as $i => $action)
		{
			$result->{$action} = $this->captions[$action];
		}
		return $result;
	}

	public function buttons()
	{
		$result = new \StdClass();
		foreach(['insert', 'update', 'delete'] as $i => $action)
		{
			$result->{$action} = $this->buttons[$action];
		}
		return $result;
	}

	public function feedback()
	{
		$result = new \StdClass();
		foreach(['insert', 'update', 'delete'] as $i => $action)
		{
			$result->{$action} = new \StdClass();
			foreach(['success', 'error'] as $j => $type)
			{
				$result->{$action}->{$type} = $this->feedback[$action][$type];
			}
		}
		return $result;
	}

	public function rules()
	{
		$result = new \StdClass();
		foreach(['insert', 'update', 'delete'] as $i => $action)
		{
			$result->{$action} = $this->rules[$action];
		}
		return $result;
	}

	public function messages()
	{
		$result = new \StdClass();
		foreach(['insert', 'update', 'delete'] as $i => $action)
		{
			$result->{$action} = $this->messages[$action];
		}
		return $result;
	}
}