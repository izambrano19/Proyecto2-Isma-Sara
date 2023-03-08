$(document).ready(function() {

    $("#validate").validate({
        rules:{
            nombre : {
                required: true,
                minlength: 3
            },
            codigoApp : {
                required: true,
                minlength:4
            },
            fecha : {
                required: true,
            },
            nombreFichero: { 
                required:true,
            },
            tipoFichero : {
                required: true,
                minlength: 3
            },
            especie : {
                required: true,
                
            },
            metodo : {
                required: true,
                
            },
            resolucion : {
                required: true,
                
            }
        },
        messages : {
            nombre: {
              required: "Introduzca su nombre",
              minlength: "El nombre debería tener 3 carácteres como mínimo"
            },
            codigoApp: {
                required: "Introduzca el codigo de la proteina",
                minlength: "El codigo como minimo contiene 4 caracteres"
            },
            fecha: {
                required: "Introduza la fecha de la proteina",
            },
            nombreFichero: {
                required: "Introduzca el nombre del fichero"
            },
            tipoFichero:{
                required: "Introduzca el tipo de fichero (la extension)",
                
            },
            especie: {
                required:"Introduzca la especie"
            },
            metodo:{
                required: "Introduzca el metodo de la proteina"
            },
            resolucion: {
                required:"Introduzca la resolucion de la proteina"
            },
            validator : "Inserte la contraseña",
        }
        
    })
})