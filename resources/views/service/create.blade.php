@extends('layouts.app')
@section('content')
<div class="pagetitle">
 
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/services')}}">{{__('admin.Services')}}</a></li>
            <li class="breadcrumb-item active">{{__('admin.Add')}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{__('admin.Create Services')}}</h5>
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
                    <form class="row g-3" action="{{route('services.store')}}" method="post">

                        @csrf

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">{{__('admin.Name')}}</label>
                            <input type="text" class="form-control" name="Name" id="inputNanme4">
                        </div>
                        @error('Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">{{__('admin.description')}}</label>
                            <input type="text" class="form-control" name="Description" id="inputEmail4">
                        </div>
                        @error('Description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{__('admin.Submit')}}</button>
                            <button type="reset" class="btn btn-secondary">{{__('admin.Reset')}}</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>


        </div>
    </div>
</section>
@endsection