@extends('layout.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">ویرایش سفارش</li>
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
            <h3 class="card-title-rtl">ویرایش سفارش</h3>
        </div>
        <div class="card-body" dir="rtl">
            <span>نوع ایجاد سفارش را انتخاب کنید : </span>
            <select class="form-control" id="choose-type">
                <option value="" disabled selected>نوع پرداخت را انتخاب کنید</option>
                <option value="vendor" >سفارش فروش</option>
                <option value="buyer" >سفارش خرید</option>
            </select>
            <div class="form-group">
                <form role="form" action="{{route('invoices.update',$invoice)}}" method="post">
                    @csrf
                    <div class="form-group" id="section-vendor">
                        <label for="vendor_id">فروشنده</label>
                        <select name="vendor_id" id="vendor-id" class="form-control">
                            <option value="" disabled selected>فروشنده را انتخاب کنید</option>
                            @foreach($vendors as $vendor)
                                <option value="{{$vendor->id}}" @if(old('vendor_id',$invoice->vendor_id) == $vendor->id) selected @endif>{{$vendor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="section-buyer">
                        <label for="buyer_id">خریدار</label>
                        <select name="buyer_id" id="buyer-id" class="form-control">
                            <option value="" disabled selected>خریدار را انتخاب کنید</option>
                            @foreach($buyers as $buyer)
                                <option value="{{$buyer->id}}" @if(old('buyer_id',$invoice->buyer_id) == $buyer->id) selected @endif>{{$buyer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="personal_note">یادداشت</label>
                        <textarea name="personal_note"  id="personal_note" class="form-control" placeholder="یادداشت خود را وارد نمایید">{{old('personal_note',$invoice->personal_note)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات برای خریدار</label>
                        <textarea name="description"  id="description" class="form-control" placeholder="توضیحات برای خریدار را وارد نمایید">{{old('description',$invoice->description)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputError"> وضعیت پرداخت</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" sel value="unpaid" @if($invoice->status=='unpaid') checked @endif>
                            <label class="form-check-label">پرداخت نشده</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="paid" @if($invoice->status=='paid') checked @endif>
                            <label class="form-check-label">پرداخت شده</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="pending" @if($invoice->status=='pending') checked @endif>
                            <label class="form-check-label">در انتظار پرداخت</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total-amount">مبلغ کل</label>
                        <input type="number" name="total_amount" class="form-control" id="total-amount" value="{{old('total_amount',$invoice->total_amount)}}" placeholder="مبلغ کل را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="post-barcode">بارکد پست</label>
                        <input type="number" name="post_barcode" class="form-control" id="post-barcode" value="{{old('post_barcode',$invoice->post_barcode)}}" placeholder="بارکدپست را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="post-price">هزینه پست</label>
                        <input type="number" name="post_price" class="form-control" id="post-price"  value="{{old('post_price',$invoice->post_price)}}" placeholder="هزینه پست را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="total-shipping">هزینه حمل و نقل کل</label>
                        <input type="number" name="total_shipping" class="form-control" id="total-shipping"  value="{{old('total_shipping',$invoice->total_shipping)}}" placeholder="هزینه حمل و نقل کل را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="total-tax">هزینه مالیات</label>
                        <input type="number" name="total_tax" class="form-control" id="total-tax"  value="{{old('total_tax',$invoice->total_tax)}}" placeholder="هزینه حمل و نقل کل را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="how-much-paid">هزینه پرداخت شده</label>
                        <input type="number" name="how_much_paid" class="form-control" id="how-much-paid"  value="{{old('how_much_paid',$invoice->how_much_paid)}}" placeholder="هزینه پرداخت شده از سفارش را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="discount-amount">میزان تخفیف</label>
                        <input type="number" name="discount_amount" class="form-control" id="discount-amount"  value="{{old('discount_amount',$invoice->discount_amount)}}" placeholder="میزان تخفیف را وارد نمایید">
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
    <script>
        $("#choose-type").change(function () {
            if ($(this).val() == 'vendor') {
                $("#section-buyer").show();
                $("#section-vendor").hide();

            } else {
                $("#section-vendor").show();
                $("#section-buyer").hide();
            }
        })
    </script>
@endsection
