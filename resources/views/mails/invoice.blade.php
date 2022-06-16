@component('mail::message')
# INVOICE MAIL ALERT

<p>Hi, {{ $invoice['client']['name'] }}. </p>
<p>Invoice for goods or services rendered.</p>
<p>{{$invoice['product_name']}} costing {{$invoice['total_amount']}} which is due by {{$invoice['due_date']}}</p>

@component('mail::button', ['url' => ''])
Make Payment
@endcomponent

Thanks,<br>
Application
@endcomponent
