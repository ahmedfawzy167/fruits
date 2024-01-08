@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>{{__('admin.Account settings')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/settings')}}">{{__('admin.Settings')}}</a></li>
            <li class="breadcrumb-item active">{{__('admin.Add')}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">


        <div class="col-lg-16">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{__('admin.Add settings')}}</h5>
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
                    <form class="row g-3" action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">{{__('admin.Name')}}</label>
                            <input type="text" class="form-control" name="name" id="inputNanme4">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-16">
                            <label for="inputNanme4" class="form-label">{{__('admin.description')}}</label>
                            <input type="text" class="form-control" name="description" id="inputNanme4">
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-16">
                            <label for="inputNanme4" class="form-label">{{__('admin.logo')}}</label>
                            <input type="file" class="form-control" name="logo" id="inputNanme4">
                        </div>
                        @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-16">
                            <label for="inputNanme4" class="form-label">{{__('admin.location')}}</label>
                            <input type="text" class="form-control" name="location" id="inputNanme4">
                        </div>
                        @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-16">
                            <label for="inputNanme4" class="form-label">{{__('admin.email')}}</label>
                            <input type="text" class="form-control" name="email" id="inputNanme4">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        
                        <div class="col-16">
                        <label for="inputNanme4" class="form-label">{{__('admin.lat')}}</label>
                        <input type="text" class="form-control" id="inputNanme4" name="lat" >
                        </div>
                        @error('lat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                        <label for="inputNanme4" class="form-label">{{__('admin.long')}}</label>
                        <input type="text" class="form-control" id="inputNanme4" name="long" >
                        </div>
                        @error('long')
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