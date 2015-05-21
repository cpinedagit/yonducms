<?php

require_once('Module_Installer.php');

function install() {
	$program = new Module_Installer();
	try {
		$program->installModule();
		return TRUE;
	} catch (Exception $e) {
		return FALSE;
	}	
}

install();
