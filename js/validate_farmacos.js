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
                required: true
            },
            nombreFichero: { 
                required:true,
            },
            tipoFichero : {
                required: true,
                minlength: 3
            },
            smiles : {
                required: true,
            },
            inChl : {
                required: true,
                
            },
            estado : {
                required: true,
                
            }
        },
        messages : {
            nombre: {
              required: "Introduzca su nombre",
              minlength: "El nombre debería tener 3 carácteres como mínimo"
            },
            codigoApp: {
                required: "Introduzca el codigo de la farmaco"
            },
            fecha: {
                required: "Introduza la fecha de la farmaco",
            },
            nombreFichero: {
                required: "Introduzca el nombre del fichero"
            },
            tipoFichero:{
                required: "Introduzca el tipo de fichero (la extension)",
                
            },
            smiles: {
                required:"Introduzca el smiles"
            },
            inChl:{
                required: "Introduzca el inChl del farmaco"
            },
            estado: {
                required:"Introduzca el estado del farmaco "
            }
        }
        
    })
})