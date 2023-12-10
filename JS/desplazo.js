const movPag = document.querySelector(".movPag");

const btn_adelante2 = document.querySelector(".sigPag");
const btn_atras1 = document.querySelector(".volver-pag1 ");
const btn_adelante3 = document.querySelector(".adelante-pag3");
const btn_atras2 = document.querySelector(".volver-pag2");
const btn_adelante4 = document.querySelector(".adelante-pag4");
const btn_atras3 = document.querySelector(".volver-pag3");
const btn_adelante5 = document.querySelector(".adelante-pag5 ");
const btn_atras4 = document.querySelector(".volver-pag4 ");
const btn_final = document.querySelector(".fin");

const progressCheck = document.querySelectorAll(".paso .check");
const num = document.querySelectorAll(".paso .num");

const form = document.getElementById("nuevoSalon");

let max = 5;
let cont = 1;

function verificarCorreo($n){
    var ExpRegular_Correo = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    return ExpRegular_Correo.test($n);

 /*     if ($n.match(ExpRegular_Correo)){
      return true
    }else{
      return false;
    } */

}

function campoRellenado($f) {
    $f.trim().length > 0;
    if ($f) {
        return true;
    }
    return false;
}

function selectRelleno($s) {
    return $s !== "";
}

function verificarImagenes($i) {
    return $i.files && $i.files.length > 0
}

function verificarTelefono($t) {
    var ExpRegular_Telefono = /^([672]{1}[0-9]{3})(-?[0-9]{4})$/;
    return ExpRegular_Telefono.test($t);
}

// function verificarLink($l) {
//     var ExpRegular_Link = /^https:\/\/.*/;
//     return ExpRegular_Link.test($l);
// }

function verificarLink(iframe) {
    var ExpRegular_Iframe = /^<iframe\s+src="https:\/\/www\.google\.com\/maps\/embed\?.*<\/iframe>$/;
    return ExpRegular_Iframe.test(iframe);
}

btn_adelante2.addEventListener("click", function(e){
    e.preventDefault();

    var correos = document.getElementById("correo1").value;
    var contras = document.getElementById("contra").value; 

    if (correos=="" && contras==""){
        document.getElementById("correo1-error").innerHTML = "*Este campo no puede quedar vacio."
        document.getElementById("correo1").style.borderColor = "#26bfbf66"
        getMissingPoints(contras);

    }else if ( correos=="" || contras=="" || contras.length < 8 || 
        !verificarCorreo(correos) || !verificarcontra(contras) 
        ){
        if ( correos=="" ){
            document.getElementById("correo1-error").innerHTML = "* Este campo no puede quedar vacío."
            document.getElementById("correo1").style.borderColor="#DA2A33"      
        }else if ( correo.length<6 ){
            document.getElementById("correo1-error").innerHTML = "* Debe tener 6 o más caractéres."
            document.getElementById("correo1").style.borderColor="#DA2A33"      
        }else if ( !verificarCorreo(correos) ){
            document.getElementById("correo1-error").innerHTML = "* Ingreso de datos inválidos."
            document.getElementById("correo1").style.borderColor="#DA2A33"      
        }else {
            document.getElementById("correo1-error").innerHTML = ""
            document.getElementById("correo1").style.borderColor="lightgrey"      
        }
        
        if ( !getMissingPoints(contras)){
            document.getElementById("contra").style.borderColor="lightgrey";
            document.getElementById("mins").innerHTML = "✔";
            document.getElementById("mays").innerHTML = "✔";
            document.getElementById("nums").innerHTML = "✔";
            document.getElementById("spec").innerHTML = "✔";
            document.getElementById("chars").innerHTML = "✔";
        }

    } else {

        document.getElementById("correo1-error").innerHTML = ""
        document.getElementById("correo1").style.borderColor = ""
        getMissingPoints(contras);
        
        movPag.style.marginLeft = "-25%";

        num[cont - 1].classList.add("active");
        progressCheck[cont - 1].classList.add("active");
        cont +=1;
    }  
    
    function verificarcontra($m){
        var ExpRegular_Num = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%\-\/\\=*?&])[A-Za-z\d@$!%\-\/\\=*?&]{8,20}$/;
        return ExpRegular_Num.test($m);
    }

    function getMissingPoints($m) {
        var missingPoints = false;
    
        if (!$m.match(/[a-z]/)) {
            missingPoints = true;
            console.log("una minúscula");
            document.getElementById("mins").innerHTML = "✖";
        } else {
            document.getElementById("mins").innerHTML = "✔";
        }
        if (!$m.match(/[A-Z]/)) {
            missingPoints = true;
            console.log("una mayúscula");
            document.getElementById("mays").innerHTML = "✖";
        } else {
            document.getElementById("mays").innerHTML = "✔";
        }
        if (!$m.match(/\d/)) {
            missingPoints = true;
            console.log("un número");
            document.getElementById("nums").innerHTML = "✖";
        } else {
            document.getElementById("nums").innerHTML = "✔";
        }
        if (!$m.match(/[@$!%\-\/\\=*?&]/)) {
            missingPoints = true;
            console.log("un carácter especial");
            document.getElementById("espec").innerHTML = "✖";
        } else {
            document.getElementById("espec").innerHTML = "✔";
        }
        if ($m.length < 8 || $m.length > 20) {
            missingPoints = true;
            console.log("entre 8 y 20 caracteres");
            document.getElementById("chars").innerHTML = "✖";
        } else {
            document.getElementById("chars").innerHTML = "✔";
        }
    
        return missingPoints;
    }
    
});

btn_adelante3.addEventListener("click", function(e){
    e.preventDefault();

    var inputs = {
        "nombre": {
            element: document.getElementById("nombre"),
            error: document.getElementById("nombre-error"),
            validation: [
                [campoRellenado(document.getElementById("nombre").value), "* Este campo no puede quedar vacio."]
            ],
        },
        "eslogan": {
            element: document.getElementById("eslogan"),
            error: document.getElementById("eslogan-error"),
            validation: [
                [campoRellenado(document.getElementById("eslogan").value), "* Este campo no puede quedar vacio."]
            ],
        },
        "correo": {
            element: document.getElementById("correo"),
            error: document.getElementById("correo-error"),
            validation: [
                [verificarCorreo(document.getElementById("correo").value), "* Ingreso de datos inválidos."],
                [campoRellenado(document.getElementById("correo").value), "* Este campo no puede quedar vacio."]
            ],
        },
        "descripcion": {
            element: document.getElementById("descripcion"),
            error: document.getElementById("descripcion-error"),
            validation: [
                [campoRellenado(document.getElementById("descripcion").value), "* Este campo no puede quedar vacio."]
            ],
        }
    };
    
    var isValid = true;
    
    for (var key in inputs) {
        var input = inputs[key];
        var error = false;
    
        input.validation.forEach(valid => {
            if (!valid[0]) {
                input.error.innerHTML = valid[1];
                input.element.style.borderColor="#DA2A33";
                isValid = false;
                error = true;
            }
        });

        if (!error) {
            input.error.innerHTML = "";
        }
    }
    
    if (isValid) {
        movPag.style.marginLeft = "-50%";

        num[cont - 1].classList.add("active");
        progressCheck[cont - 1].classList.add("active");
        cont +=1;
    } 
});
btn_adelante4.addEventListener("click", function(e){
    e.preventDefault();

    var inputs = {
        "departamento": {
            element: document.getElementById("departamento"),
            error: document.getElementById("departamento-error"),
            validation: [
                [selectRelleno(document.getElementById("departamento").value), "* Este campo no puede quedar sin seleccionar."]
            ],
        },
        "municipio": {
            element: document.getElementById("municipio"),
            error: document.getElementById("municipio-error"),
            validation: [
                [selectRelleno(document.getElementById("municipio").value), "* Este campo no puede quedar sin seleccionar."]
            ],
        },
        "telefono": {
            element: document.getElementById("telefono"),
            error: document.getElementById("telefono-error"),
            validation: [
                [verificarTelefono(document.getElementById("telefono").value), "* Ingreso de datos inválidos."],
                [campoRellenado(document.getElementById("telefono").value), "* Este campo no puede quedar vacio."]
            ],
        },
        "direccion": {
            element: document.getElementById("direccion"),
            error: document.getElementById("direccion-error"),
            validation: [
                [verificarLink(document.getElementById("direccion").value), "* Ingreso de datos inválidos."],
                [campoRellenado(document.getElementById("direccion").value), "* Este campo no puede quedar vacio."]
            ],
        }
    };
    
    var isValid = true;
    
    for (var key in inputs) {
        var input = inputs[key];
        var error = false;
    
        input.validation.forEach(valid => {
            if (!valid[0]) {
                input.error.innerHTML = valid[1];
                input.element.style.borderColor="#DA2A33";
                isValid = false;
                error = true;
            }
        });

        if (!error) {
            input.error.innerHTML = "";
        }
    }
    
    if (isValid) {
        movPag.style.marginLeft = "-75%";
        num[cont - 1].classList.add("active");
        progressCheck[cont - 1].classList.add("active");
        cont +=1;
    } 
});
btn_adelante5.addEventListener("click", function(e){
    e.preventDefault();

    var inputs = {
        "logo": {
            element: document.getElementById("btn_agregar"),
            error: document.getElementById("btn_agregar-error"),
            validation: [
                [verificarImagenes(document.getElementById("btn_agregar")), "* Seleccione una imagen."]
            ],
        },
        "imagenes": {
            element: document.getElementById("btn_agregar1"),
            error: document.getElementById("btn_agregar1-error"),
            validation: [
                [verificarImagenes(document.getElementById("btn_agregar1")), "* Seleccione una imagen."]
            ],
        }
    };
    
    var isValid = true;
    
    for (var key in inputs) {
        var input = inputs[key];
        var error = false;
    
        input.validation.forEach(valid => {
            if (!valid[0]) {
                input.error.innerHTML = valid[1];
                input.element.style.borderColor="#DA2A33";
                isValid = false;
                error = true;
            }
        });

        if (!error) {
            input.error.innerHTML = "";
        }
    }
    
    if (isValid) {
        movPag.style.marginLeft = "-100%";
        num[cont - 1].classList.add("active");
        progressCheck[cont - 1].classList.add("active");
        cont +=1;
    }
    
});

form.addEventListener("submit", function(e){
    e.preventDefault();

    let nuevoSalon = this.querySelector('#nombre').value;

    var radioButtons = document.getElementsByName('servicios');

    var radioSelected = false;

    for (var i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
        radioSelected = true;
        break;
    }
    }

    if (!radioSelected) {
        document.getElementById("input-1-error").innerHTML = "*Seleccione uno o más servicios.";
    } else {
        document.getElementById("input-1-error").innerHTML = "";
        num[cont - 1].classList.add("active");
        progressCheck[cont - 1].classList.add("active");
        cont +=1;

        let formulario = {
            email: document.querySelector('input[name="email"]').value,
            password: document.querySelector('input[name="password"]').value,
            nombre: document.querySelector('input[name="nombre"]').value,
            eslogan: document.querySelector('input[name="eslogan"]').value,
            correo: document.querySelector('input[name="correo"]').value,
            descripcion: document.querySelector('input[name="descripcion"]').value,
            departamento: document.querySelector('select[name="departamento"]').value,
            municipio: document.querySelector('select[name="municipio"]').value,
            telefono: document.querySelector('input[name="telefono"]').value,
            direccion: document.querySelector('input[name="direccion"]').value,
            logo: logosArray,
            imagenes: imagenesArray,
            servicios: Array.from(document.querySelectorAll('input[name="servicios"]:checked')).map(checkbox => checkbox.value)
        }

        // Agregar mensaje de registro exitoso
        setTimeout(function(){
    
            let timerInterval;
            Swal.fire({
        
              allowOutsideClick: false,
              allowEscapeKey: false,
              stopKeydownPropagation: false,
        
              title: 'Realizando registro...',
              timer: 1000,
              timerProgressBar: true,
              onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  const content = Swal.getContent()
                  if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                      b.textContent = Swal.getTimerRight()
                    }
                  }
                }, 100)
              },
              onClose: () => {
                 clearInterval(timerInterval)
               }
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                Swal.fire({
                    title: '<h2 style="color: #2873ba;">¡Enhorabuena!</h2>',
                    html: 'El Salon: <br>' +
                            '<b style="color: #0E2C48; font-size: 40px;";>' + 
                            nuevoSalon +'</b><br> Ha sido registrado y publicado con éxito.',

                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> ACEPTAR',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    stopKeydownPropagation: false,
                }).then((result) => {
                    console.log(JSON.stringify(formulario));
                    if (result.value) {
                        fetch("loginUsuario/servidor/registro/registrarSalon.php", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(formulario),
                        })
                        .then(response => response.json())
                        .then(data => {
                            let loginForm = new FormData();
                            loginForm.append('email', formulario.email);
                            loginForm.append('password', formulario.password);
                            if (data.success) {
                                fetch("loginUsuario/servidor/login/logear.php", {
                                    method: 'POST',
                                    body: loginForm,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        window.location.href = 'index.php';
                                    } else {
                                        console.log('No se pudo ingresar');
                                    }
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                            } else {
                                console.log('No se pudo registrar');
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        });
                    }else {
                        cont -= 1;
                    }
                })
              }
            });    
        });
    }
    function verificarCorreo($n){
        var ExpRegular_Correo = /^[a-zA-Z][a-zA-Z0-9_]{3,9}$/;
        return ExpRegular_Correo.test($n);
    }
    
    function verificarcontra($m){
        var ExpRegular_Num = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/; /* al menos un dígito, al menos una minúscula y al menos una mayúscula. */
        return ExpRegular_Num.test($m);
    }
    
    function limpiar(){
        document.getElementById("correo1").value = "";
        document.getElementById("contra").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById('eslogan').value = "";
        document.getElementById("correo").value = "";
        document.getElementById("descripcion").value = "";
        document.getElementById("departamento").value = "";
        document.getElementById("municipio").value = "";
        document.getElementById("telefono").value = "";
        document.getElementById("direccion").value = "";
        document.getElementById("btn_agregar").value = "";
        document.getElementById("btn_agregar1").value = "";
        document.getElementById("input-1-error").value = "";

    }
});

//Aqui se configura los botones de atras

btn_atras1.addEventListener("click", function(e){
    e.preventDefault();
     
    movPag.style.marginLeft = "0%";
    num[cont - 2].classList.remove("active");
    progressCheck[cont - 2].classList.remove("active");
    cont -=1;
});
btn_atras2.addEventListener("click", function(e){
    e.preventDefault();
     
    movPag.style.marginLeft = "-25%";
    num[cont - 2].classList.remove("active");
    progressCheck[cont - 2].classList.remove("active");
    cont -=1;
});    
btn_atras3.addEventListener("click", function(e){
    e.preventDefault();
    
    document.getElementById('preview').innerHTML = '';
    document.getElementById('preview1').innerHTML = '';
    logosArray = [];
    imagenesArray = [];
    document.getElementById('btn_agregar').value = '';
    document.getElementById('btn_agregar1').value = '';

    movPag.style.marginLeft = "-50%";
    num[cont - 2].classList.remove("active");
    progressCheck[cont - 2].classList.remove("active");
    cont -=1;
});
btn_atras4.addEventListener("click", function(e){
    e.preventDefault();
     
    movPag.style.marginLeft = "-75%";
    num[cont - 2].classList.remove("active");
    progressCheck[cont - 2].classList.remove("active");
    cont -=1;
});




