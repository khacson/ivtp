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

    config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Maximize,ShowBlocks,About';
    config.enterMode = 1;
    config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER Key puts the <br/> tag
    config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER Keys puts the <p> tag
	config.allowedContent=true;
};