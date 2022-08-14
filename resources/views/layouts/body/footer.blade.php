<!-- Footer
		============================================= -->
		<footer id="footer">
			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">
					@php
					$contacts = DB::table('contacts')->first();
					$settings = DB::table('settings')->first();
				  @endphp
					<div class="row justify-content-between col-mb-30">
						<div class="col-12 col-md-auto text-center text-md-left">
							جميع الحقوق محفظوظة &copy; 2020 <a href="{{url('/')}}">
								
							@if(isset($settings->site_name) && $settings->site_name != '')
							{{$settings->site_name}}

							@endif
						
						
						</a> <br>
						</div>
						
					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->