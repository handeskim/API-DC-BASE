<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 3.12
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
  *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
  *      @link http://kcfinder.sunhater.com
  */

/* IMPORTANT!!! Do not comment or remove uncommented settings in this file
   even if you are using session configuration.
   See http://kcfinder.sunhater.com/install for setting descriptions */
$url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$url .= "://".$_SERVER['HTTP_HOST'];
$url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']); 
return array(


// GENERAL SETTINGS

    'disabled' => true,
    'uploadURL' => "../public/images",
    'uploadDir' => "",
    'theme' => "dark",

    'types' => array(

    // (F)CKEditor types
        'files'   =>  "",
        'flash'   =>  "swf",
        'images'  =>  "*img",

    // TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'image'   =>  "*img",
		
    ),
	'types' => array(
		   // The folowing directory types are just for an example
		   'files'     => "",
		   'flash'     => "swf",
		   'media'     => "swf flv avi mpg mpeg qt mov wmv asf rm",
		   'misc'      => "! pdf doc docx xls xlsx",
		   'images'    => "*img",
		   'mimages'   => "*mime image/gif image/png image/jpeg",
		   'notimages' => "*mime ! image/gif image/png image/jpeg"
	),
	'deniedExts' => "exe com msi bat cgi pl php phps phtml php3 php4 php5 php6 py pyc pyo pcgi pcgi3 pcgi4 pcgi5 pchi6",
// IMAGE SETTINGS

    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => ".thumbs",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'watermark' => "",


// DISABLE / ENABLE SETTINGS

    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,


// PERMISSION SETTINGS

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat cgi pl php phps phtml php3 php4 php5 php6 py pyc pyo pcgi pcgi3 pcgi4 pcgi5 pchi6",


// MISC SETTINGS

    'filenameChangeChars' => array(
	
        ' ' => "_",
        ':' => "."
    
	),

    'dirnameChangeChars' => array(
	
        ' ' => "_",
        ':' => "."
    
	),
	'thumbWidth' => 200,
	'thumbHeight' => 200,
	'thumbsDir' => ".thumbs",
    'mime_magic' => "",

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',


// THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS

    '_sessionVar' => "KCFINDER",
    '_check4htaccess' => true,
    '_normalizeFilenames' => false,
    '_dropUploadMaxFilesize' => 10485760,
);
