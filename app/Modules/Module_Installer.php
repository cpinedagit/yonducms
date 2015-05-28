<?php

//---------------------------------------------------
// ModuleInstaller Class
//---------------------------------------------------
/*
 * Installs a module via AJAX.
 * 
 * File Path : script/
 * File Name : ModuleInstaller.php
 * 
 * Type      : yws_modules core
 */

require_once('../../config.php');

class Module_Installer
{
	const EXTRACT_DIRECTORY 	= MODULES_REPOSITORY . 'ext/';
	const SQL_DIRECTORY 		= MODULES_REPOSITORY . 'ext/SQL';
	const FILE_DIRECTORY 		= MODULES_REPOSITORY . 'ext/files';
	const MODULE_FILENAME 		= 'module.tar.gz';
	const MODULE_JSON_FILENAME 	= 'module.json';
	const MODULE_TARGET 		= MODULES_REPOSITORY . self::MODULE_FILENAME;
	const MODULE_JSON_TARGET 	= self::EXTRACT_DIRECTORY . self::MODULE_JSON_FILENAME; 

	function __construct() {
		require_once('handlers/Module_Archiver.php');
		require_once('handlers/Module_SqlHandler.php');
		require_once('handlers/Module_FileHandler.php');
		require_once('handlers/Module_CodeHandler.php');
	}

	function installModule() {
		$archivist 	= new Module_Archiver();
		$scribe 	= new Module_SqlHandler();
		$librarian 	= new Module_FileHandler();
		$editor 	= new Module_CodeHandler();

		try {
			// echo "\nExtracting package...\n";
			$extract = $archivist->unpack(self::MODULE_TARGET, self::EXTRACT_DIRECTORY);
			// echo "\nDONE!\n";
			// echo "\nRunning SQL scripts...\n";
			$queries = $scribe->executeScripts(self::SQL_DIRECTORY);
			// echo "\nDONE!\n";
			// echo "\nCopying file structure...\n";
			$files 		= $librarian->copyDirectoryStructure(self::FILE_DIRECTORY, BASE_PATH);
			// echo "\nDONE!\n";
			// echo "\nInjecting code...\n!";
			$editor->writeCode(self::MODULE_JSON_TARGET);
			// echo "\nDONE!\n";
			return TRUE;
		} catch (Exception $e) {
			echo $e->getMessage();
			return FALSE;
		}
	}
}
