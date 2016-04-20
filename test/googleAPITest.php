<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>Google Maps API Example: Simple Geocoding</title>
<!-- Your Google Maps Key Here -->
      
    <script type="text/javascript">

    var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 1);
        map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 15);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
              GEvent.addListener(marker, "dragend", function() {
                marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6));
              });
              GEvent.addListener(marker, "click", function() {
                marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6));
              });
	      GEvent.trigger(marker, "click");
            }
          }
        );
      }
    }
    </script>
  </head>

  <body onload="initialize()" onunload="GUnload()">
    <form action="#" onsubmit="showAddress(this.address.value); return false">
      <p>
        Enter an address, and then drag the marker to tweak the location.
        <br/>
        The latitude/longitude will appear in the infowindow after each geocode/drag.
      </p>
      <p>
        <input type="text" style="width:350px" name="address" />

        <input type="submit" value="Go!" />
      </p>
      <div id="map_canvas" style="width: 600px; height: 400px"></div>
    </form>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaWHp2US2LZkwkZJ4z3HUSHnQouoYS2WA&callback=initialize"
    async defer></script>
  </body>
</html>