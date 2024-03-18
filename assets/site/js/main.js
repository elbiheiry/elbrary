$(document).ready(function() {
	$('.custom-select').multiselect({
		includeSelectAllOption: true,
		selectAllText: 'تحديد الكل!',
		nonSelectedText: 'الملحقات المطلوبة',
		allSelectedText: 'تم تحديد الكل'
					
	});
});
$(document).ready(function(){

	$(".cutting-methods").click(function(){
		if($(this).prop("checked") == true){
			$('.'+$(this).attr('id')+'-block').slideDown();
		}
		else if($(this).prop("checked") == false){
            $('.'+$(this).attr('id')+'-block').slideUp();
		}
	});
});

/*PrettyPhoto
==========================*/
$(document).ready(function () {
    "use strict";
	$('.testmonial-item').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
	  	}
	});
});
/*Table Content
=================================
*/

$(window).load(function() {
    "use strict";
    $("#loading").fadeOut(500, function() {
        $("body").css({
            position: "static",
            top: "auto",
            bottom: "auto",
            height: "auto"
        });
        $(this).parent().fadeOut(500, function() {
            $(this).remove();
        });
    });
});
/*Add Review Scroll
==============================*/
$(document).ready(function () {
    "use strict";
    $('a[href="#order-detail--app"]').click(function (e) {
        e.preventDefault();
        $('body, html').animate({
            scrollTop: $("#order-detail--app").offset().top
        }, 1000);
    });
});
/* Product Number count
====================================*/
$(document).ready(function () {
    'use strict';
    $('.number-up').on('click', function () {
        var $value = ($(this).closest('.count-number').find('input[type="text"]').val());
        $(this).closest('.count-number').find('input[type="text"]').val(parseFloat($value) + 1).attr('value', parseFloat($value) + 1);
        form_submit();
        return false;
    });
    $('.number-down').on('click', function () {
        var $value = ($(this).closest('.count-number').find('input[type="text"]').val());
        if ($value > 1) {
            $(this).closest('.count-number').find('input[type="text"]').val(parseFloat($value) - 1).attr('value', parseFloat($value) - 1);
        }
        form_submit();
        return false;
    });
    $('.count-number').find('input[type="text"]').on('keyup', function () {
        $(this).attr('value', $(this).val());
    });
});
/*Owl Carousel
=============================*/
$(document).ready(function () {
    "use strict";
    var selctor = $("#testimonial-1");
    if (selctor.length) {
        selctor.owlCarousel({
            items : 4,
			itemsDesktop : [1199, 3],
            itemsDesktopSmall : [979, 3],
            itemsMobile : [767, 2],
            navigation : false,
            pagination : true,
            autoPlay : false,
            loop : true,
            navigationText: ["التالى", "السابق"]
        });
    }

});




