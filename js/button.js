		//jquery w/ inline javascript function
		$(function() { //jquery syntax for onDocumentLoaded handler
			//run this after doc has loaded 'cause we don't want it trying to attach to elements that haven't loaded yet
			//$("#JoMomma").click()
			$("#JoMomma").on("click", function(){
				//alert("You clicked JoMomma!");
				$("#JoMomma").toggleClass('btn-primary btn-success');
				});
				
			//$(".alert").alert();
		});