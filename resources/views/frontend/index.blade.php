@extends('layouts.front')

@section('title')
    EduPlat
@endsection


@section('content')
    @include('layouts.inc.slider')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Courses</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img class="img-res" src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                    alt="Product Image">
                                <div class="card body">
                                    <h5>{{ $prod->name }}</h5>
                                    <small>{{ $prod->price }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>



    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Subjects</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($trending_category as $category)
                        <div class="item">
                            <div class="card">
                                <img class="img-res" src="{{ asset('assets/uploads/category/' . $category->image) }}"
                                    alt="Category Image">
                                <div class="card body">
                                    <h5>{{ $category->name }}</h5>
                                    <P>
                                        {{ $category->description }}
                                    </P>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endsection
