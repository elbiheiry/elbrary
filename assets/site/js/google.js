/*Google Map
================================*/
$(document).ready(function () {
	'use strict';
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: new google.maps.LatLng(24.699165, 46.771004),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    });
	
	 var image = new google.maps.MarkerImage('../images/logo.png',
                        null, null, null, new google.maps.Size(45, 45));

	 var myLatLng = new google.maps.LatLng(24.699165, 46.771004);
	var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: image,
                        title: 'Hello World!'
	});
			
	
   
    map.set('styles', [{
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
            "color": "#f0f0f0"
        }, {
            "lightness": 17
        }]
    }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
            "color": "#fff"
        }, {
            "lightness": 20
        }]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#8ABB2B"
        }, {
            "lightness": 5
        }]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#fff"
        }, {
            "lightness": 29
        }, {
            "weight": 0.2
        }]
    }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
            "color": "transparent"
        }, {
            "lightness": 18
        }]
    }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
            "color": "transparent"
        }, {
            "lightness": 16
        }]
    }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
            "color": "#fff"
        }, {
            "lightness": 21
        }]
    }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
            "color": "#ddd"
        }, {
            "lightness": 21
        }]
    }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
            "visibility": "on"
        }, {
            "color": "#ffffff"
        }, {
            "lightness": 16
        }]
    }, {
        "elementType": "labels.text.fill",
        "stylers": [{
            "saturation": 36
        }, {
            "color": "#2a4a1e"
        }, {
            "lightness": 30
        }]
    }]);
    
});