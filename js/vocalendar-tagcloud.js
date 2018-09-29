

var vocalendar = {};
vocalendar.TagCloud = function() {

	// 定義兼、コンストラクタ

	// 初期化済みフラグ
	this.isInit = false;
	this.rebuild = false;
	this.d = document;
	this.items = [];

	// JQueryの読込
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js';
	document.getElementsByTagName('head')[0].appendChild(script);

}

vocalendar.TagCloud.prototype = {
	init : function(obj) {

		var thisobj = obj ? obj :this;

		try {
			jQuery
		} catch ( e ) {
			setTimeout(function(){thisobj.init(thisobj)}, 100);
			return;
		}

		thisobj.isInit = true;
		thisobj._getTagitems(1);
	
	},

	_getTagitems : function(page) {
		$.ajax({
				type : 'GET',
				url : 'https://vocalendar.jp/core/tags.json?page=' + page,
				dataType : 'jsonp',
				jsonpCallback: 'tagcloud',
				context: this,
				contentType: 'application/javascript',
				success : function(json) { this._getTagitemsSuccessHandler.call(this, json, page); },
				dummy: 'dummy'
				});
	},

	_getTagitemsSuccessHandler : function(json, page) {

		if ( json.length <= 0 ) {
			this._sort();
			this._makeConteiner();
			return
		}
		this._getTagitems(page + 1);
		this.items = this.items.concat(json);
	},
	
	_sort : function() {
	
		this.items.sort( function( a, b ) {
			if ( a.count == b.count ) { return 0; }
			return ( a.count < b.count ) ? 1 : -1;
		});
	},
	
	_createTag : function(item) {
		
		var thisObj = this;
		var tag = $('<li>').css({
					display : 'inline',
					'margin-left' : '2px',
					'margin-right': '2px',
					'float' : 'left',
					color : '#3333cc',
					});
		tag.mouseover(function(){ tag.css({'background-color':'#ffcccc', cursor:'pointer'}) });
		tag.mouseout(function(){ tag.css({'background-color':'#ffffff', cursor:'auto'}) });
		tag.click(function(){ thisObj._addTagString(item.name); });
		
		tag.append(this.d.createTextNode(item.name + '(' + item.count + ')'));
		return tag;
	},
	
	_addTagString : function(str) {
	
		var textarea = $('.ep-dp-descript').find('textarea');
		var lines = textarea.val().split('\n');
		var lastline = lines[lines.length - 1];
		
		if( !lastline.startsWith('Tag::') ){
			lines.push('Tag::');
			lastline = lines[lines.length - 1];
		}
		if(lastline.length != 5) {
			lastline += ' ';
		}
		lastline += str;
		lines[lines.length - 1] = lastline;
		textarea.val(lines.join('\n'));
	
	},
	
	_createSearchBox : function() {
		var thisobj = this;
		return  $('<input>', { type:'text', id: 'vocatag-search'} )
				.css({'font-size':'12pt'})
				.keyup(function(event){
				 		 	if (thisobj.rebuild) {
				 		 		return;
				 		 	}
				 		 	thisobj.rebuild = true;
				 		 	setTimeout(function(str){thisobj._selectTags.call(thisobj, str);}, 100, this.value);
				 		 })
				;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
	
	
	},
	
	_selectTags : function(searchStr) {
		var cloud = $('#vocatag-cloud');
		cloud.empty();
		console.log(searchStr);
		var thisobj = this;
		$.each(this.items, function( i, item ) {
			if( item.name.toLowerCase().indexOf(searchStr.toLowerCase()) >= 0 ) {
				cloud.append( thisobj._createTag(item) );
			}
		});
		this.rebuild = false;
	},

	
	_makeConteiner : function() {
		var thisobj = this;
		var conteiner = $('<div>')
					.css({
						width: '300px',
						height: '300px',
					});

		var cloud = $('<ul>', { id: 'vocatag-cloud'})
					.css({
						listStyleType: 'none',
						overflow: 'auto',
						height: '250px',
						'padding-left': '2px',
					});
		
		$.each(this.items, function( i, item ) {
			cloud.append(  thisobj._createTag(item) );
		});
		conteiner.append(this._createSearchBox());
		conteiner.append(cloud);
		$('.ep-dp-descript').append(conteiner);
 
	}
}

var vocatag = new vocalendar.TagCloud();
vocatag.init();


