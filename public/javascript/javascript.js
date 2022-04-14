const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/*===== MENU SHOW =====*/
/* Validate if constant exists */
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll('.menu__item')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))


/*==================== LINKS ANIMATION ====================*/
const links = document.querySelectorAll('.menu__item'),
    linkImages = document.querySelectorAll('.hover-reveal__img')



    links.forEach((link, idx) =>{
        link.addEventListener('mousemove', (e) =>{
            link.children[1].style.opacity = 1;
            link.children[0].style.zIndex = 3;
            link.children[1].style.transform = `translate(${e.clientX - 300}px, -${e.clientY / 3}px) rotate(${e.clientX / 230}deg)`;
            linkImages[idx].style.transform = 'scale(1, 1)'
            link.style.zIndex = 2;
        })
        link.addEventListener('mouseleave', (e) =>{
            link.children[1].style.opacity = 0;
            link.children[1].style.transform = `translate(${-e.clientX}px, -300px)`
            linkImages[idx].style.transform = 'scale(0.8, 0.8)'
            link.style.zIndex = 0;
        })
    })


// for Image

// Get the modal
var modal = document.getElementById('myModal');
 
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.querySelectorAll('#myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

function imgAction(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

img.forEach(a => a.addEventListener('click', imgAction))

 
// When the user clicks on <span> (x), close the modal
modal.onclick = function() {
    img01.className += " out";
    setTimeout(function() {
       modal.style.display = "none";
       img01.className = "modal-content";
     }, 400);
    
 } 
 

   