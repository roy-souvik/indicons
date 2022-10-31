   @extends('layouts.indicons.main-layout')
@section('content')

@include('partials.sponsorship-styles')

<style>
.sponsor-table .btn{    background: #296dc4!important;

}


.arrowBox{
      position: relative;
    width: 100%;
    background: linear-gradient(45deg, #3bade3 0%, #576fe6 25%, #9844b7 51%, #ff357f 100%);
    height: auto;
    line-height: 40px;
    margin-bottom: 21px;
    color: #fff;
    font-weight: 600;
    font-size: 22px;
    text-align: left;
    padding-left: 14px;
    display: flex;
    justify-content: space-between;
    padding-right: 20px;
    box-shadow: 0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 1%), 0 3px 5px -1px rgb(0 0 0 / 10%);
}
.arrowBox span{
}
.arrowBox a{
  color:#fff;
}

/*top arrow*/

.arrow-top:before{
  position: absolute;
  top: -10px;
  left:50%;
  margin-left: -10px;
  content:"";
  display:block;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #0085D1; 
}

/*bottom arrow*/

.arrow-bottom:after{
  position: absolute;
  bottom: -10px;
  left:50%;
  margin-left: -10px;
  content:"";
  display:block;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid #0085D1; 
}

/*right arrow*/

.arrow-right:after{
    content: "";
    position: absolute;
    right: -20px;
    top: 0;
 
}

/*left arrow*/

.arrow-left:before{
    content: "";
    position: absolute;
    left: -20px;
    top: 0;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 20px solid #0085D1; 
}

.spon-scl{
}


.spon-scl select{    background: linear-gradient(45deg, #3bade3 0%, #576fe6 25%, #9844b7 51%, #ff357f 100%);
    color: #fff;
    padding: 6px;
}

.spon-scl option{background: #002056;
    color: #fff;
}
</style>

<div class="reg-table">
    <div style="font-size: 24px!important; background:none!important;" class="title">SPONSORSHIP PLANS</div>

<?php /*?>    <div class="sponsor-list-bx">
        @include('partials.sponsorship-slab')
    </div><?php */?>

<!--    <button type="button" class="btn-reg-table" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-arrows-from-line"></i> Compact View
    </button>--><br />
<br />
<br />

</div>

 <div>
 
 
<div class="spon-scl"> 
 
<div class="row">


<div class="col-md-5">

<div href="#" class="arrowBox arrow-right">TITANIUM  <span>INR  1,000,000 + GST </span></div>
<div href="#" class="arrowBox arrow-right">PLATINUM  
 <span>INR 700,000 + GST </span></div>
 
 <div href="#" class="arrowBox arrow-right">DIAMOND  
 <span>INR  500,000 + GST </span></div>
 
  
 <div href="#" class="arrowBox arrow-right">GOLD  
 <span>INR  400,000 + GST </span></div>
 
 
   
 <div href="#" class="arrowBox arrow-right">SILVER   
 <span>INR  300,000 + GST </span></div>
 
  
 <div href="#" class="arrowBox arrow-right">BRONZE    
 <span>INR  200,000 + GST </span></div>
 
 
  <p style="color: #000;
    margin-top: 0px;
    padding-bottom: 0px;
    margin-bottom: 2px;
    font-weight: 600;">Other Sponsorships </p> 
 <div href="#" class="arrowBox arrow-right" style="padding:0px;"> 

 <select style="word-wrap: normal;
    font-size: 15px;
    width: 100%;
    font-weight: 600;">
 
 <option> Named hall (main hall) for the entire conference  INR 1,000,000 + GST </option>
  <option> Named hall (small hall) for the entire conference  INR 500,000 + GST </option>
    <option> Named poster presentation hall  INR 100,000 + GST </option>
  
     <option> Best paper presenter award  INR 100,000 + GST </option> 
      <option> Named breakfast sessions INR 100,000 + GST </option>  
	  
      <option> Named lunch sessions INR 250,000 + GST </option>  	  
	  
      <option> Named tea stations INR 100,000 + GST </option>  	  
      <option> Named dinner events INR 500,000 + GST </option> 	  
	  
      <option> Sponsorship ad during scientific session INR 100,000 + GST </option> 	  
      <option> In hall branding  INR 100,000 + GST </option> 	 	  
	       <option> Branded Souvenirs INR 150,000 + GST </option> 	 
	  
	       <option> Photo zone branding with logo INR 150,000 + GST </option> 	 	  
	  
	       <option> Named Mobile charging station INR 150,000 + GST </option> 	  
	       <option> Conference bag INR 250,000 + GST </option> 	  	  
	  
		       <option> Notepad and pen sponsorship INR 100,000 + GST </option> 	  
	  
		       <option> Volunteers dress INR 100,000 + GST </option> 		  
	  
	  
	  
 </select>
  </div>
 
</div>

<div class="col-md-1"> </div>
<div class="col-md-6">


    <a  target="_blank" href="indicons/images/A4-new-2.pdf"  style="position:relative; display:block;">    
   <div style="position: absolute;
    bottom: -1px;
    background: black; text-decoration:none;
    right: 10px;
    padding: 7px;
    font-weight: 600;" class="transition duration-500 border-0 text-lg h-12 w-36 bg-red-500 hover:bg-red-700 text-white mt-2 px-3 rounded-md">
       <span>Download</span>
       <i class='bx bx-down-arrow-alt animate-bounce text-xl'></i></div>
	      <img  src="indicons/images/spon-pdf.jpg" style="width:100%; margin-top:0px; box-shadow: 0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 1%), 0 3px 5px -1px rgb(0 0 0 / 10%);">
</a></div>

</div>

</div>
 
<?php /*?>    <div class="row">
        <div class="col-md-6">
            <h3 class="mt-4">Sponsorships</h3>
            <div>
                @foreach ($sponsorships as $sponsorship)

                @if ($sponsorship->category == 'main')
                <div class="pricingTable-header d-flex" style="background-color: #ffffff;">
                    <img style="width: 43px;float: right;display: block;height: 43px;margin-top: 6px;margin-left: 15px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{$sponsorship->title}}">

                    <h3 class="title" style="color: black; font-size: 18px!important;">
                        {{$sponsorship->title}}
                        <span> {{$sponsorship->currency}} {{number_format($sponsorship->amount)}} </span>
                    </h3>

                 

<a href="#"   data-bs-toggle="modal" data-bs-target="#sponsorship-details-{{$sponsorship->id}}">

<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg>

</a>







                    @auth
                    <button style="background:#296dc4!important;" data-id={{$sponsorship->id}} class="btn btn-link add-to-cart">
                        Book Now
                    </button>
                    @endAuth

                    @guest
                    <a style="width: 145px;
    margin-left: 13px;
    line-height: 15px;
    font-size: 14px;
    font-weight: 500;" class="btn btn-primary" href="{{route('login')}}">Login to book</a>
                    @endguest
                </div>
                @endif
                @endforeach
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
                            @auth
                            <button class="btn btn-link add-to-cart" data-id={{$sponsorship->id}}>Book Now</button>
                            @endauth

                            @guest
                            <a style="    border: 1px solid #296dc4!important;
    width: 128px;
    line-height: 27px;
    border-radius: 3px!important;
    background: #296dc4;
    overflow: hidden;" class="btn btn-primary" href="{{route('login')}}">Login to book</a>
                            @endguest
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div><?php */?>

    @include('partials.sponsorship-compact')

    @foreach ($sponsorships as $sponsorship)
    @if ($sponsorship->category == 'main')
    <div id="sponsorship-details-{{$sponsorship->id}}" class="modal">
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
                            <img style="width: 43px;float: right;display: block;height: 43px;margin-top: 6px;margin-left: 24px;" class="rounded" src="{{url('indicons/images')}}/{{strtolower($sponsorship->title)}}.png" alt="{{strtolower($sponsorship->title)}}">
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
                            @auth
                            <button class="btn btn-primary add-to-cart" data-id="{{$sponsorship->id}}">
                                Book Now
                            </button>
                            @endauth

                            @guest
                            <a class="btn btn-primary" href="{{route('login')}}">Login to book</a>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach

    @auth
    <a href="{{route('sponsorship.buy')}}" class="btn btn-primary pay-btn">Proceed to payment</a>
    @endauth

    @guest
    <?php /*?><div class="demo">
        <div class="container">
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
                                <a style="background: #296dc4!important;" class="btn btn-link" href="/login">Login to continue</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><?php */?>
	
	
	      <img  src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">
	
    @endguest
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
                    getSponsorshipCart();
                    if (result?.message) {
                        getSponsorshipCart().then(result => {
                            const markup = getCartMarkup(result.data);

                            Swal.fire({
                                title: 'Success!',
                                html: markup,
                                text: result.message,
                                icon: 'success',
                            });
                        });
                    }

                    return result;
                },
                error: function(xhr, status, error) {
                    return error;
                    Swal.fire({
                        title: 'Error!',
                        text: 'Unable to save sponsorship',
                        icon: 'error',
                    });
                },
            });
        }

        function getCartMarkup(userSponsorships = []) {
            let markup = '<ul class="list-group">';

            userSponsorships.forEach(userSponsorship => {
                markup += `<li class="list-group-item">${userSponsorship.sponsorship.title}</li>`;
            });

            markup += '</ul>';

            return markup;
        }

        function getSponsorshipCart() {
            return $.ajax({
                url: '/sponsorships-cart',
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function(result) {
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
