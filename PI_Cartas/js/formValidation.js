document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", function (event) {
            let camposValidos = true;
            const campos = form.querySelectorAll("input, textarea");
            campos.forEach(campo => {
                if (campo.hasAttribute("required") && campo.value.trim() === "") {
                    campo.classList.add("erro");
                    campo.setAttribute("aria-invalid", "true");
                    camposValidos = false;
                } else {
                    campo.classList.remove("erro");
                    campo.setAttribute("aria-invalid", "false");
                }
            });
            if (!camposValidos) {
                event.preventDefault();
                alert("Por favor, preencha todos os campos obrigatórios.");
            }
        });
    }
});