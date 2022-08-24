@extends('layouts.front')



@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">All Subjects/ {{ $products->category->name }}/{{ $products->name }} </h6>
        </div>

    </div>


    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100" alt="">

                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">

                            {{ $products->name }}

                        </h2>

                        <hr>
                        <label class="fw-bold"> Price : Tk {{ $products->price }}</label>
                        <p class="mt-3">
                            {{ $products->description }}

                        </p>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$products->id}}" class="prod_id">
                                <label for="Quantity">Months</label>
                                <div class="input-group text-centre mb-3" style="width:130px;">
                                    <span class="input-group-text decrease-btn">-</span>
                                    <input type="text" name="quantity" class="form-control qty-input text-centre"
                                        value="1">
                                    <button class="input-group-text increase-btn">+</button>
                                </div>
                            </div>



                            <div class="col-md-10">
                                <br />
                                <input type="hidden" value="{{ $products->id }}" class="prod_id"> <button type="button"
                                    class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart<i
                                        class="fa fa-shopping-cart"></i></i></button>

                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            // $('.increment-btn').click(function(e) {
            //     e.preventDefault();

            //     var inc_value = $('.qty-input').val();
            //     var value = parseint(inc_value, 10);
            //     value = isNaN(value) ? 0 : value;
            //     alert("hello");

            //     if (value < 10) {
            //         value++;
            //         $('.qty-input').val(value);
            //     }
            // });
            $(".increment-btn").click(function(e) {
                e.preventDefault();

                var value_inc = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(value_inc, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }
            });
        });
    </script> --}}
@endsection
