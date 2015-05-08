<?php 

function gallery(array $arr) {
	 return \App\Models\Media::gallery($arr);
}

function modules()
{
	return \App\Models\Module::getActiveModules();	
}

function submenus()
{
	return \App\Models\SubMenu::getActiveSubMenus();
}

?>