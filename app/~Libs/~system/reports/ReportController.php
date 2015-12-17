<?php

namespace Report;

class ReportController extends \BaseController 
{

	public function show($config)
	{
		if( empty($config['view']) )
		{
			throw new \Exception(__METHOD__ . '. View parameter not defined.');
		}
	
		// ca sa pot transmite si alte informatii catre datatable index
		$other_info = array_key_exists('other-info', $config) ? $config['other-info'] : [];

		$this->layout->title = strip_tags($config['caption']);
		$this->layout->content = \View::make($config['view'])->with([
			'rpt'   		=> Report::create($config),
			'form'      => ($config['form'] ? $config['form']::make()->other_info($other_info) : NULL),
		] + $other_info);
	}

	public function reportPdf($config, $parameters)
	{
		return ReportPdf::response($config, $parameters);
	}

	public function createPDFToDownload($config, $filters)
	{
		return ReportPdf::response(
			$config + ['filters' => $filters, 'current_gal' => $this->current_gal],
			['action' => 'pdf-download']
		);
	}

	public function createPDFToOpen($config, $filters)
	{
		return ReportPdf::response(
			$config + ['filters' => $filters, 'current_gal' => $this->current_gal], 
			['action' => 'pdf-open']
		);
	}

} 