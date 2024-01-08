@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/categories')}}">categories</a></li>
            <li class="breadcrumb-item active">show</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show Category ({{$category->Name}})</h5>
                   
                    <!-- Vertical Form -->
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Category Name: </div>
                    <div class="col-lg-9 col-md-8">{{$category->Name}}</div>
                  </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Image: </div>
                    <div class="col-lg-9 col-md-8"><img src="{{ asset('images/'.$category->Image) }}" width="100" height="100" ></div>
                  </div>


                  </div>
            </div>


        </div>
    </div>
</section>
@endsection
