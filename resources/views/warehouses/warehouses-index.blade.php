@extends('layout.master')


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">لیست انبارها</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title-rtl" >لیست انبارها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="warehouses-list" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>مالک انبار</th>
                                    <th>انباردار</th>
                                    <th>آدرس</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($warehouses as $warehouse)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $loop->iteration}}</td>
                                        <td>{{auth()->user()->name}}</td>
                                        <td>{{$warehouse->keeper->name}}</td>
                                        <td>{{$warehouse->province->name}}، {{$warehouse->city->name}}، {{$warehouse->address}}</td>
                                        <td ><a href="{{route('warehouses.edit', $warehouse)}}" class=" m-2"><i title="ویرایش" class="fas fa-edit"></i></a>
                                            <a href="{{route('warehouses.destroy',['warehouse'=> $warehouse->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class=" m-2"><i title="حذف" style="color: #da4453" class="fas fa-trash "></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('page-scripts')
    <!-- DataTables -->
    <script src="{{asset('/assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script>
        $(function () {
            $("#warehouses-list").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
