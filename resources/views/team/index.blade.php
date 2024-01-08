@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('Css/custom/pagination.css') }}">
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Teams</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 </head>
<div class="pagetitle">
    <h1>{{__('admin.Team')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Team')}}</li>
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
                            @foreach($teams as $team)
                            <tr>
                                <th scope="row">{{$team->id}}</th>
                                <td>{{$team->Name}}</td>
                                <td>{{$team->Title}}</td>
                                <td><img src="{{ asset('images/'.$team->Image) }}" width="130" height="120" ></td>
                                <td>
                                  <button type="button" class="btn btn-success"> <a href="{{ route('teams.edit',$team->id) }}" class="btn btn-default btn-xs">
                                            Edit
                                        </a></button>
                                  <button type="button" class="btn btn-danger"> <a href="{{ route('teams.destroy',$team->id) }}" class="btn btn-default btn-xs">
                                            Delete
                                        </a></button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <ul class="pagination pagination-sm center-pagination">
                     {{ $teams->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
                   </ul>



                </div>
            </div>


        </div>
    </div>
</section>
</body>

</html>
@endsection