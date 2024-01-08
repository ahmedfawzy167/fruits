@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('Css/custom/pagination.css') }}">
@endsection
<div class="pagetitle">
    <h1>{{__('admin.Products')}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item">{{__('admin.Products')}}</li>
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
                        <th>{{__('admin.image')}}</th>
                        <th>{{__('admin.price')}}</th>
                        <th>{{__('admin.Categories')}}</th>
                        <th>{{__('admin.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <td>{{$product->Name}}</td>
                        <td>{{$product->Description}}</td>
                        <td><img src="{{ asset('images/'.$product->Image) }}" width="80" height="120"></td>
                        <td>${{$product->Price}}</td>
                        <td>
                            @if(isset($product->category))
                            {{$product->category->Name}}
                            @endif
                        </td>
                        <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" style="margin-right: 8px;"> <a href="{{ route('products.show',$product->id) }}" class="btn btn-default btn-xs">
                                    View
                                </a></button>
                            <button type="button" class="btn btn-success" style="margin-right: 8px;"> <a href="{{ route('products.edit',$product->id) }}" class="btn btn-default btn-xs">
                                    Edit
                                </a></button>
                            <button type="button" class="btn btn-danger"> <a href="{{ route('products.destroy',$product->id) }}" class="btn btn-default btn-xs">
                                    Delete
                                </a></button>

                        </td>
                       </div>  
                    </tr>
                    @endforeach
                </tbody>

            </table>
            </div>
            <ul class="pagination pagination-sm center-pagination">
                <!-- {{ $products->links() }} -->
                {{ $products->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
            </ul>
            <!-- End Table with stripped rows -->

        </div>


    </div>


    </div>
    </div>
</section>
@endsection