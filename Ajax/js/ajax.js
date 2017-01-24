$(document).ready(function() {
	var codigo;
	var codigoEmpleado;
//AUTOCOMPLETADO
$(document).on("keypress keyup","#buscaapellido",function(){
	var valor= $("#buscaapellido").val();
 $.get("inmueble_lista_tabla.php" ,
	   {
		   busquedaapellido: valor
		},
	   function(data){
			//vuelve a pintar el listado
		   $("#contenedor").html(data);
	   });//get

});

//DatePicker
  $( function() {
    $( "#datepicker" ).datepicker();
  } );


//---------------------------------------------------
//DIALOGO DE BORRADO
	$( "#dialogoborrar" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		//BOTON DE BORRAR
		"Borrar": function() {
			//Ajax con get
			$.get("inmueble_borrar.php", {"empleado":empleado},function(data,status){
				$("#empleado_" + empleado).fadeOut(500);
			})//get
			//Cerrar la ventana de dialogo
			$(this).dialog("close");
		},
		"Cancelar": function() {
				//Cerrar la ventana de dialogo
				$(this).dialog("close");
		}
		}//buttons
	});

//Evento click que pulsa el boton borrar
$(document).on("click",".borrar",function(){
	//Obtenemos el codigo a eliminar
	//a traves del atributo codigo del tr
	empleado = $(this).parents("tr").data("empleado");
	//Accion para mostrar el dialogo de borrar
	 $( "#dialogoborrar" ).dialog("open");
});

//---------------------------------------------------
//MODIFICAR
$( "#dialogomodificar" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		"Guardar": function() {
			$.post("inmueble_modificar.php", {
				codigomodificar : codigoEmpleado ,
				nombremodificar: $("#nombremodificar").val() ,
				apellidomodificar: $("#apellidomodificar").val() ,
				edadmodificar : $("#edadmodificar").val() ,
				salariomodificar : $("#salariomodificar").val() ,
				comisionmodificar: $("#comisionmodificar").val() ,
				codigodepartamentomodificar: $("#codigodepartamentomodificar").val()
			},function(data,status){
				$("#contenedor").html(data);
			})//get

			$(this).dialog( "close" );
					},
		"Cancelar": function() {
				$(this).dialog( "close" );
		}
		}//buttons
	});

//Boton Modificar
$(document).on("click",".modificar",function(){

	//Para que ponga el campo codigo con su valor
	codigoEmpleado = $(this).parents("tr").data("empleado");

	//Para que ponga el campo nombre con su valor
	$("#nombremodificar").val($(this).parent().siblings("td.nombre").html());

	//Para que ponga el campo apellido con su valor
	$("#apellidomodificar").val($(this).parent().siblings("td.apellido").html());

	//Para que ponga el campo edad con su valor
	$("#edadmodificar").val($(this).parent().siblings("td.edad").html());

	//Para que ponga el campo salario con su valor
	$("#salariomodificar").val($(this).parent().siblings("td.salario").html());

	//Para que ponga el campo comision con su valor
	$("#comisionmodificar").val($(this).parent().siblings("td.comision").html());

	//Muestro el dialogo
	$( "#dialogomodificar").dialog("open")

});


//----------------------------------------------------
// FILTRAR
$(document).on("click","#filtrar",function(){		//Cargo en la variable global el tipo seleccionado
		codigo = $("#codigo").val();
		//Llamo Ajax con la función ajax
		$.ajax({
			url: "inmueble_lista_tabla.php",
			data:{codigo:codigo},
			type: "post",
			beforeSend: cargar,
			success: filtratabla,
			complete: fin,
			cache: false
		});//ajax

});

//Se ejecuta en el tiempo de espera del servidor
function cargar(){
	//Muestra el gráfico de cargar
	$("#cargando").show();
}

//Cargar en el contenedor el resultado de la tabla con filtro
function filtratabla(data){
	$("#contenedor").html(data);
}

//Una vez cargado vuelve a ocultar el gif animado
function fin(){
	$("#cargando").hide();
}

//---- NUEVO --------------
//Boton de nuevo empleado
//Crea nueva fila al final de la tabla
//Con dos nuevos botones (guardarnuevo y cancelarnuevo)
$(document).on("click","#nuevo",function(){
	$.post("inmueble_formulario_nuevo.php",function(data){
	//Añade a la tabla de datos una nueva fila
	$("#tabladatos").append(data);
			//Selecciona por defecto la opcion
			//del select del tipo seleccionado
			$("#codigodepartamentonuevo option[value='" + $("#codigodepartamentonuevo").val() + "']").attr("selected",true);
			//Ocultamos boton de nuevo
			//Para evitar añadir mas de uno
			//a la vez
			$("#nuevo").hide();
	})//get
});

//Boton de cancelar nuevo
$(document).on("click","#cancelarnuevo",function(){
		//Elimina la nueva fila creada
		$("#filanueva").remove();
		//vuelve a mostrar el botón de nuevo (+)
		$("#nuevo").show();

});

//Boton de guardar nuevo
$(document).on("click","#guardarnuevo",function(){
	$.post("inmueble_insertar_nuevo.php", {
				"nombrenuevo":$("#nombrenuevo").val(),
				"apellidonuevo":$("#apellidonuevo").val(),
				"edadnuevo":$("#edadnuevo").val(),
                                "salarionuevo":$("#salarionuevo").val(),
				"comisionnuevo":$("#comisionnuevo").val(),
				"codigodepartamentonuevo":$("#codigodepartamentonuevo").val()
			},function(data){
				//Pinta de nuevo la tabla
				$("#contenedor").html(data);
				//Vuelve a mostrar el boton de nuevo
				$("#nuevo").show();
			})//post
});

});//ready
