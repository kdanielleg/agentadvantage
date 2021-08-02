//Main google autocomplete
function ar_set_google_autocomplete(){
	jQuery(input_fields).each(function(){

		var autocomplete= new google.maps.places.Autocomplete(
		/** @type {HTMLInputElement} */(this),
		{ types: ['geocode'] });
		// When the user selects an address from the dropdown,
		// populate the address fields in the form.

	});
	arwcMapsInitMap();
	if (typeof arwc_ac_fields !== 'undefined') {
		arwc_idxHV_autocomplete();
	}
}
//IDX page maps
function arwcMapsInitMap() {
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

//Home Value Autocomplete
function arwc_idxHV_autocomplete(){
	jQuery(arwc_ac_fields).each(function(){
		var arwcPlaceSearch, arwcAutocomplete;
		var arwcComponentForm = {
			street_number: 'short_name',
			route: 'long_name',
			locality: 'long_name',
			administrative_area_level_1: 'short_name',
			postal_code: 'short_name'
		};
		var arwcAutocomplete= new google.maps.places.Autocomplete(
			/** @type {HTMLInputElement} */(this),
			{ types: ['geocode'] }
		);
		// When the user selects an address from the dropdown,
		// populate the address fields in the form.
		arwcAutocomplete.setFields(['address_component']);
		arwcAutocomplete.addListener('place_changed', function(){
			// Get the place details from the autocomplete object.
			var arwcPlace = arwcAutocomplete.getPlace();
			// Get each component of the address from the place details,
			// and save in array for placement
			var arwcHvAddressFields = {
				street_number: ' ',
				route: ' ',
				locality: ' ',
				administrative_area_level_1: ' ',
				postal_code: ' ',
			};
			for (var i = 0; i < arwcPlace.address_components.length; i++) {
				var arwcAddressType = arwcPlace.address_components[i].types[0];
				if (arwcComponentForm[arwcAddressType]) {
					var arwcVal = arwcPlace.address_components[i][arwcComponentForm[arwcAddressType]];
					arwcHvAddressFields[arwcAddressType] = arwcVal;
					//document.getElementById(arwcAddressType).value = arwcVal;
				}
			}
			//updateIDX Fields
			document.getElementById('IDX-hvAddress').value = arwcHvAddressFields['street_number']+' '+arwcHvAddressFields['route'];
			document.getElementById('IDX-hvCityState').value = arwcHvAddressFields['locality']+', '+arwcHvAddressFields['administrative_area_level_1'];
			document.getElementById('IDX-hvZipcode').value = arwcHvAddressFields['postal_code'];
		});
	});
}

//Run all functions
jQuery(window).load(function(){
	ar_set_google_autocomplete();
});
