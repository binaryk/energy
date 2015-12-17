<?php

namespace Report;

class CreatePDF
{

	protected static $instance = NULL;

	protected $config = NULL;
	protected $pdf    = NULL;

	protected $width           = NULL;
	protected $height          = NULL;

	protected $column_count    = 0;

	public function __construct($config)
	{
		$this->config = $config;
		$this->column_count = array_key_exists('columns', $this->config) ? count($this->config['columns']) : NULL;
		$this->pdf = new \ToPDF\topdf();
		$this->NewPage();
		$this->width  = $this->pdf->Pdf()->getPageWidth();
		$this->height = $this->pdf->Pdf()->getPageHeight();
		$this->draw();
	}

	public static function make($config)
	{
		return self::$instance = new CreatePDF($config);
	} 

	protected function Write()
	{
		return $this->pdf->Cell();
	}

	protected function currentX()
	{
		return $this->pdf->Pdf()->GetX();
	}

	protected function currentY()
	{
		return $this->pdf->Pdf()->GetY();
	}

	protected function getPage()
	{
		return $this->pdf->Pdf()->getPage();
	}

	protected function getNumPages()
	{
		return $this->pdf->Pdf()->getNumPages();
	}

	protected function NewPage()
	{
		$this->pdf->newpage(
			$this->config['dimensions']['page-orientation'],
			$this->config['dimensions']['page-format']
		);
	}

	protected function _title( $title )
	{
		$result = $title;
		if( array_key_exists('filters', $this->config) )
		{
			if( ! array_key_exists('perioada', $this->config['filters']) )
			{
				$this->config['filters']['perioada'] = ($n = \Carbon\Carbon::now()->format('Y-m-d')) . ',' . $n;
			}
			$parts = explode(',', $this->config['filters']['perioada']);
			foreach($parts as $i => $item)
			{
				$parts[$i] = \Carbon\Carbon::createFromFormat('Y-m-d', $item)->format('d.m.Y');
			}
			$perioada = str_replace(',', ' - ', implode(',', $parts));
			$result = str_replace('%%perioada%%',  $perioada, $result);
			foreach($this->config['current_gal']->getAttributes() as $field => $value)
			{
				$result = str_replace('%%gal::' . $field . '%%', $value, $result);
			}
		}
		return $result;
	}

	protected function drawLogo()
	{
		if( $this->config['logo'] )
		{
			$this->pdf->Pdf()->Image(public_path() . '/' . $this->config['logo'], 10, 0, 70, 0, 'JPEG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		}
	}

	protected function reportTitle()
	{
		$this->pdf->Pdf()->setX(10);
		$this->pdf->Pdf()->setY(15);
		foreach($this->config['titles'] as $i => $title)
		{
			$font  = $title['font'];
			$this->pdf->Pdf()->SetFont($font[0], $font[1], $font[2], '', false);

			$color = $title['color'];
			$this->pdf->Pdf()->SetTextColor($color[0], $color[1], $color[2]);

			$this->Write()->width( $title['width'] )->halign( $title['halign'] )->text( $this->_title($title['caption']) )->linefeed(1)->border( $title['border'])->out();
		}
	}

	protected function pageHeader()
	{

		return call_user_func(
			[$this->config['data_source']['generator'], 'make'], 
			$this->config['data_source']['sql'], 
			$this->config['data_source']['where'], 
			$this->config['filters'],
			$this->config['columns'],
			$this->config['dimensions'],
			$this->write(),
			$this->pdf->Pdf()
		)
		->header();
	}

	protected function rowDetail()
	{
		$this->Write()->height( $this->config['dimensions']['row-height']);
		return call_user_func(
			[$this->config['data_source']['generator'], 'make'], 
			$this->config['data_source']['sql'], 
			$this->config['data_source']['where'], 
			$this->config['filters'],
			$this->config['columns'],
			$this->config['dimensions'],
			$this->write(),
			$this->pdf->Pdf()
		)
		->content();
	}

	protected function pageFooter()
	{
		
	}

	protected function reportSummary()
	{
		
	}

	protected function draw()
	{
		$this->drawLogo();
		$this->reportTitle();
		$this->pageHeader();
		$this->rowDetail();
		// $this->pageFooter();
		// $this->reportSummary();
	}

	

	protected function fileName()
	{
		return $this->config['file-name'];
	}

	public function Out($dest)
	{
		if($dest == 'I')
		{
			return $this->pdf->Pdf()->Output( $this->fileName(), $dest);
		}
		if($dest == 'F')
		{
			$this->pdf->Pdf()->Output( $file = $this->fileName(), $dest);
			$headers = array('Content-Type' => 'application/pdf');
			return \Response::download($file,  basename($file), $headers);
		}
	}
}