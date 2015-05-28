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

class Module_Installer
{
	const MODULE_TARGET = '../../storage/modules/module.tar.gz';
	// const MODULE_ROUTES = 'Module_Routes.php';
	
	const EXTRACT_DIRECTORY = '../../storage/modules/ext/';
	//This is the root path. You need this.

	const SQL_DIRECTORY = '../../storage/modules/ext/SQL/';
	const FILE_DIRECTORY = '../../storage/modules/ext/files/';


	const ROOT_PATH = '../../';
	const MODULE_JSON_SOURCE = 'module.json';

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

		if(file_exists(self::MODULE_TARGET)) {
			echo "Exists!";
		}

		try {
			// echo "\nExtracting package...\n";
			$extract = $archivist->unpack(self::MODULE_TARGET, self::EXTRACT_DIRECTORY);
			// echo "\nDONE!\n";
			// echo "\nRunning SQL scripts...\n";
			$queries = $scribe->executeScripts(self::SQL_DIRECTORY);
			// echo "\nDONE!\n";
			// echo "\nCopying file structure...\n";
			$files 		= $librarian->copyDirectoryStructure(self::FILE_DIRECTORY, self::ROOT_PATH);
			// echo "\nDONE!\n";
			// echo "\nInjecting code...\n!";
			$editor->writeCode(self::EXTRACT_DIRECTORY . self::MODULE_JSON_SOURCE);
			// echo "\nDONE!\n";
			return TRUE;
		} catch (Exception $e) {
			echo $e->getMessage();
			return FALSE;
		}
	}
}
