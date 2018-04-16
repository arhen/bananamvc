$(function () {
	$(".delete").click(function() {
		var c = confirm("Are you sure to delete?");
		if (c == false)
			return false;
	});
});