<!-- Header
		============================================= -->
		<header id="header" data-sticky-shrink="false" class="header-size-md border-bottom-0">
				<div class="header-row flex-column flex-lg-row justify-content-center justify-content-lg-start">

					<!-- Logo
					============================================= -->
					<div id="logo" class="mr-0 mx-lg-auto my-4">
            @php
              $settings = DB::table('settings')->first();
            @endphp
						@if(isset($settings->logo) && $settings->logo != '')
						<a href="{{url('/')}}" class="standard-logo"><img src="{{$settings->logo}}" alt=""></a>
						@endif
					</div><!-- #logo end -->

				</div>

			<div id="header-wrap">
					<div class="header-row justify-content-between">

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu flex-lg-grow-1">

							<ul class="menu-container justify-content-lg-center">
								<li class="menu-item">
									<a class="menu-link" href="#"><div>الرئيسية</div></a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="#content"><div>خدماتي</div></a>
								</li>
								<li class="menu-item mega-menu">
									<a class="menu-link" href="#portfolio"><div>أعمالي</div></a>
								</li>
								{{-- <li class="menu-item">
									<a class="menu-link" href="shop.html"><div>عملائي</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href="shop.html"><div>4 Columns</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="shop.html"><div>4 Columns</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="shop.html"><div>4 Columns</div></a>
										</li>
									</ul>
								</li> --}}
								<li class="menu-item mega-menu">
									<a class="menu-link" href="#testmonials"><div>عملائي</div></a>
								</li>
                <li class="menu-item mega-menu">
									<a class="menu-link" href="#contact"><div>اتصل بي</div></a>
								</li>
							</ul>

						</nav><!-- #primary-menu end -->				

					</div>

			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->