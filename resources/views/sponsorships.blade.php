@extends('layouts.indicons.main-layout')
  @section('content')

<style>
.pricingTable{
min-height:inherit!important;
margin-bottom:0px;
}
.pricingTable-header {
text-align: left;
    text-transform: uppercase;
    margin: 0 20px 20px 0;
    box-shadow: 0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 1%), 0 3px 5px -1px rgb(0 0 0 / 10%);
    padding: 10px 10px 10px 0px;
    align-items: center;
}

.title {
    color: #000!important;
    font-size: 16px!important;
    font-weight: 500;
    line-height: 52px;
    margin: auto auto auto 10px;
    text-align: center;
    background: #fff!important;
}
.sponsor-table{height: 530px;
    overflow-x: auto;
    box-shadow: 0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 1%), 0 3px 5px -1px rgb(0 0 0 / 10%);
}
.sponsor-table td{font-size: 15px;
    text-align: left;
    border: 1px solid #e2e2e2;
}

.sponsor-table .btn {

padding: 6px 12px 5px 12px;
    border-radius: 4px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: table;
    margin: auto;
    float: none;
    height: 31px;
    line-height: 19px;
    font-size: 15px;
    width: 104px;
    text-transform: inherit;
    background: #f32f30;
}

.sponsor-table th {
    padding: 10px;
    font-size: 14px;
    font-weight: 500;
    border: 1px solid #001b3e;
}
.main-spons{

    margin-top: 61px;
}


.btn {    padding: 6px 0px 5px 0px;
    border-radius: 4px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: table;
    float: none;
    height: 31px;
    line-height: 10px;
    background: #296dc4;
    color: #fff;
    width: 95px;
    margin: 0px 5px;

}

.btn:hover{
background:#f32f30!important;
color:#fff!important;
}


.log-box .btn{       width: auto;
    padding: 19px 50px!important;
    line-height: 0px;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 600;
    width: 240px;
}

.log-box .card{    margin: auto;
    box-shadow: 0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 1%), 0 3px 5px -1px rgb(0 0 0 / 10%);
}

.modal-content .title{     font-size: 21px!important;


}
.modal-content  mg{
}

.pricingTable-signup{
position:static!important;
}



.pricingTable-signup .btn {
    display: table;
    margin: auto;
    font-size: 21px;
    width: 160px;
    padding: 19px;
    line-height: 6px;
    height: 50px;
	background: #f32f30!important;
	    border: 1px solid #f32f30;
}

.pricingTable .pricing-content li{
    border-bottom: 1px solid #828282;
    font-weight: 600;
	padding-bottom: 10px;
}

.pricingTable .pricing-content{
border:none!important;
}

.pricingTable .pricingTable-header{     padding: 0px 10px 0px 0px!important;
}

.title span{color: #0053bc;
}
.pay-btn{    display: table;
    margin: 30px auto 60px auto;
    width: 260px;
    height: 46px;
    line-height: 32px;
    font-size: 17px;
    font-weight: 600;
    border: none;<strong></strong>
}
</style>








  <div class="reg-table">
      <div style="font-size: 24px!important; background:none!important;" class="title"> SPONSORSHIP </div>


	<div class="sponsor-list-bx">




          <table cellspacing="0" cellpadding="0" style="width:100%">
              <tr style="background:#002878; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="126" valign="top"><strong>PLATINUM + </strong></td>
                  <td width="86" colspan="2" valign="top"><strong>PLATINUM</strong></td>
                  <td width="86" valign="top"><strong>DIAMOND </strong></td>
                  <td width="86" colspan="2" valign="top"><strong>GOLD</strong></td>
                  <td width="86" valign="top"><strong>SILVER</strong></td>
                  <td width="86" valign="top"><strong>BRONZE</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Inside hall large stall</strong></td>
                  <td width="47" valign="top"><strong>Y </strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Outside hall large stall</strong> (<strong>premium location)</strong></td>
                  <td width="47" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Outside hall large stall (front location)</strong></td>
                  <td width="47" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Outside hall regular stall (middle location)</strong></td>
                  <td width="47" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Outside hall regular stall </strong></td>
                  <td width="47" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Registration of company executives</strong></td>
                  <td width="47" valign="top"><strong>6</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>5</strong></td>
                  <td width="38" valign="top"><strong>4</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>3</strong></td>
                  <td width="38" valign="top"><strong>2</strong></td>
                  <td width="44" valign="top"><strong>1</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Dedicated lounge space for company</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Company logo in website with link</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Company logo in website without link</strong></td>
                  <td width="47" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Company logo in flier and newsletter</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Company name and logo in Preliminary and final program </strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>In hall branding</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>

              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Company name and logo in announcements</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Separate Individual Signage at entrance to the Main Hall</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Special thanks to head of sponsor at meeting</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Signage inside main conference hall</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Electronic registration data of attendees </strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Electronic list of attendees post conference</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Adequate mention during the lecture and in program</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#4777d7; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Dedicated scientific lecture </strong></td>
                  <td width="47" valign="top"><strong>3</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>2</strong></td>
                  <td width="38" valign="top"><strong>1</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>&nbsp;</strong></td>
                  <td width="38" valign="top"><strong>&nbsp;</strong></td>
                  <td width="44" valign="top"><strong>&nbsp;</strong></td>
              </tr>
              <tr style="background:#5b8cef; color:#fff;">
                  <td width="359" colspan="2" valign="top"><strong>Permission for souvenir of VAICON 2023 with logo</strong></td>
                  <td width="47" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="38" colspan="2" valign="top"><strong>y</strong></td>
                  <td width="38" valign="top"><strong>y</strong></td>
                  <td width="44" valign="top"><strong>y</strong></td>
              </tr>


          </table>



      </div>

  <button type="button" class="btn-reg-table" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-arrows-from-line"></i> Compact View </button>

	</div>





<div>

<div class="row">



<div class="col-md-6">
<div>
   <h3 class="mt-4">Sponsorships</h3>

<div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
   margin-left: 15px;" class="rounded" src="https://indicons.in/indicons/images/platinum +.png" alt="platinum +">
                          <h3 class="title" style="color: black; font-size: 18px!important;">Platinum + <span> INR 1,000,000 </span> </h3>
						   <button  data-bs-toggle="modal" data-bs-target="#exampleModal-price" class="btn btn-link add-to-cart">Details</button>   <button style="background:#f32f30!important;" class="btn btn-link add-to-cart">Book Now</button>
 </div>



<div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
   margin-left: 15px;" class="rounded" src="https://indicons.in/indicons/images/platinum.png" alt="platinum">
                         <h3 class="title" style="color: black; font-size: 18px!important;">Platinum<span>  INR 700,000 </span>
</h3> <button class="btn btn-link add-to-cart">Details</button>    <button style="background:#f32f30!important;"  class="btn btn-link add-to-cart">Book Now</button>
                      </div>


<div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
    margin-left: 15px;" class="rounded" src="https://indicons.in/indicons/images/diamond.png" alt="diamond">
               <h3 class="title" style="color: black; font-size: 18px!important;">Diamond<span>  INR 700,000 </span></h3>
						  <button class="btn btn-link add-to-cart">Details</button>    <button style="background:#f32f30!important;"  class="btn btn-link add-to-cart">Book Now</button>
                      </div>



<div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
    margin-left: 15px;" class="rounded" src="https://indicons.in/indicons/images/gold.png" alt="gold">
      <h3 class="title" style="color: black; font-size: 18px!important;">Gold <span> INR 300,000 </span></h3>
						  <button class="btn btn-link add-to-cart">Details</button>    <button style="background:#f32f30!important;"  class="btn btn-link add-to-cart">Book Now</button>
                      </div>



<div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
  margin-left: 15px;" class="rounded" src="https://indicons.in/indicons/images/silver.png" alt="silver">
         <h3 class="title" style="color: black; font-size: 18px!important;">Silver <span> INR 200,000 </span></h3>
						  <button class="btn btn-link add-to-cart">Details</button>  <button style="background:#f32f30!important;"  class="btn btn-link add-to-cart">Book Now</button>
                      </div>



	<div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
   margin-left: 15px;" class="rounded" src="https://indicons.in/indicons/images/bronze.png" alt="bronze">
          <h3 class="title" style="color: black; font-size: 18px!important;">Bronze <span> INR 100,000 </span></h3>
						  <button class="btn btn-link add-to-cart">Details</button>    <button style="background:#f32f30!important;"  class="btn btn-link add-to-cart">Book Now</button>
                      </div>















</div>






</div>



<div class="col-md-6">

   <h3 class="mt-4">Other Sponsorships</h3>

              <div class="sponsor-table">
                  <table class="table">
                      <tr>
                          <th style="text-align:left;">Title</th>
                          <th>Amount</th>
                          <th>Number</th>
                          <th></th>
                      </tr>

                      @foreach ($sponsorships as $sponsorship)
                      @if ($sponsorship->category !== 'main')
                      <tr>
                          <td>{{$sponsorship->title}}</td>
                          <td style="text-align:center"><strong>{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</strong></td>
                          <td style="text-align:center">{{$sponsorship->number}}</td>
                          <td>
                              <button class="btn btn-link add-to-cart" data-id={{$sponsorship->id}}>Book Now</button>
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </table>
              </div>



</div>




  </div>





  <div id="exampleModal" class="modal">
      <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">SPONSORSHIP
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="reg-table">


                      <table cellspacing="0" cellpadding="0" style="width:100%; margin-top:0px;">
                          <tbody>
                              <tr style="background:#002878; color:#fff;">
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="116" valign="top"><strong>PLATINUM + </strong></td>
                                  <td colspan="2" valign="top"><strong>PLATINUM</strong></td>
                                  <td width="86" valign="top"><strong>DIAMOND </strong></td>
                                  <td colspan="2" valign="top"><strong>GOLD</strong></td>
                                  <td width="86" valign="top"><strong>SILVER</strong></td>
                                  <td width="86" valign="top"><strong>BRONZE</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Inside hall large stall</strong></td>
                                  <td width="116" valign="top"><strong>Y </strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Outside hall large stall</strong> (<strong>premium location)</strong></td>
                                  <td width="116" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Outside hall large stall (front location)</strong></td>
                                  <td width="116" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Outside hall regular stall (middle location)</strong></td>
                                  <td width="116" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Outside hall regular stall </strong></td>
                                  <td width="116" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Registration of company executives</strong></td>
                                  <td width="116" valign="top"><strong>6</strong></td>
                                  <td colspan="2" valign="top"><strong>5</strong></td>
                                  <td width="86" valign="top"><strong>4</strong></td>
                                  <td colspan="2" valign="top"><strong>3</strong></td>
                                  <td width="86" valign="top"><strong>2</strong></td>
                                  <td width="86" valign="top"><strong>1</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Dedicated lounge space for company</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Company logo in website with link</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Company logo in website without link</strong></td>
                                  <td width="116" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Company logo in flier and newsletter</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Company name and logo in Preliminary and final program </strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> In hall branding</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Company name and logo in announcements</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Separate Individual Signage at entrance to the Main Hall</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Special thanks to head of sponsor at meeting</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong> <i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Signage inside main conference hall</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Electronic registration data of attendees </strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Electronic list of attendees post conference</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Adequate mention during the lecture and in program</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Dedicated scientific lecture </strong></td>
                                  <td width="116" valign="top"><strong>3</strong></td>
                                  <td colspan="2" valign="top"><strong>2</strong></td>
                                  <td width="86" valign="top"><strong>1</strong></td>
                                  <td colspan="2" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                                  <td width="86" valign="top"><strong>&nbsp;</strong></td>
                              </tr>
                              <tr style="background:#4777d7; color:#fff;">
                                  <td style="text-align:left; padding-left:10px;" colspan="2" valign="top"><strong><i style="color: #fff700;
    font-size: 16px;" class="fa-solid fa-circle-check"></i> Permission for souvenir of VAICON 2023 with logo</strong></td>
                                  <td width="116" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td colspan="2" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                                  <td width="86" valign="top"><strong>y</strong></td>
                              </tr>



                          </tbody>
                      </table>

                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
          </div>
      </div>
  </div>







  <div id="exampleModal-price" class="modal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">SPONSORSHIP
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                   <div class="pricingTable">
                      <div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
    margin-left: 24px;" class="rounded" src="https://indicons.in/indicons/images/platinum +.png" alt="platinum +">
                          <h3 class="title" style="color: black;">Platinum +</h3>
                      </div>
                      <div class="price-value">
                          <span class="amount">INR 1,000,000</span>
                      </div>

                      <ul class="pricing-content">
                                                    <li>Will be provided one large stall Inside the main hall</li>
                                                    <li>6 company executives will be given free Registration</li>
                                                    <li>One Dedicated lounge space will be provided for the company</li>
                                                    <li>Company logo will be given in conference website with link</li>
                                                    <li>Company logo will be given in all the fliers and newsletters</li>
                                                    <li>Company name and logo will be given in Preliminary and final program</li>
                                                    <li>In hall branding (electronic) will be provided</li>
                                                    <li>Company name will be announced adequately in announcements</li>
                                                    <li>Company logo will be given Separately in the Signage at entrance to the Main Hall and other halls</li>
                                                    <li>Head of sponsor at meeting will be acknowledge with special thanks.</li>
                                                    <li>Company logo will be given in Signage inside main conference hall</li>
                                                    <li>Electronic registration data of attendees will be given 2 weeks before the VAICON2023.</li>
                                                    <li>Electronic list of attendees (final) will be given 2 weeks after the VAICON2023. post conference</li>
                                                    <li>Company name will be mentioned adequately mention during the lectures and in program</li>
                                                    <li>Three dedicated scientific lectures will be in the name of the company</li>
                                                    <li>Allowed to offer special souvenir of VAICON 2023 with logo, to the attendees.</li>
                                                </ul>

                      <div class="pricingTable-signup">
                          <button class="btn btn-primary add-to-cart" data-id="1">Book Now
                      </button></div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
          </div>
      </div>
  </div>



       <a href="{{route('sponsorship.buy')}}" class="btn btn-primary pay-btn">Proceed to payment</a>





  <div class="demo">
      <div class="container">

          <div class="row">
              @auth
              @foreach ($sponsorships as $sponsorship)

              @if ($sponsorship->category == 'main')
              <div class="col-md-4 col-sm-6">
                  <div class="pricingTable">
                      <div class="pricingTable-header d-flex" style="background-color: {{data_get($sponsorship, 'color', '#ffffff')}};">
                          <img style="width: 43px;
    float: right;
    display: block;
    height: 43px;
    margin-top: 6px;
    margin-left: 55px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{strtolower($sponsorship->title)}}">
                          <h3 class="title" style="color: black;">{{$sponsorship->title}}</h3>
                      </div>
                      <div class="price-value">
                          <span class="amount">{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</span>
                      </div>

                      <ul class="pricing-content">
                          @foreach ($sponsorship->features as $feature)
                          <li>{{$feature->title}}</li>
                          @endforeach
                      </ul>

                      <div class="pricingTable-signup">
                          <button class="btn btn-primary add-to-cart" data-id="{{$sponsorship->id}}">Book Now</button>
                      </div>
                  </div>
              </div>
              @endif
              @endforeach

              <h3 class="mt-4">Other Sponsorships</h3>

              <div class="sponsor-table">
                  <table class="table">
                      <tr>
                          <th style="text-align:left;">Title</th>
                          <th>Amount</th>
                          <th>Number</th>
                          <th></th>
                      </tr>

                      @foreach ($sponsorships as $sponsorship)
                      @if ($sponsorship->category !== 'main')
                      <tr>
                          <td>{{$sponsorship->title}}</td>
                          <td style="text-align:center">{{$sponsorship->currency}}<strong> {{number_format($sponsorship->amount)}}</strong></td>
                          <td style="text-align:center">{{$sponsorship->number}}</td>
                          <td>
                              <button class="btn btn-link add-to-cart" data-id={{$sponsorship->id}}>Book Now</button>
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </table>
              </div>



              @endauth
          </div>

          @guest
		  <div class="log-box">
          <div class="row">
              <div class="card p-4" style="width: 40rem;">
                  <h1 class="display-6"><strong>Register to buy sponsorship</strong></h1>

                  <form method="POST" action="{{ route('register') }}">
                      @csrf

                      <div>
                          <label for="name" class="form-label">Authorized Person Name</label>

                          <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                      </div>

                      <!-- Email Address -->
                      <div class="mt-4">
                          <x-label for="email" :value="__('Email')" class="form-label" />

                          <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                      </div>

                      <div>
                          <label for="company" class="form-label">Company</label>

                          <input type="text" name="company" class="form-control" id="company" />
                      </div>

                      <div>
                          <label for="phone" class="form-label">Phone</label>

                          <input type="text" name="phone" class="form-control" id="phone" />
                      </div>

                      <!-- Password -->
                      <div class="mt-4">
                          <x-label for="password" :value="__('Password')" class="form-label" />

                          <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                      </div>

                      <!-- Confirm Password -->
                      <div class="mt-4">
                          <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

                          <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                      </div>

                      <div>
                          <input type="hidden" name="role_id" value={{$sponsorRole->id}}>
                      </div>

                      <div class="flex items-center justify-end mt-4">
                          <x-button class="ml-4 btn btn-primary">
                              {{ __('Register') }}
                          </x-button>



                      </div>


					                   <div class="flex items-center justify-end mt-4">

						  <p class="mt-4">Already Registered?</p>
                  <a style="background: #f32f30!important;" class="btn btn-link" href="/login">Login to continue</a>

				     </div>



                  </form>



              </div>
			  </div>
          </div>

          @endguest
      </div>
  </div>

  </div>

  <script>
      $(function() {
          const token = "{{ csrf_token() }}";

          $('.add-to-cart').click(function(e) {
              e.preventDefault();
              const sponsorshipId = $(this).attr('data-id');
              const payload = {
                  '_token': token,
                  'sponsorship_id': sponsorshipId,
              };

              saveUserSponsorship(payload);
          });

          $('.showbutton').on('click', function() {
              $(this).siblings('.showcase p').slideToggle();
              //this is for change text
              $(this).text(function(i, v) {
                  return v === 'less' ? 'Read More' : 'less'
              });
          });

          function saveUserSponsorship(data) {
              return $.ajax({
                  url: `/user-sponsorships/${data.sponsorship_id}`,
                  type: 'POST',
                  data: JSON.stringify(data),
                  contentType: 'application/json; charset=utf-8',
                  dataType: 'json',
                  processData: false,
                  success: function(result) {
                      if (result?.message) {
                          alert(result.message);
                      }

                      return result;

                  },
                  error: function(xhr, status, error) {
                      return error;
                  },
              });
          }
      });
  </script>

  @stop
