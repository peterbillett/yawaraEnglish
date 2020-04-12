//Dynamic loading
$(function () {
	$('.alert').alert();
	var parameters = getUrlParameter(false);
	var category = getUrlParameter(true);
	if (category){
		loadpage(category, "?"+parameters);
	} else {
		loadpage("home", "");
	}
});

$(document).ready(function() {
	$(document).on('submit', '#quiz', function() {
		$.post("modules/postQuiz.php", $("form#quiz").serialize(), function() {
		  	alert( "Submitted!");
		}).fail(function() {
		    alert( "ERROR! Please contact ピーター先生." );
		});
    	return false;
    });

    $(document).on('submit', '#login', function() {
		$.post("modules/login.php", $("form#login").serialize(), function(data) {
			window.location.href = '/'+data.result;
		}, "json").fail(function() {
		    alert("ERROR: The username or password was incorrect.");
		});
    	return false;
    });
});

//Used to get parameters from the url to redirect the user on load (eg items)
var getUrlParameter = function getUrlParameter(category) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)), sURLVariables = sPageURL.split('&'), sParameterName, i, sPageURL = "";
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (category == true) {
        	if (sParameterName[0] === "category") {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
        } else {
        	if (sParameterName[0] != "category") {
        		if (sPageURL != "") sPageURL += "&";
	            sPageURL += sParameterName[0]+"="+sParameterName[1];
	        }
        }
    }
    if (category == false) return sPageURL;
};

function loadpage(address, parameters){
	//$("#loadingBar").css('display', 'block');
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

function sendPost(address){
	$.post(address).done(function( data ) {
	    $( "#messageContainer" ).html( data );
	});
}