document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");
    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(30px)";
        setTimeout(() => {
            card.style.transition = "all 0.5s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, index * 200);
    });
});


document.addEventListener("focusin", (event) => {
    if (event.target.classList.contains("card")) {
        event.target.style.boxShadow = "0 0 10px rgba(0,123,255,0.6)";
    }
});
document.addEventListener("focusout", (event) => {
    if (event.target.classList.contains("card")) {
        event.target.style.boxShadow = "";
    }
});