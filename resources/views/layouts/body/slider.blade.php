@php 
 $sliders = DB::table('sliders')->get();

@endphp
<section id="slider" class="slider-element boxed-slider">

  <div class="bg-overlay">  </div>



    <div id="oc-slider" class="owl-carousel carousel-widget" data-items="1" data-loop="true" data-nav="true" data-autoplay="5000" data-animate-in="fadeIn" data-animate-out="fadeOut" data-speed="800">
      @foreach($sliders as $key => $slider)
     <img src="{{asset($slider->image)}}" alt="Slider">
      @endforeach

    </div>



</section>

