@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    List of all users
@endsection

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection


{{-- Page name --}}
@section('page_name')
    List of all users
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Users<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
    <section class="user-section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">List of all users</h3>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-create btn-primary float-sm-right" href="{{route('user.create')}}">
                                    <i class="fasfa-plus"></i>
                                    Add New User
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Admin / User</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if ($user->is_admin == 1)
                                                    <button class="btn btn-sm btn-outline-dark" type="submit">Admin</button>
                                                    <form class="d-inline-block" action="{{route('remove.admin', ['id' => $user->id])}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-sm btn-link" type="submit">Remove admin</button>
                                                    </form>
                                                @else
                                                    <form action="{{route('make.admin', ['id' => $user->id])}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-sm btn-outline-dark" type="submit">Make Admin</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm btn-edit" href="{{route('user.edit', ['id' => $user->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('user.destroy', ['id' => $user->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm btn-delete" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Admin / User</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <!--/.col-12 -->
        </div>
        <!--/.row -->
    </section>
@endsection

{{-- Scripts --}}
@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>

@endsection
