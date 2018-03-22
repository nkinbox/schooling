
<!DOCTYPE html>
<html>
  <head>
     <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
           $( document ).ready(function() {
                navigator.geolocation.getCurrentPosition(callback);
            });
      function callback(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        alert(lat);
        alert(lon);            
        }
    </script>
  </head>
  <body>
  </body>
</html>


