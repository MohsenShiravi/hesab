@extends('layout.master')

@section('title', 'لیست محصولات')

@section('page-styles')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست محصولات من</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item">لیست محصولات من</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <a href="{{route('product-users.create')}}" class="btn btn-success ui-icon-plus">افزودن محصول</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">لیست محصولات من</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="products-list" class="table table-bordered table-striped dataTable"
                               role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">ردیف
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    نام محصول
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">قیمت خرید
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">قیمت فروش
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">تعداد محصول در هر
                                    بسته بندی
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">حداقل موجودی در انبار
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">عملیات
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(auth()->user()->products as $product_user)
                                <tr role="row">
                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                    <td>{{$product_user->name}}</td>
                                    <td>{{$product_user->pivot->purchase_price}}</td>
                                    <td>{{$product_user->pivot->sales_price}}</td>
                                    <td>{{$product_user->pivot->count_in_package}}</td>
                                    <td>{{$product_user->pivot->minimum_stock}}</td>
                                    <td>
                                        <a href="{{route('product-users.edit', ['product_user'=>$product_user->id])}}"
                                           class="fas fa-edit"></a>
                                        @if($product_user->pivot->is_active == 0)
                                            <a href="{{route('product-users.activate', ['product_user'=>$product_user->id])}}"
                                               class="btn btn-success">فعال کردن</a>
                                        @else
                                            <a href="{{route('product-users.deactivate', ['product_user'=>$product_user->id])}}"
                                               class="btn btn-danger">غیر فعال کردن</a>
                                        @endif
                                        <a href="{{route('product-users.destroy', ['product_user'=>$product_user->id])}}"
                                           class="fas fa-trash-alt text-danger"
                                           onclick="return confirm('آیا از حذف این محصول از لیست خود مطمئن هستید؟')"></a>
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
