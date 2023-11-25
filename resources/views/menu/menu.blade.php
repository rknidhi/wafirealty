@section('content')
<section class="section main-section">
<div class="container mx-auto max-w-screen-lg">
<div class="flex flex-col">
      <div class="notification blue">
         <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
               <span class="icon"><i class="mdi mdi-buffer"></i></span>
               <b>Menu</b>
            </div>
         </div>
      </div>
      @if (session('success'))
      <div class="alert alert-success" role="alert">
      <div class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
            <span class="mr-2 h-4 w-4 fill-current">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
            </svg>
            </span>
            {{ session('success') }}
            </div>
       </div>
    @endif

      <div class="mb-8">
         <div class="card has-table">
            <header class="card-header">
               <p class="card-header-title">
                  <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                  Menu List Item
               </p>
               <a href="#" class="card-header-icon">
               <span class="icon"><i class="mdi mdi-reload"></i></span>
               </a>
            </header>
            <div class="w-full text-right mb-12 left-10 top-5">
         <a href = "{{url('/')}}/admin/menu/add" class = "button medium textual --jb-notification-dismiss">Create Menu</a>
      </div>
            <div class="flex flex-col">
               <div class="w-full">
                  <div class="p-8 border-b border-gray-200 shadow">
                     <table class="divide-y divide-gray-300 menu_datatable">
                        <thead class="bg-black">
                           <tr>
                              <th class="px-6 py-2 text-xs text-white">Menu ID</th>
                              <th class="px-6 py-2 text-xs text-white">Menu Name</th>
                              <th class="px-6 py-2 text-xs text-white">Menu Type</th>
                              <th class="px-6 py-2 text-xs text-white">Action</th>
                           </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300"></tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
   $(function () {
     var table = $('.menu_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('listmenu') }}",
         columns: [
             {data: 'menuid', name: 'menuid'},
             {data: 'name', name: 'name'},
             {data: 'menuType', name: 'menuType', sortable: false, searchable: false},
             {data: 'action', name: 'action', sortable: false, searchable: false },
         ]
     });
   });
   
     function ConfirmDelete()
     {
         var result = confirm("Are you sure you want to delete?");
         if (result==true) {
             return true;
         } else {
             return false;
         }
     }
</script>
@endsection