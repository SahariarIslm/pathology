<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="{{ asset('/public') }}/FrontEnd/css/bootstrap.min.css">
    <head>
        <style type="text/css">
            @media print {
                @page {
                    size: auto;
                }
            }
        </style>
    </head>
<body onload="window.print();window.history.back()">
    <div class="row">
        @foreach(Cart::getContent() as $barcode)
        @for($i = 0; $i<$barcode->quantity; $i++)
            <div class="col-3" style="text-align: center; font-size: 13px; font-family: monospace; 
                padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; 
                height: 133.5px; border: 1px solid lightgrey;">
                <b>{{ $business_name }}</b>
                <div style="padding-top: 5px; padding-bottom: 5px;">
                    {!! DNS1D::getBarcodeHTML(123456789012, 'C128') !!}
                </div>
                {{ $barcode->attributes->code }} -
                <b>{{ $barcode->name }}</b> <br>
                Price : <b>{{ $barcode->price }}</b> Tk.
            </div>
        @endfor
        @endforeach
    </div>
</body>
</html>
