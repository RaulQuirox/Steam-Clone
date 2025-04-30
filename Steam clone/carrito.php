<?php include 'includes/header.php'; ?>

<div class="carrito-box">
  <h2>Carrito de Compras</h2>
  <ul id="lista-carrito"></ul>
  <h3>Total: <span id="total">$0.00</span></h3>
  <button onclick="finalizarPedido()">Finalizar compra</button>
</div>

<script>
const juegos = JSON.parse(localStorage.getItem('carrito')) || [];
const lista = document.getElementById('lista-carrito');
const totalElem = document.getElementById('total');
let total = 0;

juegos.forEach(id => {
  fetch(`api.php?id=${id}`)
    .then(res => res.json())
    .then(juego => {
      const li = document.createElement('li');
      li.innerHTML = `<span>${juego.titulo}</span><span>$${juego.precio}</span>`;
      lista.appendChild(li);
      total += parseFloat(juego.precio);
      totalElem.textContent = `$${total.toFixed(2)}`;
    });
});

function finalizarPedido() {
  localStorage.removeItem('carrito');
  alert('Compra finalizada con éxito.');
  window.location = 'index.php';
}
</script>

<?php include 'includes/footer.php'; ?>
