function myMap() {
  	var myCenter = new google.maps.LatLng(10.3541, 123.9116);
  	var mapCanvas = document.getElementById("map");
  	var mapOptions = {center: myCenter, zoom: 5};
  	var map = new google.maps.Map(mapCanvas, mapOptions);
  	var marker = new google.maps.Marker({position:myCenter});
  	marker.setMap(map);
}