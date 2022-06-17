@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header clearfix">
                    <h4><b class="float-left">Paying for {{$invoice->product_name}}</b></h4>
                    <div class="float-right">
                    </div>
                </div>

                <div class="card-body">
                    @if($invoice->status ==  0)
                        <h4 class="text-center p-4">Invoice <b>{{$invoice->invoice_no}}</b> has been paid for on <b>{{$invoice->updated_at->format('Y-m-d')}}</b></h4>
                    @else
                        <form method="POST" action="/payment">
                            @csrf
                            
                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <label for="client_id" class="col-md-2 col-form-label">{{ __('Name') }}</label>
                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                                <div class="col-md-4">
                                    <input id="amount_paid" type="text" class="form-control @error('amount_paid') is-invalid @enderror"  value="{{$invoice->client->name}}" disabled>
                                        @error('client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <label for="product_price" class="col-md-2 col-form-label">{{ __('Invoice Number') }}</label>

                                <div class="col-md-4">
                                    <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror" value="{{$invoice->invoice_no}}" disabled >

                                    @error('product_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <label for="amount_paid" class="col-md-2 col-form-label">{{ __('Amount') }}</label>

                                <div class="col-md-4">
                                    <input id="amount_paid" type="number" class="form-control @error('amount_paid') is-invalid @enderror" value="{{$invoice->total_amount}}" disabled>

                                    @error('amount_paid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <input type="hidden" name="user_id" value="1">
                                    <input type="hidden" name="self_paid" value="1">
                                    <input type="hidden" name="amount_paid" value="{{$invoice->total_amount}}">
                            </div>
                        

                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                
                                <label for="due" class="col-md-2 col-form-label">{{ __('Due Date') }}</label>

                                <div class="col-md-4">
                                    <input id="due" type="date" class="form-control @error('due') is-invalid @enderror" value="{{$invoice->due_date}}" disabled >

                                    @error('due')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group clearfix">
                                <div class="float-right pr-3 pt-3">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Pay') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
