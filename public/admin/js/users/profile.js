; function Profile( parameters )
{

	this.profile_save_endpoint = parameters.profile_save_endpoint;
	this.id_user               = parameters.id_user;

	this.Exception = function(exception, destination)
	{
		var html = '<div id="exception-box" class="col-xs-12"><div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert"></button><h4 class="alert-heading">Eroare apărută în timpul execuţiei</h4><p><dl><dt>Mesaj</dt><dd>' + exception.message + '</dd><dt>Metoda</dt><dd>' + exception.method + '</dd><dt>Fişier</dt><dd>' + exception.file + ' (' + exception.line + ')</dd></dl></p></div></div>';
		$(destination).prepend(html);
		// $('#exception-box').delay(4700).fadeOut(300);
	}
	
	this.Success = function(message, destination)
	{
		var html = '<div id="success-box" class="col-xs-12"><div class="alert alert-block alert-success fade in">' +
			'<button type="button" class="close" data-dismiss="alert"></button>' +
				'<h4 class="alert-heading">Success!</h4>' +
				'<p>' + message + '</p></div></div>';
		$(destination).prepend(html);
		// $('#success-box').delay(4700).fadeOut(300);
	}

	this.Error = function(field, message, container)
	{
		$(container + ' #' + field).parent()
			.addClass('has-error')
			.append('<div class="field-error" style="color:#a94442; font-size:90%">' + message + '</div>');
		// $('.form-group').delay(4700).removeClass('has-error');
		// $('.field-error').delay(4700).fadeOut(300);
	}

	this.Errors = function(messages, container)
	{
		for(field in messages)
		{
			this.Error( field, messages[field][0], container );
		}
	}

	this.Save = function(data, action, container)
	{
		$(container + ' #success-box').remove();
		$(container + ' #exception-box').remove();
		$(container + ' .field-error').remove();
		$(container + ' .form-group').removeClass('has-error');
		$.ajax({
			'url'      : this.profile_save_endpoint,
			'type'     : 'post',
			'dataType' : 'json',
			'data'     : {'data' : data, 'action' : action},
			'success'  : function(response){
				if(response.success)
				{
					if(action == 'savePassword')
					{
						$('#old_password, #new_password, #new_password_confirm').val('');
					}
					return my.Success(response.message, container + '>.portlet-body>#container');
				}
				if( parseInt(response.runtime) == 1 )
				{
					return my.Exception(response.exception, container + '>.portlet-body>#container');	
				}
				return my.Errors(response.messages, container);	
			}
		});
	}

	$('.page-container').on('click', '#btn-save-general-data', function(){
		my.Save({
			'nume'    : $('#nume').val(),
			'prenume' : $('#prenume').val(),
			'email'   : $('#email').val(),
			'telefon' : $('#telefon').val(),
			'id'      : my.id_user
		}, 'saveGeneralData', '#portlet-date-generale');
	});

	$('.page-container').on('click', '#btn-save-password', function(){
		my.Save({
			'old_password'         : $('#old_password').val(),
			'new_password'         : $('#new_password').val(),
			'new_password_confirm' : $('#new_password_confirm').val(),
			'id'                   : my.id_user
		}, 'savePassword', '#portlet-password');
	});

	var my = this;
}