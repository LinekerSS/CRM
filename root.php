<?php

// make sure the PATH_SEPARATOR is defined
	if (!defined("PATH_SEPARATOR")) {
		if ( strpos( $_ENV[ "OS" ], "Win" ) !== false ) { define("PATH_SEPARATOR", ";"); } else { define("PATH_SEPARATOR", ":"); }
	}

// make sure the document_root is set
	$_SERVER["SCRIPT_FILENAME"] = str_replace("\\", "/", $_SERVER["SCRIPT_FILENAME"]);
	$_SERVER["DOCUMENT_ROOT"] = str_replace($_SERVER["PHP_SELF"], "", $_SERVER["SCRIPT_FILENAME"]);
	$_SERVER["DOCUMENT_ROOT"] = realpath($_SERVER["DOCUMENT_ROOT"]);

// if the project directory exists then add it to the include path otherwise add the document root to the include path
	if (is_dir($_SERVER["DOCUMENT_ROOT"].'/app_calliope')){
		if(!defined('PROJECT_PATH')) { define('PROJECT_PATH', '/app_calliope'); }
		set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"].'/app_calliope' );
	}
	else {
		if(!defined('PROJECT_PATH')) { define('PROJECT_PATH', ''); }
		set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] );
	}

?>