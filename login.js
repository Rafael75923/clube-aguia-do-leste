document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const usuarioCorreto = "admin";
    const senhaCorreta = "1234";

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === usuarioCorreto && password === senhaCorreta) {
        alert("Login bem-sucedido!");

        // SALVAR NO SESSION STORAGE QUE O USUÁRIO ESTÁ AUTENTICADO
        sessionStorage.setItem("estaAutenticado", "true");

        // Redirecionar para unidade.html
        window.location.href = "unidade.html";
    } else {
        document.getElementById("errorMessage").style.display = "block";
    }

    document.getElementById("logoutButton").addEventListener("click", function () {
        sessionStorage.removeItem("estaAutenticado"); // Remove a autenticação
        window.location.href = "login.html"; // Redireciona para a página de login
    });
    
});
