function mp_initialize() {
    // Creating map object
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 12,
        center: new google.maps.LatLng(30.036274, 31.240967),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // creates a draggable marker to the given coords
    var vMarker = new google.maps.Marker({
        position: new google.maps.LatLng(30.036274, 31.240967),
        draggable: true
    });

    // adds a listener to the marker
    // gets the coords when drag event ends
    // then updates the input with the new coords
    google.maps.event.addListener(vMarker, 'dragend', function (evt) {
        $("#txtLat").val(evt.latLng.lat().toFixed(6));
        $("#txtLng").val(evt.latLng.lng().toFixed(6));

        map.panTo(evt.latLng);
    });

    // centers the map on markers coords
    map.setCenter(vMarker.position);

    // adds the marker on the map
    vMarker.setMap(map);
}

$('#map-submit').click(function(){
    let the_lat = $("#txtLat").val();
    let the_lng = $("#txtLng").val();
    $.ajax({
        url: 'http://api.positionstack.com/v1/reverse',
        data: {
            access_key: '1ca9c2e30826158f019f16052acb1b7f',
            query: the_lat + ',' + the_lng,
        }
    }).done(function(data) {
        console.log(data);
    });
});

