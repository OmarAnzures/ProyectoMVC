// Obtener todas las imágenes con la clase 'image'
var images = document.getElementsByClassName('image');

// Obtener el modal
var modal = document.getElementById("myModal");

// Obtener el elemento <span> que cierra el modal
var span = document.getElementsByClassName("close")[0];

// Recorrer todas las imágenes y añadir un evento clic a cada una
for (var i = 0; i < images.length; i++) {
    images[i].onclick = function(){
        modal.style.display = "block";
        // Cambiar el src de la imagen en el modal al hacer clic en una imagen
        var imgSrc = this.src;
        document.getElementById("img01").src = imgSrc;
    }
}

// Cuando se hace clic en <span> (x), cerrar el modal
span.onclick = function() {
    modal.style.display = "none";
}

// Cuando se hace clic en cualquier lugar fuera del modal, cerrar el modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
