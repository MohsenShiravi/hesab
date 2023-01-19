@extends('layout.master')


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">لیست تراکنش ها</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title-rtl" >لیست تراکنش ها</h3>
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
                                    <th>پرداخت کننده</th>
                                    <th>کاربر ذینفع</th>
                                    <th>مبلغ تراکنش</th>
                                    <th>کد رهگیری</th>
                                    <th>نام تراکنش</th>
                                    <th>تاریخ تراکنش</th>
                                    <th>توضیحات</th>
                                    <th>نوع تراکنش</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration}}</td>
                                    <td>{{$transaction->payee->name}}</td>
                                    <td>{{$transaction->payer->name}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->tracking_code}}</td>
                                    <td>{{$transaction->transaction_name}}</td>
                                    <td>{{ gregorianToJalali($transaction->done_at)  }}</td>
                                    <td>{{$transaction->description}}</td>
                                    <td>@if($transaction->type == 'deposit')واریز به حساب(کارت به کارت - پایا)@elseif($transaction->type == 'pos')کارتخوان(پوز)@elseif($transaction->type == 'cheque')چک@elseif($transaction->type == 'online')درگاه انلاین@elseif($transaction->type == 'cash')وجه نقد @endif</td>
                                   <td>
                                       <div class="btn-group" role="group" aria-label="Basic example">
                                           <a href="{{route('transactions.edit', $transaction)}}" class=" m-2"><i title="ویرایش" class="fas fa-edit"></i></a>
                                           <a href="{{route('transactions.destroy',['transaction'=> $transaction->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class=" m-2"><i title="حذف" style="color: #da4453" class="fas fa-trash "></i></a>
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
    <script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#invoices-list").DataTable();
        });
    </script>
@endsection
