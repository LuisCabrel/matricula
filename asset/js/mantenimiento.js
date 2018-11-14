$(document).ready(function() {
	tbl_escuela();
});
// document.write("<script type='text/javascript' src='"+path+"asset/js/funciones_generakes.js'></script>");
$('#save_escuela').click(function(e){
	 e.preventDefault();
	 var form= $("#formRegEsc").serialize();
	 var formData=new FormData($("#formRegEsc")[0]);
	 //console.log(form);
	 $.ajax({
	 	type: "POST",
        url: path+"mantenimiento/registrar_escuela", 
        data:formData,
        dataType: "json",
        data: formData,
        crossDomain:true,
		cache:false,
		contentType:false,
		processData:false, 
        success: function(data) {
        	//console.log(data);
        	/*console.log(data[0].msg);*/
        	//console.log(data.msg);
        	//if(data['msg']===false){
        	if(data['msg']===false){
        		$.each(data, function(key, value) {
		            if(value!=""){
		            	$('#'+key).addClass('has-error'); 
	            	}else{
	            		$('#'+key).removeClass('has-error').addClass('');
	            	} 
		        });
        	}else{
        		if(data['msg']===1){
        			tbl_escuela();
        			$("#formRegEsc")[0].reset();
        			$("#emailOK").html("");
        			document.getElementById('imgSalida1').src = "#";
        			$("#imgF1").val("");
        			$("#turnos")[0].selectedIndex = -1;
        			alert(data['resp']);
        		}else{
        			alert(data['resp']);
        		}
        		
        	}
	        
	    }
	 });
});

$('#formRegEsc input').on('keyup', function () { 
        $(this).removeClass('has-error').addClass('');
         $(this).parents('.form-group').removeClass('has-error').addClass('');
    });

function tbl_escuela(){
	$.ajax({
		url: 'lista_escuela',
		dataType: "json",
	    success: function(resp){
	    	var html="";
	    	var item=resp.datos.length;
	    	for(var x=0;x<resp.datos.length;x++){
	    		 html+='<tr>'+
		                '<td><div class="row"><center>'+
        	   				'<i class="fa fa-pencil-square btn-tabla-edit" onclick="edit_school('+resp.datos[x]['id']+')"></i>'+
        	   				'<i class="fa fa-times-rectangle btn-tabla-delete" onclick="msgDelete('+resp.datos[x]['id']+')"></i></center></div>'+
        	   			'</td>'+
		                '<td><span id="foto'+resp.datos[x]['id']+'"><img id="img'+resp.datos[x]['id']+'" width="30" height="30" src="'+path+'uploads/colegio/'+resp.datos[x]['foto']+'" /></span></td>'+
		                '<td><span id="nombre'+resp.datos[x]['id']+'">'+resp.datos[x]['nombre']+'</span></td>'+
		                '<td><span id="ruc'+resp.datos[x]['id']+'">'+resp.datos[x]['ruc']+'</span></td>'+
		                '<td><span id="direccion'+resp.datos[x]['id']+'">'+resp.datos[x]['direccion']+'</span></td>'+
		                '<td><span id="telefono'+resp.datos[x]['id']+'">'+resp.datos[x]['telefono']+'</span></td>'+
		                '<td><span id="email'+resp.datos[x]['id']+'">'+resp.datos[x]['email']+'</span></td>'+
		                '<td><span id="zona'+resp.datos[x]['id']+'">'+resp.datos[x]['zona']+'</span></td>'+
		                '<td><span id="turnos'+resp.datos[x]['id']+'">'+resp.datos[x]['turnos']+'</span></td>'+
		                '<td><span id="creacion'+resp.datos[x]['id']+'">'+resp.datos[x]['creacion']+'</span></td>'+
		                '<td><span id="departamento'+resp.datos[x]['id']+'">'+resp.datos[x]['nomDepa']+'</span></td>'+
		                '<td><span id="provincia'+resp.datos[x]['id']+'">'+resp.datos[x]['nomProv']+'</span></td>'+
		                '<td><span id="distrito'+resp.datos[x]['id']+'">'+resp.datos[x]['nomDist']+'</span></td>'+
		              	'</tr>';
	    	}
	    	$("#tbl_escuela").html(html);	    	
	    }
	})
}

function msgDelete(id){
	$("#btn_modal").html(btn_delete1+"del_school("+id+")"+btn_delete2+" "+btn_cerrar);
	$("#ico").html(ico_elimina);
	 $("#loading").hide();
	$("#msg1").html(msg_delete);
	$("#alertas").modal('show');
}

function del_school(id) {
	var string ="id="+id;	
	$.ajax({
		url:'delete_school',
		type:'POST',
		data:string,
		beforeSend: function () {
			 $("#ico").hide();
			 $("#loading_bg").html(loading);
			 $("#msg1").html(msg_eliminando);
		     $("#loading").show();
		        },
		success: function(resp){
        	var x = JSON.parse(resp);
                tbl_escuela();
                $("#loading").hide();
        		$("#ico").html(ico_ok);
        		$("#ico").show();        		
        		//$("#loader").show();
				$("#msg1").html(x.msg);
				$("#btn_modal").html(btn_cerrar);
	            $("#alertas").modal('show');	
        }
	});
}

// function tbl_escuelaxx() {	
// 	options = function (data, type, row) {
//         return '<div class="col-sm-12">'+
//         	   '<div class="col-sm-6"><button type="button" class="btn btn-danger btn-xs" data-toggle="button" onclick="msgP('+data+')">'+
//         	   '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>'+
//         	   '<div class="col-sm-6"><button type="button" class="btn btn-warning btn-xs" data-toggle="button" id="upd_pac">'+
//         	   '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></div>'+
//         	   '</div>';       
//     };
//     tablaPaciente = $('#tbl_escuela').on('preXhr.dt', function ( e, settings, data ) {       
//             $('#tbl_escuelawrapper').prepend('<div class="span12" style="min-height: 0px;"></div>');
//             $('#tbl_escuela_wrapper').prepend($('.dt-buttons'));
//         }).DataTable({
//         "bDestroy": true,
//         "ajax": {
//             "type": "POST",
//             "url": path+"mantenimiento/lista_escuela", 
//             "dataType": "json",           
//             "data": ""           
//         },
//         "sAjaxDataProp": "",
//         "language": {
//             "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json"
//          },
//         "columns": [
//         	{"data": "id", "title": "<center><span class='glyphicon glyphicon-cog' aria-hidden='true'></span></center>","render":options},
//            	{"data": "foto", "title": "FOTO"},
//             {"data": "nombre", "title": "NOMBRE"},
//             {"data": "ruc", "title": "RUC"},            
//             {"data": "direccion", "title": "DIRECCION"},
//             {"data": "telefono", "title": "TELEFONO"},
//             {"data": "email", "title": "EMAIL"},
//             {"data": "zona", "title": "ZONA"},
//             {"data": "turnos", "title": "TURNOS"},
//             {"data": "creacion", "title": "CREACION"},
//             {"data": "nomDepa", "title": "DEPARTAMENTO"},
//             {"data": "nomProv", "title": "PROVINCIA"},  
//             {"data": "nomDist", "title": "DISTRITO"}         
//         ],
//         "scrollX": true,
//         "iDisplayLength": 5,        
//     });
// }


// $('#tbl_escuela').on('click','td',function( e, settings, data ){
//     // celdaP = tbl_escuela.cell(this).data(); 
//      console.log("celda: "+e);
//      console.log("celda: "+settings);
//      console.log("celda: "+data);
// });