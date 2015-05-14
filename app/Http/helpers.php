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
	return \App\Models\Access::getAccessFor($id);
}

function subaccesses($id)
{
	return \App\Models\SubAccess::getSubAccessFor($id);
}

function roles()
{
	return \App\Models\Role::getActiveRoles();
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

function featured_news() {
	return \App\Models\News::featured();
}



// if you love to change CSS/HTML of the navigation, do it here 
function getSubMenu($arrVal, $htmlmenu = '') {
    if (count($arrVal) > 0) {
        $menuArrObj = \App\Models\Menu::hasChild($arrVal);
        if ($menuArrObj) {
            $htmlmenu .= '<ol class = "dd-list">';
            foreach ($menuArrObj as $objChildMenu) {

                $htmlmenu .= '<li class = "dd-item" data-menu_id = "' . $objChildMenu->menu_id . '" data-page_id ="' . $objChildMenu->page_id . '" data-parent_id ="' . $objChildMenu->parent_id . '" data-label ="' . $objChildMenu->label . '"><div class = "dd-handle">' . $objChildMenu->label . '</div><button class="circle btn--remove-menu"></button>';
                $htmlmenu .= getSubMenu($objChildMenu->menu_id);
                $htmlmenu .= '</li>';
            }
            $htmlmenu .= '</ol>';
        }
        return $htmlmenu;
    }
}

function getSubMenuSite($arrVal, $htmlmenu = '') {
    if (count($arrVal) > 0) {
        $menuArrObj = \App\Models\Menu::hasChild($arrVal);
        if ($menuArrObj) {
            $htmlmenu .= '<ul class="dropdown-menu">';
            foreach ($menuArrObj as $objChildMenu) {
                $htmlmenu .= '<li><a href = "#"><span class = "link-title">' . $objChildMenu->label . '</span></a>';

                $htmlmenu .= getSubMenuSite($objChildMenu->menu_id);
                $htmlmenu .= '</li>';
            }
            $htmlmenu .= '</ul>';
        }
        return $htmlmenu;
    }
}

function parentElement($arrVal, $element) {
    $menuArrObj = \App\Models\Menu::hasChild($arrVal);
    if ($menuArrObj) {
        switch ($element) {
            case 'caret':
                return '<b class="caret"></b>';
                break;
            case 'dropdown':
                return 'class= "dropdown"';
                break;
        }
    }
}


?>