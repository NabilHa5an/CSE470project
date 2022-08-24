@extends('layouts.front')

@section('title')
    Checkout
@endsection


@section('content')
    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6> Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name }}" name="name" placeholder="Enter Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="Name">Email</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->email }}" name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6">
                                    <label for="Name">Phone No</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->phone }}" name="phone" placeholder="Enter Phone No">
                                </div>
                                <div class="col-md-6">
                                    <label for="Name">Address</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->address }}" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Months</th>
                                    <th>Price</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->products->price }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>

                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
