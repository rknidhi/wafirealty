@include('event.layout.header')

<div class="page-wrapper">
    <div class="page-content">
    @include('event.layout.alert')
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage Website</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Permissions</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Permissions</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/permission/create" id="addtestimonials" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($permission) && $permission['id']!=''){echo $permission['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Title</label>
                  <input type="text" required class="form-control" id="permission" 
                  value="<?php if(isset($permission) && $permission['name']!=''){echo $permission['name'];}?>" placeholder="Blog Title" name="name">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="InputLanguage" class="form-label">Status</label>
                  <select class="form-select" id="InputLanguage" aria-label="Default select example" name="status">
                    <option selected>--Select Status--</option>
                    <option value="active" <?php if(isset($permission) && $permission['status']=='active'){echo 'selected';}?>>Active</option>
                    <option value="inactive" <?php if(isset($permission) && $permission['status']=='inactive'){echo 'selected';}?>>Inactive</option>
                  </select>
                </div>
                </div>
                <div class="row">
                <div class="col-12 col-lg-12"> &nbsp;
                </div>
                <div class="col-12 col-lg-2">
                <button class="btn btn-primary px-4" type="submit">Submit
                  </button>
                </div>
                </div>
            </form>

      </div>
        </div>

    </div>
</div>



@include('event.layout.footer')