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
                        <li class="breadcrumb-item active" aria-current="page">Manage Blog</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/blog/create" id="addtestimonials" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($blogs) && $blogs['id']!=''){echo $blogs['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Category</label>
                  <select name="category" id="category" class="form-control select2">
                    {!!$option!!}
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Title</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($blogs) && $blogs['title']!=''){echo $blogs['title'];}?>" placeholder="Blog Title" name="title">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Date</label>
                  <input type="text" required class="form-control datepicker" id="date" 
                  value="<?php if(isset($blogs['date']) && $blogs['date']!=''){echo date('d-m-Y',$blogs['date']);}?>" placeholder="Blog Date" name="date">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Image</label>
                  <input class="form-control" type="file" id="testifile" name="blog_image">
                </div>
                <?php 
                if(isset($blogs) && $blogs['image_path']!='')
                {
                  ?>

                  <div class="col-12 col-lg-6">
                  <a href="<?php echo URL::asset($blogs['image_path']); ?>">  <label for="" class="form-label mt-4"><?php if(isset($blogs) && $blogs['image_path']!=''){ $filename = explode('/',$blogs['image_path']); echo end($filename);}?></label></a>
                    <!-- <input class="form-control" type="file" id="testifile" name="testifile"> -->
                  </div>
                  <?php
                }
                ?>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Title</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($blogs['metatitle']) && $blogs['metatitle']!=''){echo $blogs['metatitle'];}?>" placeholder="Meta Title" name="metatitle">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Description</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($blogs['metadescription']) && $blogs['metadescription']!=''){echo $blogs['metadescription'];}?>" placeholder="Meta Description" name="metadescription">
                </div>
                <div class="col-12 col-lg-12">
                  <label for="" class="form-label">Description</label>
                  <textarea class="texteditor" name="description" id="description"><?php if(isset($blogs) && $blogs['description']!=''){echo $blogs['description'];}?></textarea>
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