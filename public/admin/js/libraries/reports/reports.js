function REPORTS( parameters )
{

	this.init = function()
	{
		this.createURL = parameters.report_create_url;
		var self = this;
		$('.box-rpt').off('click', '.btn-do-report').on('click', '.btn-do-report', function(){
			self.doReport({
				'action' : $(this).data('action') 
			});
		});
	};

	this.doReport = function( report )
	{
		$.ajax({
			url      : this.createURL,
        	type     : 'post',
        	dataType : 'json',
        	data     : {'action' : report.action },
        	success  : function(result)
        	{
        		switch(result.action)
        		{
        			case 'pdf-open' :
        				alert('Deschid in browser fisierul ' + result.file);
                        break;
        			case 'pdf-download' :
                        alert('Download...');
                        break;
        			case 'pdf-print' :
        				alert('Print ' + result.file);
                        // $('a.btn-do-report[data-action="pdf-print"]').attr('href', result.file);
                        // var iframe = $('iframe#iframeprint');
                        // iframe.attr('src', result.file);
                        // iframe.load(function() {
                        //     var PDF = document.getElementById(iframeId);
                        //     console.log(PDF);
                        //       // PDF.focus();
                        //       // PDF.contentWindow.print();
                        // });
        				break;
        		}
        	}
		});
	};


	this.init();
	console.log(this);
}