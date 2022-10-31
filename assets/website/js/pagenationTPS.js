	
	/** Coded by taparanjan sahu



	 for the pagenation 

	**/
	$( document ).ready(function() {
	    if ( $("ul.pagination li:nth-last-child(2)").hasClass("active") ) {
	    	$("ul.pagination li:nth-last-child(1)").css({"visibility": "hidden"});            
	    }
	    else if ($("ul.pagination li:nth-child(2)").hasClass("active") ) {
	    	$("ul.pagination li:nth-child(1)").css({"visibility": "hidden"});            
	    }
	});