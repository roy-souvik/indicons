@extends('layouts.indicons.main-layout')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
<h1>Scientific</h1>



<div class="inner-page-confr">

<h2>Scientific committee</h2>

       <!-- Topic Cards -->
     
	<div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
  <img src="indicons/images/dr1.jpg" />
                                </div>
                                <div class="text-container">
                                    <h6>Title 01</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
<img src="indicons/images/dr1.jpg" />
                                </div>
                                <div class="text-container">                                    
                                    <h6>Title 02</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                 <img src="indicons/images/dr2.jpg" />
                                </div>

                                <div class="text-container">
                                    <h6>Title 03</h6>
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
<img src="indicons/images/dr3.jpg" />
                                </div>
                                <div class="text-container">
                                    <h6>Title 04</h6>
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
	
	
	<h2>Workshops</h2>
	
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


	<h2>Program schedule</h2>
	
	<div class="inner-pg-box">
 
 <div class="row">

 

<div class="col-md-12">

  <h3> 27 / 28 / 29 January 2022 </h3>
 
	  
	  </div>
	  
	  
	  </div>

</div>


	<h2>Vaicon 2023 secretariate</h2>
	
	<div class="inner-pg-box">
 
 

 

<div class="col-md-12">

   <h3>Dr. Jayanta Das </h3>
<h5>Amri Hospital </h5>

<p>Saltlake, Kolkata </p> 
	  
	  </div>
	  
	  
 

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
