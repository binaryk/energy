function TREEVIEW(id)
{
	this.id             = id;
	this.url            = null;
	this.displayStart   = null;
	this.displayLength  = null;
	this.defaultOrder   = null;

	this.setUrl = function(url)
	{
		this.url = url;
		return this;
	};

	this.setDisplayStart = function(displayStart)
	{
		this.displayStart = displayStart;
		return this;
	};

	this.setDisplayLength = function(displayLength)
	{
		this.displayLength = displayLength;
		return this;
	};

	this.setDefaultOrder = function(defaultOrder)
	{
		this.defaultOrder = defaultOrder;
		return this;
	};

	this.getNodes = function()
	{
		var id = this.id;
		$.ajax({
			url      : this.url,
        	type     : 'get',
        	dataType : 'json',
        	data     : {'id' : this.id, 'displayStart' : this.displayStart, 'displayLength' : this.displayLength, 'defaultOrder' : this.defaultOrder},
        	success  : function(result)
        	{
        		$('#' + id).treeview({
          			color        : "#428bca",
          			expandIcon   : "glyphicon glyphicon-stop",
          			collapseIcon : "glyphicon glyphicon-unchecked",
          			nodeIcon     : "glyphicon glyphicon-user",
          			showTags     : true,
          			data         : result.data
        		});
        	}
		});
	}
	return this;
}