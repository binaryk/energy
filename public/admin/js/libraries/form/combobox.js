function COMBOBOX(parameters)
{

	this.id      = parameters.id;
	this.url     = parameters.url;
	this.control = parameters.control;
	this.model   = parameters.model;
	this.field   = parameters.field;

	this.data = function()
	{
		return {
			'id'    : this.id,
			'model' : this.model,
			'field' : this.field
		};
	};

	this.setOptions = function(options, value)
	{
		$(this.control).find('option').remove();
		var htmloptions = '';
		for(i = 0; i < options.length; i++)
		{
			htmloptions += '<option' + (value == options[i].id ? ' selected="selected"' : '') + ' value="' + options[i].id + '">' + options[i].text + '</option>'
		}
		$(this.control).html(htmloptions);
	};

	this.populate = function( value )
	{
		var self = this;
		$.ajax({
			url      : this.url,
        	type     : 'post',
        	dataType : 'json',
        	data     : this.data(),
        	success  : function(result)
        	{
        		self.setOptions(result.options, value);
        		$(self.control).focus();
        	}
		})
	}
}