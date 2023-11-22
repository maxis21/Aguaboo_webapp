@extends('layouts.app')


@section('contents')

<div class="row">
    @csrf
    @method('put')
    <div class="col">
        <div><h4>Customer Details</h4></div>
        <div class="border p-3 rounded" style="background-color: white;">
            <div class="row">
                <div class="col-lg-4">
                    <div><h6>Name:</h6></div>
                </div>
                <div class="col-lg">
                    <div><h6>{{$id->customer->customer_name}}</h6></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div><h6>Address:</h6></div>
                </div>
                <div class="col-lg">
                    <div><h6>{{$id->order_purok}}, {{$id->order_barangay}}, {{$id->order_city}}</h6></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div><h6>Contact Number:</h6></div>
                </div>
                <div class="col-lg">
                    <div><h6>{{$id->order_pnumber}}</h6></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div><h6>Assigned Truck:</h6></div>
                </div>
                <div class="col-lg">
                    <div><h6>{{$id->truck->trucks}}</h6></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col border-left">
        <h4>Order Details</h4>
        <ul class="list-group">
            @foreach($id->product as $product)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-2">
                        <div><h6>{{ $product->product_name }}</h6></div>
                    </div>
                    <div class="col-lg">
                        <div><h6>x{{ $product->pivot->quantity }}</h6></div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <div class="row p-3 font-weight-bold">
            <div class="col-lg-2">
                <div><h6 class="font-weight-bold">Total: </h6></div>
            </div>
            <div class="col-lg">
                <div><h6 class="font-weight-bold">{{$id->total_price}}</h6></div>
            </div>
        </div>

    </div>
</div>

<form action="{{ route('update.order', ['id' => $id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg mt-3">
            <h5>Transfer Truck</h5>
            <select class="custom-select" name="order_truck" id="status">
                @foreach($trucks as $truck)
                <option value="{{ $truck->id }}" {{ $id->truck_id == $truck->id ? 'selected' : '' }}>{{ $truck->trucks }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg mt-3">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" style="width: 80px;">Save</button>
    <button type="button" class="btn btn-danger mt-3" onclick="history.back();">Cancel</button>
</form>

@endsection