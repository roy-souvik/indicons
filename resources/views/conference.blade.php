@extends('layouts.indicons.main-layout')
@section('content')
<style>
   .text-container {
   min-height: 100px;
   margin-bottom: 30px;
   }
   .flex-cont {
   color: #002e91;
   }
   .tab {
   -webkit-border-top-right-radius: 30px;
   -webkit-border-bottom-right-radius: 30px;
   -moz-border-radius-topright: 30px;
   -moz-border-radius-bottomright: 30px;
   border-top-right-radius: 30px;
   border-bottom-right-radius: 30px;
   background: -webkit-linear-gradient(top, #7579ff, #b224ef);
   color: #fff;
   display: table;
   padding: 9px 30px 9px 16px;
   font-size: 19px;
   position: relative;
   left: -20px;
   font-weight: 600;
   }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>

<div class="inner-pg-box-1">
    Page Under Constraction
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'> </script>
<script>
   $(document).ready(function() {
       $("#news-slider").owlCarousel({
           items : 4,
           itemsDesktop:[1199,3],
           itemsDesktopSmall:[980,2],
           itemsMobile : [600,1],
           navigation:true,
           navigationText:["",""],
           pagination:true,
           autoPlay:true
       });
   });
</script>
<script>
   $(document).ready(function() {
       $("#news-slider1").owlCarousel({
           items : 4,
           itemsDesktop:[1199,3],
           itemsDesktopSmall:[980,2],
           itemsMobile : [600,1],
           navigation:true,
           navigationText:["",""],
           pagination:true,
           autoPlay:true
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