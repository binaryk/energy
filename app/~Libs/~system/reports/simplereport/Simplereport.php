<?php

namespace Report;

class Simplereport
{

	protected static $instance = NULL;

	protected $pdf = NULL;
	protected $orientation  = 'P';
	protected $pagesize     = 'A4';
	protected $data         = NULL;
	protected $headerheight = 10;
	protected $headerfont   = ['freeserif', 'B', 12];
	protected $rowheight    = 10;

	public function __construct()
	{
		$this->pdf = new \ToPDF\topdf();
	}

	protected function Write()
	{
		return $this->pdf->Cell();
	}

	public static function get($key)
	{
		return self::$instance->data[$key];
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

	protected function logo()
	{
		$this->pdf->Pdf()->Image(public_path() . '/img/logo_final.jpg', 10, 0, 70, 0, 'JPEG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	}

	protected function reportTitle( $titles )
	{
		$this->pdf->Pdf()->setX(10);
		$this->pdf->Pdf()->setY(15);
		foreach( $titles  as $i => $title)
		{
			if( array_key_exists('font', $title ) )
			{
				$font  = $title['font'];
				$this->pdf->Pdf()->SetFont($font[0], $font[1], $font[2], '', false);
			}
			if( array_key_exists('color', $title ) )
			{
				$color = $title['color'];
				$this->pdf->Pdf()->SetTextColor($color[0], $color[1], $color[2]);
			}
			$this->Write()->width( $title['width'] )->halign( $title['halign'] )->text( $title['caption'] )->linefeed(1)->border( $title['border'])->out();
		}
	}

	protected function _header($i, $header, $columnCount)
	{
		$w = $this->Write()->text($header['caption'])->width($header['width']);
		if($i == $columnCount )
		{
			$w->linefeed(1);
		}
		else
		{
			$w->linefeed(0);
		}
		$w->out();
	}

	protected function header( $columns )
	{
		if( ($pageno = $this->pdf->Pdf()->getPage()) == 1)
		{
			// $this->pdf->Pdf()->ln();
		}
		$this->Write()->width($this->orientation == 'L' ? 280 : 180)->text('Pag. ' . $pageno)->halign('R')->height(5)->fontsize(8)->background([255, 255, 255])->border('')->linefeed(1)->out()->reset('font')->reset('height');

		$this->Write()->border('LBTR')->valign('M')->halign('C')->height($this->headerheight)->background([225,225,225]);
		$this->Write()->font($this->headerfont); 
		
		foreach($columns as $i => $column)
		{
			$this->_header($i, $column['header'], count($columns));
		}
		$this->Write()->background([255,255,255]);
	}

	protected function _cell($i, $column, $record, $columnCount)
	{
		$w = $this->Write()->text($record[$column['source']])->width($column['header']['width'])->valign($column['valign'])->halign($column['halign']);
		if($i == $columnCount )
		{
			$w->linefeed(1);
		}
		else
		{
			$w->linefeed(0);
		}
		$this->Write()->font( $column['font'] ); 
		$w->out();
	}

	protected function row($i, $columns, $record)
	{
		foreach($columns as $i => $column)
		{
			$this->_cell($i, $column, $record, count($columns));
		}
	}

	protected function records($columns, $records)
	{
		$this->Write()->height($this->rowheight);
		$j = 0;
		foreach($records as $i => $record)
		{
			$record['rec_no'] = (++$j) . '.';
			$this->row($i, $columns, $record);
		}
	}

	public function open()
	{
		$this->pdf->newpage($this->orientation, $this->pagesize);
		$this->draw();
		$this->pdf->Pdf()->Output( 'aaaa', 'I');
	}
}