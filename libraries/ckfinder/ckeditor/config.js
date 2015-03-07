/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {


   config.filebrowserBrowseUrl = RAINFOREST_ROOT_URL + 'libraries/ckfinder/ckfinder.html';
   config.filebrowserImageBrowseUrl = RAINFOREST_ROOT_URL + 'libraries/ckfinder/ckfinder.html?type=Images';
   config.filebrowserFlashBrowseUrl = RAINFOREST_ROOT_URL + 'libraries/ckfinder/ckfinder.html?type=Flash';
   config.filebrowserUploadUrl = RAINFOREST_ROOT_URL + 'libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
   config.filebrowserImageUploadUrl = RAINFOREST_ROOT_URL + 'libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
   config.filebrowserFlashUploadUrl = RAINFOREST_ROOT_URL + 'libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
   
config.extraPlugins = 'doksoft_foundation_button,doksoft_foundation_gallery,doksoft_foundation_breadcrumbs,doksoft_foundation_label,doksoft_foundation_alert,panelbutton,floatpanel,doksoft_templates';
config.toolbar = ['doksoft_templates', 'doksoft_foundation_block_conf', 'doksoft_foundation_advanced_blocks', 'doksoft_foundation_table', 'doksoft_foundation_button', 'doksoft_foundation_gallery', 'doksoft_foundation_breadcrumbs', 'doksoft_foundation_label', 'doksoft_foundation_alert' ];
config.toolbar = [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
	{ name: 'links', items: [ 'Link', 'Unlink' ] },
        '/',
	{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'Iframe'] },
	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
	{ name: 'others', items: [ '-' ] },
	{ name: 'about', items: [ 'About' ] },
        { name: 'tcTemplates', items: ['doksoft_templates', 'doksoft_foundation_block_conf', 'doksoft_foundation_advanced_blocks', 'doksoft_foundation_table', 'doksoft_foundation_button', 'doksoft_foundation_gallery', 'doksoft_foundation_breadcrumbs', 'doksoft_foundation_label', 'doksoft_foundation_alert' ] },
];

// Toolbar groups configuration.
config.toolbarGroups = [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'tcTemplates' },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ] },
	{ name: 'links' },
	{ name: 'insert' },
	{ name: 'styles' },
	{ name: 'colors' },
	{ name: 'tools' },
	{ name: 'others' },
];

};
