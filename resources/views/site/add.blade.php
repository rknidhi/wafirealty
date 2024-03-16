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
                        <li class="breadcrumb-item active" aria-current="page">Manage Site</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Site</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/site/create" id="addsite" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($sites) && $sites['id']!=''){echo $sites['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Name</label>
                  <input type="text" required class="form-control" id="name" 
                  value="<?php if(isset($sites) && $sites['name']!=''){echo $sites['name'];}?>" placeholder="Site Name" name="name">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Domain Name</label>
                  <input type="text" required class="form-control" id="domain" 
                  value="<?php if(isset($sites['domain']) && $sites['domain']!=''){echo $sites['domain'];}?>" placeholder="Domain Name" name="domain">
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