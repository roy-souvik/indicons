 @extends('layouts.indicons.main-layout')
@section('content')

<style>

.form-control{    border-bottom: 2px solid #9b9b9b;
    border-left: 0px;
    border-right: 0px;
    border-top: 0px;
    border-radius: 0px;
    padding-left: 0px;
}

</style>

 <div class="container">
    <div class="row">
        <div class="col-md-8">
		<h1 style="margin-top:20px;">Contact Us</h1>
            <div class="login-form">
                <form action="/contact-us" method="POST">
                    @csrf
                    <p style="text-align:center; color:#000; text-align:left;"> Leave your details </p>
                    <div class="form-group mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>

                    <div class="form-group mb-2">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="required">
                    </div>

                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                    </div>

                    <div class="form-group mb-2">
                        <textarea name="comment" placeholder="Leave message" class="form-control" cols="50" rows="5">    </textarea>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block btn-lg" value="Submit">
                </form>
            </div>
        </div>
		
		
        <div class="col-md-4">
 
		<h4 style="    margin-top: 37px;
    margin-bottom: 0px;"> Dr. Jayanta Das </h4>
		    <p style="    color: #b7161c;
    text-align: left;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 5px;"> Organizing Secretary</p>
		<p style="font-size: 14px;">KB 2/6
SALT LAKE
SECTOR - III
KOLKATA - 700106 </p>
		<h5>Phone : +91 98362 16494 </h5>		
		<h5> Email : inpalmsiamle25@gmail.com
 </h5>			
		</div>		
		
		
		
		
		
    </div>
</div>


@stop
