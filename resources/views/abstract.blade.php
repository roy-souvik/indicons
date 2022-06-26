@extends('layouts.indicons.main-layout')
@section('content')
<h2>GENERAL INSTRUCTIONS:</h2>

<p>Originality. The abstract submitted must be of an original scientific nature and
    have not been previously published in whole or part by any journal or
    publication.
	</p>
	<ul>
<li>  Language. Abstracts MUST be submitted in English. </li>
<li> Mode of Presentation. The Programme Committee reserves the right to select
    and assign the abstracts relevant to the sessions for oral or poster
    presentation.</li>
<li>  Acknowledgement of Receipt. Upon submission, authors will receive a
    confirmation by email. Otherwise, please contact the Congress Secretariat.</li>
<li> Review and Selection. Abstracts will be double-blind and peer reviewed by an
    international panel of eminent experts. Selection will be based upon:
    relevance to theme, originality and interest, clinical and research content, and
    state of completeness.</li>
<li>  Notifications of Acceptance will be sent to presenting authors along with the
    details of the presentation format.</li>
<li> Registration. All presenting authors of abstracts (either oral or poster) are
    required to register and pay the registration fee by the deadline. Failure to do
    so will result in exclusion from the final programme.</li>
<li>  Publication. All accepted abstracts will be published in the Scientific
    Proceedings of the congress in electronic format upon receipt of registration
    fees in full. Authors will be required to sign copyright transfers to Organising
    committee.</li>
	</ul>
<u> Abstracts should be any of the following theams: </u>
	<ul>
<li>  Lympho-Venous disease and management</li>
<li>  Vascular disease and management</li>
<li> Society and healthcare</li>
<li>  Research and sustainable healthcare</li>
</ul>


<h2>Abstract Format</h2>

<p>Word Limit. Abstracts cannot exceed 500 words. A maximum of 2 graphs, tables
    or images saved in JPEG/GIF/ TIF format of at least 300 dpi can be included in
    your abstract. </p>
	<ul>

  <ul>
  <li>  2. Title. Abstract title must be in Title Case, e.g. Asian Pacific Congress of
    Nephrology. The title should be brief and descriptive. </li>
  <li>  3. Author Information. Author and co-author names, institutions, cities and
    countries are to be typed in appropriate boxes. Please include family name and
    initials of author(s) and do NOT include degrees or professional titles (Dr, PhD,
    Prof, MD, etc.).</li>
  <li>  4. Content. Each abstract must contain sufficient details for evaluation. Make the
    abstract as informative as possible. Clearly indicate the aims and conclusions
    supported by data. Results stated in the abstracts must be complete (though
    concise) and final. Organize the body of the abstract as follows: (a) objectives, (b)
    methods, (c) results, (d) conclusions. Use standard abbreviations and generic
    drug names. Place unusual abbreviations or acronyms in parentheses at first use.
    Do not identify author(s) or institution(s) in text.</li>
	</ul>


<h2>ABOUT THE REVIEWING PROCESS</h2>

<p>Your abstract will undergo a double-blind peer review by the Scientific committee
    within two to three weeks after the last date of submission. All abstracts will be
    reviewed using four criteria: </p>
	  <ul>
<li> Originality </li>
<li> Clarity</li>
<li>  Rigour and </li>
<li>  Practical relevance. </li>
</ul>

  <p>  These reviews will be passed on to the Organising Committee, which will make a
    final decision on which abstracts to accept and in what categories.
    Results of the abstract review will be sent to the author within two weeks of
    submission
    The Conference Chair serves as the head of the scientific committee and will take
    the final decision on abstracts.
    Acceptance or rejections of the paper will be sent to you with reviewer comments.
    If a revision is required, the revised abstract must be sent back within a week
    If your abstract is accepted, only if you are registered.</p>

<h2>IMPORTANT INFORMATION FOR THE CO-AUTHORS</h2>

<p>Please note a single registration permits only one person to attend the conference
    If the co-authors would like to attend the conference their registration and payment
    are required to be made independently as delegate
    The certificate will be issued for the co-authors upon their registration/payment for
    the conference.
    Please make prior communications with the organizing committee regards to this
    matter to enjoy the benefits.</p>

<h2>Types of Presentation</h2>

<p>The preferred mode of presentation can be selected during abstract submission. The
    final mode of presentation for the accepted abstracts will be determined by the
    Scientific Committee.</p>

<h2>Outstanding Abstract Awards</h2>

<p>Organising committee will award a number of young investigators* in
    recognition of outstanding and original research (represented by the
    submitted abstracts).
    All accepted abstracts will be eligible for the Outstanding Abstract
    Awards. The organizing committee will identify a number of abstracts with
    the highest scores from all the submitted abstracts. There will be no age
    restriction.</p>

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

<div style="text-align: center">
    <a href="/registration" class="btn btn-primary btn-lg">Register to submit an abstract</a>
    <br>
    <a href="/login" class="btn btn-primary btn-lg mt-3">Login to submit an abstract</a>
</div>
<br>
@endif

<h2>POSTER PRESENTATION GUIDELINE:</h2>

<p>
    Poster displays will be limited to one side of a 4 foot by 8 foot tack board.
    The recommended poster size is 3 feet by 6.5 feet (36 inches by 78
    inches).
<ul>
    <li>The poster board number assigned to the poster must be placed in the upper
        left-hand corner of the display. A poster board number cut-out will be
        provided and must be visible at all times.</li>
    <li>Be sure to include the abstract title, author and coauthor names, and the
        institution(s) where research is underway.
    <li>Place your e-mail address, phone, and fax numbers in the upper right-hand
        corner of the poster board.</li>

</ul>

<ul>

<p> It is suggested that you place multiple copies of a reproduction of the abstract
in the upper left-hand side of the poster, written with the headings
“Introduction/Background,” Methods,” “Results,” and “Conclusions”. Include your
contact information on these copies for attendees who desire
further information. </p>
<ul>
<li> It is recommended that you hand-carry your poster to the conference, using
tubular packaging or a portfolio case. Costs associated with creating and

shipping the poster display will be the responsibility of the authors. Velcro (easiest to
use), pushpins, or thumbtacks will be provided to mount your
poster. </li>
<li> Refer to your acceptance letter and/or the final conference program for the
time and location of your poster session and set-up time. </li>
<li>The designated poster presenter (author or coauthor) must be present at the
assigned space during the designated time to discuss the work presented.
The Organisers cannot not be responsible for any lost or damaged posters. </li>
</ul>

<p> <strong>Tips for Poster Preparation </strong></p>
<p>Posters should stimulate discussion, not give a long presentation. Therefore,
keep text to a minimum, emphasize graphics, and make sure every item
included in your poster is necessary. </p>
<ul>
<li> Utilize handouts to supplement your poster. </li>
<li> Goal: 20% text, 40% graphics, 40% space.</li>
<li> Make sure ideas flow logically from one section to the next.</li>
<li> Use charts and graphs to illustrate data (avoid large tables of raw data).</li>
<li>Use high resolution photographs (web images often will not work).</li>
<li> Do not use all capital letters.</li>
<p>
 The use of typewritten, handwritten or a printed PowerPointTM presentation
as a poster is unacceptable. Presentations in these formats will be removed. </p>

<p> <strong>Be consistent.</strong> </p>
<ul>
<li>
Keep consistent margins. </li>
<li> Keep line spacing consistent.</li>
<li>  Keep the color, style, and thickness of borders the same.</li>
<li> Keep shading consistent.</li>
</ul>


<p>  <strong>Pick no more than 2–3 fonts</strong> </p>
<p> <strong>Pick no more than 2–3 colors</strong> </p>
<p> <strong> Test readability</strong> </p>
<ul>
 <li>Title banner should be legible from 20 feet away.</li>
 <li> Body text should legible from 6 feet away</li>
  </ul>
</p>

<h2>E-POSTER DISPLAY GUIDELINES</h2>

<p><strong>Instructions for the Preparation of E-Posters </strong></p>

  <p>  Digital E-
    Poster Digital E-Poster without a video Digital E-Poster including a video
    File format PDF (.pdf) and JPG PowerPoint (.pptx)
    Orientation Portrait Format, Single-Page Portrait Format, Single-Page
    Dimensions in
    Pixel<br />


<strong>    1080 width x 1920 height 1080 width x 1920 height</strong>
</p>


  <p>
    Dimensions in
    cm
    70 width x 120 height 70 width x 120 height </p>

    <p>   Recommended
    font size

    Minimum 16 points Minimum 16 points
    Sound No sound supported No sound supported
    Maximum file
    size
    20 MB 50 MB </p>

	<p>

    Video formats .mp4, .mpg, .mov, .avi
    Number of
    videos </p>

   	<p> 5 video </p>

  <p> <u>  Portrait Format, Single-Page </u> </p>
<ul>
<li>Language: All E-Posters should be prepared in English. </li>
<li> File format: PDF or JPG</li>
<li>E-Poster size in pixel: 1080 width x 1920 height – portrait orientation</li>
<li> E-Poster size in cm: 70 width x 120 height – portrait orientation</li>
<li>Font size: 16. Recommended font Arial, Times New Roman</li>
<li> Blue area on top of the template is for title and author names**</li>
</ul>


 <p>   ** The poster must be submitted to the system by July 20, 2021.
    In case you wish to add a video to your poster, please keep these
    requirements in mind: </p>
<ul>
<li>File format: .pptx only </li>
<li>Video formats: .mp4, .mpg, .avi </li>
<li>Max. file size: 50 MB </li>

<li> Max. number: 5 videos </li>
<li> Sound: not supported
    Please note that all E-Posters with videos will be automatically converted
    from .pptx to .pdf format, but the videos can still be played. Hyperlinks,
    animated images and animations are not permitted for E-Posters and will
    be non-functioning.</li>

@stop
