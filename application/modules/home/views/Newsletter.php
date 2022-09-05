
<!-- breadcrumb -->
<!-- <section class="main_breadcrumb">
	<div class="container-fluid">
		<div class="row">
			<div class="breadcrumb-content">
				<h2>About Us</h2>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="">About Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</section> -->
<div id="content" class="about_page">
<!-- about Us -->
	<div id="about_us" class="about_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="about_text wow slideInLeft">
						<h2>Wel come to Fashion Shop</h2>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-newsletter">
                                <div class="modal-content">
                                    <form id="subscribeForm" method="post">
                                        <div class="modal-header">
                                            <h4>Subscribe to our newsletter</h4>	
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">					
                                            <p>Signup for our weekly newsletter to get the latest news, updates and amazing offers delivered directly in your inbox.</p>
                                            <div class="input-group">
                                                <input type="email" id="subscribeEmail" name="subscribeEmail" class="form-control" placeholder="Enter your email" required>
                                                <div class="input-group-append">
                                                    <input type="button" class="btn btn-primary" value="Subscribe"  id="subscribeBtn">
                                                </div>
                                            </div>
                                        </div>
                                    </form>	
                                    <div class="subscriptionFormNotices form-notices"></div>		
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $("#myModal").modal('show');
        }, 2000);
    });

    $(document).ready(function () {

        $(document).on('click','#subscribeBtn',function(e){
            e.preventDefault();

            var email = $('#subscribeEmail').val();
            if(email == ''){
                jQuery('.subscriptionFormNotices').html('<span class="alert-danger">*Please enter email address!</span>');
                return false;
            }
            if(IsEmail(email)==false){
                jQuery('.subscriptionFormNotices').html('<span class="alert-danger">*Please enter valid email address!</span>');
                return false;
            }

            jQuery('.subscriptionFormNotices').html('');

            $.ajax({
                url: `<?= base_url(); ?>home/HomeController/subscribeNewsletter`,
                method: 'POST',
                data: { email: email},
                success: function(response) {
                    if(response) {
                        var res = JSON.parse(response);
                        jQuery('.subscriptionFormNotices').html('<span class="alert-danger">'+res.message+'</span>');
                        $('#subscribeForm')[0].reset();
                    }else{
                        jQuery('.subscriptionFormNotices').html('<span class="alert-danger">Sorry, the newsletter subscription failed.</span>');
                    }
                    
                }            
            });
        });
    });
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
            return true;
        }
    }
</script>
<style> 
#myModal{
    display: none;
}
.modal-newsletter {	
	color: #999;
	width: 625px;
	max-width: 625px;
	font-size: 15px;
}
.modal-newsletter .modal-content {
	padding: 30px;
	border-radius: 0;		
	border: none;
    background: url("<?= base_url('assets/home/image/newsletter-banner.jpg'); ?>") no-repeat fixed center; 
}
.modal-newsletter .modal-header {
	border-bottom: none;   
	position: relative;
	border-radius: 0;
}
.modal-newsletter h4 {
	color: #000;
	font-size: 30px;
	margin: 0;
	font-weight: bold;
}
.modal-newsletter p {
	color: #fff;
}
.modal-newsletter .close {
	position: absolute;
	top: -15px;
	right: -15px;
	text-shadow: none;
	opacity: 0.3;
	font-size: 24px;
}
.modal-newsletter .close:hover {
	opacity: 0.8;
}
.modal-newsletter .icon-box {
	color: #7265ea;		
	display: inline-block;
	z-index: 9;
	text-align: center;
	position: relative;
	margin-bottom: 10px;
}
.modal-newsletter .icon-box i {
	font-size: 110px;
}
.modal-newsletter .form-control, .modal-newsletter .btn {
	min-height: 46px;
	border-radius: 0;
}
.modal-newsletter .form-control {
	box-shadow: none;
	border-color: #dbdbdb;
}
.modal-newsletter .form-control:focus {
	border-color: #f95858;
	box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
}
.modal-newsletter .btn {
	color: #fff;
	background: #f95858;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	padding: 6px 20px;
	min-width: 150px;
	margin-left: 6px !important;
	border: none;
}
.modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
	box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
	background: #f72222;
	outline: none;
}
.modal-newsletter .input-group {
	margin-top: 30px;
}
.hint-text {
	margin: 100px auto;
	text-align: center;
}
</style>
