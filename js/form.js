const fechaNacimiento = document.getElementById("fechaNacimiento");
const edad = document.getElementById("edad");

window.addEventListener('load', function () {

    fechaNacimiento.addEventListener('change', function () {
        console.log(this.value);
    });
});
