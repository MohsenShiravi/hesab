@extends('layout.master')
@section('page-styles')
    <link rel="stylesheet" href="{{asset('/assets/plugins/persian-datepicker/persian-datepicker.min.css')}}"/>
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ایجاد تراکنش</li>
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
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title-rtl">ایجاد تراکنش</h3>
        </div>
        <div class="card-body" dir="rtl">
            <span>نوع تراکنش را انتخاب کنید : </span>
            <select class="form-control" id="choose-type">
                <option value="" disabled selected>انتخاب کنید</option>
                <option value="pay_money" >پرداخت</option>
                <option value="get_money" >دریافت</option>
            </select>
            <div class="form-group">
                <form role="form" action="{{route('transactions.store')}}" method="post">
                    @csrf
                    <div class="form-group" id="section-payee">
                        <label for="payee_id">کاربر ذینفع تراکنش : </label>
                        <select name="payee_id" id="payee-id" class="form-control">
                            <option value="" disabled selected>کاربر ذینفع تراکنش را انتخاب کنید</option>
                            @foreach($payees as $payee)
                                <option value="{{$payee->id}}" @if(old('payee_id') == $payee->id) selected @endif>{{$payee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="section-payer">
                        <label for="payer_id">پرداخت کننده</label>
                        <select name="payer_id" id="payer-id" class="form-control">
                            <option value="" disabled selected>پرداخت کننده را انتخاب کنید</option>
                            @foreach($payers as $payer)
                                <option value="{{$payer->id}}" @if(old('payer_id') == $payer->id) selected @endif>{{$payer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">مبلغ تراکنش</label>
                        <input type="number" name="amount" class="form-control" id="amount" value="{{old('amount')}}" placeholder="مبلغ تراکنش را وارد نمایید">
                    </div>

                    <div class="form-group">
                        <label for="tracking_code">کد رهگیری تراکنش</label>
                        <input type="text" name="tracking_code" value="{{old('tracking_code')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="transaction_name">نام تراکنش</label>
                        <input type="text" name="transaction_name" value="{{old('transaction_name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="transaction_name">تاریخ تراکنش</label>
                    <input type="text" name="done_at" class="datepicker" />
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات</label>
                        <textarea name="description"  id="description" class="form-control" placeholder="توضیحات را وارد نمایید">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="payer_id">نوع تراکنش</label>
                        <select name="type" id="type" class="form-control">
                            <option value="" disabled selected>نوع تراکنش را انتخاب کنید</option>
                            <option value="deposit">واریز به حساب(کارت به کارت - پایا) </option>
                            <option value="pos" >کارتخوان (پوز}</option>
                            <option value="cheque" >چک</option>
                            <option value="online" >درگاه انلاین</option>
                            <option value="cash">وجه نقد</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{asset('/assets/plugins/persian-datepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/persian-datepicker/persian-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#choose-type").change(function () {
                if ($(this).val() == 'get_money') {
                    $("#section-payer").show();
                    $("#section-payee").hide();

                } else {
                    $("#section-payee").show();
                    $("#section-payer").hide();
                }
            });
            $(".datepicker").persianDatepicker({
                observer:true,
                inputDelay:0,
                autoClose: true,
                format: 'YYYY-MM-DD',
                formatPersian: false,
                responsive:true
            });
        });
    </script>
@endsection
