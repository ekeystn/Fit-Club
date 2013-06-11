/**
* TinyMCE plugin for adding aweber form
*/

(function(){
	tinymce.create('tinymce.plugins.displayposts', {
		init: function(ed, url) {
			ed.addButton('display_posts', {
				title : 'Add Email Form',
				cmd : 'display_posts',
				image : url + '/form-icon.png'
			});

			ed.addCommand('display_posts', function(){
				var shortcode = '[display_posts]';
				ed.execCommand('mceInsertContent', 0, shortcode);
			})
		},
		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return{
				longname: 'Display Posts',
				author: 'Green Orb',
				authorurl: 'http://www.greenorb.com',
				infourl : 'http://www.greenorb.com',
				version : '0.1'
			};
		}
	});
	tinymce.PluginManager.add('display_posts_sc', tinymce.plugins.displayposts);
})();