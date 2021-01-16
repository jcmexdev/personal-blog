/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'es';
    // config.uiColor = '#AADC6E';
	config.height = 400;
    config.toolbarCanCollapse = true;
    config.skin = 'moono-dark';
    config.scayt_autoStartup = true;
    config.extraPlugins = 'codesnippet';
    config.codeSnippet_theme = 'monokai_sublime';
};
