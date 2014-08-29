(function() {
	tinymce.create('tinymce.plugins.az', {
		init : function(ed, url) {
		 ed.addCommand('shortcodeGenerator', function() {
		 	
		 		tb_show("AZ Shortcodes", url + '/shortcode_generator/shortcode-generator.php?&width=630&height=500');

				
		 });
			//Add button
			ed.addButton('shortcodebtns', {	title : 'AZ Shortcodes', cmd : 'shortcodeGenerator', image : url + '/shortcode_generator/icons/shortcode-icon.png' });
        },
        createControl : function(n, cm) {
			  return null;
        },
		  getInfo : function() {
			return {
				longname : 'az TinyMCE',
				author : 'Alessio Atzeni',
				authorurl : 'http://alessioatzeni.com',
				infourl : 'http://alessioatzeni.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
    });
    tinymce.PluginManager.add('az_buttons', tinymce.plugins.az);
})();