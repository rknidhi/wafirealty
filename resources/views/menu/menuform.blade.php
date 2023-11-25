{{--
<x-app-layout>
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
</x-app-layout>
--}}
@extends('admin.layouts.app')
@section('content')
@php
$name = (old('name') != '' ) ? old('name') : "";
$menu_parent_id = (old('menu_parent_id') != '' ) ? old('menu_parent_id') : "";
$menuType = (old('menuType') != '' ) ? old('menuType') : "";
$sort_order = (old('sort_order') != '') ? old('sort_order') : "";
$publish = (old('status') != '' ) ? old('status') : "";
$premalinkname = array("category"=>"Category","page"=>"Page","post"=>"Blog","others"=>"Others");
$data_publish = array("1"=>"Enable","0"=>"Disable")
@endphp
<section class="section main-section">
   <div class="card mb-6">
      <header class="card-header">
         <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Menu Forms
         </p>
      </header>
      <div class="card-content">
      @if ($errors->any())
                  <div class="alert alert-danger">
                    
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        @foreach ($errors->all() as $error)
                              <p><span class="font-medium">Error!</span> {{ $error }}</p>
                        @endforeach
                    </div>
                  </div>
                @endif
         <form method='POST' id="blog" name="blog" class="form-horizontal" action='{!!  url('admin/menu/submit') !!}'>
         @CSRF
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
         <input type="hidden" name="sort_order" value="0">

               <div class="field">
               <label class="label">Menu Name</label>
                  <div class="control icons-left">
                     <input class="input" type="text" name="name" placeholder="Name" value="{{$name}}" >
                     <span class="icon left"><i class="mdi mdi-menu"></i></span>
                     @error('name')
                        <div class="text-sm text-red-600">The Menu Name field is required.</div>
                     @enderror
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
                     @error('menu_parent_id')
                        <div class="text-sm text-red-600">The Parents is required.</div>
                     @enderror
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
                     @error('menuType')
                        <div class="text-sm text-red-600">The Menu Type is required.</div>
                     @enderror
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
</section>

<script>
   $(document).ready(function(){
    $('#premalink').change(function(){
         $('#premalinkidothers').hide();
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