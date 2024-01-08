@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('Css/custom/pagination.css') }}">
@endsection
<div class="pagetitle">
    <h1>{{__('admin.Blogs')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Blogs')}}</li>
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
                                <th scope="col">{{__('admin.Name')}}</th>
                                <th scope="col">{{__('admin.description')}}</th>
                                <th scope="col">{{__('admin.image')}}</th>
                                <th scope="col">{{__('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <th scope="row">{{$blog->id}}</th>
                                <th scope="row">{{$blog->title}}</th>
                                <th scope="row">{{$blog->description}}</th>
                                <td><img src="{{ asset('images/'.$blog->image) }}" width="130" height="120" ></td>
                                <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-success" style="margin-right: 8px;"> <a href="{{ route('blogs.edit',$blog->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                  <button type="button" class="btn btn-danger" style="margin-right: 8px;"> <a href="{{ route('blogs.destroy',$blog->id) }}" class="btn btn-default btn-xs">
                                            Delete
                                        </a></button>

                                </td>
                                </div> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <ul class="pagination pagination-sm center-pagination">
                    {{ $blogs->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                   </ul>
    
                </div>
            </div>
     

        </div>
    </div>
</section>
@endsection