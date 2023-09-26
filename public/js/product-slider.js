const popular = document.querySelector(".pop-container");
const popularSlides = popular.getElementsByTagName("div");

function nextPopular(){
    popular.append(popularSlides[0]);
}

function prevPopular(){
    popular.prepend(popularSlides[popularSlides.length - 1]);
}
