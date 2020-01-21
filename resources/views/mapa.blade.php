<!DOCTYPE html>
<html>
<head>
    <title>Geocoding Service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
</head>
<body>
<div id="floating-panel">
    <input id="address" type="textbox" value="">
    <input id="submit" type="button" value="Geocode">
</div>
<div id="map"></div>
<script>
    function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: 42.8510665, lng: -2.3828899}
        });
        centros=['agurain','basauri','durango','usurbil','azkoitia','baranyain','tafalla'];

        var image = {
            url:'https://image.flaticon.com/icons/svg/814/814406.svg',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
        };

        var agurain = new google.maps.Marker({
            position: {lat: 42.8510665, lng: -2.3828899},
            map: map,
            title: 'Agurain',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        var basauri = new google.maps.Marker({
            position: {lat: 43.2346347, lng: -2.8971273},
            map: map,
            title: 'Basauri',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        var durango = new google.maps.Marker({
            position: {lat: 43.1693228, lng: -2.6400451},
            map: map,
            title: 'Durango',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        var usurbil = new google.maps.Marker({
            position: {lat: 43.270666, lng: -2.0445099},
            map: map,
            title: 'Usurbil',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        var azkoitia = new google.maps.Marker({
            position: {lat: 43.1735535, lng: -2.3254154},
            map: map,
            title: 'Azkoitia',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        var baranyain = new google.maps.Marker({
            position: {lat: 42.807717, lng: -1.6917302},
            map: map,
            title: 'Baranyain',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        var tafalla = new google.maps.Marker({
            position: {lat: 42.5194469, lng: -1.680899},
            map: map,
            title: 'Tafalla',
            animation: google.maps.Animation.DROP,
            icon:image
        });

        arrayCentros=[agurain,basauri,durango,usurbil,azkoitia,baranyain,tafalla];
        for (var i=0;i<arrayCentros.length;i++){
            attachSecretMessage(arrayCentros[i],centros[i]);
        }


        function attachSecretMessage(marker, secretMessage) {
            var infowindow = new google.maps.InfoWindow({
                content: secretMessage
            });

            marker.addListener('click', function() {
                infowindow.open(marker.get('map'), marker);
            });
        }

        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
            geocodeAddress(geocoder, map);
        });
    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{\Config::get('services')['google']['maps']['api-key']}}&callback=initMap">
</script>
</body>
</html>
