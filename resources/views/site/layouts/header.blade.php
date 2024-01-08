
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- title -->
	<title>Fruitkha</title>

	<style>
     .input-group-append {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      }
     .btn-login {
       position: relative;
       top: -20px; /* Adjust the value as needed to move the button up */
       }

    </style>

	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('site/assets/img/favicon.png') }}">

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/all.min.css') }}">
    <!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('site/assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/main.css') }}">

	<!-- modal -->
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('site/assets/css/responsive.css') }}">


</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route('home.site') }}">
								<img src="{{ asset('site/assets/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a class="nav-link scrollto @if (Route::currentRouteName() == 'home.site') active @endif " href="{{ route('home.site') }}">HOME</a></li>
								<li><a class="nav-link scrollto @if (Route::currentRouteName() == 'site.aboutus.index') active @endif " href="{{ route('site.aboutus.index') }}">ABOUT US</a></li>
								<li><a class="nav-link scrollto @if (Route::currentRouteName() == 'site.product.all') active @endif " href="{{ route('site.product.all') }}">PRODUCTS</a></li>
								<li><a class="nav-link scrollto @if (Route::currentRouteName() == 'blog.index') active @endif " href="{{ route('blog.index') }}">BLOGS</a></li>
								@if (Auth::guest()) @auth  @php  $userRegistered = Auth::user()->registrations()->exists();  @endphp
                                @if ($userRegistered)
                                <li style="display: none;">
                                <a class="nav-link scrollto @if (Route::currentRouteName() == 'register.create') active @endif" href="{{ route('register.create') }}">REGISTRATION</a>
                               </li>
                               @else <li><a class="nav-link scrollto @if (Route::currentRouteName() == 'register.create') active @endif" href="{{ route('register.create') }}">REGISTERATION</a></li> @endif   @else
							   <li>
                                <a class="nav-link scrollto @if (Route::currentRouteName() == 'register.create') active @endif" href="{{ route('register.create') }}">REGISTRATION</a>
                               </li>  @endauth @endif
								@auth  @else <li><span type="button" style="font-weight: 700;" class="button-login" data-toggle="modal" data-target="#loginModal" onmouseover="this.style.color='orange';" onmouseout="this.style.color='white';">LOGIN</span></li>  @endauth


								@if(Auth::check())
                               <li><a href="{{ route('home.site') }}" style="color: white; font-weight: 700;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" onmouseover="this.style.color='orange';" onmouseout="this.style.color='white';">LOGOUT</a></li>
                               <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                               @csrf
                              </form>
                               @endif
                                <li>
						        <div class="header-icons">
								<a class="shopping-cart" href="{{ route('site.cart') }}"><i class="fas fa-shopping-cart">@if (!session('orderPlaced')) <!-- Check if orderPlaced is not set in session -->
                                 [{{ cartGet() }}]
                                 @endif</i></a>
								<a class="shopping-cart" href="{{ route('site.wishlist') }}"><i class="fas fa-heart">[{{wishlistGet()}}]</i></a>

								 </div>
								</li>
							</ul>
						</nav>

						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
     <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('signin.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope icon"></i> Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group password-toggle">
                        <label for="password"><i class="fa fa-key icon"></i> Password</label>
						<div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
						<div class="input-group-append">
						<span class="input-group-text toggle-password">
                        <i class="fa fa-eye"></i>
						</span>
                        </div>
						</div>
						</div>
						@error('password')
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary btn-login d-block mx-auto" style="display: block; margin: 0 auto;">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {

$('.toggle-password').click(function() {

  var parent = $(this).closest('.input-group');
  var password = parent.find('input');

  if (password.attr('type') == 'password') {
	password.attr('type', 'text');
	$('.fa', this).removeClass('fa-eye').addClass('fa-eye-slash');
  } else {
	password.attr('type', 'password');
	$('.fa', this).removeClass('fa-eye-slash').addClass('fa-eye');
  }

});

});
</script>




	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

</body>
</html>
