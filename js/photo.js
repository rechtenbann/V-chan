function showText(text) {
    document.getElementById("text").innerHTML = "<a style='font-size:200%; color:white;'>Cambiar foto de perfil</a>";
    image.style.cssText += 'filter: brightness(40%) blur(5px);';
}
function hide() {
    document.getElementById("text").innerHTML = "";
    image.style.cssText += 'filter: brightness(100%)';
}