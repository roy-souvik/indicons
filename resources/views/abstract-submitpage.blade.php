 @extends('layouts.indicons.main-layout')
@section('content')

@if (Auth::user())
<h2 class="title">Submit Abstract in the format below</h2>
<p>Maximum 300 words for the abstract body/description</p>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{route('abstract.save')}}" enctype="multipart/form-data">
    @csrf
    <div class="user__details">
        <div class="input__box">
            <span class="details">Qualification</span>
            <input type="text" name="qualification" value="{{ old('qualification') }}" required>
        </div>

        <div class="input__box">
            <span class="details">Profession</span>
            <input type="text" name="profession" value="{{ old('profession') }}" required>
        </div>

        <div class="input__box">
            <span class="details">Institution</span>
            <input type="text" name="institution" value="{{ old('institution') }}" required>
        </div>

        <!-- <div class="input__box">
            <span class="details">Alternate Number</span>
            <input type="text" name="alternate_number" value="{{ old('alternate_number') }}">
        </div> -->

        <div class="input__box">
            <span class="details">Heading</span>
            <input type="text" name="heading" value="{{ old('heading') }}" required>
        </div>

        <div class="input__box">
            <span class="details">Theme</span>

            <select name="theme" id="theme" required>
                <option value="">-- choose one --</option>
                <option value="originality">Originality</option>
                <option value="clarity">Clarity</option>
                <option value="rigour">Rigour</option>
                <option value="practical relevance.">Practical relevance</option>
            </select>
        </div>

        <div class="input__box">
            <span class="details">Co-Author</span>
            <input type="text" name="co_author" value="{{ old('co_author') }}">
        </div>

        <div class="input__box">
            <span class="details">Image</span>
            <input type="file" name="image" placeholder="Choose image" id="image">
        </div>

        <div class="input__box">
            <span class="details">Description</span>
            <textarea class="form-control" name="description" required cols="30" rows="5">{{ old('description') }}</textarea>
        </div>

        <div>
            <p>
                <label>
                    <input type="checkbox" name="statements[]" value="I agree for podium presentation" /> I agree for podium presentation
                </label>

                <br />

                <label>
                    <input type="checkbox" name="statements[]" value="I agree for poster presentation (if not selected for Podium)" /> I agree for poster presentation (if not selected for Podium)
                </label>

                <br />

                <label>
                    <input type="checkbox" name="statements[]" value="I agree to submit full paper if accepted" /> I agree to submit full paper if accepted
                </label>

                <br />

                <label>
                    <input type="checkbox" name="statements[]" value="I agree my work to be published in your upcoming indexed journal" /> I agree my work to be published in your upcoming indexed journal
                </label>
            </p>
        </div>
    </div>

    <div class="button" role="button">
        <input type="submit" value="Submit" />
    </div>
</form>

@else



<div style="background: #df0000;
    color: #fff;
    text-align: center;
    display: table;
    margin: 60px auto;
    padding: 10px 20px;
    font-size: 21px;
    border: 1px solid;;">Abstract submission will begin from 20.10.2022 </div>




	      <img  src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">


<div class="wrapper fadeInDown">
  <?php /*?><div id="formContent">
 
    <div class="fadeIn first">
 <h2> Submit Abstract </h2>
    </div>

 
   <a href="/registration" class="btn btn-primary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg> Register to submit an abstract</a>



		<a href="/login" class="btn btn-primary btn-lg"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg> Login to submit an abstract</a>


 


  </div><?php */?>
</div>


<br>


@endif

@stop
