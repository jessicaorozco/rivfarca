$(document).ready(function(){
	
	$("#register-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			name : {
				required : true
			},
			email : {
				required : true,
				email: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
			},
			tlf : {
				required : true
			},
			city : {
				required : true,
				
			}
		},
		messages : {
			name : {
				required : "Por favor, introduzca el nombre"
			},
			email : {
				required : "Introduzca correo electrónico",
				remote : "Correo electrónico ya existe"
			},
			tlf : {
				required : "Por favor, ingrese tlf"
			},
			city: {
				required : "Introduzca ciudad",
                	
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	
	
});

// ciudades
// select

  // funcion para Cargar Provincias al campo <select>
  