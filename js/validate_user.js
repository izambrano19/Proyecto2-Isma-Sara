$(document).ready(function() {
    $.validator.addMethod("dni", function(value, element) {
        return this.optional(element) || /^[0-9]{8}[a-zA-Z]$/.test(value);
      }, "Por favor, introduzca un DNI válido.");

    
    $.validator.addMethod("password", function(value, element) {
        // Mínimo 8 caracteres, una mayúscula y un símbolo
        let pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]).{8,}$/;
        
        return pattern.test(value);
      }, "La contraseña debe tener al menos 8 caracteres, una mayúscula y un símbolo.");


    $("#validate").validate({
        rules:{
            nombre : {
                required: true,
                minlength: 3
            },
            dni : {
                required: true,
                dni:true,
            },
            validator: { 
                required:true, 
                maxlength: 4, 
                minlength: 4
            }

        },
        messages : {
            nombre: {
              required: "Introduzca su nombre",
              minlength: "El nombre debería tener 3 carácteres como mínimo"
            },
            dni: {
                dni: "dni no valido",
                required: "Introduce el DNI",
            },
            validator : "Inserte la contraseña",
        }
        
    })
})