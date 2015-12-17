<?php

namespace Report;

class Datasource
{
	
	protected static $instance = NULL;

	protected $sql        = NULL;
	protected $where      = NULL;
	protected $filters    = NULL;
	protected $write      = NULL;
	protected $columns    = NULL;
	protected $dimensions = NULL;
	protected $tcpdf      = NULL;

	protected $line      = 0;

	public function __construct($sql, $where, $filters, $columns, $dimensions, $write, $tcpdf)
	{
		$this->sql        = $sql;
		$this->where       = $where;
		$this->filters    = $filters;
		$this->write      = $write;
		$this->columns    = $columns;
		$this->dimensions = $dimensions;
		$this->tcpdf      = $tcpdf;
	}

	protected function mustNewpage()
    {
        if( $this->tcpdf->getpage() == 1 )
        {
            if( $this->line % $this->dimensions['max-lines-1'] == 0)
            {
                $this->line = 0;
                return true;
            }
        }
        if( $this->line % $this->dimensions['max-lines-2'] == 0)
        {
            return true;
        }
        return false;
    }

	protected function newPage()
	{
		$this->line++;
		if( $this->mustNewPage() )
		{
			$this->tcpdf->AddPage(
				$this->dimensions['page-orientation'],
				$this->dimensions['page-format']
			);
			$this->header();
			$this->write->height($this->dimensions['row-height']);
		}
	}

	public function _header($i, $header)
	{
		$w = $this->write->text($header['caption'])->width($header['width']);
		if($i == count($this->columns) )
		{
			$w->linefeed(1);
		}
		else
		{
			$w->linefeed(0);
		}
		$w->out();
	}

	public function header()
	{
		if( ($pageno = $this->tcpdf->getPage()) == 1)
		{
			$this->tcpdf->ln();
		}
		$this->write->width($this->dimensions['page-orientation'] == 'L' ? 280 : 180)->text('Pag. ' . $pageno)->halign('R')->height(5)->fontsize(8)->background([255, 255, 255])->border('')->linefeed(1)->out()->reset('font')->reset('height');

		$this->write->border('LBTR')->valign('M')->halign('C')->height($this->dimensions['header-height'])->background([225,225,225]);

		if( array_key_exists('header-font', $this->dimensions) )
		{
			$this->write->font($this->dimensions['header-font']); 
		}
		foreach($this->columns as $i => $column)
		{
			$this->_header($i, $column['header']);
		}
		$this->write->background([255,255,255]);
	}

	protected function _replacement($type, $value)
	{
		switch($type)
		{
			case 'integer'        :
				return $value;
			case 'string-between' :
			case 'time-between' : 
				$parts = explode(',', $value);
				if( ! array_key_exists(0, $parts) )
				{
					$parts[0] = \Carbon\Carbon::now()->format('Y-m-d');
				}
				if( ! array_key_exists(1, $parts) )
				{
					$parts[1] = \Carbon\Carbon::now()->format('Y-m-d');
				}
				if($type == 'string-between')
				{
					return "'" . $parts[0] . "' AND '" . $parts[1] . "'";
				}
				if($type == 'time-between')
				{
					return "'" . $parts[0] . " 00:00:00' AND '" . $parts[1] . " 23:59:59'";
				}
		}
		return NULL;
	}

	protected function createSql( $sql, $where, $filters)
	{
		$result = $sql;
		foreach($where as $i => $w)
		{
			$result = str_replace(
				'%%where-' . $i . '%%', 
				$this->_replacement($w['type'], $filters[$w['name']]),  
				$result
			);
		}
		return $result;
	}

	protected function get()
	{
		$sql = $this->createSql( $this->sql, $this->where, $this->filters);
		return \DB::select($sql);
	}

	protected function _text($record, $column)
	{
		$result = NULL;
		switch( $column['source-type'] )
		{
			case 'field' :
				$value = $record->{$column['source']}; 
				$result = $value;
				if( array_key_exists('type', $column) )
				{
					if($column['type'] == 'date')
					{
						if($value)
						{
							$result = \Carbon\Carbon::createFromFormat( 'Y-m-d', substr($value, 0, 10))->format('d.m.Y');
						}
					}
					elseif( $column['type'] == 'float' )
					{
						$result = number_format($value, 2, ',', '.');					
					}
				}
				if( array_key_exists('print-when', $column) )
				{
					$expression = str_replace('*' . $column['source'] . '*', $value, $column['print-when']);

					if( ! eval('return(' . $expression . ');') )
					{
						$result = '';
					}
				}
				break;
		}
		return $result;
	}

	protected function _cell($row_no, $col_no, $record, $column)
	{
		$w = $this->write->width($column['header']['width'])->halign($column['halign']);
		
		$w->text( $this->_text($record, $column) );

		if( array_key_exists('background', $column) )
		{
			$w->background($column['background']);
		}
		if( array_key_exists('color', $column) )
		{
			$this->tcpdf->SetTextColor( $column['color'][0], $column['color'][1], $column['color'][2]);
		}
		if( array_key_exists('font', $column) )
		{
			$w->font($column['font']); 
		}
		else
		{
			if( array_key_exists('row-font', $this->dimensions) )
			{
				$this->write->font($this->dimensions['row-font']); 
			}
		}

		if($col_no == count($this->columns) )
		{
			$w->linefeed(1);
		}
        else
        {
            $w->linefeed(0);
        }
		$w->out()->reset('background');
		$this->tcpdf->SetTextColor(0, 0, 0);
	}

	protected function _row($row_no, $record)
	{
		foreach($this->columns as $i => $column)
		{
			$this->_cell($row_no, $i, $record, $column);
		}
	}

}