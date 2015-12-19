function TOTALIZER( parameters )
{

	this.url     = parameters.url;
	this.columns = parameters.columns;
	this.sql     = parameters.sql;
	this.where   = parameters.where;

	this.process = function( result )
	{
		for( i = 0; i < result.length; i++)
		{
			$( result[i].dest).html( result[i].result );
		}
	}

	this.calculate = function( filterValue )
	{
		var self = this;
		var where = this.where.split('::filterValue::').join(filterValue);
		$.ajax({
	    	url      : this.url,
	        type     : 'post',
	        dataType : 'json',
	        data     : {'sql' : this.sql, 'columns' : this.columns, 'where' : where},
	        success  : function(result)
	        {
	        	self.process(result);
	        }
	    });
	}

}