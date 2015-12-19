function INLINEEDIT( editIcon, updateurl, datatable )
{

	this.updateurl                    = updateurl;
	this.editIcon                     = editIcon;
	this.record_id                    = editIcon.data('id');
	this.cell                         = this.editIcon.closest('td');
	this.inline_edit_cell_container   = this.cell.find('.inline-edit-cell-container[data-id="' + this.record_id + '"]');
	this.value    					  = this.cell.find('.cell-value').html();
	this.input_html                   = '<div class="inline-edit-container"><div class="pull-left" style="width:92%"><input class="form-control input-sm inline-editable-textbox" style="width:100%" type="text" value="' + this.value + '" /></div><div class="pull-right" style="width:8%; position:relative"><i class="fa fa-save" style="font-size:14px;"></i></div></div>';
	this.field                        = this.inline_edit_cell_container.data('field');

	this.removeTextbox = function()
	{
		// console.log( this.inline_edit_cell_container );
		$('.inline-edit-container').remove();
		$('.inline-edit-cell-container').show();
	},

	this.putTextbox = function()
	{
		var self = this;

		this.removeTextbox();

		this.cell.append(this.input_html);
		this.inline_edit_cell_container.hide();

		var h = $('.inline-editable-textbox').parent().height();
		$('.fa-save').css({'line-height' : h + 'px', 'position':'absolute', 'right':'0px'});

		$('.dataTable').off('click').on('click', '.fa-save', function(){
			var value = $(this).parent().parent().find('input').val();
			var data = {};
			data['id'] = self.record_id;
			data[self['field']] = value;
			var _this = $(this);
			var update = new UPDATE(
				self.updateurl, 
				$('.inline-edit-cell-container').data('model'), 
				data,
				function(result){ // onSuccess 
					datatable.draw( false ); 
				},
				function(result){ // onError 
					$('.inline-edit-container').remove();
					$('.inline-edit-cell-container').show();
					var container = $('.inline-edit-cell-container[data-id="' + self.record_id + '"]');
					container.append('<div class="form-group dt-form-container has-error"><strong>' + value + '</strong><p class="help-block has-error">' + result.message + '</p></div>').show();
				}
			);
		});
	}

	this.putTextbox();
}