
function initMap() {
  var latlng = new google.maps.LatLng(51.508742,-0.120850);
  var latlng2 = new google.maps.LatLng(51.508742,-0.120850);
  var myOptions = {
    zoom: 12,
    center: latlng
  };
  var map = new google.maps.Map(document.getElementById("contact-map"), myOptions);
  var myMarker = new google.maps.Marker({
    position: latlng,
    map: map,
    title:"China"
  });

}