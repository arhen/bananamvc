$(function () {
	$("#re-pass").keyup(function () {
		if ($("#pass").val() == $("#re-pass").val()) {
			$("#valid").html("Password Correct!");
			$("#valid").css("color","green");
			$("#submit").prop("disabled",false);
		}else if ($("#pass").val() != $("#re-pass").val()){
			$("#valid").html("Password In-Correct!");
			$("#valid").css("color","red");
			$("#submit").prop("disabled",true);
		}
	});
});