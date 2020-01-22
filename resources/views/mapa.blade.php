<!DOCTYPE html>
<html>
<head>
    <title>Geocoding Service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="{{asset('css/mapa.css')}}" rel="stylesheet">
</head>
<body>
<div id="floating-panel">
    <input id="address" type="textbox" value="">
    <input id="submit" type="button" value="Geocode">
</div>
<div id="map"></div>
<script src="{{asset('js/mapa.js')}}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{\Config::get('services')['google']['maps']['api-key']}}&callback=initMap">
</script>
</body>
</html>
