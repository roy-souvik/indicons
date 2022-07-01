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
      <img  src="indicons/images/banner-2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img  src="indicons/images/banner-3.jpg" class="d-block w-100" alt="...">
    </div>
	    <div class="carousel-item">
      <img  src="indicons/images/banner-4.jpg" class="d-block w-100" alt="...">
    </div>

	<div class="carousel-item">
      <img  src="indicons/images/banner-5.jpg" class="d-block w-100" alt="...">
    </div>

<div class="carousel-item">
      <img  src="indicons/images/banner-6.jpg" class="d-block w-100" alt="...">
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
    margin-bottom: 40px;
    background: #b50303;
    display: table;
    margin: auto;
    padding: 21px 60px;
    border-radius: 200px;
    position: relative;
    top: -84px;
    width: auto;
	}
		#countdown  ul{
		padding:0px;
		margin:0px;
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
    padding: 0px 2.5em;
    text-transform: uppercase;
}

#countdown li span {
  display: block;
    font-size: 3.5rem;
    font-weight: 900;
    color: #ffffff;
}
#countdown li strong{
color:#fff;
font-size:16px;
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
#countdown h1 {

  }

#countdown li {

  }

#countdown li span {

  }
}
</style>


	<div class="container">

  <div id="countdown">

    <h1 id="headline">Countdown to start Vaicon 2023 Kolkata</h1>


    <ul>
      <li><span id="days"></span><strong>days</strong></li>
      <li><span id="hours"></span><strong>Hours</strong></li>
      <li><span id="minutes"></span><strong>Minutes</strong></li>
      <li><span id="seconds"></span><strong>Seconds</strong></li>
    </ul>
  </div>
  <div id="content" class="emoji">
    <span>  </span>
    <span> </span>
    <span> </span>
  </div>
</div>

<script>
(function () {
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

                <div class="col-md-3">
                    <a href="#" class="top-box-main">
                        <img src="indicons/images/im4.png">
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
                            <div class="top-bpx-bottom-img"><img src="indicons/images/Mask1.png"> </div>
                            <h3>Message from VAI President</h3>

                            <p>
                               Dear Friends,<br>



 <div class="showcase">

      <span>It is my great  pleasure as the President of Venous Association (VAI) of India to invite you to  the 16th annual conference of VAI,
 </span>

<p>
<br>
<strong>VAICON2023</strong>, which takes  place <strong>27th to 29th January 2023 at ITC Sonar, Kolkata, India.</strong>
 VAI as the apex  professional body of India for venous and lymphatic diseaseis associated with  other similar professional bodies across the world and having significant  representation in UIP. The <strong>VAICON2023</strong> will bring the world&rsquo;s top professionals  in venous and lymphatic disease at the same platform, while providing a great  opportunity for young vascular specialists to meet, greet, be inspired,  encouraged and energised.<br>
  Kolkata is known  for its historic, cultural and educational excellence. First medical college of  Asia and city of five Nobel prises really made Kolkata &lsquo;city of joy&rsquo;! <br>

  <strong>VAICON2023</strong> is a multi-disciplinary platform involving presence from vascular,  general and plastic surgery, interventional radiology, vascular medicine and  angiology, lymphology, cosmetic surgery, sonography, research and nursing. The VAICON2023 will  provide you a great opportunity to reach a wide range of professionals in all  related fields, allowing you to expand into new markets.<br>
  I have no doubts  that the <strong>VAICON2023 under</strong> the leaderships of <strong>Dr. K. Mukherjee and Dr.  Jayanta Das</strong> will be a well-organised, well-attended, grand and glamorous  event. <br>
  Kolkatais welcoming you with open arms.<br>
  See you all in VAICON2023, Kolkata.</p>

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
                            <div class="top-bpx-bottom-img"><img src="indicons/images/Mask1.png"> </div>
                            <h3>Message from Organising Chairman</h3>


                            <p>
                         Dear Colleagues,<br>




 <div class="showcase">

      <span> It my honor and  the greatest of pleasure to invite you to the <strong>16th VAICON2023</strong>,  in the <strong>&lsquo;city of joy&rsquo;</strong>, <strong>Kolkata</strong>. <br>
 </span>

<p>  The <strong>VAICON2023</strong>, will be held on <strong>27th  to 29th January 2023</strong> at ITC Sonar, Kolkata, India.
 In this  international conference, many international specialists will come together and  have the opportunity to discuss and exchange opinions on every possible aspect  of venous diseases &amp; management along with related matters. I believe that  the topics to be addressed in this conference and its impact will make great  contributions to our profession, considering the opportunity of the conference  and the level of participation.<br>
Please make sure  that you find the time to enjoy one of the most vibrant cities in the World: Kolkata. <br>
 Am confident that Conference secretariate, headed by <strong>Dr. Jayanta Das</strong>,  will provide you the best support to have a wonderful memory. </p>

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
                            <div class="top-bpx-bottom-img"><img src="indicons/images/Mask1.png"> </div>
                            <h3>Message from Organising Secretary</h3>


                            <p>
                         Dear Colleagues,<br>




 <div class="showcase">

      <span>  As the  organising secretary, it&rsquo;s my privilege to invite you to the <strong>16th  VAICON2023</strong>, in the <strong>&lsquo;city of joy&rsquo;</strong>, <strong>Kolkata</strong>. <br>
 </span>

<p> The venue of <strong>VAICON2023</strong> is ITC  Sonar, Kolkata, India.The VAICON2013 is scheduled to be held on <strong>27th to 29th  January 2023.</strong>
 In these three  days international conference, all the stakeholders; doctors, nurses,  paramedics, administrators &amp; policy makers, academicians, researchers,  industry partners and society in large, will be able to come closer and have  the opportunity to discuss and exchange opinions and ideasfor a better future towards  sustainable delivery of healthcare. I strongly believe that the confluence of  divergent knowledgewill have a greater impact for the better tomorrow,through  the great contributions of our profession, considering the opportunity of the conference  and the level of participation in <strong>VAICON2023</strong>.
  Save your dates to  enjoy one of the most vibrantconferences in the <strong>&lsquo;city of joy&rsquo;,Kolkata</strong>. I  can assure to make youfeel at home with memorable moments.&nbsp; Feel free to contact me for any  assistance.&nbsp; <br>
  Let&rsquo;s joint at<strong>VAICON2023,  Kolkata.</strong></p>

      <span class="showbutton">Read More </span>

    </div>



 <p> <strong>Dr.Jayanta Das</strong><br>
  <strong>Secretary, Organising Committee.</strong><br>
  <strong>VAICON2023, Kolkata.</strong></p>
                        </div>
                    </div>
























                </div>


            </div>

        </div>








    <div class="box-bottom-main">
        <?php /*?><div class="box-bottom">

            <div class="container">

                <h2>Istanbul Tourism Guide </h2>
                <p>Welcome to Istanbul, the city of the past, the present and the future. Istanbul not only joins continents, it also joins cultures and people. Close your eyes and imagine yourself in a city; the mysticism of the East and the modernity of the West, the constant time travel between past and the future, the balance of the traditional and the contemporary. </p>

                <a href="#">Read More </a>
            </div>

        </div><?php */?>



        <div class="box-bottom-last">


		<div class="box-bottom_a">

            <div class="container">

                <div class="box-bottom-a-box">
                    <div class="row">

                        <div class="col-md-6">
                            <img style="height:50px;" src="indicons/images/ic9.png">
                            <h3>ORGANIZATION SECRETARIAT </h3>
                            <p>Yazarlar Sok. No:16 Esentepe Mah. Sisli,
                                34394, Istanbul </p>

                            <p> <img src="indicons/images/ic7.png"> +90 212 279 00 20 </p>
                            <p> <img src="indicons/images/ic1.png"> +90 212 279 00 35 </p>
                            <p> <img src="indicons/images/ic2.png"> uip2022@soloevent.net </p>

                        </div>

                        <div class="col-md-6">
                            <img style="height:50px;" src="indicons/images/ic8.png">
                            <h3>VENUE INFORMATION </h3>
                            <p>Istanbul Convention Exhibition Center - ICEC, Gümüş Cad. No:4 34367,<br>
                                Harbiye / İstanbul / Türkiye</p>

                            <p> <img src="indicons/images/ic7.png"> +90 212 373 11 00
                            </p>
                            <p> <img src="indicons/images/ic1.png"> +90 212 224 08 78
                            </p>
                            <p> <img src="indicons/images/ic2.png"> www.icec.org/home-page </p>
                            <p> <img src="indicons/images/pin.png"> Click here for map </p>
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
                            <li> <a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Congress </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Information </a> </li>
                            <li> <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Scientific </a> </li>
                            <li> <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Abstracts </a> </li>
                            <li> <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Late Abstracts </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Registration </a> </li>
                        </ul>

                    </div>


                    <div class="col-md-3">
                        <ul>
                            <li> <a href="#">Accommodation </a> </li>
                            <li> <a href="#"> Travel </a> </li>
                            <li> <a href="#"> UIP </a> </li>
                            <li> <a href="#"> Sponsorship </a> </li>
                            <li> <a href="#"> Press </a> </li>
                            <li> <a href="#"> Contact </a> </li>
                        </ul>

                    </div>

                </div>

                <div style="clear:both;"></div>
                <p style="color:#fff; text-align:center;">©   2022 - 2023 Vaicon All rights reserved. </p>

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
    $(this).text(function(i, v){
      return v === 'less' ? 'Read More' : 'less'
       });
    //end
  });
});
</script>
</body>

</html>
