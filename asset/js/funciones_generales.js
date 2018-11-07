jQuery(document).ready(function() {
	cargarProvincias();
	$('#departamento').change(cargarProvincias);
	$('#provincia').change(cargarDistritos);
});

function cargarProvincias () {
	var cd = $('#departamento').val();

	$.get(path + 'ubigeo/prov', {'id' : cd}, function(resp) {
		$('#provincia').empty().html(resp);
		cargarDistritos();
	});
}
function cargarDistritos () {
	var cp = $('#provincia').val();

	$.get(path + 'ubigeo/dist', {'id' : cp}, function(resp) {
		$('#distrito').empty().html(resp);				
	});
}

$(".numeric").keydown(function(event) {
	   if(event.shiftKey)
	   {
	        event.preventDefault();
	   }

	   if (event.keyCode == 46 || event.keyCode == 8)    {
	   }
	   else {
	        if (event.keyCode < 95) {
	          if (event.keyCode < 48 || event.keyCode > 57) {
	                event.preventDefault();
	          }
	        } 
	        else {
	              if (event.keyCode < 96 || event.keyCode > 105) {
	                  event.preventDefault();
	              }
	        }
	      }
	   });
		