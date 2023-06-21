<!DOCTYPE html>
<html>
<head>
<title>Map</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Rycycle Theme CSS -->
  <style>
    /* Set the map container size and border */
    #map {
      height: 400px;
      border: 1px solid #ccc;
    }

    /* Custom style for buttons */
    .btn-custom {
      background-color: green;
      border-color: #3273dc;
      color: #fff;
    }
    .navbar {
      background-color: #37b24d;
    }

    .navbar-brand {
      color: #ffffff;
      font-weight: bold;
    }

    /* Custom style for form input */
    .form-control-custom {
      background-color: #f8f9fa;
      border-color: #6c757d;
      color: #343a40;
    }
    #judul{
      color: green;
    }
  </style>

  <!-- Include meta tag for viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: green;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TRASH4CASH</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php" style="color: #fff;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile_page.php" style="color: #fff;">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout_page.php" style="color: #fff;">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container-fluid">
    <h1 id="judul" class="mt-4">Trash4Cash</h1>
    <div id="map" class="mt-4"></div>
    <div class="row mt-4">
      <div class="col">
        <input type="text" id="searchInput" class="form-control form-control-custom" placeholder="Search location">
      </div>
    </div>
    <div class="row mt-2">
      <div class="col">
        <button onclick="searchLocation()" class="btn btn-custom btn-block">Search</button>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col">
        <button onclick="getUserLocation()" class="btn btn-custom btn-block">Use My Location</button>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col">
        <button onclick="drawRoute()" class="btn btn-custom btn-block">Draw Route</button>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col">
        <button onclick="window.location.href = 'home.php'" class="btn btn-custom btn-block">Done</button>
     </div>
    </div>

  </div>

  <!-- Include Bootstrap JS and Google Maps JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtw508z8J5hTtC9vgk2I_SnI-LY-hN6VI&libraries=places&callback=initializeMap" async defer></script>

<script>
var map;
var directionsService;
var directionsRenderer;
var autocomplete;

// Initialize the map
function initializeMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

  // Create Autocomplete instance for search input
  var input = document.getElementById("searchInput");
  autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo("bounds", map);
}

// Function to search for a location
function searchLocation() {
  var searchInput = document.getElementById("searchInput").value;

  // Use Autocomplete service to get place predictions
  var autocompleteService = new google.maps.places.AutocompleteService();
  autocompleteService.getPlacePredictions(
    { input: searchInput },
    function (predictions, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK && predictions && predictions.length > 0) {
        var placeId = predictions[0].place_id;
        var placesService = new google.maps.places.PlacesService(map);

        // Use Places service to get place details
        placesService.getDetails({ placeId: placeId }, function (place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK && place) {
            var location = place.geometry.location;
            var mapOptions = {
              center: location,
              zoom: 15,
            };

            map.setOptions(mapOptions);

            var marker = new google.maps.Marker({
              position: location,
              map: map,
              title: place.name,
            });
          } else {
            alert("Location not found");
          }
        });
      } else {
        alert("Location not found");
      }
    }
  );
}

// Function to get user's location
function getUserLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var userLatLng = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };

      map.setCenter(userLatLng);
      map.setZoom(15);

      var marker = new google.maps.Marker({
        position: userLatLng,
        map: map,
        title: "Your Location",
      });
    });
  }
}

// Function to draw route from user's location to a fixed destination
function drawRoute() {
  // Check if the map is initialized
  if (!map) {
    return;
  }

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

  // Get the user's location
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var userLatLng = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };

      var destinationLatLng = {
        lat: -7.33927860091,
        lng: 112.736802942,
      };

      // Get the origin location from the search input
      var searchInput = document.getElementById("searchInput").value;

      if (searchInput.trim() !== "") {
        var request = {
          query: searchInput,
          fields: ["geometry"],
        };

        var placesService = new google.maps.places.PlacesService(map);

        // Use Places service to find place from query
        placesService.findPlaceFromQuery(request, function (results, status) {
          if (
            status === google.maps.places.PlacesServiceStatus.OK &&
            results &&
            results.length > 0 &&
            results[0].geometry
          ) {
            var originLatLng = results[0].geometry.location;

            var request = {
              origin: originLatLng,
              destination: destinationLatLng,
              travelMode: google.maps.TravelMode.DRIVING,
            };

            // Clear previous route
            directionsRenderer.setDirections({ routes: [] });

            directionsService.route(request, function (result, status) {
              if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(result);
              } else {
                alert("Route not found");
              }
            });
          } else {
            alert("Origin not found");
          }
        });
      } else {
        // Clear previous route
        directionsRenderer.setDirections({ routes: [] });

        var request = {
          origin: userLatLng,
          destination: destinationLatLng,
          travelMode: google.maps.TravelMode.DRIVING,
        };

        directionsService.route(request, function (result, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(result);
          } else {
            alert("Route not found");
          }
        });
      }
    });
  }
}
</script>
</body>
</html>
