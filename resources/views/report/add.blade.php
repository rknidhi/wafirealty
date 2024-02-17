@include('event.layout.header')

<div class="page-wrapper">
    <div class="page-content">
    @include('event.layout.alert')
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Task Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Task Report</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Report</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/report/create" id="addreport" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($report) && $report['id']!=''){echo $report['id'];}?>'/>
                <input type='hidden' name='userid' value='<?php if(isset($userid) && $userid!=''){echo $userid;}?>'/>
                <input type='hidden' name='username' value='<?php if(isset($username) && $username!=''){echo $username;}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Task Title</label>
                  <input type="text"  class="form-control" id="title" 
                  value="<?php if(isset($report) && $report['title']!=''){echo $report['title'];}?>" placeholder="Report Title" name="title">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Task Date</label>
                  <input type="text"  class="form-control datepicker" id="date" 
                  value="<?php if(isset($report) && $report['date']!=''){echo date('d-m-Y',$report['date']);}?>" placeholder="Report Title" name="date">
                </div>
                <div class="col-12 col-lg-12">
                  <label for="" class="form-label">Task Description</label>
                  <textarea class="texteditor" name="description" id="description"><?php if(isset($report) && $report['description']!=''){echo $report['description'];}?></textarea>
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
<script>
$(document).ready(function(){
  let AmenitiesArray = '@php if(isset($Projects["amenities"]) && $Projects["amenities"]!="") {echo $Projects["amenities"];} @endphp';
  const Amenities = AmenitiesArray.split(', ');
  if(Amenities[0]!='')
  {
    $('#amenities').val(Amenities);
    $('#amenities').trigger('change');
  }
});
</script>