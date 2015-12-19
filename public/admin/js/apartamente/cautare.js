function CautareApartamente( parameters )
{
	this.dt       = parameters.dt; 
	this.perioada = $('#perioada').data('daterangepicker');
	this.d1 	  = this.perioada.startDate;
	this.d2       = this.perioada.endDate;
	this.change_oferta_valabila_endpoint   = parameters.change_oferta_valabila_endpoint;
	this.change_data_actualizare_endpoint = parameters.change_data_actualizare_endpoint;

	console.log(parameters);
	var my = this;


	/* 1 -> oferta valabila */
	this.oferta_valabila = function()
	{
		var value = $('#oferta_valabila').val();
		if(value == -1)
		{
			return 'v_apartamente.id_organizatie=' + $('#id_organizatie').val();
		}
		return '(v_apartamente.id_organizatie=' + $('#id_organizatie').val() + ') AND (v_apartamente.oferta_valabila = ' + value + ')';
	}

	/* 2 -> adresa exacta */
	this.adresa_exacta = function()
	{
		var value = $('#strada').val();
		if(value.length == 0)
		{
			return '';
		}
		return "v_apartamente.strada LIKE '%" + value + "%'";
	}

	/* 3 -> numar camere */
	this.numar_camere = function()
	{
		var nr1 = parseInt(numeral().unformat($('#nr_camere_min').val()));
		var nr2 = parseInt(numeral().unformat($('#nr_camere_max').val()));
		if( (nr1 == 0) && (nr2 == 0) )
		{
			return '';
		}
		if( (nr1 != 0) && (nr2 != 0) )
		{
			return 'v_apartamente.nr_camere BETWEEN ' + nr1 + ' AND ' + nr2;
		}
		if(nr1 != 0)
		{
			return 'v_apartamente.nr_camere >= ' + nr1;;
		}
		return 'v_apartamente.nr_camere <= ' + nr2;
	}

	/* 4 -> pret */
	this.pret = function()
	{
		var nr1 = parseFloat(numeral().unformat($('#pret_m2_min').val()), 2);
		var nr2 = parseFloat(numeral().unformat($('#pret_m2_max').val()), 2);
		if( (nr1 == 0.00) && (nr2 == 0.00) )
		{
			return '';
		}
		if( (nr1 != 0.00) && (nr2 != 0.00) )
		{
			return 'v_apartamente.pret_m2 BETWEEN ' + nr1 + ' AND ' + nr2;
		}
		if(nr1 != 0.00)
		{
			return 'v_apartamente.pret_m2 >= ' + nr1;;
		}
		return 'v_apartamente.pret_m2 <= ' + nr2;
	}

	/* 5 -> is agentie */
	this.is_agentie = function()
	{
		var value = $('#is_agentie').val();
		if(value == -1)
		{
			return '';
		}
		return 'v_apartamente.is_agentie = ' + value;
	}

	/* 6 -> ultima_actualizare */
	this.ultima_actualizare = function()
	{
		var d1 = my.perioada.startDate.format('YYYY-MM-DD');
		var d2 = my.perioada.endDate.format('YYYY-MM-DD');
		return "v_apartamente.ultima_actualizare BETWEEN '" + d1 + "' AND '" + d2 + "'";
	}

	/* 7 -> telefoane */
	this.telefoane = function()
	{
		/**
		var value = $('#telefon').val();
		if(value.length == 0)
		{
			return '';
		}
		return "(v_apartamente.telefon LIKE '%" + value + "%') OR (v_apartamente.telefon_secundar_1 LIKE '%" + value + "%') OR (v_apartamente.telefon_secundar_2 LIKE '%" + value + "%')";
		*/
		var value = $('#cbo_telefon').val();
		if( ! value )
		{
			return '';
		}
		var type = $('#cbo_telefon').select2('data')[0].phone_type;
		if(type == 'Agenţie')
		{
			return '';
		}
		if( parseInt(value) > 0 )
		{
			return 'v_apartamente.id_proprietar_pf = ' + value;		
		}
		return '';
	}

	/* 8 -> credit prima casa */
	this.credit_prima_casa = function()
	{
		var value = $('#credit_prima_casa').val();
		if(value == -1)
		{
			return '';
		}
		return 'v_apartamente.credit_prima_casa = ' + value;
	}

	/* 9 -> numar etaje */
	this.numar_etaje = function()
	{
		var nr1 = parseInt(numeral().unformat($('#nr_etaj_min').val()));
		var nr2 = parseInt(numeral().unformat($('#nr_etaj_max').val()));
		if( (nr1 == 0) && (nr2 == 0) )
		{
			return '';
		}
		if( (nr1 != 0) && (nr2 != 0) )
		{
			return 'v_apartamente.nr_etaj BETWEEN ' + nr1 + ' AND ' + nr2;
		}
		if(nr1 != 0)
		{
			return 'v_apartamente.nr_etaj >= ' + nr1;;
		}
		return 'v_apartamente.nr_etaj <= ' + nr2;
	}

	/* 10 -> tip finisaj interior */
	this.tip_finisaj_interior = function()
	{
		var value = $('#id_tip_finisaje_interioare').val();
		if(value == 0)
		{
			return '';
		}
		return 'v_apartamente.id_tip_finisaje_interioare = ' + value;
	}

	/* 11 -> tip compartiment */
	this.tip_compartimentare = function()
	{
		var value = $('#id_tip_compartiment').val();
		if(value == 0)
		{
			return '';
		}
		return 'v_apartamente.id_tip_compartiment = ' + value;
	}

	/* 12 -> cartier  */
	this.cartier = function()
	{
		var value = $('#id_cartier').val();
		if(value == 0)
		{
			return '';
		}
		return 'v_apartamente.id_cartier = ' + value;
	}

	/* 13 -> tip imobil  */
	this.tip_imobil = function()
	{
		var value = $('#tip_imobil').val();
		if(value == 0)
		{
			return '';
		}
		return 'v_apartamente.id_tip_imobil = ' + value;
	}

	/* 14 -> tip imobil  */
	this.vechime_imobil = function()
	{
		var value = $('#vechime_imobil').val();
		if(value == -1)
		{
			return '';
		}
		return 'v_apartamente.vechime_imobil = ' + value;
	}

	$('#cmd-search').click(function(){

		/**
		 * Calin Verdes. COMPTECH SOFT. 25.06.2015
		 * am scos cautarea dupa "is_agentie" .columns(5).search( my.is_agentie() )
		 */

		var table = my.dt;
		console.log('columns1')
		console.log(table.columns());
		console.log('columns2')
		table
			.columns(1).search( my.oferta_valabila() ) 		 /*  1 -> oferta valabila      */
			.columns(2).search( my.adresa_exacta() )   		 /*  2 -> adresa exacta        */
			.columns(3).search( my.numar_camere() )    		 /*  3 -> numarul de camare    */
			.columns(4).search( my.pret() )            		 /*  4 -> pretul               */

			.columns(6).search( my.ultima_actualizare() )    /*  6 -> ultima_actualizare   */
			.columns(7).search( my.telefoane() )       		 /*  7 -> telefoane            */
			.columns(8).search( my.credit_prima_casa() )     /*  8 -> credit prima casa    */
			.columns(9).search( my.numar_etaje() )           /*  9 -> numar etaje          */
			.columns(10).search( my.tip_finisaj_interior() ) /* 10 -> tip finisaj interior */
			.columns(11).search( my.tip_compartimentare() )  /* 11 -> tip compartimentare  */

			/**
			 * Issue #2. Calin Verde. COMPTECH SOFT
			 **/
			.columns(12).search( my.cartier() )  			 /* 12 -> cartier              */
			.columns(13).search( my.tip_imobil() )  		 /* 13 -> tip_imobil           */
			.columns(5).search( my.vechime_imobil() )       /* 14 -> vechime imobil       */

			.draw();
	});

	$('#cmd-reset').click(function(){
		$('#oferta_valabila').val(-1);
		$('#adresa_exacta').val('');
		$('#nr_camere_min').val('');
		$('#nr_camere_max').val('');
		$('#pret_m2_min').val('');
		$('#pret_m2_max').val('');
		$('#is_agentie').val(-1);
		//$('#telefon').val('');
		$('#cbo_telefon').select2('val', '');
		$('#credit_prima_casa').val(-1);
		$('#nr_etaj_min').val('');
		$('#nr_etaj_max').val('');
		$('#id_tip_finisaje_interioare').val('');
		$('#id_tip_compartiment').val('');
		$('#id_cartier').val('');
		$('#tip_imobil').val(0);
		$('#vechime_imobil').val(-1);
		my.perioada.setStartDate(my.d1);
		my.perioada.setEndDate(my.d2);

		$('#cmd-search').trigger('click');
	});

	/**
	 * Calin Verdes - COMPTECH SOFT SRL
	 * 27.06.2015 - schimbare oferta
	 **/
	$('#box-cauta-apartamente').on('click', '.schimba-valabilitatea-apartamentului', function(){
		$.ajax({
			url      : my.change_oferta_valabila_endpoint,
        	type     : 'post',
        	dataType : 'json',
        	data     : { 'id' : $(this).data('id'), 'status' : $(this).data('status') },
        	success  : function(result)
        	{
        		var table = my.dt
				var page = table.page.info().page;
				table.page(page).draw(false);
				//table.page(3).draw( false );
				//table.page( page ).draw( 'page' );
			/*	oSettings.oFeatures.bFilter = false;
				oSettings.oFeatures.bSort = false;
				table.draw();
				oSettings.oFeatures.bFilter = true;
				oSettings.oFeatures.bSort = true;*/
				//table.draw();
        	}
		});
	});

	$('#box-cauta-apartamente').on('click', '.update-ultima-actualizare', function(){
		$.ajax({
			url      : my.change_data_actualizare_endpoint,
        	type     : 'post',
        	dataType : 'json',
        	data     : { 'id' : $(this).data('id') },
        	success  : function(result)
        	{
        		var table = my.dt;
				var page = table.page.info().page;
				table.page(page).draw(false);
        	}
		});
	});
}