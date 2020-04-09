$(function () {
	$('.alert').alert();
	var category = getUrlParameter("category");
	var grade = getUrlParameter("grade");
	var id = getUrlParameter("id");
	if (category && grade){
		if (id) {
			loadpage(category,"?grade="+grade+"&id="+id);
		} else {
			loadpage(category,"?grade="+grade);
		}
	} else {
		loadpage("home","");
	}
});

//https://stackoverflow.com/questions/19491336/get-url-parameter-jquery-or-how-to-get-query-string-values-in-js 15-08-2017
//Used to get parameters from the url to redirect the user on load (eg items)
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)), sURLVariables = sPageURL.split('&'), sParameterName, i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function loadpage(address, parameters){
	$("#loadingBar").css('display', 'block');
	$.get("modules/" + address + ".php" + parameters, function( data ) {
	  	$( "#pageCore" ).html( data );
	})
	.done(function() {
	  	$("#loadingBar").css('display', 'none');
	  	$(".alert").alert('close');
	})
	.fail(function() {
    	$("#loadingBar").css('display', 'none');
    	displayError("alert-danger", "Error!", "Please refresh the page.");
  	})
};

function displayError(errortype, heading, text){
	$( "#erorrContainer" ).html("<div class=\"alert " + errortype + " alert-dismissible fade show\" role=\"alert\"><strong>" + heading + "</strong><br>" + text + "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
};