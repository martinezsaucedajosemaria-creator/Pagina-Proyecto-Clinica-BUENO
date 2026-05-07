const boton = document.getElementById('btnAgregar');

function mostrarpopup(msg) {
    document.getElementById("popup").style.display = "flex";
    document.getElementById("pop-up-text").innerText = msg;
}
function cerrarPopup() {
    document.getElementById("popup").style.display = "none";
}

boton.addEventListener("click",function(e){
    e.preventDefault();
    mostrarpopup();
})

        function actualizarEstadisticas() {
            // Agregamos ?t= + Date.now() para que la URL sea siempre distinta
            fetch('consultas_box.php?t=' + Date.now()) 
                .then(response => response.json())
                .then(data => {
                    document.getElementById('num-total').innerText = data.total;
                    document.getElementById('num-nuevos').innerText = data.nuevos;
                })
                .catch(error => console.error('Error al obtener datos:', error));
        }

        // Ejecutar cuando cargue la página
        actualizarEstadisticas();
        
        // Opcional: Actualizar cada 30 segundos para que sea "tiempo real"
        setInterval(actualizarEstadisticas, 30000);