@component('mail::message')
# INVOICE MAIL ALERT

<p>Hi, <b>{{ $invoice['client']['name'] }}</b>. </p>
<p>Invoice on goods or services rendered.</p>
<p><b>{{$invoice['invoice_no']}}</b></p>
<p><b>{{$invoice['product_name']}}</b> costing <b>{{$invoice['total_amount']}}</b> which is due by <b>{{$invoice['due_date']}}</b></p>
<i>Make payment on or before the due date.</i>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/pay/$invoice['id']'])
Pay Now
@endcomponent

Thanks,<br>
Application
@endcomponent
