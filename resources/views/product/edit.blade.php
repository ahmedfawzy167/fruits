@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/products')}}">Products</a></li>
            <li class="breadcrumb-item active">edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Product ({{$product->Name}})</h5>
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
                    <form class="row g-3" action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="Name" value="{{$product->Name}}" id="inputNanme4">
                        </div>
                        @error('Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Description</label>
                            <input type="text" class="form-control" name="Description" value="{{$product->Description}}" id="inputEmail4">
                        </div>
                        @error('Descrption')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Product Image</label>
                            <img src="{{ asset('images/'.$product->Image) }}" width="130" height="120">
                            <input type="file" class="form-control" name="Image" value="{{$product->Image}}" id="inputNanme4">
                        </div>
                        @error('Image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Price</label>
                            <input type="text" class="form-control" value="{{$product->Price}}" name="Price"  id="inputNanme4">
                        </div>
                        @error('Price')
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