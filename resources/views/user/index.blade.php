@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('Css/custom/pagination.css') }}">
@endsection
<div class="pagetitle">
    <h1>{{__('admin.Users')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Users')}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

      
            <div class="card">
                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{__('admin.ID')}}</th>
                                <th scope="col">{{__('admin.name')}}</th>
                                <th scope="col">{{__('admin.email')}}</th>
                                <th scope="col">{{__('admin.Role')}}</th>
                                <th scope="col">{{__('admin.image')}}</th>
                                <th scope="col">{{__('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if(isset($user->role))
                                        {{$user->role->name}}
                                    @endif
                                </td>
                                <td><img src="{{ asset('images/'.$user->Image) }}" width="80" height="120" ></td>
                                <td>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary" style="margin-right: 8px;"> <a href="{{ route('users.show',$user->id) }}" class="btn btn-default btn-xs">
                                           View
                                        </a></button>
                                    <button type="button" class="btn btn-success" style="margin-right: 8px;"> <a href="{{ route('users.edit',$user->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                    <button type="button" class="btn btn-danger"> <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-default btn-xs">
                                            Delete
                                        </a></button>

                                </td>
                                </div>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     </div>
                    <!-- End Table with stripped rows -->
                    <ul class="pagination pagination-sm">
                    {{ $users->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                   </ul>


                </div>
            </div>


        </div>
    </div>
</section>
@endsection