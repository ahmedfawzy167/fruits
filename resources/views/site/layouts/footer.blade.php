<!-- footer -->
<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>A fruit is generally a fleshy seed associated part of a particular plant; it is naturally and mostly edible and sweet in the raw state. By and large each and everyone in this world love fruit, though there are exceptions, we still will have a majority of folks who love fruits. It is something which has both taste and nutrients.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>{{settings()->location}}</li>
							<li>{{settings()->email}}</li>
							<li>{{settings()->phone}}</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="{{route('home.site')}}">Home</a></li>
							<li><a href="{{route('site.aboutus.index')}}">About</a></li>
							<li><a href="{{route('site.product.all')}}">Products</a></li>
							<li><a href="{{route('blog.index')}}">Blogs</a></li>
							<li><a href="{{route('register.create')}}">Registeration</a></li>
							<li><a href="{{route('signin.index')}}">Login</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="{{ asset('site/assets/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('site/assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{ asset('site/assets/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{ asset('site/assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{ asset('site/assets/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('site/assets/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('site/assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{ asset('site/assets/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{ asset('site/assets/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{ asset('site/assets/js/main.js')}}"></script>

