document.addEventListener("DOMContentLoaded", function () {
  console.log("JS cargado");

  // MENÚ
  const toggle = document.getElementById("menu-toggle");
  const nav = document.getElementById("nav-links");

  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      nav.classList.toggle("active");
    });
  }

  // VALIDACIÓN PASSWORD
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm_password");
  const mensaje = document.getElementById("mensaje-error");
  const registroBtn = document.getElementById("registro-btn");

  if (password && confirmPassword && mensaje && registroBtn) {
    registroBtn.disabled = true; // Deshabilitar botón inicialmente

    confirmPassword.addEventListener("keyup", function () {
      if (password.value !== confirmPassword.value) {
        mensaje.textContent = "Las contraseñas no coinciden";
      } else {
        mensaje.textContent = "";
        registroBtn.disabled = false; // Habilitar botón si las contraseñas coinciden
      }
    });
  }

  // LOGIN
  const loginForm = document.getElementById("login-form");
  const loginBtn = document.getElementById("login-btn");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  if (loginForm && loginBtn) {
    loginBtn.disabled = true;

    function validarCampos() {
      if (emailInput.value.trim() !== "" && passwordInput.value.trim() !== "") {
        loginBtn.disabled = false;
      } else {
        loginBtn.disabled = true;
      }
    }

    emailInput.addEventListener("input", validarCampos);
    passwordInput.addEventListener("input", validarCampos);

    loginForm.addEventListener("submit", function (e) {
      if (loginBtn.disabled) {
        e.preventDefault();
      }
    });
  }
});

function abrirModal(id, nombre, precio, categoria, etiqueta) {
  document.getElementById("modalEditar").style.display = "block";

  document.getElementById("edit_id").value = id;
  document.getElementById("edit_nombre").value = nombre;
  document.getElementById("edit_precio").value = precio;
  document.getElementById("edit_categoria").value = categoria;
  document.getElementById("edit_etiqueta").value = etiqueta;
}

function cerrarModal() {
  document.getElementById("modalEditar").style.display = "none";
}

console.log(typeof abrirModal);