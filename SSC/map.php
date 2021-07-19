<?php include('includes/connect.php'); 

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
    // function initMap() {
    //     const myLatLng = { lat: -25.363, lng: 131.044 };
    //     const myLatLng1 = { lat: -25.789, lng: 131.660 };
    //     const map = new google.maps.Map(document.getElementById("map"), {
    //       zoom: 9,
    //       center: myLatLng,
    //     });
    //     new google.maps.Marker({
    //       position: myLatLng,
    //       map,
    //       title: "Hello World!",
    //     });
    //     new google.maps.Marker({
    //       position: myLatLng1,
    //       map,
    //       title: "Hello !",
    //     });
    //   }
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: { lat: 28.6280, lng: 77.3649 },
          mapTypeId: "terrain",
        });
        // const myLatLng = { lat: 28.6280, lng: 77.3649 };
        // const myLatLng1 = { lat: 28.6170, lng: 77.3736 };
        // const myLatLng2 = { lat: 28.6100, lng: 77.3500 };
        // const myLatLng3 = { lat: 28.6055, lng: 77.3344 };
        const dist = [];
        <?php $query1 = mysqli_query($con,"SELECT * FROM `map`");
        while($run1 = mysqli_fetch_assoc($query1)){ ?>
        // dist.push (new google.maps.LatLng( 28.6280, 77.3649));
        // dist.push (new google.maps.LatLng( 28.6170, 77.3736));
        // dist.push (new google.maps.LatLng( 28.6100, 77.3500));
        // dist.push (new google.maps.LatLng( 28.6055, 77.3344));
        
        dist.push (new google.maps.LatLng( <?=$run1['lat'];?>, <?=$run1['lng'];?>));
        <?php } ?>
        // const flightPlanCoordinates = [
        //   [ "Bondi Beach", 28.6280,  77.3649 , 4],
        //   [ "Bondi Beach", 28.6170,  77.3736 , 3],
        //   [ "Bondi Beach", 28.6100,  77.3500 , 2],
        //   [ "Bondi Beach", 28.6055,  77.3344 , 1],
        // ];
        const flightPath = new google.maps.Polyline({
          path: dist,
          geodesic: true,
          strokeColor: "#FF0000",
          strokeOpacity: 1.0,
          strokeWeight: 2,
        });
        // for (let i = 0; i < flightPlanCoordinates.length; i++) {
        // const beach = flightPlanCoordinates[i];
       <?php $query = mysqli_query($con,"SELECT * FROM `map`");
        while($run = mysqli_fetch_assoc($query)){ ?>
        new google.maps.Marker({
          position: { lat: <?=$run['lat'];?>, lng: <?=$run['lng'];?> },
          map,
          title: "Start !",
        });
      <?php } ?>
        flightPath.setMap(map);
      }

    </script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUub35jsA-mDlXeikk1AkP-P1SLQHhMG8&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>