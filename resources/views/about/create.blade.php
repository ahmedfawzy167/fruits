@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layout</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/aboutus')}}">About us</a></li>
            <li class="breadcrumb-item active">create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                   
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
                    <form class="row g-3" action="{{route('aboutus.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Name</label>
                            <input type="text" class="form-control" name="Name" id="inputNanme4">
                        </div>
                        @error('Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Description</label>
                            <input type="text" class="form-control" name="Description" id="inputEmail4">
                        </div>
                        @error('Description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    
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
