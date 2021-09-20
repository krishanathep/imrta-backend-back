@extends('layouts.app')

@push('page_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                  <h1 class="text-black-50">Shoppinglist Addtional</h1>
                </div>
                <div class="float-right">
                  <a class="btn btn-success mt-2" href="{{ route('admin-shoppinglist-additional.create') }}"> <i class="fas fa-plus"></i> Create </a>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">           
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Category Add Name</th>
                    <th>Category Add Detail</th>
                    <th>Category Add Status</th>
                    <th>Cratet at</th>
                    <th>Update at</th>
                    <th width='15%'>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($additional as $list)
                    <tr>
                        <td>{{ $list->shopping_add_id }}</td>
                        <td>{{ $list->members->username }}</td>
                        <td>{{ $list->categorys->shopping_category_name_th }}</td>
                        <td>{{ $list->shopping_add_name }}</td>
                        <td>{{ $list->shopping_add_details }}</td>
                        <td>
                          @if ($list->shopping_list_status == 0)
                              <p class="text-primary">Waiting</p>
                          @elseif ($list->shopping_list_status == 1)
                              <p class="text-success">Approved</p>
                          @elseif ($list->shopping_list_status == 8)
                              <p class="text-warning">Canceled</p>
                          @else
                              <p class="text-danger">No Approve</p>
                          @endif
                        </td>
                        <td>{{ $list->created_at }}</td>
                        <td>{{ $list->updated_at }}</td>
                      <td>
                        <form action="{{ route('admin-shoppinglist-additional.destroy',$list->shopping_add_id) }}" method="POST">
                          <a class="btn btn-info" href="{{ route('admin-shoppinglist-additional.show',$list->shopping_add_id) }}"> <i class="far fa-eye"></i></a>
                          <a class="btn btn-primary" href="{{ route('admin-shoppinglist-additional.edit',$list->shopping_add_id) }}"><i class="far fa-edit"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"> <i class="far fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush