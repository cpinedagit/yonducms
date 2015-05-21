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
	const MODULE_TARGET = '../storage/modules/module.tar.gz';
	// const MODULE_ROUTES = 'Module_Routes.php';
	
	const EXTRACT_DIRECTORY = '../storage/modules/ext/';
	//This is the root path. You need this.

	const SQL_DIRECTORY = self::EXTRACT_DIRECTORY . 'SQL/';
	const FILE_DIRECTORY = self::EXTRACT_DIRECTORY . 'files/';


	const ROOT_PATH = '../';
	const MODULE_SQL_PATH = 'SQL/';
	const MODULE_FILES_PATH = 'files/';
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
			return FALSE;
		}
	}
}
