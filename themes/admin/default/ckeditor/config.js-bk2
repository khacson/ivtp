/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    console.log(config);
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    // Define changes to default configuration here:
};

CKEDITOR.editorConfig = function (config) {
	config.extraPlugins = 'image2,copyformatting';
	config.copyFormatting_allowRules = true;
	config.pasteFromWordRemoveFontStyles = false;
    // config.contentsCss = 'http://'+location.host+'/vknew/themes/admin/default/assets/plugins/ckeditor/contents.css';
    //the next line add the new font to the combobox in CKEditor
    //config.font_names = '<Cutsom Font Name>/<YourFontName>;' + config.font_names;
    // config.font_names = 'RegIta;Bld;BldIta;BlkIta;ExLt;ExLtIta;Reg;Bold;BoldItalic;BoldItalicMin;BoldMin;Italic;ItalicPlus;LightItalicMin;LightItaPlus;LightMin;LightPlus;MedItaPlus;Medium;MediumItalic;MedPlus;Regular;RegularMin;RegularPlus;ItaMin;Light;LightItalic;MediumItalicMin;MediumMin;';//+ config.font_names;

    config.toolbarGroups =
            [
                {
                    name: 'document',
                    groups:
                            [
                                'mode', 'document', 'doctools', 'clipboard', 'undo',
                                'find', 'selection', 'spellchecker', 'editing',
                                'forms',
                                'basicstyles', 'cleanup',
                                'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph',
                                'links',
                                'insert',
                                'styles',
                                'colors',
                                'tools',
                                'others',
                                'about'
                            ]
                }
            ];

    config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,ShowBlocks,About';
    config.enterMode = 1;
    config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER Key puts the <br/> tag
    config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER Keys puts the <p> tag
	config.allowedContent=true;
	
	config.filebrowserBrowseUrl = path_df +'ckfinder/ckfinder.html',
    config.filebrowserImageBrowseUrl = path_df+'ckfinder/ckfinder.html?Type=Images',
    config.filebrowserFlashBrowseUrl = path_df+'ckfinder/ckfinder.html?Type=Flash',
    config.filebrowserUploadUrl = path_df+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    config.filebrowserImageUploadUrl = path_df+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    config.filebrowserFlashUploadUrl = path_df+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
};
CKEDITOR.on( 'dialogDefinition', function( ev ) {
    // Take the dialog name and its definition from the event data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;
	var dialog = ev.data.definition.dialog;
	var inputBgColor, inputBorderColor;
    // Check if the definition is from the dialog window you are interested in (the "Link" dialog window).
    if ( dialogName == 'cellProperties' ) {
        // Get a reference to the "Link Info" tab.
        var infoTab = dialogDefinition.getContents( 'info' );
		
		dialog.on('show', function () {
			$('label.cke_dialog_ui_labeled_label').each(function(){
				if ($(this).text() == 'Background Color') {
					inputBgColor = $(this).siblings('.cke_dialog_ui_labeled_content').find('input.cke_dialog_ui_input_text');
					var rememberBgColor = getCookie('rememberBgColor');
					if (rememberBgColor) {
						setTimeout(function(){
							inputBgColor.val(rememberBgColor);
						}, 100);
						
					}
				}
				else if ($(this).text() == 'Border Color') {
					inputBorderColor = $(this).siblings('.cke_dialog_ui_labeled_content').find('input.cke_dialog_ui_input_text');
					var rememberBorderColor = getCookie('rememberBorderColor');
					if (rememberBorderColor) {
						setTimeout(function(){
							inputBorderColor.val(rememberBorderColor);
						}, 100);
						
					}
				}
			})
		});
		
		infoTab.add( {
			type: 'button',
			label: 'Remember color',
			id: 'rememberColor',
			'default': 1,
			onClick: function(e) {
				var bg = inputBgColor.val().trim();
				var border = inputBorderColor.val().trim();
				var year = (new Date()).getFullYear() + 1;
				if (bg) {
					document.cookie = 'rememberBgColor='+ bg +'; expires=Thu, 18 Dec '+ year +' 12:00:00 UTC';  
				}
				if (border) {
					document.cookie = 'rememberBorderColor='+ border +'; expires=Thu, 18 Dec '+ year +' 12:00:00 UTC'; 
				}
			}
		});
    }
});
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
function delete_cookie(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};