const imgBx = document.querySelector(".imgBx");
const slides = imgBx.getElementsByTagName("img");
const contentBx = document.querySelector(".contentBx");
const slideTexts = contentBx.getElementsByTagName("div");

var i = 0;
var j = 0;

nextSlide();

function nextSlide(){
    slides[i].classList.remove("active");
    slideTexts[j].classList.remove("active");
    i = (i + 1) % slides.length;
    j = (j + 1) % slideTexts.length;
    slides[i].classList.add("active");
    slideTexts[j].classList.add("active");
    setTimeout(nextSlide, 5000);
}
