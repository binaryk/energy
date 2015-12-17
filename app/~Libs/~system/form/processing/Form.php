<?php

namespace Processing\Form;

use Illuminate\Support\Collection;

class Form
{

	protected static $instance = NULL;

	protected $controls   = NULL;
	protected $view       = NULL;
	protected $model      = NULL;
	protected $other_info = [];

	protected $captions      = ['insert' => '', 'update' => '', 'delete' => ''];
	protected $buttons       = ['insert' => '', 'update' => '', 'delete' => ''];
	protected $feedbak       = ['insert' => '', 'update' => '', 'delete' => ''];
	protected $rules         = ['insert' => '', 'update' => '', 'delete' => ''];
	protected $validmessages = ['insert' => '', 'update' => '', 'delete' => ''];

	public function __construct()
	{
		$this->controls = new Collection();
		$this->addControls();
		$this->setView();
		$this->setModel();
		$this->setProperties();
	}

	public static function make()
	{
		return self::$instance = new Form();
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

	protected function addControls()
	{
		// aceasta metoda se suprascrie in clasa efectiva
	}

	protected function setView()
	{
		// aceasta metoda se suprascrie in clasa efectiva
	}

	protected function setModel()
	{
		// aceasta metoda se suprascrie in clasa efectiva
	}

	protected function setProperties()
	{
		// aceasta metoda se suprascrie in clasa efectiva
		$this->setButton('insert', 'Adaugă');
		$this->setButton('update', 'Salvează');
		$this->setButton('delete', 'Şterge');
	}

	protected function setCaption($action, $caption)
	{
		$this->captions[$action] = $caption;
		return $this;
	}

	protected function setButton($action, $caption)
	{
		$this->buttons[$action] = $caption;
		return $this;		
	}

	protected function setFeedback($action, $messageSuccess, $messageError)
	{
		$this->feedbak[$action] = ['success' => $messageSuccess, 'error' => $messageError];
		return $this;		
	}

	protected function setRules($action, $rules)
	{
		$this->rules[$action] = $rules;
	}

	protected function setValidMessages($action, $messages)
	{
		$this->validmessages[$action] = $messages;
	}

	public function getRules($action)
	{
		return $this->rules[$action];
	}

	public function getMessages($action)
	{
		return $this->validmessages[$action];
	}

	public function getFeedback($action, $feedback)
	{
		return $this->feedbak[$action][$feedback];
	}

	public function getCaption($action)
	{
		return $this->captions[$action];
	}

	public function getButton($action)
	{
		return $this->buttons[$action];
	}

	protected function addControl($control)
	{
		$this->controls->push($control);
		return $this;
	}

	public function showForm()
	{
		return \View::make($this->view)->with(['controls' => $this->controls] + $this->other_info)->render();
	}
}