

$(".tablas").on("click", ".btnEntrada", function(){


	var idProductos = $(this).attr("idProductos");


	var datos = new FormData();

	datos.append("idProductos", idProductos);
    

	$.ajax({


		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

		  $("#idEntrada").val(respuesta["idEntrada"]);
			$("#entradaCodigo").val(respuesta["codigo"]);
			$("#entradaDescripcion").val(respuesta["descripcion"]);
			$("#entrada").val(respuesta["entrada"]);



		}



	})


})







$(".tablas").on("click", ".btnSalida", function(){


	var idProductos = $(this).attr("idProductos");


	var datos = new FormData();

	datos.append("idProductos", idProductos);


	$.ajax({


		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#idSalida").val(respuesta["idSalida"]);
			$("#salidaCodigo").val(respuesta["codigo"]);
			$("#salidaDescripcion").val(respuesta["descripcion"]);
			$("#salida").val(respuesta["salida"]);




		}



	})


})



