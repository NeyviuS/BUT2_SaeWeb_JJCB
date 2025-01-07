const carousel = document.getElementById('actu-carousel');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const blocActu = document.querySelector('.bloc_actu'); // Récupérer un élément pour sa largeur

let currentIndex = 0;

function updateCarousel() {
    const itemWidth = blocActu.offsetWidth; // Calculer la largeur exacte d'un élément
    carousel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
}

nextBtn.addEventListener('click', () => {
    const totalItems = carousel.children.length; // Nombre total d'éléments
    currentIndex = (currentIndex + 1) % totalItems; // Boucler après le dernier
    updateCarousel();
});

prevBtn.addEventListener('click', () => {
    const totalItems = carousel.children.length; // Nombre total d'éléments
    currentIndex = (currentIndex - 1 + totalItems) % totalItems; // Boucler avant le premier
    updateCarousel();
});

window.addEventListener('resize', updateCarousel); // Mettre à jour si la fenêtre est redimensionnée