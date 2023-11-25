<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menuid';
    protected $table = 'menus';

    protected $fillable = [
        'sub_id',
        'name',
        'menuType',
        'menu_url',
        'weight',
        'status',
        'typeid',
        'position',
    ];

    public $timestamps = true;

    public static function get_all_menu_data()
    {
        return DB::table('menus')
            ->select('menuid', 'sub_id', 'status', 'name')
            ->where('status', '1')
            ->get();
    }

    public static function hasChild($parent_id)
    {
        return DB::table('menus')
            ->where('sub_id', $parent_id)
            ->where('status', '1')
            ->count();
    }

    public static function MobileMenuList()
    {
        $parent = DB::table('menus')
            ->where('sub_id', 0)
            ->where('status', '1')
            ->get();

        $mainlist = '<ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">';
        foreach ($parent as $pr) {
            $mainlist .= (new static)->MenuTree('', $pr->sub_id, $pr->menuid, $pr->name, $pr->menu_url, 0);
        }
        $mainlist .= "</ul>";

        return $mainlist;
    }

    public static function MenuList()
    {
        $parent = DB::table('menus')
            ->where('sub_id', 0)
            ->where('status', '1')
            ->orderBy('position')
            ->get();

        $mainlist = '<ul id="main-nav" class="navbar-nav text-capitalize clearfix">';
        foreach ($parent as $pr) {
            $mainlist .= (new static)->MenuTree('', $pr->sub_id, $pr->menuid, $pr->name, $pr->menu_url, 0);
        }
        $mainlist .= "</ul>";

        return $mainlist;
    }

    public static function urlfind($str)
    {
        $pattern = '`.*?((http|ftp|https)://[\w#$&+,\/:;=?@.-]+)[^\w#$&+,\/:;=?@.-]*?`i';
        if (preg_match_all($pattern, $str, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public static function MenuTree($list, $subid, $id, $name, $url, $append)
    {
        if ((new static)->hasChild($id) == 0 && $url != '') {
            $mwnu = (new static)->urlfind($url);
            $burl = ($mwnu) ? $url : url('/') . "/" . $url;
            $list = '<li><a href="' . $burl . '">' . $name . '</a></li>';
        } else {
            $burl = url('/') . "/" . $url;
            $list = '<li class="dropdown"><a href="' . $burl . '">' . $name . '</a>';
        }

        if ((new static)->hasChild($id) > 0) {
            $append++;

            $list .= "<ul class='dropdown-menu clearfix'>";

            $child = DB::table('menus')
                ->where('sub_id', $id)
                ->where('status', '1')
                ->get();

            foreach ($child as $pr) {
                $mwnu = (new static)->urlfind($pr->menu_url);
                $urlm = ($mwnu) ? $pr->menu_url : url('/') . '/' . $pr->menu_url;
                if ((new static)->hasChild($pr->menuid) == 0 && $url != '') {
                     if($pr->menuid == "51" || $pr->menuid == "50")
                     {
                           $list .= '<li><a href="' . $urlm . '" id = "menu_'.$pr->menuid.'" data-toggle="modal" data-target="#exampleModal">' . $pr->name . '</a></li>';
                     }
                     else
                     {
                          $list .= '<li><a href="' . $urlm . '" id = "menu_'.$pr->menuid.'">' . $pr->name . '</a></li>';
                     }
                   
                } else {

                    $list .= '<li class="dropdown"><a href="' . $urlm . '" id = "menu_'.$pr->menuid.'">' . $pr->name . '</a>';

                    $list .= "<ul class='sub-menu'>";

                    $childthird = DB::table('menus')
                        ->where('sub_id', $pr->menuid)
                        ->where('status', '1')
                        ->get();

                    foreach ($childthird as $pr3) {
                        $mwnue = (new static)->urlfind($pr3->menu_url);
                        $urlmn = ($mwnue) ? $pr3->menu_url : url('/') . '/' . $pr3->menu_url;
                        $list .= '<li><a href="' . $urlmn . '" id = "menu_'.$pr->menuid.'">' . $pr3->name . '</a></li>';
                    }

                    $list .= "</ul></li>";

                }
            }

            $list .= "</ul></li>";
        }

        return $list;
    }
}
