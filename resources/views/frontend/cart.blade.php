@extends('layouts.front')

@section('title')
    Cart
@endsection


@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Home /Cart </h6>
        </div>

    </div>

    <div class="container my-5">
        <div class="card shadow ">
            @if ($cartitems->count() > 0)
                <div class="card-body">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartitems as $item)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="70px"
                                    width="70px" alt="Image Here">
                            </div>
                            <div class="col-md-5">
                                <h3>{{ $item->products->name }}</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h3>{{ $item->products->price }}</h3>
                            </div>

                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                <label for="Quantity">Months</label>
                                <div class="input-group text-centre mb-3" style="width:130px;">
                                    <span class="input-group-text changeQuantity decrease-btn">-</span>
                                    <input type="text" name="quantity" class="form-control qty-input text-centre"
                                        value="{{ $item->prod_qty }}">
                                    <button class="input-group-text changeQuantity increase-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item "><i class="fa fa-trash"></i>Remove</h6>
                            </div>
                        </div>
                        @php
                            $total += $item->products->price * $item->prod_qty;
                        @endphp
                    @endforeach
                </div>
                <div class="card-footer">
                    <h6> Total Cost : Tk {{ $total }}</h6>
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Payment</a>
                </div>

                @else
                   <div class="class-body text-centre">
                    <h2> The Cart is Empty</h2>
                    <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Browse Courses</a>
                   </div>
            @endif
        </div>
    </div>
@endsection
