function arwc_set_google_autocomplete(){
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