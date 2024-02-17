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
                        <li class="breadcrumb-item active" aria-current="page">Manage Project Amenities</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Project Amenities</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/projectamenities/create" id="addprojectamenities" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($Amenities) && $Amenities['id']!=''){echo $Amenities['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Project Type</label>
                  <input type="text"  class="form-control" id="type" 
                  value="<?php if(isset($Amenities) && $Amenities['amenity']!=''){echo $Amenities['amenity'];}?>"  placeholder="Project Amenity Name" name="amenity">
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option value="">Select Status</option>
                    <option value="active" <?php if(isset($Amenities) && $Amenities['status']=='active'){echo 'selected';}?>>Active</option>
                    <option value="inactive" <?php if(isset($Amenities) && $Amenities['status']=='inactive'){echo 'selected';}?>>In-Active</option>
                  </select>
                </div>
                
                </div>
                &nbsp;
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
