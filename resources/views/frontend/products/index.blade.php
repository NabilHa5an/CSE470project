@extends('layouts.front')

@section('title')
    Courses
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">All Subjects/ {{$category->name}}</h6>
    </div>

 </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>


                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/'.$category->meta_title.'/'.$prod->meta_title) }}">
                            <img class="img-res" src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                alt="Product Image">
                            <div class="card body">
                                <h5>{{ $prod->name }}</h5>
                                <small>{{ $prod->price }}</small>
                            </div>
                        </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>
@endsection
