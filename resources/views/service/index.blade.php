@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>{{__('admin.Services')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Services')}}</li>
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
                                <th>{{__('admin.ID')}}</th>
                                <th>{{__('admin.Name')}}</th>                
                                <th>{{__('admin.description')}}</th>                         
                                <th>{{__('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->Name}}</td>
                                <td>{{$service->Description}}</td>
                               
                             <td>
                                <button type="button" class="btn btn-primary"> <a href="{{ route('services.show',$service->id) }}" class="btn btn-default btn-xs">
                                            Show
                                        </a></button>
                                  <button type="button" class="btn btn-success"> <a href="{{ route('services.edit',$service->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                  <button type="button" class="btn btn-danger"> <a href="{{ route('services.destroy',$service->id) }}" class="btn btn-default btn-xs">
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