function showText(text) {
    document.getElementById("text").innerHTML = "<a class='text' style='font-size:200%; color:white;cursor:pointer; user-select:none'>Cambiar foto de perfil</a>";
    image.style.cssText += 'filter: brightness(40%) blur(5px);';
    //transition: 1s filter linear;
    
}
function hide() {
    document.getElementById("text").innerHTML = "";
    image.style.cssText += 'filter: brightness(100%)';
}