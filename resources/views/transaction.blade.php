@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        @foreach ($headers as $header)
            <div class="card col-lg-11 my-2 ml-4">
                <p class="mt-3">{{$header->transaction_date}}</p>
                @foreach ($header->details as $detail)
                    <div class="card ml-2 my-2 p-2 d-flex flex-row">
                        <div class="col-lg-2">
                            <img src="{{$detail->product->image_path}}" alt="" style="width: inherit; height: auto">
                        </div>
                        <div>
                            <h5 style="font-weight: bold">{{$detail->product->name}}</h5>
                            <p>IDR: {{number_format($detail->product->price, 2, ',', '.')}} x {{$detail->quantity}} pc(s)</p>
                            <p>IDR: {{number_format($detail->product->price * $detail->quantity, 2, ',', '.')}}</p>
                        </div>
                    </div>
                @endforeach
                <div class="w-100">
                    <p class="float-right" style="font-weight: bold">Total Price: IDR. {{number_format($header->total, 2, ',', '.')}}</p>
                </div> 
            </div>
        @endforeach
    </div>
@endsection