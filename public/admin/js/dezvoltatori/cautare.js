/**
 * Created by lupac on 7/22/2015.
 */
function CautareDezvoltatori( parameters )
{
    this.dt       = parameters.dt;
    this.perioada = $('#perioada').data('daterangepicker');
    this.d1 	  = this.perioada.startDate;
    this.d2       = this.perioada.endDate;
    this.change_oferta_valabila_endpoint   = parameters.change_oferta_valabila_endpoint;
    this.perioada_ansamblu = $('#perioada_ansamblu').data('daterangepicker');
    this.da1 	   = this.perioada_ansamblu.startDate;
    this.da2       = this.perioada_ansamblu.endDate;
    this.change_data_actualizare_endpoint = parameters.change_data_actualizare_endpoint;

    console.log(parameters);
    var my = this;


    /* 1 -> oferta valabila */
    this.oferta_valabila = function()
    {
        var value = $('#oferta_valabila').val();
        if(value == -1)
        {
            return 'v_dezvoltatori.id_organizatie=' + $('#id_organizatie').val();
        }
        return '(v_dezvoltatori.id_organizatie=' + $('#id_organizatie').val() + ') AND (v_dezvoltatori.oferta_valabila = ' + value + ')';
    }
    /* 2 -> adresa exacta */
    this.adresa_exacta = function()
    {
        var value = $('#strada').val();
        if(value.length == 0)
        {
            return '';
        }
        return "v_dezvoltatori.strada LIKE '%" + value + "%'";
    }
    /* 2 -> nume dezvoltator */
    this.dezvoltator = function()
    {
        var value = $('#dezvoltator').val();
        if(value.length == 0)
        {
            return 'v_dezvoltatori.id_organizatie = ' + $('#id_organizatie').val();
        }
        return 'v_dezvoltatori.id_organizatie = ' + $('#id_organizatie').val() + " AND v_dezvoltatori.dezvoltator LIKE '%" + value + "%'";
    }

    this.imobil = function()
    {
        var value = $('#imobil').val();
        console.log("v_dezvoltatori.imobil LIKE '%" + value + "%'");
        if(value.length == 0)
        {
            return '';
        }
        return "v_dezvoltatori.imobil LIKE '%" + value + "%'";
    }

    this.cladire = function()
    {
        var value = $('#cladire').val();
        if(value.length == 0)
        {
            return '';
        }
        return "v_dezvoltatori.cladire LIKE '%" + value + "%'";
    }

    this.adresa_apartament = function()
    {
        var value = $('#adresa_apartament').val();
        if(value.length == 0)
        {
            return '';
        }
        console.log(value);
        return "v_dezvoltatori.adresa_apartament LIKE '%" + value + "%'";
    }
    /* 2 -> nume ansamblu */
    this.ansamblu = function()
    {
        var value = $('#ansamblu').val();
        if(value.length == 0)
        {
            return '';
        }
        return "v_dezvoltatori.ansamblu LIKE '%" + value + "%'";
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
            return 'v_dezvoltatori.camere_apartament BETWEEN ' + nr1 + ' AND ' + nr2;
        }
        if(nr1 != 0)
        {
            return 'v_dezvoltatori.camere_apartament >= ' + nr1;;
        }
        return 'v_dezvoltatori.camere_apartament <= ' + nr2;
    }
    /* 3 -> suprafata utila */
    this.supratafa_utila = function()
    {
        var nr1 = parseInt(numeral().unformat($('#suprafata_utila_min').val()));
        var nr2 = parseInt(numeral().unformat($('#suprafata_utila_max').val()));
        if( (nr1 == 0) && (nr2 == 0) )
        {
            return '';
        }
        if( (nr1 != 0) && (nr2 != 0) )
        {
            return 'v_dezvoltatori.suprafata_utila BETWEEN ' + nr1 + ' AND ' + nr2;
        }
        if(nr1 != 0)
        {
            return 'v_dezvoltatori.suprafata_utila >= ' + nr1;;
        }
        return 'v_dezvoltatori.suprafata_utila <= ' + nr2;
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
            return 'v_dezvoltatori.pret_m2 BETWEEN ' + nr1 + ' AND ' + nr2;
        }
        if(nr1 != 0.00)
        {
            return 'v_dezvoltatori.pret_m2 >= ' + nr1;;
        }
        return 'v_dezvoltatori.pret_m2 <= ' + nr2;
    }

    /* 5 -> is agentie */
    this.is_agentie = function()
    {
        var value = $('#is_agentie').val();
        if(value == -1)
        {
            return '';
        }
        return 'v_dezvoltatori.is_agentie = ' + value;
    }

    /* 6 -> ultima_actualizare */
    this.data_finalizare_cladire = function()
    {
        var d1 = my.perioada.startDate.format('YYYY-MM-DD');
        var d2 = my.perioada.endDate.format('YYYY-MM-DD');
        return "ISNULL(v_dezvoltatori.data_finalizare_cladire) OR v_dezvoltatori.data_finalizare_cladire BETWEEN '" + d1 + "' AND '" + d2 + "'";
    }
    this.data_finalizare_ansamblu = function()
    {
        var d1 = my.perioada_ansamblu.startDate.format('YYYY-MM-DD');
        var d2 = my.perioada_ansamblu.endDate.format('YYYY-MM-DD');
        return "ISNULL(v_dezvoltatori.data_finalizare_ansamblu) OR v_dezvoltatori.data_finalizare_ansamblu BETWEEN '" + d1 + "' AND '" + d2 + "'";
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
         return "(v_dezvoltatori.telefon LIKE '%" + value + "%') OR (v_dezvoltatori.telefon_secundar_1 LIKE '%" + value + "%') OR (v_dezvoltatori.telefon_secundar_2 LIKE '%" + value + "%')";
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
            return 'v_dezvoltatori.id_proprietar_pf = ' + value;
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
        return 'v_dezvoltatori.credit_prima_casa = ' + value;
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
            return 'v_dezvoltatori.nr_etaj BETWEEN ' + nr1 + ' AND ' + nr2;
        }
        if(nr1 != 0)
        {
            return 'v_dezvoltatori.nr_etaj >= ' + nr1;;
        }
        return 'v_dezvoltatori.nr_etaj <= ' + nr2;
    }

    /* 10 -> tip finisaj interior */
    this.tip_finisaj_interior = function()
    {
        var value = $('#id_tip_finisaje_interioare').val();
        if(value == 0)
        {
            return '';
        }
        return 'v_dezvoltatori.id_tip_finisaje_interioare = ' + value;
    }
    /* 10 -> tip finisaj interior */
    this.stadiu_cladire = function()
    {
        var value = $('#id_tip_stadiu_cladire').val();
        if(value == 0)
        {
            return '';
        }
        return 'v_dezvoltatori.id_tip_stadiu_cladire = ' + value;
    }

    this.stadiu_ansamblu = function()
    {
        var value = $('#id_tip_stadiu_ansamblu').val();
        if(value == 0)
        {
            return '';
        }
        return 'v_dezvoltatori.id_tip_stadiu_ansamblu = ' + value;
    }

    /* 11 -> tip compartiment */
    this.tip_compartimentare = function()
    {
        var value = $('#id_tip_compartiment').val();
        if(value == 0)
        {
            return '';
        }
        return 'v_dezvoltatori.id_tip_compartiment = ' + value;
    }

    /* 12 -> cartier  */
    this.cartier = function()
    {
        var value = $('#id_cartier').val();
        if(value == 0)
        {
            return '';
        }
        return 'v_dezvoltatori.id_cartier = ' + value;
    }
    /* 12 -> localitate  */
    this.localitate = function()
    {
        var value = $('#id_localitate').val();
        if(value == 0)
        {
            return '';
        }
        console.log(value);
        return 'v_dezvoltatori.id_localitate = ' + value;
    }

    /* 13 -> tip imobil  */
    this.tip_imobil = function()
    {
        var value = $('#tip_imobil').val();
        if(value == 0)
        {
            return '';
        }
        return 'v_dezvoltatori.id_tip_imobil = ' + value;
    }

    /* 14 -> tip imobil  */
    this.vechime_imobil = function()
    {
        var value = $('#vechime_imobil').val();
        if(value == -1)
        {
            return '';
        }
        return 'v_dezvoltatori.vechime_imobil = ' + value;
    }

    $('#cmd-search').click(function(){
        var table = my.dt;

        console.log('columns1')
        console.log(table.columns(2));
        console.log(table.columns());
        console.log('columns2')
        table
            .columns(1).search( my.dezvoltator() )
            .columns(2).search( my.ansamblu() ) 
            .columns(3).search( my.imobil() )
            .columns(4).search( my.cladire() )
            .columns(5).search( my.numar_camere() )      
            .columns(6).search( my.supratafa_utila() )      
            .columns(7).search( my.tip_compartimentare() )
            .columns(8).search( my.tip_finisaj_interior() )
            .columns(9).search( my.cartier() )
            .columns(10).search( my.localitate() )
            .columns(11).search( my.adresa_apartament() )
            .columns(12).search( my.stadiu_cladire() )
            .columns(13).search( my.data_finalizare_cladire() )
            .columns(14).search( my.data_finalizare_ansamblu() )
            .columns(15).search( my.stadiu_ansamblu() )
            .draw();


    });

    $('#cmd-reset').click(function(){
        $('#dezvoltator').val('');
        $('#ansamblu').val('');
        $('#cladire').val('');
        $('#nr_camere_min').val('');
        $('#nr_camere_max').val('');
        $('#suprafata_utila_min').val('');
        $('#suprafata_utila_max').val('');
        $('#pret_m2_min').val('');
        $('#pret_m2_max').val('');
        $('#imobil').val('');
        $('#adresa_apartament').val('');
        $('#id_tip_finisaje_interioare').val('');
        $('#id_tip_compartiment').val('');
        $('#id_cartier').val('');
        $('#id_localitate').val('');
        $('#tip_imobil').val('');
        $('#id_tip_stadiu_cladire').val('');
        $('#id_tip_stadiu_ansamblu').val('');
        $('#id_tip_stadiu_cladire').val('');
        my.perioada.setStartDate(my.d1);
        my.perioada.setEndDate(my.d2);
        my.perioada_ansamblu.setStartDate(my.da1);
        my.perioada_ansamblu.setEndDate(my.da2);

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
                var table = my.dt;
                table.draw();
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
                table.draw();
            }
        });
    });
}
