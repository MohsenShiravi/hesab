@extends('layout.master')


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">لیست سفارش ها</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title-rtl" >لیست سفارش ها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="invoices-list" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>فروشنده</th>
                                    <th>خریدار</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>مبلغ کل</th>
                                    <th>هزینه پرداخت شده</th>
                                    <th>میزان تخفیف</th>
                                    <th>تایید حمل</th>
                                    <th>تایید ارسال</th>
                                    <th>تایید دریافت</th>
                                    <th>تایید تحویل</th>
                                    <th>عملیات</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $loop->iteration}}</td>
                                        <td>{{$invoice->vendor->name}}</td>
                                        <td>{{$invoice->buyer->name}}</td>
                                        <td>@if($invoice->status == 'unpaid')پرداخت نشده@elseif($invoice->status == 'paid')پرداخت شده@elseif($invoice->status == 'pending')در انتظار پرداخت@endif</td>
                                        <td>{{number_format($invoice->total_amount)}}</td>
                                        <td>{{number_format($invoice->how_much_paid)}}</td>
                                        <td>{{number_format($invoice->discount_amount)}}</td>
                                        <form action="{{route('invoices.date-operation',$invoice->id)}}" method="post">
                                            @csrf
                                            <div class="btn-group-vertical">
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button name="shipped_date" type="submit" value="accept" class="btn btn-primary">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button name="shipped_date" type="submit" value="reject" class="btn btn-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button name="delivery_date" type="submit" value="accept" class="btn btn-primary">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button name="delivery_date" type="submit" value="reject" class="btn btn-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button name="send_confirmed_at" type="submit" value="accept" class="btn btn-primary">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button name="send_confirmed_at" type="submit" value="reject" class="btn btn-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button name="receive_confirmed_at" type="submit" value="accept" class="btn btn-primary">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button name="receive_confirmed_at" type="submit" value="reject" class="btn btn-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </div>
                                        </form>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('invoices.edit', $invoice)}}" class=" m-2"><i title="ویرایش" class="fas fa-edit"></i></a>
                                            <a href="{{route('invoices.destroy',['invoice'=> $invoice->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class=" m-2"><i title="حذف" style="color: #da4453" class="fas fa-trash "></i></a>
                                            <a href="{{route('invoices.details-invoice', $invoice)}}" class=" m-2"><i title="جزئیات سفارش" class="fas fa-eye"></i></a>
                                            </div>
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
            $("#invoices-list").DataTable();
        });
    </script>
@endsection
