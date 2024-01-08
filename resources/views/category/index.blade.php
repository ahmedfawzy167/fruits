@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>{{__('admin.Categories')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Categories')}}</li>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{__('admin.ID')}}</th>
                                <th scope="col">{{__('admin.Name')}}</th>                
                                <th scope="col">{{__('admin.image')}}</th>                         
                                <th scope="col">{{__('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->Name}}</td>
                                <td><img src="{{ asset('images/'.$category->Image) }}" width="130" height="120" ></td>
                               
                                <td>
                                <button type="button" class="btn btn-primary"> <a href="{{ route('categories.show',$category->id) }}" class="btn btn-default btn-xs">
                                            View
                                        </a></button>
                                  <button type="button" class="btn btn-success"> <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                  <button type="button" class="btn btn-danger"> <a href="{{ route('categories.destroy',$category->id) }}" class="btn btn-default btn-xs">
                                            Delete
                                        </a></button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>


        </div>
    </div>
</section>
@endsection