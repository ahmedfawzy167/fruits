@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/products')}}">Products</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show Product ({{$product->Name}})</h5>

                    <!-- Vertical Form -->
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Product Name: </div>
                    <div class="col-lg-9 col-md-8">{{$product->Name}}</div>
                  </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Description: </div>
                    <div class="col-lg-9 col-md-8">{{$product->Description}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Price: </div>
                        <div class="col-lg-9 col-md-8">{{$product->Price}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Image: </div>
                            <div class="col-lg-9 col-md-8"><img src="{{ asset('images/'.$product->Image) }}" width="100" height="100" ></div>
                          </div>





                    <!-- Vertical Form -->

                </div>
            </div>


        </div>
    </div>
</section>
@endsection
