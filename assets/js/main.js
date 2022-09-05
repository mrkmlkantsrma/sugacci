(function ($) {
    "use strict";

    new WOW().init(); 
    var baseurl = $('#baseurl').val(); 

    /*---background image---*/
	function dataBackgroundImage() {
		$('[data-bgimg]').each(function () {
			var bgImgUrl = $(this).data('bgimg');
			$(this).css({
				'background-image': 'url(' + bgImgUrl + ')', // + meaning concat
			});
		});
    }
    
    $(window).on('load', function () {
        dataBackgroundImage();
    });
    
    /*---stickey menu---*/
    $(window).on('scroll',function() {    
           var scroll = $(window).scrollTop();
           if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
           }else{
            $(".sticky-header").addClass("sticky");
           }
    });
    
   
    /*---slider activation---*/
    $('.slider_area').owlCarousel({
        animateOut: 'fadeOut',
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        dots:true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    });
    
    /*---product column4 activation---*/
       $('.product_column4').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
		loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 4,
        dots:false,
        margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            576:{
				items:2,
			},
            768:{
				items:3,
			},
            992:{
				items:4,
			},

		  }
    });

     /*---product column5 activation---*/
       $('.product_column5').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 5,
        dots:false,
        margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            576:{
				items:2,
			},
            768:{
				items:3,
			},
            992:{
				items:4,
			},
            1200:{
				items:4,
			},
            1500:{
				items:5,
			},

		  }
    });
    
     /*---product2 column5 activation---*/
       $('.product2_column5').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 5,
        dots:false,
        margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            576:{
				items:2,
			},
            768:{
				items:3,
			},
            992:{
				items:4,
			},
            1200:{
				items:4,
			},
            1300:{
				items:5,
			},

		  }
    });
    
    
    /*---product column3 activation---*/
       $('.product_column3').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        dots:false,
           margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
            0:{
            items:1,
        },
        576:{
            items:2,
        },
        768:{
            items:3,
        },
        992:{
            items:4,
        },

      }
    });

    /*---blog column3 activation---*/
    $('.blog_column3').owlCarousel({
		loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 8000,
        items: 3,
        dots:false,
        margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
            0:{
            items:1,
        },
        480:{
            items:1,
        },
        768:{
            items:2 ,
        },
        992:{
            items:3,
        },
        1200:{
            items:3,
        },

      }
    });

    /*---instagram column4 activation---*/
    $('.instagram_column4').owlCarousel({
		loop: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 8000,
        items: 4,
        dots:false,
        margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
            0:{
            items:1,
        },
        480:{
            items:2,
        },
        768:{
            items:3,
        },
        992:{
            items:3,
        },
        1200:{
            items:4,
        },

      }
    });


        
    
    /*---brand container activation---*/
     $('.brand_container').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 6,
        dots:false,
       navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            480:{
				items:3,
			},
            768:{
				items:4,
			},
            992:{
				items:5,
			},
            1200:{
				items:6,
			},

		  }
    });
    
      /*---testimonial carousel activation---*/
    $('.testimonial_carousel').owlCarousel({
		loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 8000,
        items: 1,
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            480:{
				items:1,
			},
            768:{
				items:1 ,
			},
            992:{
				items:1,
			},
            1200:{
				items:1,
			},

		  }
    });
    
    /*---testimonial active activation---*/
    $('.testimonial-two').owlCarousel({
		loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        dots: true,
        
    })
    
    
    /*---blog thumb activation---*/
    $('.blog_thumb_active').owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    });
    
    
    
    /*---single product activation---*/
    $('.single-product-active').owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        margin:15,
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            320:{
				items:2,
			},
            992:{
				items:3,
			},
            1200:{
				items:4,
			},


		  }
    });
 
   
    /*---product navactive activation---*/
    $('.product_navactive').owlCarousel({
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
				0:{
				items:1,
			},
            250:{
				items:2,
			},
            480:{
				items:3,
			},
            768:{
				items:4,
			},
		  
        }
    });

    $('.modal').on('shown.bs.modal', function (e) {
        $('.product_navactive').resize();
        
    })

    $('.quick_button').on('click',function(e){
        e.preventDefault();
        var product_id = $(this).val();
        var href = $(this).attr('href');
        var url = baseurl+'home/HomeController/productPopup';
        $.ajax({
            url: url,
            type: 'POST',
            data: {product_id: product_id},
            success: function(response){ 

              $("#modal_box .modal_body").html(response);
            }
        });
    })

    $('.add_to_cart').on('click',function(e){
        e.preventDefault();
        var product_id = $(this).val();
        var href = $(this).attr('href');
        var url = baseurl+'home/HomeController/homepageCart/'+product_id;
        $.ajax({
            url: url,
            type: 'POST',
            data: {product_id: product_id},
            success: function(response){ 
                setTimeout(() => {
                    $("#modal_box").fadeOut('600');
                    $(".modal-content .close").trigger('click');
                    // document.body.scrollTop = 0; // For Safari
                    // document.documentElement.scrollTop = 0; 
                },400);
                setTimeout(() => {
                    $(".mini_cart_wrapper > a").trigger('click');
                    $(".mini_cart_close").hide();
                }, 1000);
                $("#mini_card #mini_cart").load(location.href + '#mini_card #mini_cart');
            }
        });
      })


    $('#loginSubmit').on('click',function(e){
        e.preventDefault();
        let email = $("#loginEmailcheck").val();
        let password = $("#loginPassword").val();
        var urlName = $("#urlName").val();
        var href = $(this).attr('href');
        var url = baseurl+'home/HomeController/LoginUser';
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email, password: password},
            success: function(response){ 
              let res = JSON.parse(response);
              if(res.success == 'false'){
                let message = res.message;
                $("#showLoginMessage").html(message);
              }
              if(res.success == 'true'){
                let message = res.message;
                $("#showLoginMessage").html(message);
                if(urlName == 'usercreate'){
                    let backUrl = baseurl+'home/HomeController/Checkout';
                    window.location = backUrl;  
                }else{
                    setTimeout(() => {
                        location.reload();
                    }, 2500);
                }
              }
            }
        });
    })

    $('#RegisterSubmit').on('click',function(e){
        e.preventDefault();
        let email = $("#emailcheck").val();
        let password = $("#RegisterPassword").val();
        var urlName = $("#urlName").val();
        var href = $(this).attr('href');
        var url = baseurl+'home/HomeController/RegisterUser';
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email, password: password},
            success: function(response){ 
                let res = JSON.parse(response);
                if(res.success == 'false'){
                    let message = res.message;
                    $("#showRegMessage").html(message);
                }
                if(res.success == 'true'){
                    let message = res.message;
                    $("#showRegMessage").html(message);
                    if(urlName == 'usercreate'){
                        let backUrl = baseurl+'home/HomeController/Checkout';
                        window.location = backUrl;
                    }else{
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                }
            }
        });
    })

    $('#FillUserDetails').on('click',function(e){
        e.preventDefault();
        let firstname = $("#first-name").val();
        let lastname = $("#last-name").val();
        let email = $("#email").val();
        let username = $("#user-name").val();
        let number = $("#number").val();
        var url = baseurl+'home/HomeController/FillUserDetails';
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email, lastname: lastname , firstname: firstname, number: number, username: username},
            success: function(response){ 
                let res = JSON.parse(response);
                if(res.success == 'false'){
                    let message = res.message;
                }
                if(res.success == 'true'){
                    let message = res.message;
                    setTimeout(() => {
                       location.reload();  
                    }, 500);
                }
            }
        });
    })


    $('#ContactSubmitForm').on('click',function(e){
        e.preventDefault();
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let message = $("#message").val();
        var url = baseurl+'home/HomeController/contactSubmit';
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email, fname: fname , lname: lname, phone: phone, message: message},
            success: function(response){ 
                let res = JSON.parse(response);
                if(res.success == 'false'){
                    let message = res.message;
                    $(".form-messege").show();
                    $(".form-messege").html(message);
                }
                if(res.success == 'true'){
                    let message = res.message;
                    $(".form-messege").show();
                    $(".form-messege").html(message);
                    setTimeout(() => {
                        $(".form-messege").hide();    
                    }, 3500);
                }
            }
        });
    });

    $('#forgetClick').on('click',function(e){
        e.preventDefault();
        $('#forgetPassword').show();
    });

    $('#resetPassword_form').on('click',function(e){
        e.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();
        var url = baseurl+'home/HomeController/CreateResetPassword';
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email, password: password},
            success: function(response){ 
                let res = JSON.parse(response);
                if(res.success == 'false'){
                    let message = res.message;
                    $("#showresetMessage").html(message);
                }
                if(res.success == 'true'){
                    let message = res.message;
                    $("#showresetMessage").html(message);
                    setTimeout(() => {
                        location.reload('/account');
                    }, 1000);
                }
            }
        });
    })

    $('#ForgetPasswordSubmit').on('click',function(e){
        e.preventDefault();
        let email = $("#forgetemailcheck").val();
        var url = baseurl+'home/HomeController/ForgetPassword';
        $.ajax({
            url: url,
            type: 'POST',
            data: {email: email},
            success: function(response){ 
                let res = JSON.parse(response);
                if(res.success == 'false'){
                    let message = res.message;
                    $("#showforgetMessage").html(message);
                }
                if(res.success == 'true'){
                    let message = res.message;
                    $("#showforgetMessage").html(message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            }
        });
    })

    $(document).ready(function(){

    $("#checkoutForm").validate({
        submitHandler: function(form, event) {
            $('.jqSpinner').show();
            event.preventDefault();
            let url = baseurl+'home/HomeController/PlaceOrder';
                $.ajax({
                    url: url,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        let res = JSON.parse(response);
                       
                        if(res.success == 'true'){
                            
                            let orderData = res.data.orderItems;
                            let paymentType= res.data.payment_type;
                            let orderamount= res.data.amount;
                            let item_id = orderData[0].order_id;

                        setTimeout(() => {
                            if(paymentType == 'razorpay'){
                            let totalAmount = (orderamount * 100);
                                
                            var loadExternalScript = function(path) {
                                var result = $.Deferred(),
                                    script = document.createElement("script");
                            
                                script.async = "async";
                                script.type = "text/javascript";
                                script.src = path;
                                script.onload = script.onreadystatechange = function(_, isAbort) {
                                    if (!script.readyState || /loaded|complete/.test(script.readyState)) {
                                    if (isAbort)
                                        result.reject();
                                    else
                                        result.resolve();
                                    }
                                };
                            
                                script.onerror = function() {
                                    result.reject();
                                };
                            
                                $("head")[0].appendChild(script);
                            
                                return result.promise();
                                };
                            
                                // Use loadScript to load the Razorpay checkout.js
                            // -----------------------------------------------
                            var callRazorPayScript = function(itemId, amount, qty, processorId) {
                                var merchangeName = "Sugacci",
                                    img = "https://cdn.shopify.com/s/files/1/0272/1375/8577/files/logo_180x.png?v=1588022433",
                                    name = "Sugacci",
                                    description = "Order Payment",
                                    amount = amount,
                                    qty = qty;
                                    
                                loadExternalScript('https://checkout.razorpay.com/v1/checkout.js').then(function() { 
                                var options = {
                                    key: 'rzp_test_nJScr06pajaP7k',
                                    protocol: 'https',
                                    hostname: 'api.razorpay.com',
                                    amount: amount,
                                    name: merchangeName,
                                    description: description,
                                    image: img,
                                    prefill: {
                                    name: name,
                                    },
                                    theme: {
                                    color: '#de3509'
                                    },
                                    handler: function (transaction, response){
                                        var trans_id = transaction.razorpay_payment_id;
                                        if(trans_id){
                                            let confirmUrl = baseurl+'home/HomeController/razerpayConfirm';
                                            $.ajax({
                                                url: confirmUrl,
                                                type: "post",
                                                data: {trans_id : trans_id, item_id: item_id},
                                                success: function(response) {
                                                    let thankyouUrl = baseurl+'home/HomeController/Thankyou';
                                                    $.ajax({
                                                        url: thankyouUrl,
                                                        type: "post",
                                                        data: {orderData : orderData, item_id: item_id},
                                                        success: function(response) {
                                                            window.location = thankyouUrl;
                                                        }
                                                    });
                                                }
                                            });
                                        }else{
                                            var icon = 'error';
                                            var message = 'Payment Failed!';
                                            alertMessage(icon, message);

                                        }
                                    }
                                };
                                function alertMessage(icon, message){
                                    Swal.fire({
                                        icon: icon,
                                        title: message,
                                        showConfirmButton: false,
                                        timer:1500
                                    })
                                }
                            
                                window.rzpay = new Razorpay(options);
                                rzpay.open();
                                });
                            }
                           
                            var itemId = item_id,
                                    amount = totalAmount,
                                    processorid = 'razor',
                                    qty = '1';
                        
                            callRazorPayScript(itemId, amount, processorid, qty);

                        }
                        }, 2000);
                            setTimeout(() => {
                                let message = res.message;
                                $(".ajaxResponse").show();
                                $(".ajaxResponse").html(message);
                                $('.jqSpinner').hide();
                                var form = $("#checkoutForm");
                                form.validate().resetForm(); 
                                form[0].reset();
                            }, 700);
                            if(paymentType == 'cashOnDelivery'){
                                setTimeout(() => {
                                    let thankyouUrl = baseurl+'home/HomeController/Thankyou';
                                    $.ajax({
                                        url: thankyouUrl,
                                        type: "post",
                                        data: {orderData : orderData, item_id: item_id},
                                        success: function(response) {
                                            window.location = thankyouUrl;
                                        }
                                    });
                                }, 2500);
                            }
                        }
                        if(res.success == 'false'){
                            
                            let message = res.message;
                            $('.jqSpinner').hide();
                            $(".ajaxResponse").show();
                            $(".ajaxResponse").html(message);
                            setTimeout(() => {
                                $(".ajaxResponse").hide();    
                            }, 3500);

                            
                            
                        }
                    }            
                });
        },
        errorElement: "span",
        rules: {
            first_name: "required",
            last_name: "required",               
            billing_phone: "required",   
            billing_address: "required",       
            billing_city: "required",
            billing_state: "required",
            billing_post_code: "required",
            payment_type: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",             
            email: "Please enter your email",             
            billing_phone: "Please enter a valid phone",
            billing_address: "Please enter your address",
            billing_city: "Please enter your city",
            billing_state: "Please enter your state",
            billing_post_code: "Please enter your postcode",
            payment_type: "Please choose one Payment method",
        }
    });
});




    $(document).ready(function(){
        
        setTimeout(function() {
            $("#myModal").modal('show');
            $("body").removeAttr("style");
        }, 2000);
        setInterval(() => {
            $("body").removeAttr("style");
        }, 5000);
       
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
            var url = baseurl+'home/HomeController/subscribeNewsletter';
            $.ajax({
                url: url,
                method: 'POST',
                data: { email: email},
                success: function(response) {
                    if(response) {
                        var res = JSON.parse(response);
                        jQuery('.subscriptionFormNotices').html('<span class="alert-success text-center">'+res.message+'</span>');
                        $('#subscribeForm')[0].reset();
                        setTimeout(() => {
                            $('.newletter-popup').hide();
                        }, 3000);
                        if($.cookie("shownewsletter") != 1){   
                            $.cookie("shownewsletter",'1')
                        }else{
                            $.cookie("shownewsletter",'0')
                        }
                        $(".modal-open").removeAttr("style");
                        // $("div").remove(".modal-backdrop.fade.show");
                        
                       
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

      
   /*---Newsletter Popup activation---*/
   
   if($.cookie('shownewsletter')==1) $('.newletter-popup').hide();
   $(".modal-open").removeAttr("style");
   //transition effect
   if($.cookie("shownewsletter") != 1){
       $('.newletter-popup').show();
   }
   $('#newsletter_popup_dont_show_again').on('change', function(){
       if($.cookie("shownewsletter") != 1){   
           $.cookie("shownewsletter",'1')
       }else{
           $.cookie("shownewsletter",'0')
       }
   }); 



    //   testimonial swiper js start 
    var swiper = new Swiper('.testimonial-slider', {
    spaceBetween: 30,
    effect: 'fade',
    loop: true,
    mousewheel: {
        invert: false,
    },
    // autoHeight: true,
    pagination: {
        el: '.testimonial-slider__pagination',
        clickable: true,
    }
    });

    //   testimonial swiper js End 

      
    
    $('.product_navactive a').on('click',function(e){
      e.preventDefault();
      var $href = $(this).attr('href');

      $('.product_navactive a').removeClass('active');
      $(this).addClass('active');

      $('.product-details-large .tab-pane').removeClass('active show');
      $('.product-details-large '+ $href ).addClass('active show');

    })
       
    /*--- video Popup---*/
    $('.video_popup').magnificPopup({
        type: 'iframe',
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });
    
    /*--- Magnific Popup Video---*/
    $('.port_popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    
 
    
    /*--- niceSelect---*/
     $('.select_option').niceSelect();
    
    

    /*---  ScrollUp Active ---*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });   
    
    /*---countdown activation---*/
		
	 $('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">days</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">hours</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">secs</div></div></div>'));     
               
       });
	});	
    
    /*---slider-range here---*/
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
       }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
       " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    
    /*---elevateZoom---*/
    // $("#zoom1").elevateZoom({
    //     gallery:'gallery_01', 
    //     responsive : true,
    //     cursor: 'zoom-in',
    //     zoomType : 'inner'
    
    // });  

    //initiate the plugin and pass the id of the div containing gallery images
$("#zoom1").elevateZoom({
	gallery:'gallery_01',
	cursor: 'pointer',
  easing : true,
	galleryActiveClass: 'active',
	imageCrossfade: true,
	loadingIcon: 'https://www.elevateweb.co.uk/spinner.gif'
});

//pass the images to Fancybox
$("#zoom1").bind("click", function(e) {
	var ez = $('#zoom_03').data('elevateZoom');
	$.fancybox(ez.getGalleryList());
	return false;
});
    
    /*---portfolio Isotope activation---*/
      $('.portfolio_gallery').imagesLoaded( function() {

        var $grid = $('.portfolio_gallery').isotope({
           itemSelector: '.gird_item',
            percentPosition: true,
            masonry: {
                columnWidth: '.gird_item'
            }
        });

          /*---ilter items on button click---*/
        $('.portfolio_button').on( 'click', 'button', function() {
           var filterValue = $(this).attr('data-filter');
           $grid.isotope({ filter: filterValue });
            
           $(this).siblings('.active').removeClass('active');
           $(this).addClass('active');
        });
       
    });
    
    
    /*---categories slideToggle---*/
    $(".categories_title").on("click", function() {
        $(this).toggleClass('active');
        $('.categories_menu_toggle').slideToggle('medium');
    }); 

    /*---widget sub categories---*/
    $(".sub_categories1 > a").on("click", function() {
        $(this).toggleClass('active');
        $('.dropdown_categories1').slideToggle('medium');
    }); 
    
    /*---widget sub categories---*/
    $(".sub_categories2 > a").on("click", function() {
        $(this).toggleClass('active');
        $('.dropdown_categories2').slideToggle('medium');
    }); 
    
    /*---widget sub categories---*/
    $(".sub_categories3 > a").on("click", function() {
        $(this).toggleClass('active');
        $('.dropdown_categories3').slideToggle('medium');
    }); 
    
    /*----------  Category more toggle  ----------*/

	$(".categories_menu_toggle li.hidden").hide();
	   $("#more-btn").on('click', function (e) {

		e.preventDefault();
		$(".categories_menu_toggle li.hidden").toggle(500);
		var htmlAfter = '<i class="fa fa-minus" aria-hidden="true"></i> Less Categories';
		var htmlBefore = '<i class="fa fa-plus" aria-hidden="true"></i> More Categories';


		if ($(this).html() == htmlBefore) {
			$(this).html(htmlAfter);
		} else {
			$(this).html(htmlBefore);
		}
	});
    
    
    
    /*---MailChimp---*/
    $('#mc-form').ajaxChimp({
        language: 'en',
        callback: mailChimpResponse,
        // ADD YOUR MAILCHIMP URL BELOW HERE!
        url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

    });
    function mailChimpResponse(resp) {

        if (resp.result === 'success') {
            $('.mailchimp-success').addClass('active')
            $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
            $('.mailchimp-error').fadeOut(400);

        } else if(resp.result === 'error') {
            $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
        }  
    }
    
    /*---Category menu---*/
    function categorySubMenuToggle(){
        $('.categories_menu_toggle li.menu_item_children > a').on('click', function(){
        if($(window).width() < 991){
            $(this).removeAttr('href');
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp();
            }
            else {
                element.addClass('open');
                element.children('ul').slideDown();
                element.siblings('li').children('ul').slideUp();
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp();
            }
        }
        });
        $('.categories_menu_toggle li.menu_item_children > a').append('<span class="expand"></span>');
    }
    categorySubMenuToggle();


    /*---shop grid activation---*/
    $('.shop_toolbar_btn > button').on('click', function (e) {
        
		e.preventDefault();
        
        $('.shop_toolbar_btn > button').removeClass('active');
		$(this).addClass('active');
        
		var parentsDiv = $('.shop_wrapper');
		var viewMode = $(this).data('role');
        
        
		parentsDiv.removeClass('grid_3 grid_4 grid_5 grid_list').addClass(viewMode);

		if(viewMode == 'grid_3'){
			parentsDiv.children().addClass('col-lg-4 col-md-4 col-sm-6').removeClass('col-lg-3 col-cust-5 col-12');
            
		}

		if(viewMode == 'grid_4'){
			parentsDiv.children().addClass('col-lg-3 col-md-4 col-sm-6').removeClass('col-lg-4 col-cust-5 col-12');
		}
        
        if(viewMode == 'grid_list'){
			parentsDiv.children().addClass('col-12').removeClass('col-lg-3 col-lg-4 col-md-4 col-sm-6 col-cust-5');
		}
            
	});
  
  
    
    /*---search box slideToggle---*/
    $(".search_box > a").on("click", function() {
        $(this).toggleClass('active');
        $('.search_widget').slideToggle('medium');
    }); 
    
    
    /*---header account slideToggle---*/
    $(".header_account > a").on("click", function() {
        $(this).toggleClass('active');
        $('.dropdown_account').slideToggle('medium');
    }); 
    
     /*---mini cart activation---*/
    $('.mini_cart_wrapper > a').on('click', function(){
        $('.mini_cart,.off_canvars_overlay').addClass('active')
    });
    
    $('.mini_cart_close,.off_canvars_overlay').on('click', function(){
        $('.mini_cart,.off_canvars_overlay').removeClass('active')
    });

    
    /*---canvas menu activation---*/
    $('.canvas_open').on('click', function(){
        $('.offcanvas_menu_wrapper,.off_canvars_overlay').addClass('active')
    });
    
    $('.canvas_close,.off_canvars_overlay').on('click', function(){
        $('.offcanvas_menu_wrapper,.off_canvars_overlay').removeClass('active')
    });
    
    
    $('#nav-tab a,#nav-tab2 a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
      })
    
    /*---Off Canvas Menu---*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fa fa-angle-down"></i></span>');
    
    $offcanvasNavSubMenu.slideUp();
    
    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length){
                $this.siblings('ul').slideUp('slow');
            }else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if( $this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/) ){
        	$this.parent().toggleClass('menu-open');
        }else if( $this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/) ){
        	$this.toggleClass('menu-open');
        }
    });

    $('#customers-testimonials').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: false,
        dots:false,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 2
          },
          1170: {
            items: 3
          }
        }
    });
    
    
})(jQuery);	

