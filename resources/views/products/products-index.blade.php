@extends('layout.master')

@section('title', 'لیست محصولات')

@section('page-styles')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست محصولات</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item">لیست محصولات</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">لیست محصولات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="products-list" class="table table-bordered table-striped dataTable" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">ردیف
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    تصویر محصول
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    نام محصول
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">نام دسته بندی
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">وزن محصول
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">عملیات
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr role="row">
                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                    <td><img
                                            class="img-size-64"
                                            src="{{filled($product->files)?asset('storage/uploads/'.$product->files->first()->name):asset('/assets/dist/img/prod-1.jpg')}}"
                                            alt="{{'تصویر '.$product->name}}">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->weight}}</td>
                                    <td>
                                        <a href="{{route('products.edit', ['product'=>$product->id])}}"
                                           class="fas fa-edit"></a>
                                        <a href="{{route('products.destroy', ['product'=>$product->id])}}"
                                           class="fas fa-trash-alt text-danger"
                                           onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟')"></a>
                                        @if(auth()->user()->hasRole('admin') && blank($product->confirmed_at))
                                            <a href="{{route('products.confirm', ['product'=>$product->id])}}"
                                               class="btn btn-success">تایید</a>
                                        @endif
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
@endsection

@section('page-scripts')
    <!-- DataTables -->
    <script src="/assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function () {
            $("#products-list").DataTable();
        });
    </script>
@endsection
