@extends('layouts.master_home')

@section('home_content')
    <!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

				<div class="row clearfix">
					@php
					$services = DB::table('services')->latest()->get();
					@endphp
					@foreach($services as $service)
					<div class="col-lg-4 center bottommargin">
						<i class="{{$service->icon}}" style="margin-bottom: 20px;"></i>
						<div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
							<h4>{{$service->title}}</h4>
						</div>
						<p>{{$service->desc}}</p>
					</div>
					@endforeach
				</div>


					

					<div id="portfolio" class="line mt-0"></div>

					@php
					$portfolio = DB::table('portfolios')->latest()->get();
					@endphp
				<h3 class="center">بعض <span>أخر</span> أعمالنا <span class="badge badge-danger">{{count($portfolio)}}</span></h3>

					<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="1" data-loop="true" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="4">
					
						@foreach($portfolio as $item)
						<div class="portfolio-item">
							<div class="portfolio-image position-relative">
								<a href="portfolio-single.html">
									<img src="{{ $item->img  }}" alt="Open Imagination">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
										<a target="_blank" href="{{$item->url}}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a target="_blank" href="{{$item->url}}">{{$item->name}}</a></h3>
								<span>{{$item->tag}}</span>
							</div>
						</div>
						@endforeach

					</div>

					<div class="line"></div>

					<h3 class="center">ماذا <span>يقول</span> العملاء</h3>

					<div class="fslider testimonial testimonial-full shadow-none border-0 p-0 mx-auto" data-animation="fade" data-arrows="false" style="max-width: 700px;">
						<div class="flexslider">
							<div class="slider-wrap">
								@php
						$testmonials = DB::table('testmonials')->latest()->get();
						@endphp
						@foreach($testmonials as $testmonial)
								<div class="slide">
									<div class="testi-content">
										<p>{{$testmonial->text}}</p>
										<div class="testi-meta">
											{{$testmonial->user}}
											
										</div>
									</div>
								</div>
								@endforeach
								

							</div>
						</div>
					</div>

					<div id="testmonials" class="line"></div>

					<div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="100" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6">
						@php
						$brands = DB::table('brands')->latest()->get();
						@endphp
						@foreach($brands as $brand)
						<div class="oc-item"><a href="#"><img class="img-fluid" src="{{$brand->brand_image}}" alt="Clients"></a></div>
						@endforeach
						
					</div>


				</div>
			</div>
		</section><!-- #content end -->

		<!-- Google Map
		============================================= -->
		<section class="gmap">
			<iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
		</section>

		<!-- Content
		============================================= -->
		<section class="contact">
			<div class="content-wrap">
				<div class="container">

					<div class="row gutter-40 col-mb-80" id="contact">
						<!-- Postcontent
						============================================= -->
						<div class="postcontent col-lg-9">

							<h3>تواصل معنا</h3>


							@if(session('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
						 <strong>{{ session('success') }}</strong>  
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						   <span aria-hidden="true">&times;</span>
						 </button>
						  </div>
						  @endif

								<form class="mb-0" action="{{ route('contact.form') }}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-4 form-group">
											<label for="template-contactform-name">الإسم <small>*</small></label>
											<input type="text" name="name" class="form-control"   placeholder="الإسم"   />
										</div>

										<div class="col-md-4 form-group">
											<label for="template-contactform-email">البريد الإلكتروني <small>*</small></label>
											<input type="email" class="form-control" name="email"  placeholder="البريد الإلكتروني"   />										</div>

										<div class="col-md-8 form-group">
											<label for="template-contactform-subject">الموضوع <small>*</small></label>
											<input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع"   />										</div>

										
										<div class="col-12 form-group">
											<label for="template-contactform-message">الرسالة <small>*</small></label>
											<textarea class="form-control" name="message" rows="5"   placeholder="الرسالة"></textarea>
										</div>


										<div class="col-12 form-group">
											<button class="button button-3d m-0" type="submit">أرسل</button>
										</div>
									</div>


								</form>

						</div><!-- .postcontent end -->
						@php
						$contacts = DB::table('contacts')->first();
						$settings = DB::table('settings')->first();
					  @endphp
						<!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-3">
							@if(isset($contacts->address) && $contacts->address != '')
							<address>
								<strong>العنوان:</strong><br>
								{{ $contacts->address }}<br>
							</address>
							@endif
							@if(isset($contacts->phone) && $contacts->phone != '')
							<abbr title="Phone Number"><strong>الهاتف:</strong></abbr> {{ $contacts->phone }}<br>
							@endif
							@if(isset($contacts->email ) && $contacts->email != '')
							<abbr title="Email Address"><strong>البريد الإلكتروني:</strong></abbr> {{ $contacts->email }}
							@endif
							<div class="widget border-0 pt-0">

								

							</div>

							<div class="widget border-0 pt-0">
								@if(isset($settings->facebook) && $settings->facebook != '')
								<a href="{{$settings->facebook}}" class="social-icon si-small si-dark si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								@endif
								@if(isset($settings->twitter) && $settings->twitter != '')
								<a href="{{$settings->twitter}}" class="social-icon si-small si-dark si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								@endif
								@if(isset($settings->youtube) &&  $settings->youtube != '')
								<a href="{{$settings->youtube}}" class="social-icon si-small si-dark si-youtube">
									<i class="icon-youtube"></i>
									<i class="icon-youtube"></i>
								</a>
								@endif
								@if(isset($settings->linkedin) && $settings->linkedin != '')
								<a href="{{$settings->linkedin}}" class="social-icon si-small si-dark si-linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
								@endif
								@if(isset($settings->github) && $settings->github != '')
								<a href="{{$settings->github}}" class="social-icon si-small si-dark si-github">
									<i class="icon-github"></i>
									<i class="icon-github"></i>
								</a>
								@endif
							</div>

						</div><!-- .sidebar end -->
					</div>

				</div>
			</div>
		</section><!-- #content end -->

    @endsection