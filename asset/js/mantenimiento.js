$(document).ready(function() {
	
});

$('#save_escuela').click(function(e){
	 e.preventDefault();
	 
	 $.ajax({
	 	type: "POST",
        url: path+"mantenimiento/registrar_escuela", 
        data: $("#formRegEsc").serialize(),
        dataType: "json", 
        success: function(data) {
        	console.log(data);
        	console.log(data['msg']);
        	if(data['msg']===false){
        		$.each(data, function(key, value) {
		            if(value!=""){
		            	$('#'+key).addClass('has-error'); 
	            	}else{
	            		$('#'+key).removeClass('has-error').addClass('');
	            	} 
		        });
        	}else{
        		alert(data['msg']);
        	}
	        
	    }
	 })
});

$('#formRegEsc input').on('keyup', function () { 
        $(this).removeClass('has-error').addClass('');
         $(this).parents('.form-group').removeClass('has-error').addClass('');
    });
