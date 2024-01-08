@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/settings')}}">Settings</a></li>
            <li class="breadcrumb-item active">edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit setting ({{$setting->name}})</h5>
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{route('settings.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$setting->name}}" id="inputNanme4">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputemail4" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$setting->description}}" id="inputEmail4">
                        </div>
                        @error('descrption')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">LOGO</label>
                            <img src="{{ asset('images/'.$setting->logo) }}">
                            <input type="file" class="form-control" name="logo" value="{{$setting->logo}}" id="inputNanme4">
                        </div>
                        @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location"  id="inputNanme4" value="{{$setting->location}}">
                        </div>
                        @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">email</label>
                            <input type="text" class="form-control" name="email" id="inputNanme4" value="{{$setting->email}}">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
        
                        <div class="col-12">
                        <label for="inputNanme4" class="form-label">Lat</label>
                        <input type="text" class="form-control" id="inputNanme4" value="{{$setting->lat}}" name="lat" >
                        </div>
                        @error('lat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-12">
                        <label for="inputNanme4" class="form-label">Long</label>
                        <input type="text" class="form-control" id="inputNanme4" value="{{$setting->long}}" name="long" >
                        </div>
                        @error('long')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>


        </div>
    </div>
</section>
@endsection
