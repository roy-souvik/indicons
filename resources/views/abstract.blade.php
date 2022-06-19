@extends('layouts.indicons.main-layout')
@section('content')
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

        <div class="input__box">
            <span class="details">Alternate Number</span>
            <input type="text" name="alternate_number" value="{{ old('alternate_number') }}">
        </div>

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

                <br/>

                <label>
                    <input type="checkbox" name="statements[]" value="I agree for poster presentation (if not selected for Podium)" /> I agree for poster presentation (if not selected for Podium)
                </label>

                <br/>

                <label>
                    <input type="checkbox" name="statements[]" value="I agree to submit full paper if accepted" /> I agree to submit full paper if accepted
                </label>

                <br/>

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
@stop
