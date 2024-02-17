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
                        <li class="breadcrumb-item active" aria-current="page">Projects Blog</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Project</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/project/create" id="addproject" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($Projects) && $Projects['id']!=''){echo $Projects['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Project Name</label>
                  <input type="text"  class="form-control" id="project_name" 
                  value="<?php if(isset($Projects) && $Projects['project_name']!=''){echo $Projects['project_name'];}?>" <?php if(isset($Projects) && $Projects['project_name']!=''){echo 'readonly';}?> placeholder="Project Name" name="project_name">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Location</label>
                  <input type="text"  class="form-control" id="location" 
                  value="<?php if(isset($Projects['location']) && $Projects['location']!=''){echo $Projects['location'];}?>" placeholder="Project Location" name="location">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Image</label>
                  <input class="form-control" type="file" id="project_images" name="project_images[]" multiple>
                </div>
                <?php 
                if(isset($Images) && !empty($Images))
                {
                  ?>

                  <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Images</label>
                    @foreach($Images as $image)
                  <a href="<?php echo URL::asset($image['image_path']); ?>" target="_blank"   >&nbsp; <i class="fa fa-home" aria-hidden="true" style="margin-top: 40px;"></i></a>&nbsp;&nbsp;
                    <!-- <input class="form-control" type="file" id="testifile" name="testifile"> -->
                  @endforeach
                  </div>
                  <?php
                }
                ?>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Title</label>
                  <input type="text"  class="form-control" id="title" 
                  value="<?php if(isset($Projects['metatitle']) && $Projects['metatitle']!=''){echo $Projects['metatitle'];}?>" placeholder="Meta Title" name="metatitle">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Description</label>
                  <input type="text"  class="form-control" id="title" 
                  value="<?php if(isset($Projects['metadescription']) && $Projects['metadescription']!=''){echo $Projects['metadescription'];}?>" placeholder="Meta Description" name="metadescription">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Brand</label>
                  <select name="brand" id="brand" class="form-control select2">
                    {!!$option!!}
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Price</label>
                  <input type="text"  class="form-control" id="price" 
                  value="<?php if(isset($Projects['price']) && $Projects['price']!=''){echo $Projects['price'];}?>" placeholder="Price" name="price">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Configurations</label>
                  <input type="text"  class="form-control" id="configurations" 
                  value="<?php if(isset($Projects['configurations']) && $Projects['configurations']!=''){echo $Projects['configurations'];}?>" placeholder="Project Configurations" name="configurations">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Project Status</label>
                  <select name="status" id="status" class="form-control select2">
                    <option value="">Select Status</option>
                    <option value="Under Construction" <?php if(isset($Projects['status']) && $Projects['status']=='Under Construction'){echo 'selected';}?>>Under Construction</option>
                    <option value="Ready To Move" <?php if(isset($Projects['status']) && $Projects['status']=='Ready To Move'){echo 'selected';}?>>Ready To Move</option>
                    <option value="Sold" <?php if(isset($Projects['status']) && $Projects['status']=='Sold'){echo 'selected';}?>>Sold</option>
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Rera Number</label>
                  <input type="text"  class="form-control" id="rera_no" 
                  value="<?php if(isset($Projects['rera_no']) && $Projects['rera_no']!=''){echo $Projects['rera_no'];}?>" placeholder="Rera Number" name="rera_no">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Area</label>
                  <input type="text"  class="form-control" id="area" 
                  value="<?php if(isset($Projects['area']) && $Projects['area']!=''){echo $Projects['area'];}?>" placeholder="Area" name="area">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Map Location</label>
                  <input type="text"  class="form-control" id="title" 
                  value="<?php if(isset($Projects['map_location']) && $Projects['map_location']!=''){echo $Projects['map_location'];}?>" placeholder="Map Location" name="map_location">
                </div>
                <div class="col-12 col-lg-12">
                  <label for="" class="form-label">Project Description</label>
                  <textarea class="texteditor" name="about_project" id="about_project"><?php if(isset($Projects) && $Projects['about_project']!=''){echo $Projects['about_project'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">About Partner</label>
                  <textarea class="texteditor" name="about_partner" id="about_partner"><?php if(isset($Projects) && $Projects['about_partner']!=''){echo $Projects['about_partner'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Why Chose Us</label>
                  <textarea class="texteditor" name="why_choose" id="why_choose"><?php if(isset($Projects) && $Projects['why_choose']!=''){echo $Projects['why_choose'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Specification</label>
                  <textarea class="texteditor" name="specification" id="specification"><?php if(isset($Projects) && $Projects['specification']!=''){echo $Projects['specification'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">About Developer</label>
                  <textarea class="texteditor" name="about_developer" id="about_developer"><?php if(isset($Projects) && $Projects['about_developer']!=''){echo $Projects['about_developer'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Near By Area</label>
                  <textarea class="texteditor" name="near_by" id="near_by"><?php if(isset($Projects) && $Projects['near_by']!=''){echo $Projects['near_by'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <!-- <label for="" class="form-label">Near By Area</label>
                  <textarea class="texteditor" name="near_by" id="near_by"><?php if(isset($Projects) && $Projects['near_by']!=''){echo $Projects['near_by'];}?></textarea> -->
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Project Type</label>
                  <select class="form-control select2" name="type" id="type">
                  {!!$typeoption!!}
                  </select>
                </div>
                
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Project Amenities</label>
                  <select class="form-control select2" name="amenities[]" id="amenities" multiple="multiple" >
                  {!!$amenityoption!!}
                    <!-- <option value="">Select Project Amenities</option>
                    <option value="CAR PARKING">CAR PARKING</option>
                    <option value="CHILDREN PLAY AREA">CHILDREN PLAY AREA</option>
                    <option value="CLUB HOUSE">CLUB HOUSE</option>
                    <option value="GYM IN STORE">GYM IN STORE</option>
                    <option value="HIGH TECH SECURITY SYSTEM">HIGH TECH SECURITY SYSTEM</option>
                    <option value="POWER BACKUP">POWER BACKUP</option>
                    <option value="PUBLIC PARK">PUBLIC PARK</option>
                    <option value="SPORTS FACILITY">SPORTS FACILITY</option>
                    <option value="SWIMMING POOL">SWIMMING POOL</option>
                    <option value="WIFI SIGNAL">WIFI SIGNAL</option> -->
                  </select>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Make Home Page Project</label>
                  <select class="form-control" name="home_project" id="home_project">
                    <option value="">Select Project Amenities</option>
                    <option value="1" <?php if(isset($Projects) && $Projects['home_project']==1){echo 'selected';}?>>Yes</option>
                    <option value="0" <?php if(isset($Projects) && $Projects['home_project']==0){echo 'selected';}?>>No</option>
                  </select>
                </div>
                
                </div>
                &nbsp;
                <div class="row">
                <div class="col-12 col-lg-12"> 
                  <h5 style="box-shadow: 0px 1px 10px -3px;" class="p-2">Floor Plans</h5>
                  <div class="col-6 col-lg-6">
                    <input type="hidden" value="0" name="onebhk">
                    <input type="checkbox" value="1" name="onebhk">
                    <label for="" class="form-label">1 BHK</label>
                    <input type="file" name="onebhkfile" class="form-control">
                  </div>
                  <div class="col-6 col-lg-6">
                    <input type="hidden" value="0" name="twobhk">
                    <input type="checkbox" value="1" name="twobhk">
                    <label for="" class="form-label" >2 BHK</label>
                    <input type="file" name="twobhkfile" class="form-control">
                  </div>
                  <div class="col-6 col-lg-6">
                    <input type="hidden" value="0"name="threebhk">
                    <input type="checkbox" value="1"name="threebhk">
                    <label for="" class="form-label">3 BHK</label>
                    <input type="file" name="threebhkfile" class="form-control">
                  </div>
                  <div class="col-6 col-lg-6">
                    <input type="hidden" value="0"name="fourbhk">
                    <input type="checkbox" value="1"name="fourbhk">
                    <label for="" class="form-label">4 BHK</label>
                    <input type="file" name="fourbhkfile" class="form-control">
                  </div>
                  <div class="col-6 col-lg-6">
                    <input type="hidden" value="0"name="fivebhk">
                    <input type="checkbox" value="1"name="fivebhk">
                    <label for="" class="form-label">5 BHK</label>
                    <input type="file" name="fivebhkfile" class="form-control">
                  </div>
                  <div class="col-6 col-lg-6">
                    <input type="hidden" value="0"name="villa">
                    <input type="checkbox" value="1"name="villa">
                    <label for="" class="form-label">villa</label>
                    <input type="file" name="villafile" class="form-control">
                  </div>
                &nbsp;
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
<script>
$(document).ready(function(){
  let AmenitiesArray = '@php if(isset($Projects["amenities"]) && $Projects["amenities"]!="") {echo strtolower($Projects["amenities"]);} @endphp';
  const Amenities = AmenitiesArray.split(', ');
  if(Amenities[0]!='')
  {
    $('#amenities').val(Amenities);
    $('#amenities').trigger('change');
  }
});
</script>