@extends('layout.master')

@section('title', 'افزودن محصول')

@section('page-styles')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">افزودن محصول</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-users.index')}}">لیست محصولات من</a></li>
                    <li class="breadcrumb-item">افزودن محصول</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <a href="{{route('products.create')}}" class="btn btn-success ui-icon-plus">درخواست محصول جدید</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">افزودن محصول</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="{{route('product-users.store')}}">
                            @csrf
                            <table id="products-list" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                    >ردیف
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending"
                                    >
                                        تصویر محصول
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending"
                                    >
                                        نام محصول
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending"
                                    >نام دسته بندی
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending"
                                    >وزن محصول
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending"
                                    >انتخاب
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
                                            <div class="form-check">
                                                <input type="checkbox" name="product_ids[]" value="{{$product->id}}"
                                                       class="form-check-input">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
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
