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
                        <li class="breadcrumb-item active" aria-current="page">Manage Blogs</li>
                        <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <table id="blogs_table" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th style="width:10%;">S. No.</th>
                                    <th style="width:70%">Title</th>
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@include('event.layout.footer')
<script type="text/javascript">
    $(function () {
          var table = $('#blogs_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "/siteblog/list",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'title', name: 'title'},
                  {data: 'action', name: 'action'},
              ]
          });
        });
</script>