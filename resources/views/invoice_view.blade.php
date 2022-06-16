@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header clearfix">
                    <b class="float-left">{{ __('All Invoices') }}</b>
                    <div class="float-right">
                        <a href="/home" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Client Name</th>
                                    <th>Product</th>
                                    <th>Total Amount</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->invoice_no}}</td>
                                        <td>{{$invoice->client->name}}</td>
                                        <td>{{$invoice->product_name}} </td>
                                        <td>{{$invoice->total_amount}}</td>
                                        <td>{{$invoice->due_date}}</td>
                                        @if($invoice->status == 1)
                                            <td class="text-danger">Pending</td>
                                            <td><a href="" class="btn btn-sm btn-primary">Send Invoice</a></td>
                                        @else
                                            <td class="text-success">Paid</td>
                                            <td><a href="" class="btn btn-sm btn-success">View Payment</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex justify-content-end">
                            {{ $invoices->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
