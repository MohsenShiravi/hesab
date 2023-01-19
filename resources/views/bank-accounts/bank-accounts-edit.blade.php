@extends('layout.master')
@section('title','ویرایش حساب بانکی')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> ویرایش حساب بانکی </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ویرایش حساب بانکی</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ویرایش حساب بانکی </h3>
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
        <form action="{{route('bank-accounts.update',['bank_account'=>$bank_account->id])}}" method="post">
            @csrf
            <input type="hidden" name="data_type" value="edit">
            <input type="hidden" name="bank_account_id" value="{{$bank_account->id}}">

            <div class="card-body">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail8">عنوان حساب</label>
                    <input type="text"  name="title" class="form-control" id="exampleInputEmail8" value="{{ $bank_account->title , old('title')}}" placeholder="یک عنوان دلخواه برای حساب بانکی خود وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام بانک</label>
                    <input type="text"  name="bank_name" class="form-control" id="exampleInputEmail1" value="{{ $bank_account->bank_name , old('bank_name')}}" placeholder="نام بانک را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">نام شعبه بانک</label>
                    <input type="text"  name="branch_name" class="form-control" id="exampleInputEmail2" value="{{ $bank_account->branch_name , old('branch_name')}}" placeholder="نام شعبه بانک را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="number_dash">شماره کارت</label>
                    <input type="text"  name="card_number" class="form-control" id="number_dash" value="{{ $bank_account->card_number , old('card_number')}}" placeholder="شماره کارت را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail4">شماره حساب</label>
                    <input type="text"  name="account_number" class="form-control" id="exampleInputEmail4" value="{{ $bank_account->account_number , old('account_number')}}" placeholder="شماره حساب را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail5">شماره شبا</label>
                    <input type="text"  name="shaba_number" class="form-control" id="exampleInputEmail5" value="{{ $bank_account->shaba_number , old('shaba_number')}}" placeholder="شماره شبا را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail7">لینک پرداخت آنلاین	</label>
                    <input type="text"  name="online_pay_link" class="form-control" id="exampleInputEmail7" value="{{ $bank_account->online_pay_link , old('online_pay_link')}}" placeholder="لینک پرداخت آنلاین را وارد نمایید.">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail6">توضیحات</label>
                    <textarea type="text"  name="description" class="form-control" id="exampleInputEmail6">{{ $bank_account->description , old('description')}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
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
