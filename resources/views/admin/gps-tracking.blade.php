@extends('layouts.admin')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPS Tracking</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <div id="map" style="height: 500px;"></div>

    <script>
        let map = L.map('map').setView([14.5995, 120.9842], 12); // Default to Manila

        // Load Leaflet Map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        function sendLocation(lat, lng) {
            fetch('/update-location', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ latitude: lat, longitude: lng })
            }).then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
        }

        // Get Client GPS Location
        function trackLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(position => {
                    let lat = position.coords.latitude;
                    let lng = position.coords.longitude;
                    sendLocation(lat, lng);

                    L.marker([lat, lng]).addTo(map)
                        .bindPopup("Your Location").openPopup();
                    map.setView([lat, lng], 15);
                }, error => console.error(error), {
                    enableHighAccuracy: true
                });
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        }

        trackLocation();
    </script>
    @endsection
</body>
</html>
