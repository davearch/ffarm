(function() {
	tinymce.PluginManager.requireLangPack('bnk_sceditor');
	tinymce.create('tinymce.plugins.bnk_sceditor', {
		init : function(ed, url) {

			ed.addCommand('mcebnk_sceditor', function() {
				ed.windowManager.open({
					file : url + '/interface.php',
					width : 410 + ed.getLang('bnk_sceditor.delta_width', 0),
					height : 250 + ed.getLang('bnk_sceditor.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			
			ed.addButton('bnk_sceditor', {
				title : 'bnk_sceditor.desc',
				cmd : 'mcebnk_sceditor',
				image : url + '/shortcode_btn.png'
			});

			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('bnk_sceditor', n.nodeName == 'IMG');
			});
		},
		
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'bnk_sceditor',
					author 	  : 'truethemes',
					authorurl : 'http://truethemes.mysitemyway.com',
					infourl   : 'http://truethemes.mysitemyway.com',
					version   : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('bnk_sceditor', tinymce.plugins.bnk_sceditor);
})();