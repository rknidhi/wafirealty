<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\admin_menu_master;
use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use App\User;

class MenuController extends Controller
{
    public function listmenu(Request $request)
    {
       $main_menu = admin_menu_master::where('status','a')->get();
       $data = Menu::select('menuid','name','menuType')->get();

   
       
    //   $user = Auth::user();
            if ($request->ajax()) {
         
           return DataTables::of($data)->addIndexColumn()
           ->addIndexColumn()
               ->editColumn('action', function($row){
                   $btn =  '
               <div class="buttons right nowrap">
                   <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                     <a   href="'.url('/').'/admin/menu/edit/'.$row->menuid.'" title="edit"   ><span class="icon"><i class="mdi mdi-pencil"></i></span></a>
                   </button>

                   <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                     <a onclick="return ConfirmDelete()" href="'.url('/').'/admin/menu/delete/'.$row->menuid.'" title="delete"><span class="icon"><i class="mdi mdi-trash-can"></i></span></a>
                   </button>
             </div>
             ';
                   
                   return $btn;
               })
               ->rawColumns(['action'])
               ->make(true);
       }

     

      return view('admin.menu.menu',compact('user'));


    }

    public function add(Request $request)
    {

       $menu = Menu::select('menuid','name','menuType')->get();
       $user = Auth::user();
       return view('admin.menu.menuform', compact('menu','user'));

    }

    public function edit($menuid,Request $request)
    {

       $menu = Menu::select('menuid','name','menuType')->get();
       $menuData = Menu::where('menuid',$menuid)->first();
       $user = Auth::user();

       return view('admin.menu.menuedit', compact('menu','menuData','user'));

    }

   public function update($id, Request $request)
   {
       if (isset($request->premalinkPage) && $request->premalinkPage != "#") {
           $substring = '+';
           $position = strpos($request->premalinkPage, $substring);
   
           if ($position !== false) {
               $typeid = explode("+", $request->premalinkPage);
               $premalinkPage = $typeid[0];
               $type_id = $typeid[1];
           } else {
               $premalinkPage = $request->premalinkPage;
               $type_id = "0";
           }
       } else {
           $premalinkPage = $request->menu_url;
           $type_id = $request->typeid;
       }
   
       $menu = Menu::find($id);
   
       $menu->sub_id = $request->menu_parent_id ?: "0";
       $menu->name = $request->name;
       $menu->menuType = $request->menuType;
       $menu->menu_url = $premalinkPage;
       $menu->weight = $request->sort_order;
       $menu->status = $request->status;
       $menu->typeid = $type_id;
       $menu->position = $request->position;
   
       $menu->save();
   
       return redirect('admin/menu/listmenu')->with('success', 'Data has been successfully updated.');
   }


    public function delete($id,Request $request)
    {
       $menu = Menu::find($id);
       $menu->delete();

       return redirect('admin/menu/listmenu')->with('success', 'Data has been successfully deleted.'); 

    }

    public function submit(Request $request)
    {
       $menu = Menu::select('menuid','name','menuType')->get();
       $validated = $request->validate([
           'name' => 'required|max:255',
           'menuType' => 'required',
           'premalinkPage' => 'required',
       ]);

       if (isset($request->premalinkPage) && $request->premalinkPage != "#") 
       {
           $substring = '+';
           $position = strpos($request->premalinkPage, $substring);
           if ($position !== false) 
           {
                    $typeid = explode("+",$request->premalinkPage);
                    $premalinkPage = $typeid[0];
                    $type_id = $typeid[1];
            }
            else
            {
                    $premalinkPage = $request->premalinkPage;
                    $type_id = "0";
            }
        }
        else
        {
           $premalinkPage = $request->premalinkPage;
           $type_id = "0";
        }

       
       Menu::create([ 
         'sub_id' => ($request->menu_parent_id != "") ? $request->menu_parent_id : "0",  
         'name' => $request->name,
         'menuType'  => $request->menuType,
         'menu_url' => $premalinkPage,
         'weight'  =>  $request->sort_order,
         'status'  =>  $request->status,
         'typeid'  => $type_id,
         'position' => $request->position
       ]);
       return redirect('admin/menu/listmenu')->with('success', 'Data has been successfully Inserted.');

     }



     public function fetch_page(Request $request)
     { 
         $output = '';
         $premalinkPage = $request->name;
         switch($premalinkPage)
         {     
                 case "category":   

                   $data = Category::where('status','1')->get();

                   
                     if(!empty($data))
                    {
                            $output .= '
                            <label>Premalink Pages</label>
                            <div class="control">
                                       <div class="select">
                                       <select  id="premalink" name="premalinkPage">';
                                                       
                              $output .= '<option value="">Select Premalink Page</option>';
                              foreach($data as $row)
                              {
                                  $link = $row->category_url."+".$row->category_id;
                                   $output .= '<option value="'.$link.'">'.$row->name.'</option>';
                              }
                              $output .= ' </select>';
                              $output .= '</div>';
                              $output .= '</div>';
                              $output .= '</div>';
                      }
                      else
                      {
                            $output .= '<div>No Category Records Found!</div>'; 
                           
                      }
                      
                break;       
                case "post":   

                    $data = Post::where('published','1')->get();
                    
                  

                     if(!empty($data))
                    {
                     $output .= '<label>Premalink Pages</label>';
                     $output .='<div class="control">
                                <div class="select">
                                <select  id="premalink" name="premalinkPage">';
                                                       
                              $output .= '<option value="">Select Premalink Page</option>';
                              foreach($data as $row)
                              {
                                  $link = $row->postURL."+".$row->postID;
                                   $output .= '<option value="'.$link.'">'.$row->postTitle.'</option>';
                              }
                              $output .= ' </select>';
                              $output .= '</div>';
                              $output .= '</div>';
                              $output .= '</div>';
                    }
                      else
                      {
                            $output .= '<div>No Blog Records Found!</div>'; 
                           
                      }
                     
                break;      
                case "page": 
                    $data = Page::where('status','1')->get();

                    

                    if(!empty($data))
                    {

                     $output .= '
                     <label>Premalink Pages</label>
                     <div class="control">
                                <div class="select">
                                <select  id="premalink" name="premalinkPage">';
                                               
                              $output .= '<option value="">Select Premalink Page</option>';
                              foreach($data as $row)
                              {
                                  $link = $row->pageURL."+".$row->id;
                                  $output .= '<option value="'.$link.'">'.$row->pageTitle.'</option>';
                              }

                              $output .= ' </select>';
                              $output .= '</div>';
                              $output .= '</div>';
                              $output .= '</div>';
                      }
                      else
                      {
                            $output .= '<div>No Page Records Found!</div>'; 
                      
                      }
     
                     
                break; 
                default:  
                
               
                 $output .= '<input class="input"  name="premalinkPage" placeholder="Custom Premalink Page Link Add" value="" >';
                
                 
                
           }   

         echo $output;
     }

   
}
