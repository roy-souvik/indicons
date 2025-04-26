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
         font-size: 24px;
         color: #000;
         font-weight: 600;
         font-family: "Roboto", serif !important;
         /*text-shadow: 0px 1px 1px rgba(0,0,0,0.6);*/
             line-height: 57px;
         }
         .blink-soft span{color: #bc1517;
         font-weight: 600;
         font-family: "Roboto", serif !important;
         }
         /*.blink-soft {*/
         /*animation: blinker 2.5s linear infinite;*/
         /*}*/
         /*@keyframes blinker {*/
         /*50% {*/
         /*opacity: 0;*/
         /*}*/
         /*}*/
		 
	.doctor-sec-bottom-inner{    height: 398px;
	
	}	 
		 
		 
      </style>
      
      <style>
          .elementor-background-overlay {
    background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/dots-left-bottom-purple.png);
    background-position: bottom left;
    background-repeat: no-repeat;
    background-size: contain;
    opacity: 1;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    inset: 0;
        position: absolute;
}

.top-box-bottom {
    width: 100%;
    /*background: #f8f8f8;*/
    padding: 46px 0px 77px 0px;
    background-color: #F1F1F1;
    /* background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/top-right-orange.png); */
    background-position: top right;
    background-repeat: no-repeat;
    background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/orange-blog-top-right.png);
    background-size: 196px auto;
        position: relative;
}

.counter-sec {
    background-color: #301746;
    position: relative;
}

.counter-sec .elementor-background-overlay {
       background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/wavy-blob.png);
    background-position: top left;
    background-repeat: no-repeat;
    background-size: auto;
    opacity: 0.44;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    inset: 0;
    position: absolute;
    z-index: 0;
}
.ticker-wrap {
    top: 0;
    width: 100%;
    overflow: hidden;
    height: auto;
    background-color: #fff;
    padding-left: 100%;
    text-transform: uppercase;
    /*background: #b91616;*/
    background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);
    box-shadow: 0 5px 15px rgba(242, 97, 103, .4);
    padding: 4px 0px;
}

.video-sec {
    background: #fff;
    padding: 0px 0px 52px;
}
.doctor-sec-bottom {
    background-color: #F1F1F1;
    background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/orange-blog-top-right.png);
    background-position: top right;
    background-repeat: no-repeat;
    background-size: 571px auto;
    padding: 125px 0px;
    position: relative;
}
.doctor-sec-bottom .elementor-background-overlay {
    background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/pink-blob-top-left.png);
    background-position: top left;
    background-repeat: no-repeat;
    background-size: 485px auto;
    opacity: 1;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    inset: 0;
    position: absolute;
}

.post-slide {
    background: #f1f1f1;
     margin: 0px; 
    border-radius: 0px;
    padding: 18px;
    /* box-shadow: 0px 14px 22px -9px #bbcbd8; */
    /*background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);*/
    /*box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);*/
    
}
    
    nav {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    height: auto;
    background: #07007c;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    z-index: 12;
    background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);
    box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);}
    
    .elementor-widget-container {
    margin: -27px 0px 0px 0px;
    padding: 15px 15px 15px 15px;
    background-image: url(https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/title-bg-orange-1.png);
    background-position: 40px 21%;
    background-repeat: no-repeat;
    background-size: 330px auto;
}
 .elementor-widget-container-1 {
        margin: 4px 0px 0px 0px;
    text-align: center;
}
.elementor-widget-container-1 img {
    width:109px;
    height: 10px;
}
.partner-sec-bottom-inner {
    text-align: center;
    text-decoration: none;
    background: white;
    padding: 10px;
    box-shadow: 0 4px 15px 0 rgb(2 2 2 / 19%);
    border-radius: 10px;
    height: 235px;
}
.elementor-widget-container-2 img {
    width: 47px;
    height: 47px;
    right: 50px;
    position: absolute;
    top: 6px;
}
.conference-sec-img-des-name {
    font-size: 26px;
    font-family: "Roboto", serif !important;
    font-weight: 700;
    color: #e2373f;
}
.conference-sec {
    display: flex;
    gap: 20px;
    align-items: center;
    background: white;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.29);
    border-radius: 8px;
    margin-top: 38px;
    position: relative;
    box-shadow: 0 4px 15px 0 rgb(2 2 2 / 19%);
}

.conference-date {
    /*background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);*/
        background-color: #A0237F;
    box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);
    border-radius: 50px;
    color: white;
    font-size: 20px;
    text-align: center;
    padding: 20px 0px;
    font-weight: 700;
    margin-top: 20px;
}

.conference-date-1 {
        /*background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);*/
        background-color: #DB428C;
    box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
    border-radius: 50px;
    color: white;
    font-size: 20px;
    text-align: center;
    padding: 20px 0px;
    font-weight: 700;
    margin-top: 20px;
}

.video-sec-bottom-inner {
    text-align: center;
    text-decoration: none;
    padding: 28px 30px;
    /*box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.29);*/
    /*background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);*/
    
    border-radius: 110px;
    display: flex;
    align-items: center;
    gap: 30px;
    background-color: #DB428C;
}

.video-sec-bottom-inner-1 {
    text-align: center;
    text-decoration: none;
    padding: 28px 30px;
        background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);
    box-shadow: 0 5px 15px rgba(242, 97, 103, .4);
     border-radius: 110px;
    display: flex;
    align-items: center;
    gap: 30px;
    margin-top: 0px;
}

.video-sec-bottom-inner-1 img {
    width: 140px;
    height: 140px;
    border-radius: 116px;
}

.video-sec-bottom-inner img {
    width: 140px;
    height: 140px;
    border-radius: 116px;
}

.video-bottom-text {
        color: white;
    font-size: 30px;
    font-weight: 700;
    text-decoration: none;
}
 a {
    text-decoration: none;
}
.video-sec-bottom {
    padding: 7px 0px 52px;
}

.video-sec-bottom-11 {
        padding: 65px 0px 52px;
}

nav .navbar .links li a:hover {
    color: #fff;
    /* background: #b91616; */
    background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);
}
nav .navbar .links li .sub-menu {
    position: absolute;
    top: 50px;
    left: 0;
    line-height: 40px;
    box-shadow: 0 1px 2px rgb(0 0 0 / 20%);
    border-radius: 0 0 4px 4px;
    display: none;
    z-index: 2;
    padding: 0px;
    background-color: #A0237F;
}

.conference-sec-img img {
    width: 100%;
    border-radius: 94px;
    border: 2px solid #a0237f;
    padding: 6px;
}

.conference-sec {
    display: flex
;
    gap: 20px;
    align-items: center;
    background: white;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.29);
    border-radius: 119px;
    margin-top: 38px;
    position: relative;
    box-shadow: 0 4px 15px 0 rgb(2 2 2 / 19%);
    padding: 20px;
}

.doctor-sec-bottom-inner img {
    width: 200px;
    border-radius: 50%;
    height: 200px;
    border: 1px solid #bc1517;
    padding: 6px;
    border: 2px solid #a0237f;
    padding: 6px;
}
.doctor-sec-bottom-inner p {
    font-size: 16px;
    color: #e23b42;
    padding-top: 2px;
    font-family: "Roboto", serif !important;
    font-weight: 600;
    position: absolute;
    bottom: 0px;
}
.doctor-sec-bottom-inner .main-name {
    font-size: 19px;
    color: #a0237f;
    padding-top: 15px;
    font-family: "Roboto", serif !important;
    font-weight: 600;
}
.doctor-sec-bottom-inner {
    text-align: center;
    text-decoration: none;
    background: white;
    padding: 30px 18px 18px;
    /* box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.29); */
    border-radius: 10px;
    height: 398px;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    box-shadow: 0 4px 15px 0 rgb(2 2 2 / 19%);
    margin-bottom: 0px;
}

.post-slide iframe {
    /*height: 835px;*/
}

@media only screen and (max-width: 767px){
 .video-sec-bottom-inner {
   
    border-radius: 31px;
    display: block;
    
}
.video-sec-bottom-inner-1 {
    
    border-radius: 31px;
    display: block;
   
    margin-top: 20px;
}
.conference-sec-img {
    width: 121px;
    border-radius: 8px;
    margin: 0px auto;
}
.conference-sec {
    display: block;
    text-align: center;
    border-radius: 22px;
    margin-top: 38px;
    
}
#countdown li {
    display: inline-block;
    font-size: 1.5em;
    list-style-type: none;
    padding: 0px 1.5em;
    text-transform: uppercase;
    /* background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516); */
    font-family: "Roboto", serif !important;
    border-radius: 0px;
    padding: 13px 0px !important;
    width: 230px;
    border-bottom: 2px solid #ffffff26;
    border-right: none !important;
}
.doctor-sec-bottom-inner {
    margin-bottom: 30px;
}
.post-slide iframe {
    height: 195px;
}
.post-slide {
    background: #006492;
    margin: 0px;
    border-radius: 0px;
    padding: 8px;
    /* box-shadow: 0px 14px 22px -9px #bbcbd8; */
    background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);
    box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);
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
               15 <sup>th </sup> INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
                   15<sup>th </sup>  INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
                   15<sup>th </sup>  INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
                  Indian Academy of MedicoLegal Experts (IAMLE)
               </div>
               <div class="ticker_item" data-bs-toggle="modal" data-bs-target="#myModal">
                   15<sup>th </sup>  INPALMS<blink> <strong style="color:#FFFF00"> jointly organized by Indo Pacific Association of Law Medicine and Science (INPALMS) & </strong> </blink>
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
<!--         <div class="container">-->
<!--            <div class="blink-box">-->
<!--               <div class="blink-soft"> <span style="font-size: 30px; color: #ffffff; background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);-->
<!--    box-shadow: 0 5px 15px rgba(242, 97, 103, .4); padding: 10px 38px; border-radius: 32px;">15<sup>th </sup>  INPALMS 2025 </span><br> Pre-Conference Workshops <span>7<sup>th </sup> 8<sup>th </sup>  November 2025 </span><br>-->
<!--Main Conference<span> 9<sup>th </sup>  10<sup>th </sup>  11<sup>th </sup> November 2025</span> </div>-->
<!--            </div>-->
<!--         </div>-->


<div class="container" style="padding:20px 0px 60px">
            <div class="blink-box">
               <div class="blink-soft"> <span style="font-size: 30px; color: #ffffff; background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);
    box-shadow: 0 5px 15px rgba(242, 97, 103, .4); padding: 10px 38px; border-radius: 32px;">15<sup>th </sup>  INPALMS 2025 </span></div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="conference-date">
                        Pre-Conference Workshops <span>7<sup>th </sup> 8<sup>th </sup>  November 2025
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="conference-date-1">
                        Main Conference<span> 9<sup>th </sup>  10<sup>th </sup>  11<sup>th </sup> November 2025</span>
                    </div>
                </div>
            </div>
         </div>
		 
		 
		 
		 
		 
 <div class="top-box-bottom">
     <div class="elementor-background-overlay"></div>
         <div class="container">
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
                       
                       <div class="elementor-widget-container-2">
															<img loading="lazy" decoding="async" width="131" height="124" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/circles-2.png" class="attachment-large size-large wp-image-203" alt="">															</div>

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
                       
                       <div class="elementor-widget-container-2">
															<img loading="lazy" decoding="async" width="131" height="124" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/circles-2.png" class="attachment-large size-large wp-image-203" alt="">															</div>

                   </div>
               </div>
            </div>
         </div>
      </div>		 
		 
		 
		 
		 
		 
		 

         @include('partials.countdown')


            <section class="video-sec-bottom-11">
                <div class="container">
                    <div class="row partner-wrapper">
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo2.png">
                             <h2> INTERNATIONAL ASSOCIATION OF FORENSIC SCIENCES</h2>
                          </div>
                          <div class="elementor-widget-container"></div>
                          
                            <div class="elementor-widget-container-1">
                            <img loading="lazy" decoding="async" width="218" height="19" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/underline-wiggle-orange.png" class="attachment-large size-large wp-image-103" alt="">
                            </div>
                        </div>
                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo1.png">
                             <h2> INTERNATIONAL ASSOCIATION OF CLINICAL FORENSIC MEDICINE </h2>
                             
                          </div>
                          <div class="elementor-widget-container"></div>
                          
                            <div class="elementor-widget-container-1">
                            <img loading="lazy" decoding="async" width="218" height="19" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/underline-wiggle-orange.png" class="attachment-large size-large wp-image-103" alt="">
                            </div>
                        </div>
                         <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo4.png">
                             <h2> BRAZILIAN ASSOCIATION OF LEGAL MEDICINE AND MEDICAL EXPERTISE </h2>
                          </div>
                          <div class="elementor-widget-container"></div>
                          
                            <div class="elementor-widget-container-1">
                            <img loading="lazy" decoding="async" width="218" height="19" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/underline-wiggle-orange.png" class="attachment-large size-large wp-image-103" alt="">
                            </div>
                        </div>

                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo5.png">
                             <h2> ALL INDIA INSTITUTE OF MEDICAL SCIENCES, KALYANI</h2>
                          </div>
                          <div class="elementor-widget-container"></div>
                          
                            <div class="elementor-widget-container-1">
                            <img loading="lazy" decoding="async" width="218" height="19" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/underline-wiggle-orange.png" class="attachment-large size-large wp-image-103" alt="">
                            </div>
                        </div>

                        

                        <div class="col-md-2">
                           <div class="partner-sec-bottom-inner">
                             <img src="indicons/images/lgo3.png">
                             <h2> WEST BENGAL NATIONAL UNIVERSITY OF JURIDICAL SCIENCES, KOLKATA</h2>
                          </div>
                          <div class="elementor-widget-container"></div>
                          
                            <div class="elementor-widget-container-1">
                            <img loading="lazy" decoding="async" width="218" height="19" src="https://demos.bakerwebdev.net/festival-event/wp-content/uploads/sites/12/2020/03/underline-wiggle-orange.png" class="attachment-large size-large wp-image-103" alt="">
                            </div>
                        </div>

                       

                    </div>
                </div>
            </section>

            <section class="doctor-sec-bottom">
                <div class="elementor-background-overlay"></div>
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
                             <p>The President, ABMLPM <br>
		Minas Gerais	</p>
							 
				 
                          </div>
                        </div>




                    </div>
                </div>
            </section>

         <section class="video-sec">
          <div class="post-slide">
		  
		  <div class="container">
		  <div class="row">
		  
		  <div class="col-md-6">
		      <div class="doctor-sec-bottom-inner" style="height: 371px;">
		      
		     
		  
		  
                     <iframe width="100%" height="250" style="object-fit: fill;" src="indicons/images/implams-india.mp4" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     
                     <div class="main-name"> Prof. (Dr.) Adarsh Kumar</span></div>
                     <p>Organizing Chairman</p>
                     
                     </div>
		  
		  </div>
		  
		  
  <div class="col-md-6">
      
      <div class="doctor-sec-bottom-inner" style="height: 371px;">
		  
		  
                     <iframe width="100%" height="250" style="object-fit: fill;" src="indicons/images/implams-brasil..mp4" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     
                     <div class="main-name"> DR. FLAVIA PEREIRA COSTA</span></div>
                     <p>The President, ABMLPM</p>
                     
                     </div>
		  
		  </div>
		  
		  
		  
		  
	<div class="col-md-6" style="margin-top: 25px;">
	    
	    <div class="doctor-sec-bottom-inner" style="height: 371px;">
		  
		  
                     <iframe width="100%" height="250" style="object-fit: fill;" src="indicons/images/implams-srilanka..mp4" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     
                     <div class="main-name"> PROF. P. ANURUDDHI S. EDIRISINGHE</span></div>
                     <p>The President, IACFM</p>
                     </div>
		  
		  </div>	
		  
		  	<div class="col-md-6" style="margin-top: 25px;">
		  	    
		  	    <div class="doctor-sec-bottom-inner" style="height: 371px;">
		  
		  
                     <iframe width="100%" height="250" style="object-fit: fill;" src="indicons/images/implans-br.mp4" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     <div class="main-name"> DR. YANKO G. KOLEV</span></div>
                     <p>The President, IAFS</p>
                     </div>
		  
		  </div>	
		  
		  
		  
		  
		   
                     </div>
                     </div>
         </section>


         
         
         <section class="video-sec-bottom">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                   <a href="/accommodation">
                   <div class="video-sec-bottom-inner">
                  

                     <img src="indicons/images/A-1.png">
                     <div class="video-bottom-text">ACCOMMODATION</div> 
                 
                  </div>
                  </a>
               </div>
               <div class="col-md-6">
                   <a href="/information#travel">
                   <div class="video-sec-bottom-inner-1">
                  
                     <img src="indicons/images/T-1.png">
                     <div class="video-bottom-text"> TRAVEL TO KOLKATA </div>
                  
                  </div>
                  </a>
               </div>
               
               
            </div>
         </div>
         </section>


      
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
                    <li>
                           <a href="{{route('about')}}">
                           <i class="fa fa-angle-right" aria-hidden="true"></i>
                           About Us
                           </a>
                        </li>
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
            // September 9th
             addCountdownTimer('11/9/');

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
