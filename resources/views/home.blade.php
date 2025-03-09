   <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>{{ config('app.name', 'Indicons') }}</title>
      <!-- Favicon-->
      <link rel="icon" type="image/x-icon" href="indicons/assets/favicon.ico" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="indicons/css/styles.css" rel="stylesheet" />
      <link href="indicons/css/style.css" rel="stylesheet" />
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
         .modal {
         z-index: 999999;
         }
         .ticker_item {
         cursor: pointer;
         }
         .blink-box{
         }
         .blink-soft{       text-align: center;
         padding: 38px 0px 20px;
         font-size: 30px;
         color: #000;
         font-weight: 600;
         font-family: "Roboto", serif !important;
         /*text-shadow: 0px 1px 1px rgba(0,0,0,0.6);*/
         }
         .blink-soft span{color: #b91616;
         font-weight: 600;
         font-family: "Roboto", serif !important;
         }
         .blink-soft {
         animation: blinker 2.5s linear infinite;
         }
         @keyframes blinker {
         50% {
         opacity: 0;
         }
         }
      </style>
   </head>
   <body>
      <!--<div id="myModal" class="modal fade" tabindex="-1" style="z-index:999999">-->
      <!--   <div class="modal-dialog  modal-lg">-->
      <!--      <div class="modal-content">-->
      <!--         <div class="modal-header" style="height:auto; padding:0px!important; margin:0px!important;">-->
      <!--            <h5 class="modal-title"></h5>-->
      <!--            <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>-->
      <!--         </div>-->
      <!--         <div class="modal-body">-->
      <!--            <img src="indicons/images/guest1.jpg" style="width:100%">-->
      <!--         </div>-->
      <!--         <div class="modal-footer">-->
      <!--            <a target="_blank" href="indicons/images/guest1.jpg" class="btn btn-secondary">Download</a>   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
       <div class="ticker-wrap">
            <div class="ticker">
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
               15th INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
                   15th INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
                   15th INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
                   15th INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
            </div>
         </div>
      @include('layouts.indicons.header')
      @include('layouts.indicons.navigation')
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="indicons/images/banner-1.jpg" class="d-block w-100" alt="...">
            </div>
            <!--<div class="carousel-item">-->
            <!--   <img src="indicons/images/banner-2.jpg" class="d-block w-100" alt="...">-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--   <img src="indicons/images/banner-3.jpg" class="d-block w-100" alt="...">-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--   <img src="indicons/images/banner-4.jpg" class="d-block w-100" alt="...">-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--   <img src="indicons/images/banner-5.jpg" class="d-block w-100" alt="...">-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--   <img src="indicons/images/banner-6.jpg" class="d-block w-100" alt="...">-->
            <!--</div>-->
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
      </div>
      </div>

         <!--<div class="ticker-wrap">-->
         <!--   <div class="ticker">-->
         <!--      <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">-->
         <!--         <blink> <strong style="color:#FFFF00">Venous association of india presents</strong> </blink>-->
         <!--         servier young researchers' award.-->
         <!--      </div>-->
         <!--      <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">-->
         <!--         <blink> <strong style="color:#FFFF00">Venous association of india presents</strong> </blink>-->
         <!--         servier young researchers' award.-->
         <!--      </div>-->
         <!--      <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">-->
         <!--         <blink> <strong style="color:#FFFF00">Venous association of india presents</strong> </blink>-->
         <!--         servier young researchers' award.-->
         <!--      </div>-->
         <!--      <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">-->
         <!--         <blink> <strong style="color:#FFFF00">Venous association of india presents</strong> </blink>-->
         <!--         servier young researchers' award.-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <div class="container">
            <div class="blink-box">
               <div class="blink-soft"> <span>15th INPALMS 2025 </span> The Westin. New Town. Kolkata - INDIA<span> 9th 10th 11th November 2025</span> </div>
            </div>
         </div>
 
         @include('partials.countdown')

 
            <section class="video-sec-bottom">
                <div class="container">
                    <div class="row partner-wrapper">
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo1.png">
                             <h2> INTERNATIONAL ASSOCIATION OF CLINICAL FORENSIC MEDICINE </h2>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo2.png">
                             <h2> INTERNATIONAL ASSOCIATION OF FORENSIC SCIENCES</h2>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo3.png">
                             <h2> WEST BENGAL NETIONAL UNIVERSITY OF JURIDICAL SCIENCES, KOLKATA</h2>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo4.png">
                             <h2> BRAZILIAN ASSOCIATION OF LEGAL MEDICINE AND MEDICAL EXPERTISE </h2>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo5.png">
                             <h2> ALL INDIA INSTITUTE OF MEDICAL SCIENCES, KALYANI</h2>
                          </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            
            <section class="doctor-sec-bottom">
                <div class="container">
                    <div class="row partner-wrapper">
                        <div class="col-md-3">
                           <div class="doctor-sec-bottom-inner">
                             <img src="indicons/images/D-2.jpeg">
                             <div class="main-name"> DR. ROHAN RUWANPURA <br><span>Sri Lanka</span></div>
                             <p>The President, INPALMS</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                           <div class="doctor-sec-bottom-inner">
                             <img src="indicons/images/D-1.jpeg">
                             <div class="main-name"> DR. YANKO G. KOLEV <br><span>Bulgaria</span> </div>
                             <p>The President, IAFS</p>
                          </div>
                        </div>
                        
                         
                        
                        <div class="col-md-3">
                           <div class="doctor-sec-bottom-inner">
                             <img src="indicons/images/D-4.jpeg">
                             <div class="main-name"> PROF. P. ANURUDDHI S. EDIRISINGHE <br><span>Sri Lanka</span></div>
                             <p>The President, IACFM</p>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                           <div class="doctor-sec-bottom-inner">
                             <img src="indicons/images/D-3.jpeg">
                             <div class="main-name"> DR. FLAVIA PEREIRA COSTA <br><span>Brazil</span></div>
                             <p>The President, ABMLPM</p>
                          </div>
                        </div>
                        
                         
                      
                        
                    </div>
                </div>
            </section>
 
         <section class="video-sec">
         <div class="container">
             <h2 class="video-sec-content">Our<span>&nbsp;Videos</span></h2>

            <div class="row">

               <div class="col-md-12">
                  <div id="news-slider" class="owl-carousel">
                     <div class="post-slide">
                        <iframe width="100%" height="315" src="indicons/images/inpalms.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                     <div class="post-slide">
                        <iframe width="100%" height="315" src="indicons/images/inpalms-1.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                     <div class="post-slide">
                        <iframe width="100%" height="315" src="indicons/images/inpalms.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </section>


         <section class="video-sec-bottom">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                   <div class="video-sec-bottom-inner">
                  <a href="/accommodation">

                     <img src="indicons/images/A-1.png">
                     <h2> ACCOMMODATION </h2>
                  </a>
                  </div>
               </div>
               <!--<div class="col-md-3">
                   <div class="video-sec-bottom-inner">
                  <a href="https://inpalms2025.com/scientific">
                     <img src="indicons/images/P-1.png">
                     <h2> PROGRAM </h2>
                  </a>
                  </div>
               </div>-->
               <!--<div class="col-md-3">
                   <div class="video-sec-bottom-inner">
                  <a href="/conference">
                     <img src="indicons/images/S-1.png" >
                     <h2> SPEAKERS </h2>
                  </a>
                  </div>
               </div>-->
               <div class="col-md-3">
                   <div class="video-sec-bottom-inner">
                  <a href="/information#travel">
                     <img src="indicons/images/T-1.png" >
                     <h2> TRAVEL TO KOLKATA </h2>
                  </a>
                  </div>
               </div>
            </div>
         </div>
         </section>


      <div class="top-box-bottom">
         <div class="container">
             <h2 class="video-sec-content"><span>15th INPALMS 2025</span>&nbsp;KOLKATA. INDIA.</h2>
             <div class="sec-head-des">Joint conference of Indo Pacific Association of Law Medicine and Science (INPALMS) and Indian Academy of Medicolegal Experts (IAMLE)</div>
            <div class="row">
               <div class="col-md-6">
                   <div class="conference-sec">
                       <div class="conference-sec-img"> <img src="indicons/images/con-1.webp" ></div>
                       <div class="conference-sec-img-des">
                           <div class="conference-sec-img-des-name">Prof. (Dr.) Adarsh Kumar</div>
                           <div class="conference-sec-img-des-designation">Organizing Chairman</div>

                           <div class="conference-sec-img-des-bio">Secretary General - INPALMS & The President - IAMLE</div>
                       </div>

                   </div>
               </div>

                <div class="col-md-6">
                   <div class="conference-sec">
                       <div class="conference-sec-img"> <img src="indicons/images/con-2.webp" ></div>
                       <div class="conference-sec-img-des">
                           <div class="conference-sec-img-des-name">Dr. Jayanta Das</div>
                           <div class="conference-sec-img-des-designation">Organizing Secretary</div>

                           <div class="conference-sec-img-des-bio">Vice President, IAMLE</div>
                       </div>

                   </div>
               </div>
            </div>
         </div>
      </div>
      <div class="box-bottom-main">
         <div class="box-bottom-last">
            <div class="box-bottom_a">
               <div class="container">

               </div>
            </div>
            <div class="container">
               <div class="row" style="align-items: center;">

                  <div class="col-md-2">
                     <ul>
                        
                        <li>
                           <a href="{{route('information.home')}}">
                           <i class="fa fa-angle-right" aria-hidden="true"></i>
                           Information
                           </a>
                        </li>
                        
                        <li> <a href="{{route('abstract.submitpage')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                           Abstracts </a>
                        </li>
                        <li> <a href="{{route('conference-register.show')}}"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                           Registration </a>
                        </li>
                   <!--     <li>
                           <a href="{{route('about')}}">
                           <i class="fa fa-angle-right" aria-hidden="true"></i>
                           About Us
                           </a>
                        </li>-->
                        <li>
                           <a href="{{route('contactus.show')}}">
                           <i class="fa fa-angle-right" aria-hidden="true"></i>
                           Contact Us
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-3">
                     <ul>
                        <li> <a href="{{route('accommodation.home')}}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Accommodation </a> </li>
                         <!--<li> <a target="_blank" href="https://venous.in"><i class="fa fa-angle-right" aria-hidden="true"></i> VAI </a> </li>-->
                         <li> <a href="{{route('tnd')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Terms & Conditions</a> </li>
                        <li> <a href="{{route('refund')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Refund Policy</a> </li>
                        <li> <a href="{{route('privacypolicy')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Privacy policy</a> </li>
                     </ul>
                  </div>
                  <div class="col-md-7">  <div class="box-bottom-a-box">
                     <div class="row">
                        <div class="col-md-6">
                           <h3>ORGANIZING SECRETARY</h3>
                           <h4> Dr. Jayanta Das </h4>
                           <!--<p>Manipal Hospitals</p>-->
                           <!--<p> Salt lake, Kolkata </p>-->
                           <!--<h4>Supported By</h4>-->
                           <!--<p><img style="height: auto;-->
                           <!--   max-width: 214px;" src="indicons/images/manipal-hospitals-broadway.webp"> </p>-->
                        </div>
                        <div class="col-md-6">
                           <h3>VENUE INFORMATION </h3>
                           <p>The Westin. New Town. Kolkata - INDIA<br>
                           </p>
                           <p>
                             
							 
				
							 
							 
							 
							 
							 
							 
                           </p>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       ...
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
						
						
				<div class="col-md-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.6529321601374!2d88.47183427435384!3d22.592080532257835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027549287696d5%3A0xbdd849b4c2cf930b!2sThe%20Westin%20Kolkata%20Rajarhat!5e0!3m2!1sen!2sin!4v1741446518704!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			 
				
				</div>		
						
						
                     </div>
                  </div></div>
               </div>
               <div style="clear:both;"></div>
               <p style="color:#fff; text-align:center;">© 2025 Inpalms All rights reserved. </p>
            </div>
         </div>
      </div>
      <!--<div id="myModal" class="modal fade" tabindex="-1">-->
      <!--   <div class="modal-dialog  modal-lg">-->
      <!--      <div class="modal-content">-->
      <!--         <div class="modal-header" style="height:auto; padding:0px!important; margin:0px!important;">-->
      <!--            <h5 class="modal-title"></h5>-->
      <!--            <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>-->
      <!--         </div>-->
      <!--         <div class="modal-body">-->
      <!--            <img src="indicons/images/pdf1-1.png" style="width:100%">-->
      <!--            <img src="indicons/images/pdf2-1.png" style="width:100%">-->
      <!--         </div>-->
      <!--         <div class="modal-footer">-->
      <!--            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      @include('layouts.indicons.scripts')
      <script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'> </script>
      <script>
         $(function() {
             addCountdownTimer();

             $('.showbutton').on('click', function() {
                 $(this).siblings('.showcase p').slideToggle();
                 $(this).text(function(i, v) {
                     return v === 'less' ? 'Read More' : 'less'
                 });
             });

             $("#news-slider").owlCarousel({
                 items: 3,
                 itemsDesktop: [1199, 3],
                 itemsDesktopSmall: [980, 2],
                 itemsMobile: [600, 1],
                 navigation: true,
                 navigationText: ["", ""],
                 pagination: true,
                 autoPlay: true
             });
         });
      </script>
      <script>
         $(document).ready(function(){
             $("#myModal").modal('show');
         });

      </script>
   </body>
</html>
