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

  if (password && confirmPassword && mensaje) {
    
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


  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      if (!email || !password) {
        loginBtn.disabled = true; // Deshabilitar botón si falta email o contraseña
        e.preventDefault(); // Evitar envío del formulario
      }
    });
  }

});