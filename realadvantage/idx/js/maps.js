function arwcMapsInitMap() {
  jQuery(window).load(function(){
    jQuery('.ar_wc_map').each(function(){
      var arwc_maps_geocoder = new google.maps.Geocoder();
      var arwc_maps_address = jQuery(this).attr('data-arwc');
      var arwc_maps_id = jQuery(this).attr('id');
      var arwc_maps_remove = jQuery(this).attr('data-arwc-remove');
      arwcMapsGeocodeAddress(arwc_maps_geocoder, arwc_maps_id, arwc_maps_address, arwc_maps_small_icon, arwc_maps_remove);
    });
    jQuery('#ar_wc_mapDetails').each(function(){
      var arwc_maps_geocoder = new google.maps.Geocoder();
      var arwc_maps_address = jQuery(this).attr('data-arwc');
      var arwc_maps_id = jQuery(this).attr('id');
      var arwc_maps_remove = jQuery(this).attr('data-arwc-remove');
      arwcMapsGeocodeAddress(arwc_maps_geocoder, arwc_maps_id, arwc_maps_address, arwc_maps_large_icon, arwc_maps_remove);
    });
  });
}

function arwcMapsGeocodeAddress(geocoder, resultsMapID, address, icon, remove) {
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      //create map
      var arwc_maps_map = new google.maps.Map(document.getElementById(resultsMapID), {
        zoom: 14,
        center: results[0].geometry.location,
      });
      var arwc_maps_marker = new google.maps.Marker({
        map: arwc_maps_map,
        position: results[0].geometry.location,
        icon: icon
      });
    } else {
      var arwc_maps_removeElement = document.getElementById(remove);
      arwc_maps_removeElement.parentNode.removeChild(arwc_maps_removeElement);
    }
  });
}