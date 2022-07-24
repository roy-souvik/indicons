@extends('layouts.indicons.main-layout')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
<h1>Information  </h1>


<div class="inner-page-confr">

<h2>Venue</h2>

       <!-- Topic Cards -->
     
	<div class="inner-pg-box">
 
 <div class="row">

<div class="col-md-3">

<div class="flex-cont">

<h1>ITC Sonar </h1>
<p> Luxury Hotel in Kolkata </p>

</div>

</div>

<div class="col-md-9">

 <div id="news-slider" class="owl-carousel" style="margin-top:0px;">
      
         
                <div class="post-slide">
				
  <img src="indicons/images/sonar-1.webp" style="max-width:100%;">		
			 
             </div>   
                  <div class="post-slide">       
  <img src="indicons/images/sonar-2.webp" style="max-width:100%;">
        
         
             </div>
		       
      </div>
	  
	  </div>
	  
	  
	  </div>

</div>
	
	
	
<h2>Important dates</h2>

       <!-- Topic Cards -->
     
	<div class="inner-pg-box">
	
	<h4> Dates </h4>
	</div>	
	
	
<h2>About kolkata</h2>	
 <div class="inner-pg-box">	
	
 <p>Raja Rammohan Roy Smriti Mandir precincts Radhanagar, Hooghly, Residential Building of Raja Rammohan Roy and Precincts at Raghunathpur, Hooghly and Circarena Theatre Kolkata. </p>
		</div>





<h2>Travel to kolkata	</h2>	
 
 <div class="inner-pg-box">	
	
 <p>Raja Rammohan Roy Smriti Mandir precincts Radhanagar, Hooghly, Residential Building of Raja Rammohan Roy and Precincts at Raghunathpur, Hooghly and Circarena Theatre Kolkata. </p>
		</div>


<h2>Places to visit</h2>	
<div class="inner-pg-box">
 
 <div class="row">

 

<div class="col-md-12">

 <div id="news-slider-a" class="owl-carousel" style="margin-top:0px;">
      
         
                <div class="post-slide">
				
  <img src="indicons/images/sonar-1.webp" style="max-width:100%;">		
			 
             </div>   
                  <div class="post-slide">       
  <img src="indicons/images/sonar-2.webp" style="max-width:100%;">
        
         
             </div>
		       
      </div>
	  
	  </div>
	  
	  
	  </div>

</div>


<h2>Vaicon 2023 secretariate	</h2>	
  <div class="inner-pg-box">
  
  
  </div>
	
	</div>










 







<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'> </script>

<script>
$(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 2,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:false
    });
});
</script> 


<script>
$(document).ready(function() {
    $("#news-slider-a").owlCarousel({
        items : 2,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:false
    });
});
</script> 




<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});

</script>







@stop
