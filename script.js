function agregarAlCarrito(idProducto) {

    let url = "agregar_al_carrito.php";
  
    let formData = new FormData();
    formData.append('id_producto', idProducto);
  
    fetch(url, {
      method: 'POST', 
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        if(data.status === 'ok') {
          actualizarCarrito();
        } else {
          console.log('Error al agregar al carrito');
        }
      });
  
  }



  function verCarrito() {

    fetch("obtener_carrito.php")
      .then(response => response.text()) 
      .then(data => {
        document.getElementById('carrito').innerHTML = data;
      })
  
  }

// script.js

function actualizarCarrito() {

    fetch("obtener_carrito.php")
      .then(response => response.text())
      .then(data => {
        // Obtener elemento contenedor carrito
        const carritoDiv = document.getElementById('carrito');
        
        // Agregar el nuevo contenido del carrito
        carritoDiv.innerHTML += data; 
      })
  
  } 


