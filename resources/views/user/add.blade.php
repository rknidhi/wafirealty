@include('event.layout.header')
<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Applications</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;">
                <i class="bx bx-home-alt"></i>
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
          </ol>
        </nav>
      </div>
      <!-- <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
            <a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div> -->
    </div>
    <!--end breadcrumb-->
    @include('event.layout.alert')
    <div class="card">
      <div class="card-body">
        <div class="bs-stepper-content">
          <form id="userform" action="/user/create" method="post" enctype="multipart/form-data">
            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
              <h5 class="mb-1">Personal Information</h5>
              <p class="mb-4">Enter personal information to get closer to our organization</p>
              <div class="row g-3">
                <div class="col-12 col-lg-6">
                  @csrf
                  <input type='hidden' name='id' value='<?php if(isset($users) && $users['id']!=''){echo $users['id'];}?>'/>
                  <label for="FisrtName" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="FisrtName" placeholder="First Name" name="username" value="<?php if(isset($users) && $users['username']!=''){echo $users['username'];}?>">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="FisrtName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="FisrtName" placeholder="First Name" name="name" value="<?php if(isset($users) && $users['name']!=''){echo $users['name'];}?>">
                </div>
                <!-- <div class="col-12 col-lg-6">
                  <label for="PhoneNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" id="PhoneNumber" placeholder="Phone Number" name="mobile">
                </div> -->
                <div class="col-12 col-lg-6">
                  <label for="InputEmail" class="form-label">E-mail Address</label>
                  <input type="text" class="form-control" id="InputEmail" placeholder="Enter Email Address" name="email" value="<?php if(isset($users) && $users['email']!=''){echo $users['email'];}?>">
                </div>
                <!-- <div class="col-12 col-lg-6">
                  <label for="InputCountry" class="form-label">Designation</label>
                  <select name="designation" class="form-select" id="designation"></select>
          
                </div> -->
                <div class="col-12 col-lg-6">
                  <label for="usertype" class="form-label">User Type</label>
                  <select class="form-select" id="usertype" aria-label="Default select example" name="usertype" onchange="getSiteOption(this.value)">
                    <option selected>--Select Type--</option>
                    <option value="admin" <?php if(isset($users) && $users['type']=='admin'){echo 'selected';}?>>Admin</option>
                    <option value="super admin" <?php if(isset($users) && $users['type']=='super admin'){echo 'selected';}?>>Super Admin</option>
                    <option value="user" <?php if(isset($users) && $users['type']=='user'){echo 'selected';}?>>User</option>
                    <option value="agent" <?php if(isset($users) && $users['type']=='agent'){echo 'selected';}?>>Agent</option>
                    <option value="site manager" <?php if(isset($users) && $users['type']=='site manager'){echo 'selected';}?>>Site Manager</option>
                  </select>
                </div>
                <div class="col-12 col-lg-6" id="sites" style="display: none;">
                  <label for="siteid" class="form-label">Sites</label>
                  <select class="form-select select2" id="siteid" aria-label="Default select example" name="siteid">
                    <option selected>--Select Site--</option>
                    {!!$siteoption!!}
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="InputLanguage" class="form-label">Status</label>
                  <select class="form-select" id="InputLanguage" aria-label="Default select example" name="status">
                    <option selected>--Select Status--</option>
                    <option value="active" <?php if(isset($users) && $users['status']=='active'){echo 'selected';}?>>Active</option>
                    <option value="inactive" <?php if(isset($users) && $users['status']=='inactive'){echo 'selected';}?>>Inactive</option>
                    <option value="hold" <?php if(isset($users) && $users['status']=='hold'){echo 'selected';}?>>Hold</option>
                    <option value="pending" <?php if(isset($users) && $users['status']=='pending'){echo 'selected';}?>>Pending</option>
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="InputCountry" class="form-label">Create Password</label>
                  <input type="text" class="form-control" placeholder="Enter Password" id="InputPassword" aria-label="Default select example" name="password" <?php if(isset($users) && $users['id']!=''){echo 'disabled';}?>>
                </div>
                <div class="col-12 col-lg-6">
					<label for="about" class="form-label">About</label>
					<input type="text" name="about" class="form-control" value="<?php if(isset($users)){ echo $users['about'];} ?>" />
				</div>
				<div class="col-12 col-lg-6">
					<label for="proile_photo" class="form-label">Profile Photo</label>
				    <input type="file" class="form-control" name="profile_photo" />
				</div>
                <div class="col-12 col-lg-12"> &nbsp;
                </div>
                <div class="col-12 col-lg-6">
                  <button class="btn btn-primary px-4" type="submit">Submit
                  </button>
                </div>
              </div>
              <!---end row-->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('event.layout.footer')

<script>
$(document).ready(function(){
    var type = '<?php echo $users['type']?>';
   
      getSiteOption(type);
    
})
</script>