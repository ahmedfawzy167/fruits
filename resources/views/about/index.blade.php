@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>About us</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item">About us</li>
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
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>                
                                <th scope="col">Description</th>                         
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aboutus as $about)
                            <tr>
                                <th scope="row">{{$about->id}}</th>
                                <td>{{$about->Name}}</td>
                                <td>{{$about->Description}}</td>
                               
                                <td>
                                  <button type="button" class="btn btn-success"> <a href="{{ route('aboutus.edit',$about->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                  <button type="button" class="btn btn-danger"> <a href="{{ route('aboutus.destroy',$about->id) }}" class="btn btn-default btn-xs">
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