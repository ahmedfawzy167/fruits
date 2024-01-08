@extends('layouts.app')
@section('content')
<div class="pagetitle">
  <h1>{{ __('admin.Dashboard') }}</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">{{ __('admin.Home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('admin.Dashboard') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">{{__('admin.All Customers')}}</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$users}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">


                        <div class="card-body">
                            <h5 class="card-title">{{__('admin.Products Sales')}}</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>$ {{$priceCount}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">



                        <div class="card-body">
                            <h5 class="card-title">{{__('admin.Brand Count')}} </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$brandCount}}</h6>

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->


                  <!-- Customers Card -->
                  <div class="col-xxl-4 col-xl-12">

       <div class="card info-card customers-card">

     <div class="card-body">
        <h5 class="card-title">{{__('admin.Total orders')}} </h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
            </div>
            <div class="ps-3">
                <h6>{{ $ordersCount }}</h6>

            </div>
        </div>

    </div>
</div>

</div><!-- End Customers Card -->


                  


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders Table</h5>
              @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                  <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                    <td>{{ $order->product->Name }}</td>
                    <td>${{ $order->product->Price }}</td>
                    <td><img src="{{ asset('images/'.($order->product)->Image) }}" width="100px"></td>
                    <td><button type="submit" class="btn btn-warning"> {{ $order->status }}</button></td>
                    <td><form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Accept</button></form>
                   </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
          </section>
    
                <!-- Recent Sales -->
                <div class="col-10">
                    <div class="card recent-sales overflow-auto">



                        <div class="card-body">
                            <h5 class="card-title"> Products <span>| This Month</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <th scope="row"><a href="#">#{{$product->id}}</a></th>
                                        <td>{{$product->Name}}</td>
                                        <td><img src="{{ asset('images/'.$product->Image) }}" width="100px"></td>
                                        <td>${{$product->Price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->


            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->

    </div>
</section>
@endsection