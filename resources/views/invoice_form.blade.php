@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header clearfix">
                    <b class="float-left">{{ __('Create NEW Invoice') }}</b>
                    <div class="float-right">
                        <a href="/home" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/invoice/add">
                        @csrf

                        <div class="form-group row">
                            <label for="client_id" class="col-md-2 col-form-label">{{ __('Client Name') }}</label>

                            <div class="col-md-4">
                                <select class="form-control  @error('client_id') is-invalid @enderror" name="client_id" id="client_id">
                                        <option value="" disabled selected>Select from  database</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                </select>
                                    @error('client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <label for="invoice_no" class="col-md-2 col-form-label">{{ __('INV no') }}</label>

                            <div class="col-md-4">
                                <input id="invoice_no" type="text" class="form-control @error('invoice_no') is-invalid @enderror" name="invoice_no" value="INV/2022/06/1" required>

                                @error('invoice_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- CHANGE THIS LATER!! -->
                        <input type="hidden" name="total_amount" value="0"> 


                        <div class="form-group row">
                            <label for="product_name" class="col-md-2 col-form-label">{{ __('Product') }}</label>

                            <div class="col-md-4">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="product_price" class="col-md-2 col-form-label">{{ __('Unit Price') }}</label>

                            <div class="col-md-4">
                                <input id="product_price" type="number" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ old('product_price') }}" required autocomplete="product_price">

                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_quantity" class="col-md-2 col-form-label">{{ __('Quantity') }}</label>

                            <div class="col-md-4">
                                <input id="product_quantity" type="number" class="form-control @error('product_quantity') is-invalid @enderror" name="product_quantity" value="{{ old('product_quantity') }}" required autocomplete="product_quantity" autofocus>

                                @error('product_quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="due_date" class="col-md-2 col-form-label">{{ __('Due Date') }}</label>

                            <div class="col-md-4">
                                <input id="due_date" type="date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{ old('due_date') }}" required autocomplete="due_date">

                                @error('due_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="delivery_date" class="col-md-2 col-form-label">{{ __('Delivery Date') }}</label>

                            <div class="col-md-4">
                                <input id="delivery_date" type="date" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date" value="{{ old('delivery_date') }}" required autocomplete="delivery_date">

                                @error('delivery_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="float-right pr-4 pt-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Create Invoice') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
