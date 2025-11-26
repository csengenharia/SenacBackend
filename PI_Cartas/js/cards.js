// Pode ser usado para validações, confirmações, etc.
console.log("Sistema de Cartas carregado!");

document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");
    cards.forEach(card => {
        card.setAttribute("tabindex", "0");
        card.addEventListener("click", () => {
            const link = card.querySelector(".card-button");
            if (link) window.location.href = link.getAttribute("href");
        });
        card.addEventListener("keypress", (event) => {
            if (event.key === "Enter") {
                const link = card.querySelector(".card-button");
                if (link) window.location.href = link.getAttribute("href");
            }
        });
    });
});
