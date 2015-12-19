function SELECT2( selector )
{
	this.selector    = selector;
	this.instance    = null;
	this.placeholder = null;
	this.allowClear  = true;
	this.options     = [];

	this.language = function()
	{
		var result = new Object();
		result.inputTooLong = function(e){
			var t = e.input.length - e.maximum, n = "Vă rugăm să introduceți mai puțin de " + t;
			return n+=" caracter", n!==1 && (n += "e"), n; 
		};
		result.inputTooShort = function(e){
			var t = e.minimum - e.input.length, n = "Vă rugăm să introduceți incă " + t;
			return n+=" caracter", n!==1 && (n += "e") ,n;
		};
		result.loadingMore = function(){return "Se încarcă..."};
		result.maximumSelected = function(e){
			// return 'xxxx';
			var t = "Aveți voie să selectați cel mult " + e.maximum;
			return t += " element", t !== 1 && (t += "e"), t;
		};
		result.noResults = function(){return "Nu a fost găsit nimic";};
		result.searching = function(){return "Căutare...";};
		return result;
	};

	this.config = function()
	{
		var result                       = new Object();
		result.allowClear                = this.allowClear;
		if(this.options.length > 0)
		{
			result.data                  = this.options;
		}
		result.language                  = this.language();

		// numarul maxim de selectii
		// result.maximumSelectionLength    = 2;

		// sa nu se afiseze search-ul. doar la single
		result.minimumResultsForSearch   = Infinity;

		// tagging support
		result.tags = false;
		
		if( ! (this.placeholder === null ) )
		{
			result.placeholder = this.placeholder;
		}
		return result;
	};

	this.disable = function( flag )
	{
		$(selector).prop('disabled', flag);
		return this;
	};

	this.disableoption = function(id, flag)
	{
		$(selector + ' option[value=' + id + ']').prop('disabled', flag);
		return this;
	};

	this.makeoption = function(id, text, disabled)
	{
		var result = new Object();
		result.id       = id;
		result.text     = text;
		result.disabled = disabled;
		return result;
	};

	this.addoption = function(id, text, disabled)
	{
		this.options.push( this.makeoption(id, text, disabled) );
		return this;
	};

	this.placeholder = function( placeholder )
	{
		this.placeholder = placeholder;
		return this;
	};

	this.setValue = function(ids)
	{
		this.instance.val(ids).trigger('change');
		return this;
	}

	this.onOpen = function(e)
	{
	};

	this.onClose = function(e)
	{
	};

	this.onSelect = function(e)
	{
	};

	this.onUnselect = function(e)
	{
	};

	this.onChange = function(e)
	{
	};

	this.init = function()
	{
		var self = this;
		this.instance = 
			$(selector)
			.select2( this.config() )
			.on("select2:open", function(e){ self.onOpen(e) } )
			.on("select2:close", function(e){ self.onClose(e) })
			.on("select2:select", function (e) { self.onSelect(e) })
			.on("select2:unselect", function (e) { self.onUnselect(e) })
			.on("change", function (e) { self.onChange() })
		;
		$('.select2-container .select2-search, .select2-container .select2-search__field').css({'width':'100%'});
		$('ul.select2-results__options li').css({'font-size':'12px'});
		return this;
	}

	return this;
}