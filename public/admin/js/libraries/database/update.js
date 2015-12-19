function UPDATE( ajax, model, record, onUpdateSucces, onUpdateError )
{
    this.ajax   = ajax;
    this.model  = model;
    this.record = record;

    $.ajax({
    	url      : this.ajax,
        type     : 'post',
        dataType : 'json',
        data     : {'model' : this.model, 'record' : this.record},
        success  : function(result)
        {
    	    if(result.success)
            {
                onUpdateSucces(result);
            }
            else
            {
                onUpdateError(result);
            }
        }
    });


}