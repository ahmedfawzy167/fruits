@extends('site.layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('Css/custom/pagination.css') }}">
@endsection
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Organic Information</p>
						<h1>News Article</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
             @foreach($blogs as $blog)
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="{{ route('blog.show', $blog->id) }}"><img src="{{ asset('images/'.$blog->image) }}"></a>
						<div class="news-text-box">
							<h3><a href="#">{{ $blog->title }}</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">{{ $blog->short_description }}</p>
							<a href="{{ route('blog.show', $blog->id) }}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
    
				</div>
                @endforeach

                </div>

               </div>

              </div>
			  
			  <ul class="pagination pagination-sm center-pagination">
                {{ $blogs->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
            </ul>
	<!-- end latest news -->
@endsection