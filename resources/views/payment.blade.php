@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header clearfix">
                    <b class="float-left">{{ __('All Payments') }}</b>
                    <div class="float-right">
                        <!-- <a href="/invoice" class="btn btn-sm btn-primary px-3">Add Invoice</a> -->
                        <a href="/home" class="btn btn-sm btn-secondary px-3">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Client</th>
                                    <th>Product</th>
                                    <th>Due Date</th>
                                    <th>Paid Amount</th>
                                    <th>Paid Date</th>
                                    <th>Loaded By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$payment->invoice->invoice_no}}</td>
                                        <td>{{$payment->invoice->client->name}}</td>
                                        <td>{{$payment->invoice->product_name}} </td>
                                        <td>{{$payment->invoice->due_date}}</td>
                                        <td>{{$payment->amount_paid}}</td>
                                        <td>{{$payment->created_at}}</td>
                                        @if($payment->self_paid == 1)
                                            <td>{{$payment->invoice->client->name}}</td>
                                        @else
                                            <td>{{$payment->user->name}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex justify-content-end">
                            {{ $payments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
