// const images = liste des images qui défileront sur le carousel
// const prevBtn & nextBtn = connexion des boutons "image suivante & précédente"
const images = ["/img/renovation-cuir-4.jpeg", "/img/nettoyage-moteur-1.jpeg", "/img/nettoyage-exterieur-1.jpeg", "/img/renovation-cuir-3.jpeg"]
const carouselSlide = document.querySelector(".carousel-slide")
const prevBtn = document.querySelector(".prev-btn")
const nextBtn = document.querySelector(".next-btn")

for (let i = images.length - 1; i >= 0; i--) {
    const imageEl = document.createElement("img")
    imageEl.src = images[i]
    carouselSlide.appendChild(imageEl)
}

let position = 0

const DIR = {
    LEFT: -1,
    RIGHT: 1,
}

const POSITION = {
    LEFT: "-100%",
    CENTER: "0%",
    RIGHT: "100%",
}

function moveImages(dir, currentPosition, nextPosition) {
    const currentImage = document.querySelector(`[src="${images[currentPosition]}"]`)
    const nextImage = document.querySelector(`[src="${images[nextPosition]}"]`)

    // déplacer les images loin en haut pour qu'elles n'interfèrent pas
    for (var i = 0; i < images.length; i++) {
        const img = document.querySelector(`[src="${images[i]}"]`)
        img.style.top = "-1000%"
    }

    currentImage.style.top = "0%"
    nextImage.style.top = "0%"
    currentImage.style.transition = "0s"
    nextImage.style.transition = "0s"

    if (dir == DIR.LEFT) {
        // si le bouton précédent a été cliqué
        currentImage.style.left = POSITION.CENTER
        nextImage.style.left = POSITION.LEFT
    } else if (dir == DIR.RIGHT) {
        currentImage.style.left = POSITION.CENTER
        nextImage.style.left = POSITION.RIGHT
    }

    setTimeout(() => {
        currentImage.style.transition = "0.5s"
        nextImage.style.transition = "0.5s"
        // maj des positions de l'image dans la direction souhaitée
        // maj des positions finales
        if (dir == DIR.LEFT) {
            // déplacer les images à droite pour que l'image de gauche soit visible
            currentImage.style.left = POSITION.RIGHT
            nextImage.style.left = POSITION.CENTER
        } else if (dir == DIR.RIGHT) {
            // déplacer les images à gauche pour que l'image de droite soit visible
            currentImage.style.left = POSITION.LEFT
            nextImage.style.left = POSITION.CENTER
        }
    }, 100)
}

function updatePosition(dir) {
    const currentPosition = position
    position = position + dir

    if (position < 0) {
        position = images.length - 1
    } else if (position >= images.length) {
        position = 0
    }
    moveImages(dir, currentPosition, position)
}

prevBtn.addEventListener("click", function () {
    updatePosition(DIR.LEFT)
})
nextBtn.addEventListener("click", function () {
    updatePosition(DIR.RIGHT)
})
