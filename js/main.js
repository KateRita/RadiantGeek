$(function() {
  
  	var offset = 50;
  	
	// create scrollspy object & attach to body
	$('body').scrollspy({ target: '.navbar-list', offset: offset });
	
	// click handler for navbar
	var $root = $('html, body');
	$('.navbar li a').click(function(event) {
	    event.preventDefault();
	    
	    // offset top of section, animate scroll
	    var href = $.attr(this, 'href');
		$root.animate({ 
    		scrollTop: $(href).offset().top - offset + 1
		}, 500, "easeOutExpo", function () {
  	  		window.location.hash = href;
	 	});
	 	
	 	// close the collapsed/mobile menu
	    $('.navbar-collapse').collapse('hide');
	});
	
})

function validateContactForm() {
	
	var x = document.forms["contactform"]["nameInput"].value;
    if (x == null || x == "") {
        alert("Please enter a name.");
        return false;
    }
    
    x = document.forms["contactform"]["emailInput"].value;
    if (x == null || x == "") {
        alert("Please enter an email address.");
        return false;
    }
    
    x = document.forms["contactform"]["messageInput"].value;
    if (x == null || x == "") {
        alert("Please enter a message.");
        return false;
    }
}
