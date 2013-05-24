-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 22 日 10:08
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `za_helper`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `thumb` varchar(30) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title_id`, `user_id`, `title`, `content`, `thumb`, `time`, `visible`) VALUES
(17, 17, 1, 'HTML 转 Javascript 字符串', '<p>HTML 转 Javascript 字符串</p><p><textarea class="input-block-level" style="height:100px;" id="editor"></textarea><textarea class="input-block-level" style="height:300px;" id="result"></textarea><label><input checked="checked" id="cssPathCheck" type="checkbox" />cssPath</label></p><script _ue_org_tagname="script">\n			var d        = document,\n			editor       = d.getElementById(''editor''),\n			result       = d.getElementById(''result''),\n			cssPathCheck = d.getElementById(''cssPathCheck''),\n			html ,\n			hander = function () {\n				html = editor.value;\n				html = html.replace(/(^\\s*)|(\\s*$)/mg, '''')//删除每行首位的空白字符\n						   .replace(/\\''/g,''\\\\\\'''')//转义所有的单引号\n					       .replace(/\\n|\\t/g,''\\''+\\n\\'''');//回车字符，替换成字符串相加\n                if(!html)return;\n				if(cssPathCheck.checked){//是否加版本号\n					html = html.replace(/(http:\\/\\/)[\\d\\w\\.]+(\\/zhenai3\\/)/g,''\\''+cssPath+\\''$2'');\n				}\n				result.value = ''\\''''+html+''\\'';'';\n			};\n			if(!+[1,]){\n				editor.onpropertychange = hander;			\n			}else{\n				editor.addEventListener(''input'',hander);\n			}\n			cssPathCheck.onclick = hander;\n	</script>', '20130522916431214.png', '2013-05-22 01:31:10', 1),
(18, 16, 1, '珍爱通用按钮样式', '<p style="text-align:left;">依赖样式表</p><pre class="brush:html;toolbar:false;">&lt;link href="http://i0.zastatic.com/edition201305221117/zhenai3/zhenai2012/css/button.css" rel="stylesheet" media="screen"&gt;</pre><p><br /></p><table class="table table-bordered" width="1138"><tbody><tr><td rowspan="5" colspan="1" style="word-break:break-all;" valign="top" width="62"><h3 style="font-size:14px;color:#5b013e;text-align:left;"><span style="font-size:36px;">大号</span></h3></td><td style="word-break:break-all;" valign="top" width="637"><pre class="brush:html;toolbar:false;">&lt;a class="btn_blue_L" href="###"&gt;蓝色按钮&lt;/a&gt;</pre></td><td style="word-break:break-all;" valign="top" width="289"><a class="btn_blue_L" href="###">蓝色按钮</a></td></tr><tr><td style="word-break:break-all;" valign="top" width="637"><pre class="brush:html;toolbar:false;">&lt;a class="btn_orange_L" href="###"&gt;橙色按钮&lt;/a&gt;</pre></td><td valign="top" width="289"><a class="btn_orange_L" href="###">橙色按钮</a></td></tr><tr><td style="word-break:break-all;" valign="top" width="637"><pre class="brush:html;toolbar:false;">&lt;a class="btn_pink_L" href="###"&gt;粉色按钮&lt;/a&gt;</pre></td><td valign="top" width="289"><a class="btn_pink_L" href="###">粉色按钮</a></td></tr><tr><td rowspan="1" colspan="1" style="word-break:break-all;" valign="top" width="637"><pre class="brush:html;toolbar:false;">&lt;a class="btn_pink_L pink_66" href="###"&gt;&lt;span&gt;带图标的粉色按钮&lt;/span&gt;&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_pink_L pink_66" href="###">图标</a></td></tr><tr><td rowspan="1" colspan="1" style="word-break:break-all;" valign="top" width="637"><pre class="brush:html;toolbar:false;">&lt;a class="btn_gray_L" href="###"&gt;灰色按钮&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_gray_L" href="###">灰色按钮</a></td></tr><tr><td rowspan="4" colspan="1" valign="top" width="289"><h3 style="font-size:14px;color:#5b013e;text-align:left;"><span style="font-size:24px;">中号</span></h3></td><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_blue_M" href="###"&gt;&lt;strong&gt;加为好友&lt;/strong&gt;&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_blue_M" href="###"><strong>加为好友</strong></a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_orange_M" href="###"&gt;发送&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_orange_M" href="###">发送</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_pink_M" href="###"&gt;喜欢她&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_pink_M" href="###">喜欢她</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_gray_M" href="###"&gt;讨厌她&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_gray_M" href="###">讨厌她</a></td></tr><tr><td rowspan="8" colspan="1" valign="top" width="289"><h3 style="font-size:14px;color:#5b013e;">其他常用按钮</h3></td><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_accept" href="###"&gt;接受&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_accept" href="###">接受</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_reject" href="###"&gt;拒绝&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_reject" href="###">拒绝</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_bleers_a" href="###"&gt;发秋波&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_bleers_a" href="###">发秋波</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_contact_a" href="###"&gt;发邮件&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_contact_a" href="###">发邮件</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_gift_a" href="###"&gt;送礼物&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_gift_a" href="###">送礼物</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_bleers_reply" href="###"&gt;回复秋波&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_bleers_reply" href="###">回复秋波</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A btn_rebate" href="###"&gt;回赠名片&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A btn_rebate" href="###">回赠名片</a></td></tr><tr><td rowspan="1" colspan="1" valign="top" width="289"><pre class="brush:html;toolbar:false;">&lt;a class="btn_A" href="###"&gt;不带图标&lt;/a&gt;</pre></td><td rowspan="1" colspan="1" valign="top" width="289"><a class="btn_A" href="###">不带图标</a></td></tr></tbody></table><p><br /></p><p>带图标的粉红色按钮</p><pre class="brush:css;toolbar:false;">.pink_66 span {\n    background: url("http://images.zhenai.com/edition201209132030/zhenai3/zhenai2012/img/icon_66.png") no-repeat scroll 10px center transparent;\n    display: block;\n    line-height: 38px;\n    padding-left: 40px;\n}</pre><link href="http://i0.zastatic.com/edition201305221117/zhenai3/zhenai2012/css/button.css" rel="stylesheet" media="screen" />', '2013052291251976.png', '2013-05-22 07:52:00', 1),
(19, 18, 1, 'PNG 半透明', '<ul class=" list-paddingleft-2"><li><p>CSS 滤镜</p><pre>filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=''image.png'', sizingMethod=''scale'');\n</pre></li><li><p>注意点：</p><ul class=" list-paddingleft-2"><li><p>使用了scale, 这个会适应元素宽度，所以需要设置固定的高度或宽度</p></li><li><p>filter是应该避免的，所以避免index transparent外的 PNG 透明元素</p></li><li><p>IE6 默认支持index transparent 的 PNG</p></li><li><p>src的路径相对于当前文档来说的，不过，我们一般用绝对路径，就没什么问题了</p></li></ul></li><li><p>语法：</p><pre>filter : progid:DXImageTransform.Microsoft.AlphaImageLoader ( enabled=bEnabled , sizingMethod=sSize , src=sURL )</pre></li><li><p>属性：</p><ul class=" list-paddingleft-2"><li><p>enabled: 可选项。布尔值(Boolean)。设置或检索滤镜是否激活</p></li><li><p>true &nbsp;: 默认值。滤镜激活</p></li><li><p>false:滤镜被禁止</p></li><li><p>sizingMethod: 可选项。字符串(String)。设置或检索滤镜作用的对象的图片在对象容器边界内的显示方式 </p></li><li><p>crop: 剪切图片以适应对象尺寸 </p></li><li><p>image: 默认值。增大或减小对象的尺寸边界以适应图片的尺寸 </p></li><li><p>scale: 缩放图片以适应对象的尺寸边界 </p></li><li><p>src: 必选项。字符串(String)。使用绝对或相对 url 地址指定背景图像。假如忽略此参数，滤镜将不会作用</p></li></ul></li><li><p>特性：</p><ul class=" list-paddingleft-2"><li><p>Enabled: 可读写。布尔值(Boolean)。参阅 enabled 属性</p></li><li><p>sizingMethod: 可读写。字符串(String)。参阅 sizingMethod 属性</p></li><li><p>src: 可读写。字符串(String)。参阅 src 属性</p></li></ul></li><li><p>说明：</p><p>在对象容器边界内，在对象的背景和内容之间显示一张图片。并提供对此图片的剪切和改变尺寸的操作。如果载入的是PNG(Portable Network Graphics)格式，则0%-100%的透明度也被提供。PNG(Portable Network Graphics)格式的图片的透明度不妨碍你选择文本。也就是说，你可以选择显示在PNG(Portable Network Graphics)格式的图片完全透明区域后面的内容。</p></li></ul>', '', '2013-05-22 09:38:02', 1),
(20, 18, 1, '跨浏览器 position:fixed', '<ul class=" list-paddingleft-2"><li><p>基本功能：</p><pre>.sl-fixed-top 相当于正常的 position:fixed; top:0; \n.sl-fixed-bottom 相当于正常的 position:fixed;bottom:0px;\n.sl-fixed-left 相当于正常的 position:fixed;left:0px;\n.sl-fixed-right 相当于正常的 position:fixed;right:0;\n</pre></li><li><p>有一些需要注意的是:</p><ul class=" list-paddingleft-2"><li><p>如果需要多个方向的固定位置，比如 top + right，需要加两个 class</p></li><li><p>如果加了 <code>.sl-fixed-top</code>, 那么就别给这个元素加 <code>top</code> 属性的值</p></li><li><p>为了不出现异常，这个只作为套用。比如要<code>top:30px</code> 的时候，请在 <code>.sl-fixed-top</code> 的子元素内设置</p></li><li><p>由于我们有打包，所以，改solution是可以滴，但这是强烈不推荐的，因为不利于维护</p></li></ul></li></ul><pre class="brush:css;toolbar:false;">/*\n    @ 名称: position:fixed\n    @ 用法：添加class\n    @ 注意:\n          * 如果需要多个方向的固定位置，比如 top + right，需要加两个 class\n          * 如果加了.sl-fixed-top, 那么就别给这个元素加 top 属性的值\n          * 为了不出现异常，这个只作为套用。比如要top:30px 的时候，请在 .sl-fixed-top 的子元素内设置\n          * 由于我们有打包，所以，改solution是可以的，但这是强烈不推荐的，因为不利于维护\n*/\n.sl-fixed{\n    position:fixed;\n}\n/* 相当于正常的 position:fixed; top:0;  */\n.sl-fixed-top {\n    bottom:auto;\n    top:0;\n    _bottom:auto;\n    _top:expression(eval(document.documentElement.scrollTop));\n}\n/* 相当于正常的 position:fixed;bottom:0px; */\n.sl-fixed-bottom {\n    bottom:0;\n    top:auto;\n    _bottom:auto;\n    _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));\n}\n/* 相当于正常的 position:fixed;left:0px; */\n.sl-fixed-left {\n    left:0;\n    _position:absolute;\n    right:auto;\n    _left:expression(eval(document.documentElement.scrollLeft));\n}\n/* 相当于正常的 position:fixed;right:0; */\n.sl-fixed-right {\n    right:0;\n    left:auto;\n    _right:auto;\n    _left:expression(eval(document.documentElement.scrollLeft+document.documentElement.clientWidth-this.offsetWidth)-(parseInt(this.currentStyle.marginLeft,10)||0)-(parseInt(this.currentStyle.marginRight,10)||0));\n}\n/* 当不是 https 时，可以把 # 换成 about:blank 以提升效率 */\nhtml,html body {\n    _background-image:url(''about:blank'');\n    _background-attachment:fixed;\n}\n/* hack for ie6 */\n.sl-fixed-top,.sl-fixed-right,.sl-fixed-bottom,.sl-fixed-left {\n    _position:absolute;\n}</pre><p><br /></p>', '', '2013-05-22 09:39:50', 1),
(21, 18, 1, '去除虚线框', '<h3>去除虚线框\n</h3><p>一般情况下，链接的 <code>outline</code> 可以不去除。如果 <code>outline</code> 形状极丑陋的情况下，视觉效果很差，则使用些方法：\n</p><ul class=" list-paddingleft-2"><li><p>IE 添加 HTML 属性 <code>hidefocus=&quot;true&quot;<br /><br /><br /></code></p></li></ul><pre class="brush:html;toolbar:false;">&lt;p&gt;IE6: &lt;a href="#" hidefocus="true"&gt;A outline:hidefocus&lt;/a&gt;&lt;/p&gt;\n&lt;p&gt;Firefox: &lt;input type="button" class="btn" value="no outline button" /&gt;&lt;/p&gt;\n</pre><p></p><p></p><pre class="brush:css;toolbar:false;">/* hack for Firefox */\ninput[type=submit]::-moz-focus-inner,input[type=button]::-moz-focus-inner{\nborder : 0px;\n}\n/* 不要随便去掉虚线框 */\ninput[type=submit]:focus, input[type=button]:focus{\noutline : none;\n}\n</pre><p><br /></p>', '', '2013-05-22 09:43:31', 1),
(22, 18, 1, '1像素圆角', '<h3>1像素圆角：\n</h3><ul class=" list-paddingleft-2"><li><p>好处：跨浏览器，自适应高度和宽度</p></li><li><p>缺点：外观太简单</p><p>最好不要给 <code>INPUT[type=submit[button]] || BUTTON</code> 直接添加border，避免 lte IE7 出现的1px 黑边 bug</p></li><li><p>结构：支持 <code>-hover</code>, <code>hover</code> 时为 <code>class=&quot;.sl-rc .sl-rc-hover&quot;<br /><br /></code></p></li></ul><pre class="brush:html;toolbar:false;">&lt;p&gt;\n   &lt;span class="sl-rc"&gt;&lt;span class="sl-rc-cnt"&gt;一像素圆角&lt;/span&gt;&lt;/span&gt;&lt;!-- .sl-rc --&gt;\n   &lt;cite&gt;混排的文字&lt;/cite&gt;\n&lt;/p&gt;\n&lt;a href="#" class="sl-rc"&gt;&lt;span class="sl-rc-cnt"&gt;由&lt;code&gt;&amp;lt;a/&amp;gt;&lt;/code&gt;标签实现时不用加&lt;code&gt;.sl-rc-hover&lt;/code&gt;&lt;/span&gt;&lt;/a&gt;\n&lt;cite&gt;混排的文字&lt;/cite&gt;\n</pre><p><br /></p><pre class="brush:css;toolbar:false;">/*\n  @ 名称: 1像素圆角\n  @ 描述: 需要自己设置宽度，或者高度，否则会随内容自适应\n  @ 用法:\n    最外层：.sl-rc\n    内容层：.sl-rc-cnt\n    鼠标经过：.sl-rc-hover\n*/\n/* base */\n.sl-rc{\n  display:inline-block;vertical-align: middle;\n  border-left:1px solid #ddd;border-right:1px solid #ddd;  /* 可重设 */\n}\n/*\n  不要直接给 BOTTON | INPUT[type=submit[button]] 添加边框\n  这会引发 IE 的 1px 的黑边 bug\n  Note: 一般不要把 input 作为.sl-rc-cnt 层\n */\n.sl-rc-cnt{\n  float:left;position: relative;\n  border-top: 1px solid #ddd;border-bottom:1px solid #ddd; /* 可重设 */\n  margin:-1px 0;\n}\n/* HACK for ie6 7 */\ndiv.sl-rc, p.sl-rc, h2.sl-rc, h3.sl-rc, h4.sl-rc, h5.sl-rc, h6.sl-rc, ul.sl-rc, ol.sl-rc{\n  *display: inline;\n}\n/* 鼠标经过 */\n.sl-rc-hover, .sl-rc-hover .sl-rc-cnt, .sl-rc:hover, .sl-rc:hover .sl-rc-cnt{\n  border-color: #aaa; /* 可重设 */\n  text-decoration: none;\n}\n</pre><p><br /><br /><span style="font-size:24px;color:#00b050;"> DEMO</span></p><p><br /></p><style _ue_org_tagname="style">\n  /* base */\n.sl-rc{\n  display:inline-block;vertical-align: middle;\n  border-left:1px solid #ddd;border-right:1px solid #ddd;  /* 可重设 */\n}\n\n/* \n  不要直接给 BOTTON | INPUT[type=submit[button]] 添加边框\n  这会引发 IE 的 1px 的黑边 bug\n  Note: 一般不要把 input 作为.sl-rc-cnt 层 \n */\n.sl-rc-cnt{\n  float:left;position: relative;\n  border-top: 1px solid #ddd;border-bottom:1px solid #ddd; /* 可重设 */\n  margin:-1px 0;\n}\n\n/* HACK for ie6 7 */\ndiv.sl-rc, p.sl-rc, h2.sl-rc, h3.sl-rc, h4.sl-rc, h5.sl-rc, h6.sl-rc, ul.sl-rc, ol.sl-rc{\n  *display: inline;\n}\n\n/* 鼠标经过 */\n.sl-rc-hover, .sl-rc-hover .sl-rc-cnt, .sl-rc:hover, .sl-rc:hover .sl-rc-cnt{\n  border-color: #aaa; /* 可重设 */\n  text-decoration: none;\n}\n</style><p><span class="sl-rc"><span class="sl-rc-cnt">一像素圆角</span></span><!-- .sl-rc --><cite>混排的文字</cite></p><p><a href="#" class="sl-rc"><span class="sl-rc-cnt">由<code>&lt;a/&gt;</code>标签实现时不用加<code>.sl-rc-hover</code></span></a><cite>混排的文字</cite></p><br><br><br>', '', '2013-05-22 09:53:08', 1);

-- --------------------------------------------------------

--
-- 表的结构 `note_article`
--

CREATE TABLE IF NOT EXISTS `note_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `thumb` varchar(30) COLLATE utf8_bin NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL DEFAULT '0',
  `title_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_name` (`title_name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `title`
--

INSERT INTO `title` (`id`, `p_id`, `title_name`, `visible`) VALUES
(16, 0, 'BaseCSS', 1),
(17, 0, '工具', 1),
(18, 0, '解决方案', 1),
(19, 0, '分享', 1),
(20, 16, '珍爱通用按钮样式', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `password_2` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, '何世孟', 'heshimeng');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
