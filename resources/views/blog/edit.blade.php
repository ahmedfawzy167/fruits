@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/blogs')}}">Blogs</a></li>
            <li class="breadcrumb-item active">edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Blog ({{$blog->title}})</h5>
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
                    <form class="row g-3" action="{{route('blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Blog Title</label>
                            <input type="text" class="form-control" name="title" value="{{$blog->title}}" id="inputNanme4">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$blog->description}}" id="inputEmail4">
                        </div>
                        @error('descrption')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Blog Image</label>
                            <img src="{{ asset('images/'.$blog->image) }}" width="130" height="120">
                            <input type="file" class="form-control" name="image" id="inputNanme4">
                        </div>
                        @error('image')
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