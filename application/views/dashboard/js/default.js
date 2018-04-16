$(function () {
	$.get('dashboard/xhrGetListings',function (o ) {
		// console.log(o[0].text)
		
		for (var i = 0; i < o.length; i++) {
			$('#listInsert').append('<div>' + o[i].text +  ' ' + '<a class="del" rel="'+ o[i].dataId +'" href="#"> Delete <a/></div>'); 
		}

		 $(document).on('click', '.del', function(){
			var dataId = $(this).attr('rel');
			delItem  = $(this);
			$.post('dashboard/xhrDeleteListing/', {'dataId': dataId}, function (o) {
				
			}, 'json');
			delItem.parent().remove();

			return false;
		});
	}, 'json');

	$('#randomInsert').submit(function () {

		var urltest = $(this).attr('action');
		var data = $(this).serialize();

		$.post(urltest, data, function (o) {
			// console.log(o);
			$('#listInsert').append('<div>' + o.text +  ' ' + '<a class="del" rel="'+ o.dataId +'" href="#"> Delete <a/></div>'); 
		}, 'json');

		// console.log(data);

		return false;
	});

});