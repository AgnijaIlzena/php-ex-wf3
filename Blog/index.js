
let rightArrow = document.querySelector("#fleshDroite");
let leftArrow = document.querySelector("#fleshGauche");
let img = document.querySelector("#carouselImg");
let timer; 

let srcValues = [
    "images/wolfs.jpg",
    "images/img-carousel/1.jpg",
    "images/img-carousel/2.jpg",
    "images/img-carousel/3.jpg"
    ];

let counter = 0;

// Automatic Carusel
function turnCarousel() {
    if(counter === srcValues.length-1) {
                counter = 0;
            } else {
                counter += 1;
            }
            img.src = srcValues[counter];  
}

// Manual Carusel
  // to righ direction
  rightArrow.addEventListener("click", turnCarousel);
  leftArrow.addEventListener("click", () => {
      if(counter === 0) {
          counter = srcValues.length-1;
      } else {
          counter -= 1;
      }
      img.src = srcValues[counter]; 
  })

// Function Start carousel
const startCarousel = () => {
    timer = setInterval(turnCarousel, 500); 
}

// Initialise carousel on page reload
startCarousel();

// Function Stop carousel
const stopCarousel = () => {
clearInterval(timer);
}

// Stop Carousel on Mouseover - mouseover on the image
img.addEventListener("mouseover", stopCarousel);
// Start Carousel on Mouseover - mouseover on the image
img.addEventListener("mouseout", startCarousel);

// Stop Carousel on Mouseover - mouseover on the right and left Flash
rightArrow.addEventListener("mouseover", stopCarousel);
leftArrow.addEventListener("mouseover", stopCarousel);
// Start Carousel on Mouseover - mouseover on on the right and left Flash
rightArrow.addEventListener("mouseout", startCarousel);
leftArrow.addEventListener("mouseout", startCarousel);


  






