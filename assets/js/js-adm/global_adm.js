function goBack() {
    window.history.back();
}
function goNext(){
	window.history.forward();
}



/*  function tel(obj) {
    if (obj.value.length === 0) {
       obj.value += "("
    }

    if (obj.value.length === 3) {
        obj.value += ") "
     }

     if (obj.value.length === 10) {
        obj.value += "-"
     }
}

function somente_numero(e){
    tecla = (window.event)?event.keyCode:e.which

    if(tecla >= 48 && tecla <= 57 || (tecla >= 96 && tecla <= 105) || tecla == 37 || tecla == 39 || tecla == 46 || tecla == 8 || tecla == 9){
        return true
    }
    else{
        return false
    }
} */

//   /^(?:\+)[0-9]{2}\s?(?:\()[0-9]{2}(?:\))\s?[0-9]{4,5}(?:-)[0-9]{4}$/ 