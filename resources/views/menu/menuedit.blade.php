{{-- <x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('admin.layouts.app')

@section('content')
@php
   $menuid = $menuData->menuid;
   $name = (old('name') != '' ) ? old('name') : $menuData->name;
   $menu_parent_id = (old('menu_parent_id') != '' ) ? old('menu_parent_id') : $menuData->sub_id;
   $menuType = (old('menuType') != '' ) ? old('menuType') : $menuData->menuType;
   $sort_order = (old('sort_order') != '') ? old('sort_order') : $menuData->weight;
   $publish = (old('status') != '' ) ? old('status') : $menuData->status;
   $menuurl =  $menuData->menu_url;
   $typeid = $menuData->typeid;
@endphp
@php
$premalinkname = array("category"=>"Category","page"=>"Page","post"=>"Blog","others"=>"Others");
@endphp
@php
$data_publish = array("1"=>"Enable","0"=>"Disable")
@endphp

<section class="section main-section">
   <div class="card mb-6">
      <header class="card-header">
         <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Menu Update Forms
         </p>
       </header>
   
    <div class="card-content">
    <form method='POST' id="blog" name="blog" class="form-horizontal" action='{!!  url('admin/menu/update/'.$menuid) !!}'>
        @CSRF
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type = "hidden" name="menu_url" value="{{$menuurl}}">
        <input type = "hidden" name="typeid" value="{{$typeid}}">
        <input type="hidden" name="sort_order" value="0">

               <div class="field">
                  <label class="label">Menu Name</label>
                  <div class="control icons-left">
                     <input class="input" type="text" name="name" placeholder="Name" value="{{$name}}" >
                     <span class="icon left"><i class="mdi mdi-menu"></i></span>
                  </div>
               </div>
               <div class="field">
                  <label class="label">Parents</label>
                  <div class="control">
                     <div class="select">
                        <select name="menu_parent_id" id="menu_parent_id">
                           <option value="0">None</option>
                           @foreach($menu as $value)
                           @if($menu_parent_id == $value->menuid)
                           <option value="{{$value->menuid}}" selected>{{$value->name}}</option>
                           @else
                           <option value="{{$value->menuid}}">{{$value->name}}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="field" id="positioninput"></div>
               <div class="field">
                  <label class="label">Menu Type</label>
                  <div class="control">
                     <div class="select">
                        <select name="menuType" id="premalink">
                           <option value="none">None</option>
                           @foreach($premalinkname as $key=>$value)
                           @if($menuType == $key)
                           <option value="{{$key}}" selected>{{$value}}</option>
                           @else
                           <option value='{{$key}}' >{{$value}}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="field" id="premalinkidothers">  </div>
               <div class="field" id="premalinkid"></div>
               <div class="field">
                  <label class="label">Publish</label>
                  <div class="control">
                     <div class="select">
                        <select name="status">
                           @foreach($data_publish as $key=>$value)
                           @if($publish == $key)
                           <option value='{{$key}}' selected>{{$value}}</option>
                           @else
                           <option value='{{$key}}'>{{$value}}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="field grouped">
                  <div class="control">
                     <button type="submit" class="button green">
                     Submit
                     </button>
                  </div>
                  <div class="control">
                     <button type="reset" class="button red">
                     Reset
                     </button>
                  </div>
               </div>
            
         </form>
      </div>
   </div>
</div>
</section>       

    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin/vendor/morrisjs/morris.css') }}" rel="stylesheet" type="text/css" />
    <script>
$(document).ready(function(){
 $('#premalink').change(function(){
  var premalinkPage = $('#premalink').val();
  
  if(premalinkPage != '')
  {
   $.ajax({
    url:"{{url('/')}}/admin/menu/fetch_page/" + premalinkPage,
    method:"get",
    dataType: "html",
    data:{premalinkPage: premalinkPage},
    error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
    },
    success: function (data) {
         $('#premalinkid').html(data);
    }
   });
  }
 });
 $('#menu_parent_id').change(function(){ 
         $('#premalinkidothers').hide();
     var premalinkPage = $('#menu_parent_id').val();
      if(premalinkPage==0)
      {
         newinput = '<input class="input"  name="position" placeholder="Menu Position" value="" >';
         $('#positioninput').html(newinput);
      }
    });
 });


</script>    
@endsection

