<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model {

	protected $table = 'submenus';

	protected $fillable = ['submenu_name', 'submenu_description', 'submenu_path', 'is_active', 'module_id'];

	public static function getActiveSubMenus()
	{
		$submenus = SubMenu::where('is_active', '=', '1')
					->get([
						'submenu_name', 'submenu_description',
						'submenu_path', 'is_active', 'module_id']);
		return $submenus;
	}
}
