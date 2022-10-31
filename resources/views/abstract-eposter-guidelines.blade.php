  @extends('layouts.indicons.main-layout')
@section('content')
<div class="inner-page">
<h1>E-POSTER DISPLAY GUIDELINES</h1>

<p>Instructions for the Preparation of E-Posters </p>

<table  cellspacing="0" cellpadding="0" align="left" style="width:100%;">
  <tr>
    <th width="253" valign="middle"> <strong>Digital E-Poster</strong> </th>
    <th width="373" valign="middle"> <strong>Digital E-Poster without a video</strong> </th>
    <th width="431" valign="middle"> <strong>Digital E-Poster including a video</strong> </th>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>File format</strong></p></td>
    <td align="center" valign="top"><p>PDF    (.pdf) and JPG</p></td>
    <td align="center" valign="top"><p>PowerPoint    (.pptx)</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Orientation</strong></p></td>
    <td align="center" valign="top"><p>Portrait    Format, Single-Page</p></td>
    <td align="center" valign="top"><p>Portrait    Format, Single-Page</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Dimensions in Pixel</strong></p></td>
    <td align="center" valign="top"><p>1080    width x 1920 height</p></td>
    <td align="center" valign="top"><p>1080    width x 1920 height</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Dimensions in cm</strong></p></td>
    <td align="center" valign="top"><p>70    width x 120 height</p></td>
    <td align="center" valign="top"><p>70    width x 120 height</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Recommended font size</strong></p></td>
    <td align="center" valign="top"><p>Minimum    16 points</p></td>
    <td align="center" valign="top"><p>Minimum    16 points</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Sound</strong></p></td>
    <td align="center" valign="top"><p>No    sound supported</p></td>
    <td align="center" valign="top"><p>No    sound supported</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Maximum file size</strong></p></td>
    <td align="center" valign="top"><p>20 MB</p></td>
    <td align="center" valign="top"><p>50 MB</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Video formats</strong></p></td>
    <td align="center" valign="top"></td>
    <td align="center" valign="top"><p>.mp4,    .mpg, .mov, .avi</p></td>
  </tr>
  <tr>
    <td width="253" valign="top"><p align="center"><strong>Number of videos</strong></p></td>
    <td align="center" valign="top"></td>
    <td align="center" valign="top"><p>5 video</p></td>
  </tr>
</table>


	      <img  src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">
</div>


<div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
            <div class="modal-header" style="height:auto; padding:0px!important; margin:0px!important;">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
	      <img src="indicons/images/pdf1-1.png" style="width:100%">
		  	      <img src="indicons/images/pdf2-1.png" style="width:100%">
				  <p> &nbsp; </p>

			  	      <img src="indicons/images/flyer-5.jpg" style="width:100%">			  
				  
			  
				  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
            </div>
            </div>
        </div>
    </div>
	
<script>
$(document).ready(function(){
    $("#myModal").modal('show');
});

</script>

@stop
