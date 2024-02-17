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
                        <li class="breadcrumb-item active" aria-current="page">Manage Project Type</li>
                        <li class="breadcrumb-item active" aria-current="page">All Project Type</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <table id="project_type_table" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th style="width:10%;">S. No.</th>
                                    <th style="width:30%">Type</th>
                                    <th style="width:20%">Status</th>
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <!-- <tbody>
                                @if(isset($Projects) && !empty($Projects))
                                @foreach($Projects as $Project)
                                    <tr>
                                        <td><?php echo $Project['id'];?></td>
                                        <td><?php echo $Project['project_name'];?></td>
                                        <td><?php echo $Project['location'];?></td>
                                        <td><?php echo $Project['type'];?></td>
                                        <td>
                                        <div class="d-flex order-actions justify-content-center">
                                            <a href="/project/edit?id={{$Project['id']}}" class=""><i class="bx bxs-edit"></i></a>
                                            <a href="/project/delete?id={{$Project['id']}}" class="ms-3"><i class="bx bxs-trash"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                            <tr colspan="4">
                                                <td>No Data Found</td>
                                            </tr>
                                @endif
                               
                            </tbody> -->
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
          var table = $('#project_type_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "/projecttype/list",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'type', name: 'type'},
                  {data: 'status', name: 'status'},
                  {data: 'action', name: 'action'},
              ]
          });
        });
</script>
