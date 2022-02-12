@extends('layouts.other')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('layouts.alerts')
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            @foreach ($errors->all() as $error)
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            @endforeach
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-upload"></i> <strong>Invoice</strong></h3>
                    <p><b><a href="{{ route('all-orders.index') }}">All Orders</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>Upload Invoice</b></p>
                </div>

                <div class="card-body"> 
                    <form class="form-horizontal" action="{{ route('all-orders.upload-invoice', $order->id) }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-group pb-2">
                            <label for="orderid">Order Number</label>
                            <input type="text" class="form-control" name="order_number" value="{{ $order->order_number }}" disabled>
                        </div>

                        <div class="form-group pb-2">
                            <label for="invoice">Invoice</label>
                            <input type="file" class="form-control-file pl-0" name="invoice">
                        </div>

                        <div class="cart-buttons">
                            <a href="{{ route('all-orders.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                            <button type="submit" class="btn btn-sm btn-success float-right">Upload <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection