$(document).ready(function() {
	var dom = {
		load: $('#loading'),
		sibeNav: $('#sibeNav'),
		successed: $('#successed'),
		information: $('#informatio'),
		warning: $('#warning'),
		error: $('#error')
	},
	help = {};
	help.hideRight = -500;
	help.loading = function(type,text) {
		text&&dom.load.html(text);
		if(type)
		dom.load.css('right',0);
		else{
			dom.load.css('right',help.hideRight);			
		}
		return this;
	};
	help.successed = function(text){
		text&&dom.successed.html(text);
		dom.successed.css('right',0).delayHide();
		return this;
	};
	help.information = function(type,text){
		text&&dom.information.html(text);
		dom.information.css('right',0).delayHide();
		return this;
	};
	help.warning = function(text){
		text&&dom.warning.html(text);
		dom.warning.css('right',0).delayHide();
		return this;
	};
	help.error = function(text){
		text&&dom.error.html(text);
		dom.error.css('right',0).delayHide();
		return this;
	};
	help.toArray = function (obj) {
            if ($.isArray(obj) || obj.nodeType == 1 || obj.nodeType == 9) {
                return obj;
            }
            //nodeList, IE 下调用 [].slice.call(nodeList) 会报错
            if (obj.item) {
                var l = obj.length,
                    array = [];
                while (l--)
                array[l] = obj[l];
                return array;
            }
            return Array.prototype.slice.call(obj, 0);
    };
	/**
	 * 把url资源预加载
	 * @param  {[Array]}   source   需要预加载URL，可多个数组形式
	 * @param  {[Array or null]} result  返回值，函数内部递归使用
	 * @return {[Array]}   HTML字符串，保存在数据里面返回
	 */
	help.loadHTML = function(source,callback,result){
		result = result || {};
		source = $.isArray(source) ? source : [source];
		callback = callback || function(){};
		var key,
			val = source.shift();
		for(key in val ){
			$.get(val[key],function(html){
				result[key] = html;
				if(source.length){
					help.loadHTML(source,callback,result);
				}else{
					callback.call(result);
				}
			},'text');
		}
	};
	window['help'] = help;
	$.fn.extend({
		delayHide: function(){
			var that;
			this.each(function(){
				that = this;
				setTimeout(function(){
					$(that).css('right',help.hideRight);
				},2000);
			});
		}
	})


	// help.loading(true).loadHTML(
	// [{
	// 	sibeNav: 'template/sibeNav.php'
	// }], function() {
	// 	dom.sibeNav.html(this.sibeNav);
	// 	help.loading().successed(true,'加载成功！');
	// });

});

