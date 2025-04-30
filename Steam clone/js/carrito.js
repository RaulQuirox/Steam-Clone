function agregarCarrito(id) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito.push(id);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    alert('Juego agregado al carrito');
  }
  