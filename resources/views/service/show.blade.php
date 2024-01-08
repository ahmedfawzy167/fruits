@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/services')}}">services</a></li>
            <li class="breadcrumb-item active">show</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show Service ({{$service->Name}})</h5>
                   
                    <!-- Vertical Form -->
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Service Name: </div>
                    <div class="col-lg-9 col-md-8">{{$service->Name}}</div>
                  </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Description: </div>
                    <div class="col-lg-9 col-md-8">{{$service->Description}}</div>
                  </div>


                  </div>
            </div>


        </div>
    </div>
</section>
@endsection