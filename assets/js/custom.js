
( function( $ ) {

	$(document).ready(function(){

		plexx_addFancybox();

	});



	function plexx_addFancybox() {

		Fancybox.bind("[data-fancybox]", {
			infinite: true,
			buttons : [
					"close"
			],
		});

	}



} )( jQuery );
