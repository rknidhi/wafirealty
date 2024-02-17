<style>
    .permisioncheck{
	text-align: center !important;
}
</style>
<form id="permission_form" method="post" action="/permission/addpermission" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="userid" value="{{$user->id}}">
    <input type="hidden" name="username" value="{{$user->username}}">
    <div class="row">
        <div class="col-md-6">
            <label for="Username" class="form-label">User:  </label><b style="float: right;">{{$user->name}}</b>
        </div>
        <div class="col-md-6">
            <label for="roe" class="form-label">Role:  </label><b style="float: right;">{{$user->type}}</b>
        </div>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Module Name</th>
      <th scope="col">View</th>
      <th scope="col">Add</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Download</th>
      <th scope="col">Field Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($modules as $key => $module)
        <tr>
            <td>{{$module->id}}</td>
            <td>{{$module->name}}</td>
            
           
            <td class="permisioncheck"><input type="checkbox" name="{{$module->id}}_view" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="@if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$module->id-1]['view']==1){{1}}@else{{0}}@endif"  @if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$key]['view']==1){{'checked'}}@endif></td>
            <td class="permisioncheck"><input type="checkbox" name="{{$module->id}}_add" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="@if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$key]['add']==1){{1}}@else{{0}}@endif" @if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$key]['add']==1){{'checked'}}@endif></td>
            <td class="permisioncheck"><input type="checkbox" name='{{$module->id}}_edit' onclick="$(this).attr('value', this.checked ? 1 : 0)" value="@if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$key]['edit']==1){{1}}@else{{0}}@endif" @if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$key]['edit']==1){{'checked'}}@endif></td>
            <td class="permisioncheck"><input type="checkbox" name='{{$module->id}}_delete' onclick="$(this).attr('value', this.checked ? 1 : 0)" value="@if(isset($allPermissions[$key]) && $allPermissions[$key]['module']==$module->id && $allPermissions[$key]['delete']==1){{1}}@else{{0}}@endif" @if(isset($allPermissions[$module->id-1]) && $allPermissions[$module->id-1]['module']==$module->id && $allPermissions[$module->id-1]['delete']==1){{'checked'}}@endif></td>
            <td class="permisioncheck"><input type="checkbox" name='{{$module->id}}_download' onclick="$(this).attr('value', this.checked ? 1 : 0)" value="@if(isset($allPermissions[$module->id-1]) && $allPermissions[$module->id-1]['module']==$module->id && $allPermissions[$module->id-1]['download']==1){{1}}@else{{0}}@endif" @if(isset($allPermissions[$module->id-1]) && $allPermissions[$module->id-1]['module']==$module->id && $allPermissions[$module->id-1]['download']==1){{'checked'}}@endif></td>
            <td class="permisioncheck"><input type="checkbox" name='{{$module->id}}_fieldedit' onclick="$(this).attr('value', this.checked ? 1 : 0)" value="@if(isset($allPermissions[$module->id-1]) && $allPermissions[$module->id-1]['module']==$module->id && $allPermissions[$module->id-1]['fieldedit']==1){{1}}@else{{0}}@endif" @if(isset($allPermissions[$module->id-1]) && $allPermissions[$module->id-1]['module']==$module->id && $allPermissions[$module->id-1]['fieldedit']==1){{'checked'}}@endif></td>
        </tr>
    @endforeach
  </tbody>
</table>
<button type="submit" class="btn btn-primary">Add Permissions</button>
</form>