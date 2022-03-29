function myMap(lat, lng) {
    var mapProp= {
      center:new google.maps.LatLng(lat,lng),
      zoom:15,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

$(document).ready(function() {
    let addr_list = document.querySelectorAll('.addr');
    let addr = '';
    for( let i = 0; i < addr_list.length; i++ ){
        addr += addr_list[i].value + ' ';
    }
    console.log(addr);

	$.ajax({
		type: "GET",
		url: "http://api.positionstack.com/v1/forward?access_key=056c59439927327d96ee633d9525d86f&query=" + addr,
		dataType: "json",
		success: function (result) {
            myMap(result.data[0].latitude, result.data[0].longitude);
		},
		error: function (result) {
            console.log('error: ' + result);
		}
	});
});


