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

<div class="inner-pg-box-1">
    Page Under Constraction
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
