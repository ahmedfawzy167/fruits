@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('Css/custom/pagination.css') }}">
@endsection
<div class="pagetitle">
    <h1>{{__('admin.Brands')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Brands')}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        
                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <!-- Table with stripped rows -->
                    <table class="table table-striped" width="80px">
                        <thead>
                            <tr>
                                <th scope="col">{{__('admin.ID')}}</th>
                                <th scope="col">{{__('admin.image')}}</th>
                                <th scope="col">{{__('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <th scope="row">{{$brand->id}}</th>
                                <td><img src="{{ asset('images/'.$brand->Image) }}" width="130" height="120" ></td>
                                <td>
                                  <button type="button" class="btn btn-success"> <a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                  <button type="button" class="btn btn-danger"> <a href="{{ route('brands.destroy',$brand->id) }}" class="btn btn-default btn-xs">
                                            Delete
                                        </a></button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <ul class="pagination pagination-sm center-pagination">
                    {{ $brands->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                   </ul>
    
                </div>
            </div>


        </div>
    </div>
</section>
@endsection