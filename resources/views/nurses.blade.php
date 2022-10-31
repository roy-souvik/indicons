@extends('layouts.indicons.main-layout')
@section('content')

<h1>Nursing Page</h1>



 <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
            <div class="modal-header" style="height:auto; padding:0px!important; margin:0px!important;">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
	      <img src="indicons/images/flyer-4.jpg" style="width:100%">
 
            </div>
            <div class="modal-footer">
                             <a href="indicons/images/flyer-4.jpg" class="btn btn-secondary">Download</a>   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
            </div>
            </div>
        </div>
    </div> 





<br><br><br>

<h2> Coming Soon....</h2>


	      <img  src="indicons/images/SECRETARIATE.png" style="width:100%; margin-top:20px;">
		  
		  
		  
	
<script>
$(document).ready(function(){
    $("#myModal").modal('show');
});

</script>	  
		  
		  
		  
		  
		  

@stop
