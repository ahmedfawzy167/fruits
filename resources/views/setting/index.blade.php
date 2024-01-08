@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>{{__('admin.Settings')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Settings')}}</li>
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
            <div class="table-responsive">
            <table class="table table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>{{__('admin.ID')}}</th>
                        <th>{{__('admin.Name')}}</th>
                        <th>{{__('admin.description')}}</th>
                        <th>{{__('admin.logo')}}</th>
                        <th>{{__('admin.location')}}</th>
                        <th>{{__('admin.email')}}</th>
                        <th>{{__('admin.lat')}}</th>
                        <th>{{__('admin.long')}}</th>
                        <th>{{__('admin.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $setting)
                    <tr>
                        <th>{{$setting->id}}</th>
                        <td>{{$setting->name}}</td>
                        <td>{{$setting->description}}</td>
                        <td><img src="{{ asset('images/'.$setting->logo) }} " width="80px" ></td>
                        <td>{{$setting->location}}</td>
                        <td>{{$setting->email}}</td>
                        <td>{{$setting->lat}}</td>
                        <td>{{$setting->long}}</td>
                        <td>
                        <div class="btn-group">
                            <button type="button" style="margin-right: 8px;" class="btn btn-success"> <a href="{{ route('settings.edit',$setting->id) }}" class="btn btn-default btn-xs">
                                    Edit
                                </a></button>
                            <button type="button" class="btn btn-danger"> <a href="{{ route('settings.destroy',$setting->id) }}" class="btn btn-default btn-xs">
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

        </div>


    </div>


    </div>
    </div>
</section>
@endsection