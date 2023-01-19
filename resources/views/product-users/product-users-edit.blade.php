@extends('layout.master')

@section('title', 'ویرایش محصول')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ویرایش محصول</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-users.index')}}">لیست محصولات من</a></li>
                    <li class="breadcrumb-item">ویرایش محصول</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('product-users.update', ['product_user'=>$product->id])}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام محصول</label>
                            <input name="name" value="{{old('name', $product->name)}}" type="text" class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">قیمت خرید</label>
                            <input name="purchase_price"
                                   value="{{old('purchase_price', $product->pivot->purchase_price)}}" type="number"
                                   class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">قیمت فروش</label>
                            <input name="sales_price" value="{{old('sales_price', $product->pivot->sales_price)}}"
                                   type="number" class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">تعداد محصول در هر دسته بندی</label>
                            <input name="count_in_package"
                                   value="{{old('count_in_package', $product->pivot->count_in_package)}}" type="number"
                                   class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">حداقل موجودی در انبار</label>
                            <input name="minimum_stock" value="{{old('minimum_stock', $product->pivot->minimum_stock)}}"
                                   type="number" class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label>توضیحات محصول</label>
                            <textarea name="description" class="form-control"
                                      rows="3">{{old('description', $product->pivot->description)}}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
