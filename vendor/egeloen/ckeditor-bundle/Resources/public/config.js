/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	//config.language = 'fr';
    config.entities = false;
    config.entities_greek = false;
    config.entities_latin = false;
    config.entities_processNumerical = false;
	config.baseFloatZIndex = 1E5;
    // supprime les styles width height border et float et les remplaces par les attributs
    // Surtout utilisé pour que le float soit remplacer par l'attribut align
    // Float n'est pas compris pour un envoie de mail
    config.allowedContent = {
        $1: {
            // Use the ability to specify elements as an object.
            elements: CKEDITOR.dtd,
            attributes: true,
            styles: true,
            classes: true
        }
    };
    config.disallowedContent = 'img{width,height,border*,float}';
    config.contentsCss = '../bundles/ivoryckeditor/css/mail.css';
	config.scayt_autoStartup = false;
    
    // Configuration des smileys
    // Pour ajouter un smiley, insérer votre png dans vendor/egeloen/ckeditor-bundle/Resources/public/plugin/smiley/images
    // Ajouter l'image dans le tableau ci dessous
    config.smiley_images = [
        'regular_smile.png','sad_smile.png','wink_smile.png','teeth_smile.png','confused_smile.png','tongue_smile.png',
        'embarrassed_smile.png','omg_smile.png','whatchutalkingabout_smile.png','angry_smile.png','angel_smile.png','shades_smile.png',
        'devil_smile.png','cry_smile.png','lightbulb.png','thumbs_down.png','thumbs_up.png','heart.png',
        'broken_heart.png','kiss.png','envelope.png','phone.png'
    ];
    
    // Configuration de la toolbar
    config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		//{ name: 'forms', groups: [ 'forms' ] },
		
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
        '/',
		{ name: 'insert', groups: [ 'insert' ] },
		
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'About,Flash,Language,Superscript,Subscript,Preview,NewPage,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks';
    config.skin = 'office2013';
    //config.enterMode = CKEDITOR.ENTER_DIV;
    //config.uiColor = '#AADC6E';
};
