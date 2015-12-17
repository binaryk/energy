<?php

namespace Report;

class ReportPdf
{

	public static function Response($config, $parameters)
	{
		$response = Reportresponse::make( $config, $parameters);
		return $response->result();
	} 

}