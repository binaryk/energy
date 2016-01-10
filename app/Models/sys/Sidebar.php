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

		'eficienta_energetica'=> [
			'header'  => [
			'caption' => 'Eficienta Energetica',
			'icon'    => 'icon-fire',
			'childs'  => '2',
			],
			'options' => [],
			'active'  => ['eficienta-energetica*', 'eficienta_energetica*'],
		],
		'transport_public'=> [
			'header'  => [
			'caption' => 'Transport Public',
			'icon'    => 'icon-speedometer',
			'childs'  => '1',
			],
			'options' => [],
			'active'  => ['transport*'],
		],
		'iluminat_public'=> [
			'header'  => [
			'caption' => 'Iluminat public',
			'icon'    => 'icon-energy',
			'childs'  => '1',
			],
			'options' => [],
			'active'  => ['iluminat-public*'],
		],
		'monitorizare_energetica'=> [
			'header'  => [
				'caption' => 'Monitorizare',
				'icon'    => 'icon-eye',
				'childs'  => '1',
			],
			'options' => [],
			'childs' => [],
			'active'  => ['consum_institutie_cladiri*'],
		],
		'nomenclator'=> [
			'header'  => [
			'caption' => 'Nomenclator',
			'icon'    => 'icon-layers',
			'childs'  => '3',
			],
			'options' => [],
			'active'  => ['monitorizare-energetica*', 'monitorizare_energetica*','indicatori-statistici*'],
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
        $this->addOption('eficienta_energetica', route('programoug_index',['id' => 'programoug']), 'Program OUG 18', 'user-plus');
        $this->addOption('eficienta_energetica', route('programdmi_index',['id' => 'programdmi']), 'POR DMI 12', 'user-plus');
        $this->addOption('transport_public', route('vehicles_index',['id' => 'vehicole']), 'Lista Vehicole', 'user-plus');
        $this->addOption('monitorizare_energetica', route('consum_institutie_buildings_index',['id' => 'cladirile']), 'Lista Cladiri', 'user-plus');
        $this->addOption('nomenclator', route('suppliers_index',['id' => 'furnizori']), 'Lista Furnizori', 'user-plus');
        $this->addOption('nomenclator', route('points_index',['id' => 'puncte-de-masurare']), 'Puncte de Masurare', 'user-plus');
        $this->addOption('nomenclator', route('indicators_index',['id' => 'indicatori']), 'Indicatori Statistici', 'user-plus');

        $this->addOption('iluminat_public', route('publiclighting_index',['id' => 'facturi']), 'Lista Facturi', 'user-plus');
        // $this->addOption('iluminat_public', route('publiclighting_index',['id' => 'consum-general']), 'Consum General', 'user-plus');

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
			$result .= '<li class="' . $this->_active(@$group['active'])  . '">' . $this->OutGroup($group) . '</li>';
		}
		return $result;
	}
}