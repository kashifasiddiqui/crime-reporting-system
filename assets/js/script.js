$(document).ready(function(){
	// Function to handle form submissions
	function handleFormSubmission(formId, alertId) {
	    $(formId).submit(function(e){
	        e.preventDefault();
	        var valid = $(formId).valid();
	        if (valid) {
		var data = $(formId).serialize();
		$.post('php/dataHandler.php', data, function(message){
		    $(formId).each(function(){
		        this.reset();
		    });
		    $(alertId).html('<div>'+ message +'</div>');
		});
	        }
	    });
	}
        
	// Handle submissions for each form
	handleFormSubmission("#apply", '#application_alert');
	handleFormSubmission("#items", '#crime');
	handleFormSubmission("#report_crime", '#crime2');
        
	// Function to show a specific form and hide others
	function showForm(formId) {
	    var forms = ['#report_crime_display', '#f_vehicle_form_display', '#m_vehicle_form_display', '#p_found_form_display', '#m_person_form_display', '#item_display'];
	    forms.forEach(function(id) {
	        $(id).hide();
	    });
	    $(formId).show();
	}
        
	// Initial state: Show only the general crime form
	showForm('#report_crime_display');
        
	// Toggle side menu
	$("#side_menu > li > a").on("click", function(e){
	    if (!$(this).hasClass("active")) {
	        $("#side_menu li ul").slideUp(350);
	        $("#side_menu li a").removeClass("active");
	        $(this).next("ul").slideDown(350);
	        $(this).addClass("active");
	    } else {
	        $(this).removeClass("active");
	        $(this).next("ul").slideUp(350);
	    }
	});
        
	// Handle form displays
	$("#r_crime a").on("click", function(e){
	    e.preventDefault();
	    showForm('#report_crime_display');
	});
        
	$("a#person_missing").on("click", function(e){
	    e.preventDefault();
	    showForm('#m_person_form_display');
	});
        
	$("a#person_found").on("click", function(e){
	    e.preventDefault();
	    showForm('#p_found_form_display');
	});
        
	$("a#vehicle_missing").on("click", function(e){
	    e.preventDefault();
	    showForm('#m_vehicle_form_display');
	});
        
	$("a#vehicle_found").on("click", function(e){
	    e.preventDefault();
	    showForm('#f_vehicle_form_display');
	});
        
	$("#lost-found a").on("click", function(e){
	    e.preventDefault();
	    showForm('#item_display');
	});
        
	// Initialize Slick Slider
	$('.slider').slick({
	    infinite: true, // Infinite loop sliding
	    slidesToShow: 1, // Show one slide at a time
	    slidesToScroll: 1, // Scroll one slide at a time
	    autoplay: true, // Enable autoplay
	    autoplaySpeed: 3000, // Autoplay speed in milliseconds (3000ms = 3 seconds)
	    dots: true, // Show dots navigation
	    arrows: true // Show next/previous arrows
	});
        });
        