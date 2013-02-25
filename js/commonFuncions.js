function closeLightBox() {
	$('.lightbox').hide("slow");
}

window.closeLightBox = closeLightBox;

function openLightBox() {
	$('.lightbox').show().fadeIn();
	;
}

window.openLightBox = openLightBox;

function resetAll() {
	$('#lat').val('');
	$('#lon').val('');
	$('#siteName').val('');
	$('#siteDesc').val('');
	$('#pyroStation').attr('checked', false);
	$('#emergStation').attr('checked', false);
}

function addPointToMap() {
	var lat = $('#lat').val();
	var lon = $('#lon').val();
	var name = $('#siteName').val();
	var siteDesc = $('#siteDesc').val();
	var pyro_isChecked = $('#pyroStation').is(":checked");
	var emerg_isChecked = $('#emergStation').is(":checked");
	if (lat != "" && lon != "" && name != "" && siteDesc != "") {
		if (sessionStorage.invoke_for == "add") {
			if (!findMarker(lat, lon)) {
				if (pyro_isChecked == true && emerg_isChecked == false) {
					addStationObject(StationObject(markerObject(lat, lon, name), "pyro"));
					resetAll();
					closeLightBox();

				} else if (emerg_isChecked == true && pyro_isChecked == false) {
					addStationObject(StationObject(markerObject(lat, lon, name), "emerg"));
					resetAll();
					closeLightBox();

				} else {
					alert("Select only one site type.");
				}
			}
		} else if(sessionStorage.invoke_for == "edit"){
			var marker = findMarker(lat, lon);
			if(marker){
				
			}else{
				alert("This location does not exist! Press cancle and add it instead.");
			} 
	
			closeLightBox();
		}
	} else {
		alert("All fields are required!");
	}
}

window.addPointToMap = addPointToMap;
