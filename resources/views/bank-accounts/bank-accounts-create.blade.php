@extends('layout.master')
@section('title','ایجاد حساب جدید')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
{{--                <h1 class="m-0 text-dark"> ایجاد دسته بندی جدید </h1>--}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ایجاد حساب جدید</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title-rtl">ایجاد حساب جدید</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{route('bank-accounts.store')}}" method="post">
            @csrf
            <input type="hidden" name="data_type" value="create">
            <div class="card-body">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                    <div class="form-group">
                        <label for="exampleInputEmail8">عنوان حساب</label>
                        <input type="text"  name="title" class="form-control" id="exampleInputEmail8" value="{{old('title')}}" placeholder="یک عنوان دلخواه برای حساب بانکی خود وارد نمایید.">
                    </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام بانک</label>
                    <input type="text"  name="bank_name" class="form-control" id="exampleInputEmail1" value="{{old('bank_name')}}" placeholder="نام بانک را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">نام شعبه بانک</label>
                    <input type="text"  name="branch_name" class="form-control" id="exampleInputEmail2" value="{{old('branch_name')}}" placeholder="نام شعبه بانک را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="number_dash">شماره کارت</label>
                    <input type="text"  name="card_number" class="form-control" id="number_dash" value="{{old('card_number')}}" maxlength="19" placeholder="شماره کارت را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail4">شماره حساب</label>
                    <input type="text"  name="account_number" class="form-control" id="exampleInputEmail4" value="{{old('account_number')}}" placeholder="شماره حساب را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail5">شماره شبا</label>
                    <input type="text"  name="shaba_number" class="form-control" id="exampleInputEmail5" value="{{old('shaba_number')}}" placeholder="شماره شبا را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail7">لینک پرداخت آنلاین	</label>
                    <input type="text"  name="online_pay_link" class="form-control" id="exampleInputEmail7" value="{{old('online_pay_link')}}" placeholder="لینک پرداخت آنلاین را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail6">توضیحات</label>
                    <textarea type="text"  name="description" class="form-control" id="exampleInputEmail6">{{old('description')}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('page-scripts')
    <script>
        document.querySelector("#number_dash")
            .addEventListener("keypress",
            (e) => e.target.value.length === 4 ?
                    e.target.value = e.target.value + "-" : e.target.value.length === 9 ?
                    e.target.value = e.target.value + "-" :  e.target.value.length === 14 ?
                    e.target.value = e.target.value + "-" : null)
    </script>
@endsection
