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
   </head>

   <body>
       @include('layouts.indicons.header')

       @include('layouts.indicons.navigation')

       <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
           <div class="carousel-inner">
               <div class="carousel-item active">
                   <img src="indicons/images/banner-1.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                   <img src="indicons/images/banner-2.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                   <img src="indicons/images/banner-3.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                   <img src="indicons/images/banner-4.jpg" class="d-block w-100" alt="...">
               </div>

               <div class="carousel-item">
                   <img src="indicons/images/banner-5.jpg" class="d-block w-100" alt="...">
               </div>

               <div class="carousel-item">
                   <img src="indicons/images/banner-6.jpg" class="d-block w-100" alt="...">
               </div>

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

       <div class="top-box">

           <style>
               #countdown {
                   text-align: center;
                   display: table;
                   margin: auto;
                   padding: 21px 60px;
                   border-radius: 200px;
                   position: absolute;
                   top: -167px;
                   width: auto;
                   right: 0px;
               }

               #countdown ul {
                   padding: 0px;
                   margin: 0px;
               }

               #countdown h1 {
                   letter-spacing: .125rem;
                   text-transform: uppercase;
                   font-size: 25px;
                   font-weight: 600;
                   color: #fff;
                   margin-bottom: 0px;
               }

               #countdown li {
                   display: inline-block;
                   font-size: 1.5em;
                   list-style-type: none;
                   padding: 0px 1.5em;
                   text-transform: uppercase;
                   background-color: rgba(0, 0, 0, 0.7);
               }

               #countdown li span {
                   display: block;
                   font-size: 3.5rem;
                   font-weight: 900;
                   color: #ffffff;
               }

               #countdown li strong {
                   color: #fff;
                   font-size: 16px;
               }

               #countdown .emoji {
                   display: none;
                   padding: 1rem;
               }

               #countdown .emoji span {
                   font-size: 4rem;
                   padding: 0 .5rem;
               }

               @media all and (max-width: 768px) {
                   #countdown h1 {}

                   #countdown li {}

                   #countdown li span {}
               }
           </style>


           <div class="container">

               <div id="countdown">
                   <ul>
                       <li><span id="days"></span><strong>days</strong></li>
                       <li><span id="hours"></span><strong>Hours</strong></li>
                       <li><span id="minutes"></span><strong>Minutes</strong></li>
                       <li><span id="seconds"></span><strong>Seconds</strong></li>
                   </ul>
               </div>
               <div id="content" class="emoji">
                   <span> </span>
                   <span> </span>
                   <span> </span>
               </div>
           </div>

           <script>
               (function() {
                   const second = 1000,
                       minute = second * 60,
                       hour = minute * 60,
                       day = hour * 24;

                   //I'm adding this section so I don't have to keep updating this pen every year :-)
                   //remove this if you don't need it
                   let today = new Date(),
                       dd = String(today.getDate()).padStart(2, "0"),
                       mm = String(today.getMonth() + 1).padStart(2, "0"),
                       yyyy = today.getFullYear(),
                       nextYear = yyyy + 1,
                       dayMonth = "09/30/",
                       birthday = dayMonth + yyyy;

                   today = mm + "/" + dd + "/" + yyyy;
                   if (today > birthday) {
                       birthday = dayMonth + nextYear;
                   }
                   //end

                   const countDown = new Date(birthday).getTime(),
                       x = setInterval(function() {

                           const now = new Date().getTime(),
                               distance = countDown - now;

                           document.getElementById("days").innerText = Math.floor(distance / (day)),
                               document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                               document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                               document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                           //do something later when date is reached
                           if (distance < 0) {
                               document.getElementById("headline").innerText = "It's my birthday!";
                               document.getElementById("countdown").style.display = "none";
                               document.getElementById("content").style.display = "block";
                               clearInterval(x);
                           }
                           //seconds
                       }, 0)
               }());
           </script>

           <div class="container">
               <div class="row">

                   <div class="col-md-4">
                       <div class="single-video" style="padding: 30px 0px;">
                           <div class="post-slide">
                               <iframe width="100%" height="315" src="https://www.youtube.com/embed/h3IxP_JDCnM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-8">
                       <div id="news-slider" class="owl-carousel">


                           <div class="post-slide">

                               <iframe width="100%" height="315" src="https://www.youtube.com/embed/fX-9EfYFsJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                           </div>

                           <div class="post-slide">
                               <iframe width="100%" height="315" src="https://www.youtube.com/embed/w7wXcR8xIcY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                           </div>

                           <div class="post-slide">
                               <iframe width="100%" height="315" src="https://www.youtube.com/embed/TdhkUPFcN0k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                           </div>

                       </div>
                   </div>
               </div>
           </div>

           <div class="container">

               <div class="row">

                   <div class="col-md-3">
                       <a href="#" class="top-box-main">
                           <img src="indicons/images/sponsor-im1.jpg" style="height:312px; width:253px;">
                           <h2> ACCOMMODATION </h2>
                       </a>
                   </div>

                   <div class="col-md-3">
                       <a href="#" class="top-box-main">
                           <img src="indicons/images/im1.png">
                           <h2> PROGRAM </h2>
                       </a>
                   </div>

                   <div class="col-md-3">
                       <a href="#" class="top-box-main">
                           <img src="indicons/images/im2.png">
                           <h2> SPEAKERS </h2>
                       </a>
                   </div>

                   <div class="col-md-3">
                       <a href="#" class="top-box-main">
                           <img src="indicons/images/im3.png">
                           <h2> TRAVEL TO KOLKATA </h2>
                       </a>
                   </div>
               </div>
           </div>


           <div style="clear:both;"></div>
       </div>

       <div class="top-box-bottom">
           <div class="container">
               <div class="row">

                   <div class="col-md-4">
                       <div class="top-box-bottom-main">
                           <div class="top-bpx-bottom-img"><img src="indicons/images/dr3.jpg"> </div>
                           <h3>Message from<br>
                               VAI President</h3>
                           <p>Dear Friends,<br>

                           <div class="showcase">

                               <span>It is my great pleasure as the President of Venous Association (VAI) of India to invite you to the 16th annual conference of VAI,
                               </span>

                               <p>
                                   <br>
                                   <strong>VAICON2023</strong>, which takes place&nbsp;<strong>27 <sup>th </sup> to 29<sup>th </sup> January 2023 at ITC Sonar, Kolkata, India.</strong>&nbsp;VAI as the apex professional body of India for venous and lymphatic diseases associated with other similar professional bodies across the world and having significant representation in UIP. The&nbsp;<strong>VAICON2023</strong>&nbsp;will bring the world&rsquo;s top professionals in venous and lymphatic disease at the same platform, while providing a great opportunity for young vascular specialists to meet, greet, be inspired, encouraged and energised.<br>
                                   Kolkata is known for its historic, cultural and educational excellence. First medical college of Asia and city of five Nobel prises really made Kolkata &lsquo;<em>city of joy&rsquo;</em>!<br>
                                   <strong>VAICON2023</strong>&nbsp;is a multi-disciplinary platform involving presence from vascular, general and plastic surgery, interventional radiology, vascular medicine and angiology, lymphology, cosmetic surgery, sonography, research and nursing. The<strong> VAICON2023</strong> will provide you a great opportunity to reach a wide range of professionals in all related fields, allowing you to expand into new markets.<br>
                                   I have no doubts that the&nbsp;<strong>VAICON2023 </strong><strong>under</strong>&nbsp;the leaderships of&nbsp;<strong>Dr. K. Mukherjee and Dr. Jayanta Das</strong>&nbsp;will be a well-organised, well-attended, grand and glamorous event.<br>
                                   Kolkatais welcoming you with open arms.<br>
                                   See you all in <strong>VAICON2023</strong>, Kolkata.
                               </p>

                               <span class="showbutton">Read More </span>

                           </div>

                           <p>
                               <strong>Dr.Dheepak Selvaraj<br>

                                   The President, Venous Association of India.</strong>
                           </p>
                       </div>
                   </div>



                   <div class="col-md-4">
                       <div class="top-box-bottom-main">
                           <div class="top-bpx-bottom-img"><img src="indicons/images/dr2.jpg"> </div>
                           <h3>Message from <br>
                               Organising Chairman</h3>


                           <p>
                               Dear Colleagues,<br>




                           <div class="showcase">

                               <span> It my honor and the greatest of pleasure to invite you to the&nbsp;<strong>16th VAICON2023</strong>, in the&nbsp;&lsquo;<em>city of joy</em>!,&nbsp;<strong>Kolkata</strong> <br>
                               </span>

                               <p> The&nbsp;<strong>VAICON2023</strong>, will be held on&nbsp;<strong>27 <sup>th </sup> to 29 <sup>th </sup> January 2023</strong>&nbsp;at ITC Sonar, Kolkata, India. In this international conference, many international specialists will come together and have the opportunity to discuss and exchange opinions on every possible aspect of venous diseases &amp; management along with related matters. I believe that the topics to be addressed in this conference and its impact will make great contributions to our profession, considering the opportunity of the conference and the level of participation.<br>
                                   Please make sure that you find the time to enjoy one of the most vibrant cities in the World, Kolkata.<br>
                                   Am confident that conference secretariate, headed by&nbsp;<strong>Dr. Jayanta Das</strong>, will provide you the best support to have a wonderful memory. </p>

                               <span class="showbutton">Read More </span>

                           </div>



                           <p>
                               <strong>Dr. K. Mukherjee<br>

                                   Chairman, Organising Committee.<br>

                                   VAICON2023, Kolkata.</strong>

                           </p>
                       </div>
                   </div>






                   <div class="col-md-4">
                       <div class="top-box-bottom-main">
                           <div class="top-bpx-bottom-img"><img src="indicons/images/dr1.jpg"> </div>
                           <h3>Message from<br>
                               Organising Secretary</h3>


                           <p>
                               Dear Colleagues,<br>




                           <div class="showcase">

                               As the organising secretary, it&rsquo;s my privilege to invite you to the&nbsp;<strong>16 <sup>th </sup> VAICON2023</strong>, in the&nbsp;<strong>&lsquo;</strong><em>city of joy!&rsquo;</em>,&nbsp;<strong>Kolkata</strong> <br>
                               </span>

                               <p> The venue of&nbsp;<strong>VAICON2023</strong>&nbsp;is ITC Sonar, Kolkata, India.The <strong>VAICON2013</strong> is scheduled to be held on&nbsp;<strong>27 <sup>th </sup> to 29 <sup>th </sup> January 2023.</strong>&nbsp;In these three days international conference, all the stakeholders&rsquo; doctors, nurses, paramedics, administrators &amp; policy makers, academicians, researchers, industry partners and society in large, will be able to come closer and have the opportunity to discuss and exchange opinions and ideasfor a better future towards sustainable delivery of healthcare. I strongly believe that the confluence of divergent knowledgewill have a greater impact for the better tomorrow,through the great contributions of our profession, considering the opportunity of the conference and the level of participation in&nbsp;<strong>VAICON2023</strong>. Save your dates to enjoy one of the most vibrantconferences in the&nbsp;<strong>&lsquo;</strong><em>city of joy&rsquo;!,</em><strong> Kolkata</strong>. I can assure to make youfeel at home with memorable moments.&nbsp; Feel free to contact me for any assistance.&nbsp;<br>
                                   Let&rsquo;s joint at<strong> VAICON2023, Kolkata.</strong></p>

                               <span class="showbutton">Read More </span>

                           </div>



                           <p> <strong>Dr.Jayanta Das</strong><br>
                               <strong>Secretary, Organising Committee.</strong><br>
                               <strong>VAICON2023, Kolkata.</strong>
                           </p>
                       </div>
                   </div>
               </div>
           </div>

       </div>


       <div class="box-bottom-main">
           <div class="box-bottom-last">
               <div class="box-bottom_a">

                   <div class="container">

                       <div class="box-bottom-a-box">
                           <div class="row">

                               <div class="col-md-6">

                                   <h3>ORGANIZATION SECRETARIAT</h3>
                                   <h3> Dr. Jayanta Das </h3>
                                   <p>Amri Hospital</p>

                                   <p> Saltlake, Kolkata </p>


                               </div>

                               <div class="col-md-6">

                                   <h3>VENUE INFORMATION </h3>
                                   <p>ITC Sonar, Kolkata<br>
                                   </p>

                                   <p style="margin:0px 20px;">
                                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.922876184476!2d88.39543941443351!3d22.544561639681884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02769ebe32dca3%3A0xe0541395048f5723!2sITC%20Sonar%20A%20Luxury%20Collection%20Hotel%2C%20Kolkata!5e0!3m2!1sen!2suk!4v1657100924686!5m2!1sen!2suk" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



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
                           </div>
                       </div>
                   </div>
               </div>
               <div class="container">

                   <div class="row">
                       <div class="col-md-1"> </div>
                       <div class="col-md-3">
                           <ul>
                               <li> <a href="{{route('conference.home')}}"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                       Conference </a> </li>
                               <li> <a href="{{route('information.home')}}"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                       Information </a> </li>
                               <li> <a href="{{route('scientific.home')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                       Scientific </a> </li>
                               <li> <a href="{{route('abstract.submitpage')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                       Abstracts </a> </li>

                               <li> <a href="{{route('conference-register.show')}}"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                       Registration </a> </li>
                           </ul>

                       </div>


                       <div class="col-md-3">
                           <ul>
                               <li> <a href="{{route('accommodation.home')}}">Accommodation </a> </li>
                               <li> <a href="{{route('nurses.home')}}">Nurses</a> </li>
                               <li> <a target="_blank" href="https://venous.in"> VAI </a> </li>
                               <li> <a href="{{route('sponsorship.show')}}"> Sponsorship </a> </li>

                           </ul>

                       </div>

                   </div>

                   <div style="clear:both;"></div>
                   <p style="color:#fff; text-align:center;">© 2022 - 2023 Vaicon All rights reserved. </p>

               </div>
           </div>

       </div>

       @include('layouts.indicons.scripts')
       <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
       <script>
           $(function() {
               $('.showbutton').on('click', function() {
                   $(this).siblings('.showcase p').slideToggle();
                   //this is for change text
                   $(this).text(function(i, v) {
                       return v === 'less' ? 'Read More' : 'less'
                   });
                   //end
               });
           });
       </script>



       <script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
       <script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'> </script>

       <script>
           $(document).ready(function() {
               $("#news-slider").owlCarousel({
                   items: 3,
                   itemsDesktop: [1199, 3],
                   itemsDesktopSmall: [980, 2],
                   itemsMobile: [600, 1],
                   navigation: true,
                   navigationText: ["", ""],
                   pagination: true,
                   autoPlay: false
               });
           });
       </script>

   </body>

   </html>
