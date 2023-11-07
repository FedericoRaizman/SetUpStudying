const home = document.getElementById("home");
const carpetas = document.getElementById("carpetas");
const calendario = document.getElementById("calendario");
const documentos = document.getElementById("documentos");


uno.addEventListener("click", () => {
camara.style.display = "block";
info.style.display = "none";
soporte.style.display = "none";
primeraImpresion.style.display = "none";
});

infobtn.addEventListener("click", () => {
camara.style.display = "none";
info.style.display = "block";
soporte.style.display = "none";
primeraImpresion.style.display = "none";
});