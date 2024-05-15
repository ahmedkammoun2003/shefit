// JavaScript
const yoga = document.getElementById("yoga");
const spinning = document.getElementById("spinning");
const pilates = document.getElementById("pilates");
const meditation = document.getElementById("meditation");
const gymnastique = document.getElementById("gymnastique");
const musculation = document.getElementById("musculation");

const applyHover = (element, text) => {
    const textOverlay = element.querySelector('.text-overlay');

    element.addEventListener("mouseover", event => {
        event.target.style.transform = "scale(1.06)";
        event.target.style.boxShadow = "10px 10px 10px rgba(0, 0, 0, 0.7)";
        event.target.style.opacity = "0.7";

        textOverlay.textContent = text;
    });
    
    element.addEventListener("mouseout", event => {
        event.target.style.transform = "";
        event.target.style.boxShadow = "";
        event.target.style.opacity = "";

        textOverlay.textContent = "";

    });
};

applyHover(yoga, "Yoga");
applyHover(pilates, "Pilates");
applyHover(meditation, "Meditation");
applyHover(gymnastique, "Gymnastique");

