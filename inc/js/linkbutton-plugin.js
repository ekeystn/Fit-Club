/**
* TinyMCE plugin for adding link button
*/

(function() {
	tinymce.create('tinymce.plugins.linkbutton', {
		init: function(ed, url) {
			ed.addButton('link_button', {
				title : 'Link Button',
				cmd : 'link_button',
				image : url + '/link-button-ico.png'
			});

			ed.addCommand('link_button', function(){
				var link = prompt("Link URL"),
					text = prompt("Button Text"),
					shortcode = '[link_button link="' + link + '" text="' + text + '" /]';
					ed.execCommand('mceInsertContent', 0, shortcode);

			})
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname: 'Link Button',
				author: 'Green Orb',
				authorurl: 'http://www.greenorb.com',
				infourl : 'http://www.greenorb.com',
				version : '0.1'
			};
		}
	});
	tinymce.PluginManager.add('link_button_sc', tinymce.plugins.linkbutton);
})();