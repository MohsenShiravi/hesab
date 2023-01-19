@extends('layout.master')

@section('title', 'ایجاد محصول')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ایجاد محصول جدید</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item">ایجاد محصول جدید</li>
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
                <!-- form start -->
                <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="method_type" value="store">
                    <div class="card-body">
                        <div class="form-group">
                            <label>دسته بندی محصول</label>
                            <select name="category_id" class="form-control">
                                <option disabled selected value>
                                    دسته بندی مورد نظر خود را انتخاب کنید:
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام محصول</label>
                            <input name="name" value="{{old('name')}}" class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label>مواد تشکیل دهنده محصول</label>
                            <textarea name="content" class="form-control" rows="3">{{old('content')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>توضیحات محصول</label>
                            <textarea name="description" class="form-control" rows="3">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">وزن محصول</label>
                            <input name="weight" type="number" value="{{old('weight')}}" class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">بارگذاری تصویر محصول</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="images[]" id="exampleInputFile" accept="image/*">
                                </div>
                            </div>
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
