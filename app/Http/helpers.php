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

function accesses($id)
{
	return \App\Models\RoleAccesses::getAccessFor($id);
}

function after_last($str, $inthat) {
    if (!is_bool(strrevpos($inthat, $str)))
    return substr($inthat, strrevpos($inthat, $str)+strlen($str));
}

function before_last($this, $inthat) {
    return substr($inthat, 0, strrevpos($inthat, $this));
}

function strrevpos($instr, $needle) {
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
}

?>