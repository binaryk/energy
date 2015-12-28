<?php namespace System;

use App\Models\Institution;

class Sidebar
{

	protected static $instance = NULL;

	protected $sidebar = [
		'institutii' => [
			'header' => [
				'caption' => 'Institutii publice',
				'icon'    => 'icon-globe-alt',
			    'childs'  => '6',
			],
			'options' => [],
			'active'  => ['institutii*'],
		],

	];

	protected function addOption($group, $url, $caption, $icon, $active = false)
	{
		$this->sidebar[$group]['options'][] = [
			'url'     => $url,
			'caption' => $caption,
			'icon'    => $icon,
			'active'  => true
		];
		return $this;
	}

	public function __construct()
	{
        foreach(Institution::categories() as $k => $category){
            $this->addOption('institutii', route('institutions_index',['type' => $k]), $category, 'user-plus', '/institutii/1');
        }
	}

	public static function make()
	{
		return self::$instance = new Sidebar();

	}

	public function OutGroupHeader( $header )
	{
		return '<a href="javascript:;"><span class="badge pull-right">'. $header['childs'] .'</span>&nbsp;<i class="' . $header['icon'] . '"></i><span>' . $header ['caption'] . '</span></a>';
	}

	public function OutOption( $option )
	{
		return '<li><a class="' . ( $option['active'] ? 'bar-selected' : '') . '" href="' . $option['url'] . '"><i class="fa ' . $option['icon'] . '"></i><span>' . $option['caption'] . '</span></a></li>';
	}

	protected function _active($actives)
	{
		$result = '';
		foreach($actives as $i => $item)
		{
			if(\Request::is($item))
			{
				return ' active selected open';
			}
		}
		return $result;
	}

	public function OutGroup($group)
	{
		$result = $this->OutGroupHeader( $group['header'] );
		$result .= '<ul class="sub-menu">';
		foreach($group['options'] as $key => $option)
		{
			$result .= $this->OutOption($option);
		}
		$result .= '</ul>';
		return $result;
	}

	public function Out()
	{

		$result = '';
		foreach($this->sidebar as $key => $group)
		{
			$result .= '<li class="' . $this->_active($group['active'])  . '">' . $this->OutGroup($group) . '</li>';
		}
		return $result;
	}
}