;function CtModal( parameters )
{
  this.parameters = parameters;


  this.showMessages = function( messages, type)
  {
    var html = '';
    for(i = 0; i < messages.length; i++)
    {
      html += messages[i] + '<br/>';
    }
    $(this.parameters.id + ' .modal-body').append('<div class="alert alert-' + type + '">' + html + '</div>');
  }


  this.show = function(title, body, footer)
  {
    if(typeof title === 'string')
    {
      this.parameters.title = title;
    }
    if(typeof body === 'string')
    {
      this.parameters.body = body;
    }
    if(typeof footer === 'string')
    {
      this.parameters.footer = footer;
    }
    $(this.parameters.id + ' .modal-title').html(this.parameters.title);
    $(this.parameters.id + ' .modal-body').html(this.parameters.body);
    $(this.parameters.id + ' .modal-footer').html(this.parameters.footer);

    $(this.parameters.id).modal('show');
  }

  this.hide = function()
  {
    $(this.parameters.id).modal('hide');
  }

  var self = this;


  return this;
}