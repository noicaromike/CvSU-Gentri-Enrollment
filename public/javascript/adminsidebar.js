const toggle = document.querySelector('#admin__toggle');
const closeNav = document.querySelector('.close-menu');

toggle.addEventListener('click', () =>{
    document.querySelector('.sidebar-menu').classList.add('show');
})

closeNav.addEventListener('click', () =>{
    document.querySelector('.sidebar-menu').classList.remove('show');
    
})



   
    
