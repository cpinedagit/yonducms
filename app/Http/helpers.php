<?php

function gallery(array $arr) {
    return \App\Models\Media::gallery($arr);
}

function modules() {
    return \App\Models\Module::getActiveModules();
}

function submenus() {
    return \App\Models\SubMenu::getActiveSubMenus();
}

function accesses($id) {
    return \App\Models\Access::getAccessFor($id);
}

function subaccesses($id) {
    return \App\Models\SubAccess::getSubAccessFor($id);
}

function roles() {
    return \App\Models\Role::getActiveRoles();
}

function siteIndex() {
    
}

function after_last($str, $inthat) {
    if (!is_bool(strrevpos($inthat, $str)))
        return substr($inthat, strrevpos($inthat, $str) + strlen($str));
}

function before_last($this, $inthat) {
    return substr($inthat, 0, strrevpos($inthat, $this));
}

function strrevpos($instr, $needle) {
    $rev_pos = strpos(strrev($instr), strrev($needle));
    if ($rev_pos === false)
        return false;
    else
        return strlen($instr) - $rev_pos - strlen($needle);
}

function featured_news() {
    return \App\Models\News::featured();
}

// start line for menu management
// menu management (admin)
function getSubMenu($arrVal, $htmlmenu = '') {
    if (count($arrVal) > 0) {
        $menuArrObj = \App\Models\Menu::hasChild($arrVal);
        if ($menuArrObj) {
            $htmlmenu .= '<ol class = "dd-list">';
            foreach ($menuArrObj as $objChildMenu) {
                $urllink = $objChildMenu->slug ? $objChildMenu->slug : $objChildMenu->external_link;
                $pageOrlink = ($objChildMenu->page_id == 0) ? 'external' : 'slug';

                $htmlmenu .= '<li id="idli_' . $objChildMenu->menu_id . '" class = "dd-item" data-menu_id = "' . $objChildMenu->menu_id . '" data-page_id ="' . $objChildMenu->page_id . '" data-parent_id ="' . $objChildMenu->parent_id . '" data-label ="' . $objChildMenu->label . '"  data-url="' . $urllink . '" data-url_origin="' . $pageOrlink . '"><div class = "dd-handle"  id="target_' . $objChildMenu->menu_id . '" }}">' . $objChildMenu->label . '</div><button class="circle btn--remove-menu delete-item" onclick="delThis(' .
                        $objChildMenu->menu_id
                        . ')"></button>';
                $htmlmenu .= getSubMenu($objChildMenu->menu_id);
                $htmlmenu .= '</li>';
            }
            $htmlmenu .= '</ol>';
        }
        return $htmlmenu;
    }
}

// if you love to change CSS/HTML of the navigation, do it here 
function getSubMenuSite($arrVal, $htmlmenu = '') {
    if (count($arrVal) > 0) {
        $menuArrObj = \App\Models\Menu::hasChild($arrVal);
        if ($menuArrObj) {
            $htmlmenu .= '<ul class="dropdown-menu">';
            foreach ($menuArrObj as $objChildMenu) {
                $menulink = $objChildMenu->slug ? $objChildMenu->slug : 'http://'.$objChildMenu->external_link;
                $htmlmenu .= '<li><a href = "' . $menulink . '"><span class = "link-title">' . $objChildMenu->label . '</span>';
                $htmlmenu .= parentCssElement($objChildMenu->menu_id, 'caret');
                $htmlmenu .= '</a>';

                $htmlmenu .= getSubMenuSite($objChildMenu->menu_id);
                $htmlmenu .= '</li>';
            }
            $htmlmenu .= '</ul>';
        }
        return $htmlmenu;
    }
}

// call css design for parent
function parentCssElement($arrVal, $element) {
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

function optionsMenuPosition() {
    $menuPositionObj = \App\Models\MenuPosition::menuPositions();
    $htmlmenuposition = "";

    if ($menuPositionObj) {
        $htmlmenuposition .= '<select name="menuposition" id="menuposition">';
        foreach ($menuPositionObj as $menuPosition) {
            $isSelected = ($menuPosition->is_selected == 1) ? 'selected' : '';
            $htmlmenuposition .= '<option value="'.$menuPosition->id.'" ' . $isSelected . '>'.$menuPosition->position.'</option>';
        }
        $htmlmenuposition .= '</select>';
        return $htmlmenuposition;
    }
}

function menuLayout() {
    $menuPositionCurrentSelect = \App\Models\MenuPosition::menuSelectedPosition();

    if ($menuPositionCurrentSelect) {
        foreach ($menuPositionCurrentSelect as $key) {
            return $key->position;
        }
    }else{
        return 'top';
    }
}

// end here for menu


function banner($id) {

    $objBanner = \App\Models\Banner::myBanner($id);
    $class = \App\Models\Banner::getClass($id);
    $banner = "";
    if (!$objBanner == null) {

        $banner = "<div id='" . $id . "' class='" . $class . "' data-ride='carousel'>
                <ol class='carousel-indicators'>                
                    <li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>";
        foreach ($objBanner as $slide) {
            $banner .="<li data-target = '#carousel-example-generic' data-slide-to = '" . $slide->media_id . "'></li>";
        }
        $banner .= "</ol>
                <div class='carousel-inner' role='listbox'>
                <div class='item active'>
                " . HTML::image('public/images/home_1.png', null, array('class' => 'bannerImage')) . "
                </div>";
        foreach ($objBanner as $image) {
            $banner.= "
                <div class='item'>" . HTML::image($image->media_path, null, array('class' => 'bannerImage')) . "
                
                </div>
                ";
        }
        $banner.= "

    </div>
    <a class='left carousel-control' href='#" . $id . "' role='button' data-slide='prev'>
        <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
        <span class='sr-only'>Previous</span>
    </a>
    <a class='right carousel-control' href='#" . $id . "' role='button' data-slide='next'>
        <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
        <span class='sr-only'>Next</span>
    </a>
</div>";
    }

    return $banner;
}

?>