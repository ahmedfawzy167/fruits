@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/users')}}">Users</a></li>
            <li class="breadcrumb-item active">show</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show user ({{$user->name}})</h5>
                   
                    <!-- Vertical Form -->
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">user name: </div>
                    <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                  </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label ">email: </div>
                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Role: </div>
                    <div class="col-lg-9 col-md-8"> @if(isset($user->role))
                                        {{$user->role->name}}
                                    @endif</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Image: </div>
                    <div class="col-lg-9 col-md-8"><img src="{{ asset('images/'.$user->Image) }}" width="130" height="120" ></div>
                  </div>
                  


                  </div>
            </div>


        </div>
    </div>
</section>
@endsection