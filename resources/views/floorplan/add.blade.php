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
                        <li class="breadcrumb-item active" aria-current="page">Manage Floor Plans</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Floor Plan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/floorplan/create" id="addfloorplan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($Projects) && $Projects['id']!=''){echo $Projects['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Project Type</label>
                  <select name="pid" id="pid" class="form-control select2" onchange="getProject(this.value)">
                    {!!$option!!}
                  </select>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Status</label>
                  <select class="form-control" name="room" id="room" onchange="getPlans(this.value)">
                        <option value="1">1</option>              
                        <option value="2">2</option>              
                        <option value="3">3</option>              
                        <option value="4">4</option>              
                        <option value="5">5</option>              
                  </select>
                </div>
                
                </div>
                &nbsp;
                <div class="row">
                  <div class="row planarea">

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
