const movpagina =document.querySelector(".movpagina");
const btn_usuario =document.querySelector(".sigpagina");

btn_usuario.addEventListener("click", function(e){
 e.preventDefault();

 movpagina.style.marginleft = "-50%";
});
