/*-----------------------------------------------------------------------------------
/*
/* Init JS
/*
-----------------------------------------------------------------------------------*/

 jQuery(document).ready(function() {

/*----------------------------------------------------*/
/*	Navigation - Double Tap to Go
------------------------------------------------------*/

   jQuery( '#nav li:has(ul)' ).doubleTapToGo();

/*----------------------------------------------------*/
/*	Back To Top Button
/*----------------------------------------------------*/
		let pxShow = 300; //height on which the button will show
		let fadeInTime = 400; //how slow/fast you want the button to show
		let fadeOutTime = 400; //how slow/fast you want the button to hide
		let scrollSpeed = 300; //how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'

        // Show or hide the sticky footer button
	    jQuery(window).scroll(function() {

			if (jQuery(window).scrollTop() >= pxShow) {
				jQuery("#go-top").fadeIn(fadeInTime);
			} else {
				jQuery("#go-top").fadeOut(fadeOutTime);
			}

		});

        // Animate the scroll to top
		jQuery("#go-top a").click(function() {
			jQuery("html, body").animate({scrollTop:0}, scrollSpeed);
			return false;
		});


/*----------------------------------------------------*/
/*	Flexslider
/*----------------------------------------------------*/
   jQuery('#intro-slider').flexslider({
      namespace: "flex-",
      controlsContainer: "",
      animation: 'fade',
      controlNav: false,
      directionNav: true,
      smoothHeight: true,
      slideshowSpeed: 7000,
      animationSpeed: 600,
      randomize: false,
   });

/*----------------------------------------------------*/
/*	contact form
------------------------------------------------------*/

   jQuery('form#contactForm button.submit').click(function() {

      $('#image-loader').fadeIn();

      let contactName = $('#contactForm #contactName').val();
      let contactEmail = $('#contactForm #contactEmail').val();
      let contactSubject = $('#contactForm #contactSubject').val();
      let contactMessage = $('#contactForm #contactMessage').val();

      let data = 'contactName=' + contactName + '&contactEmail=' + contactEmail +
               '&contactSubject=' + contactSubject + '&contactMessage=' + contactMessage;

      $.ajax({

	      type: "POST",
	      url: "inc/sendEmail.php",
	      data: data,
	      success: function(msg) {

            // Message was sent
            if (msg == 'OK') {
               $('#image-loader').fadeOut();
               $('#message-warning').hide();
               $('#contactForm').fadeOut();
               $('#message-success').fadeIn();   
            }
            // There was an error
            else {
               $('#image-loader').fadeOut();
               $('#message-warning').html(msg);
	            $('#message-warning').fadeIn();
            }

	      }

      });

      return false;

   });


});








