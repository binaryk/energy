function DTFORM(formid, loadformurl, model, doactionurl, dt)
{
	this.classActionInsert   = '.action-insert-record';
	this.classActionUpdate   = '.action-update-record';
	this.classActionDelete   = '.action-delete-record';
	this.classActionClose    = '.btn-close-form';
	this.classDoButton       = '.btn-do-action';
	this.classSourceControls = '.data-source';
	this.inputTypeCheckbox   = '.input_label'
	this.idMessageBox        = '#dt-action-message';
	this.messageBoxHtml      = '<div  class="alert alert-:type: alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-:icon:"></i>:caption:</h4>:message:</div>';

	this.formid            = formid;
	this.loadformurl       = loadformurl;
	this.model             = model;
	this.doactionurl       = doactionurl;
	this.dt                = dt;
	this.record_id         = null;
	this.refresh           = 1;

	this.aftershow          = function(record, action){};
	this.afterEmptyControls = function(record, action){};
	this.afterdatasource    = function(record){ return record; }

	this.disablecontrols = function(action)
	{
		var controls = $(this.classSourceControls);
		controls.prop('disabled', action == 'delete');
		controls.css({'background-color' : (action == 'delete' ? '#eee' : '#fff') });
	}

	this.fillfields = function(record, action)
	{
		for(field in record)
		{
			var control   = $(this.classSourceControls + '[data-control-source="' + field + '"]');
			if( control.length > 0)
			{
				switch( control.data('control-type') )
				{
					case 'textbox'  :
					case 'editbox'  :
						if( control.hasClass('to-float') )
						{
							record[field] = numeral(record[field]).format();
						}
						else
						{
							if(control.hasClass('moment'))
							{
								var __date = moment(record[field], 'YYYY-MM-DD');
								record[field] = __date.format('DD.MM.YYYY');
								console.log('11.05 Moment> ' + field + ' = ' + record[field]);
							}
						}
						control.val(record[field]);
						break;
					case 'combobox' :
						if(record[field] === null)
						{
							record[field] = 0;
						}
						if(control.hasClass('init-on-update-delete'))
						{
							control.val(record[field]).trigger('change');
						}
						/**
						cred ca apar probleme
						**/
						break;
					case 'select2'  :
						control.val(record[field]).trigger('change');
						break;
					case 'checkbox' :
						control.prop('checked', record[field] == control.data('on') ).iCheck('update');
						break;
				}
			}
		}
		this.disablecontrols(action);
	}

	this.showform = function(result)
	{
		this.hideFieldsErrors();

		$(this.formid + ' ' + this.classDoButton).removeClass('btn-do-insert');
		$(this.formid + ' ' + this.classDoButton).removeClass('btn-do-update');
		$(this.formid + ' ' + this.classDoButton).removeClass('btn-do-delete');

		$(this.formid + ' ' + this.classDoButton).addClass('btn-do-' + result.action).attr('data-action', result.action);

		$(this.formid + ' #action-title').html(result.caption);
		$(this.formid + ' ' + this.classDoButton).html(result.button);
		$(this.formid + ' .box-solid').show();

		if( (result.action == 'update') || (result.action == 'delete') )
		{
			this.fillfields(result.record, result.action);
		}

		$(this.formid).show();
		this.aftershow(result.record, result.action);
	};

	this.emptyControls = function()
	{
		var controls   = $(this.classSourceControls);
		controls.each(function(i){
			if( ! $(this).hasClass('no-empty') )
			{
				var formgroup = $(this).closest('.form-group')
				switch($(this).data('control-type'))
				{
					case 'textbox'  :
					case 'editbox'  :
						$(this).val('');
						break;
					case 'combobox' :
						/**
						Am scos ca sa nu se puna automat pe 0.
						Gestionez combobox-urile din "custom js"
						**/
						// $(this).val(0).trigger('change');
						break;
					case 'select2' :
						$(this).val([]).trigger('change');
				}
				formgroup.removeClass('has-error');
				formgroup.find('.error-sign').remove();
				formgroup.find('.help-block').remove();
				$(this).prop('disabled', false);
				$(this).css({'background-color':'#fff'});
			}
		})
		console.log('3.2. -----> Custom after Empty controls');
		this.afterEmptyControls();
	};

	this.hideform = function()
	{
		$(this.formid + ' ' + this.classDoButton).removeClass('btn-do-insert');
		$(this.formid + ' ' + this.classDoButton).removeClass('btn-do-update');
		$(this.formid + ' ' + this.classDoButton).removeClass('btn-do-delete');
		$(this.formid + ' #action-title').html('');
		$(this.formid + ' ' + this.classDoButton).html('');
		console.log('3.1. -----> Empty controls');
		this.emptyControls();
		$(this.formid).hide();
	};

	this.loadform = function(action, record_id)
	{
		var self = this;
		console.log('2 -----> Hide Action Message');
		this.hideActionMessage();
		console.log('3 -----> Hide form');
        this.hideform();
		$.ajax({
			url      : this.loadformurl,
        	type     : 'post',
        	dataType : 'json',
        	data     : {'action' : action, 'record_id' : record_id, 'model' : self.model},
        	success  : function(result)
        	{
        		self.record_id = record_id;
        		console.log('4 -----> Show form');
        		console.log(result);
        		self.showform(result);
        		$(self.classDoButton).removeClass('disabled');
        	}
		});
	};

	this.tofloat = function(value)
	{
		return numeral().unformat(value);
	}

	this.controlvalue = function( control )
	{
		var result = null;
		switch(control.data('control-type'))
		{
			case 'textbox'    :
			case 'persistent' :
			case 'combobox'   :
			case 'select2'    :
			case 'editbox'    :
				result = control.val();
				if( control.hasClass('to-float') )
				{
					result = this.tofloat(result);
				}
				else
				{
					if(control.hasClass('moment'))
					{
						var __date = moment(result, 'DD.MM.YYYY');
						result = __date.format('YYYY-MM-DD');
					}
				}
				break;
			case 'checkbox'   :
				result = control.prop('checked') ? control.data('on') : control.data('off');
				break;
		}
		return result;
	};

	this.datasource = function()
	{
		var self     = this;
		var result   = new Object();
		var controls = $(this.classSourceControls);
		controls.each( function(i) {
			result[$(this).data('control-source')] = self.controlvalue($(this));
		});
		result = this.afterdatasource(result);
		return result;
	};

	this.message = function(message)
	{
		if( (typeof message == 'object') && ( ! (message === undefined) ) && ( ! (message === null)) )
		{
			result = '';
			for(i = 0; i < message.length; i++)
			{
				result += message[i] + '<br/>';
			}
			return result;
		}
		return message;
	}

	this.showActionMessage = function(result)
	{
		var message = this.message(result.message);
		if( message)
		{
			var messageBox = $(this.idMessageBox).html(this.messageBoxHtml.replace(':type:', result.success ? 'success' : 'danger').replace(':caption:', result.success ? 'Succes!' : 'Eroare!').replace(':icon:', result.success ? 'check' : 'ban').replace(':message:', message));
			messageBox.show();
		}
	};

	this.hideActionMessage = function()
	{
		$(this.idMessageBox).html('').find('.close').trigger('click');
	};

	this.showFieldsErrors = function(fieldserrors)
	{
		for(field in fieldserrors)
		{
			var control   = $(this.classSourceControls + '[data-control-source="' + field + '"]');
			switch( control.data('control-type') )
			{
				case 'textbox'   :
				case 'combobox'  :
				case 'editbox'   :
				case 'select2'   :
					var formgroup = control.closest('.form-group');
					if(formgroup.length > 0)
					{
						formgroup.find('.error-sign').remove();
						formgroup.find('.help-block').remove();
						formgroup.addClass('has-error')
							.prepend('<label class="control-label error-sign" for="'+ field + '"><i class="fa fa-times-circle-o"></i></label>')
							.append('<p class="help-block has-error">' + fieldserrors[field] + '</p>');
					}
					var formgroup = control.closest('.input-group').parent();
					if(formgroup.length > 0)
					{
						formgroup.find('.error-sign').remove();
						formgroup.find('.help-block').remove();
						formgroup.addClass('has-error')
							.prepend('<label class="control-label error-sign" for="'+ field + '"><i class="fa fa-times-circle-o"></i></label>')
							.append('<p class="help-block has-error">' + fieldserrors[field] + '</p>');
					}
					break;
			}
		}
	};

	this.hideFieldsErrors = function()
	{
		var controls   = $(this.classSourceControls);
		controls.each(function(i){
			var formgroup = $(this).closest('.form-group');
			if(formgroup.length > 0)
			{
				formgroup.removeClass('has-error');
				formgroup.find('.error-sign').remove();
				formgroup.find('.help-block').remove();
			}
			var formgroup = $(this).closest('.input-group').parent();
			if(formgroup.length > 0)
			{
				formgroup.removeClass('has-error');
				formgroup.find('.error-sign').remove();
				formgroup.find('.help-block').remove();
			}
		})
	}

	this.doaction = function(action)
	{

		this.hideActionMessage();
		this.hideFieldsErrors();
		var self = this;
		console.log(self.datasource());
		console.log('action+' + action);
		console.log('action+' + action);
		console.log('model+' + self.model);
		console.log('model+' + self.model);
		console.log(this.doactionurl);
		$.ajax({
			url      : this.doactionurl,
        	type     : 'post',
        	dataType : 'json',
        	data     : {'action' : action, 'model' : self.model, 'data' : self.datasource(), 'record_id' : self.record_id, 'code' :  self.formid.replace('#form-', '')},
        	success  : function(result)
        	{
						console.log(result);
        		self.showActionMessage(result);
        		if( ! result.success)
        		{
        			self.showFieldsErrors(result.fieldserrors);
        			$(self.classDoButton).removeClass('disabled');
        		}
        		else
        		{
        			if( self.refresh == 1)
        			{
        				self.hideform();
        				self.dt.draw( false );
        			}
        			else
        				if( self.refresh == 2)
        				{
        					location.reload();
        				}
        		}
        	}
		});
	};


	this.bindActions = function()
	{
		var self = this;

		$(this.classActionInsert).on('click', function(){
			console.log('1 -----> Click on [Add] => load form');
			self.loadform('insert', null);
		});

		$(document).on( 'click', this.classActionUpdate, function(){
			self.loadform('update', $(this).data('id'));
		});

		$(document).on( 'click', this.classActionDelete, function(){
			self.loadform('delete', $(this).data('id'));
		});

		$(document).on( 'click', this.classActionClose, function(){
			self.hideform();
		});

		$(document).on( 'keyup', 'input' , function(){
			$(self.classDoButton).removeClass('disabled');
		});

		$(document).find('.input-group > ' + this.inputTypeCheckbox ).closest('.input-group').on('mouseover mouseout click', this, function(event) {
			var label = $(this).siblings('label');
			switch(event.type) {
				case 'click':
					label.click();
					break;
				case 'mouseover':
					label.mouseover();
					break;
				default :
					label.mouseout();
					break;
			}
		});


		$(document).on( 'click', this.classDoButton, function(){
			if( ! $(this).hasClass('disabled') )
			{
				self.doaction( $(this).attr('data-action') );
				$(this).addClass('disabled');
			}
		});
	};
	/*
	se asociaza evenimente la:
		a) add, edit, delete - pentru a aparea formularul
		b) submit - pentru a declansa actiunea
	*/
	this.bindActions();

	return this;

}
