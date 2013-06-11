(function() {
    tinymce.create('tinymce.plugins.FCNbuttons', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            ed.addButton('youtube_embed', {
                title : 'YouTube Iframe',
                cmd : 'youtube_embed',
                image : url + '/youtube-ico.png'
            });
            ed.addCommand('youtube_embed', function(){
                ed.windowManager.open({
                    file : url + '/tinymce.popup.html',
                    width : 450 + parseInt(ed.getLang('youtube_embed.delta_width', 0)),
                    height: 450 + parseInt(ed.getLang('youtube_embed.delta_height', 0)),
                    inline : 1
                }, {
                    plugin_url : url
                });
            });

            /*ed.addCommand('youtube_embed', function(){
                var id = prompt("Video ID"),
                    width = prompt("Video Width", "640"),
                    height = prompt("Video Height", "360"),
                shortcode = '[youtube_embed video="' + id + '" width="' + width + '" height="' + height + '" /]';
 
                ed.execCommand('mceInsertContent', 0, shortcode);
            });*/
        },
 
        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },
 
        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'FCN Buttons',
                author : 'Green Orb',
                authorurl : 'http://www.greenorb.com',
                infourl : 'http://www,greenorb.com',
                version : "0.1"
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add( 'youtube_iframe_embed_sc', tinymce.plugins.FCNbuttons );
})();
