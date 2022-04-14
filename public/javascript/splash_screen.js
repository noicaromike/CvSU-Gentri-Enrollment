const intro = document.querySelector('.intro'),
        logo = document.querySelector('.logo__header'),
        logoSpan = document.querySelectorAll('.logo')


            /*===== SPLASH =====*/
        /* WHEN REFRESH SPLASH SCREEN REVEAL */
        window.addEventListener('DOMContentLoaded', () =>{
            setTimeout(() => {


                /* TEXT REVEAL */
                logoSpan.forEach((span, idx) =>{
                     setTimeout(() =>{

                         span.classList.add('active');
                     }, (idx + 1) * 400)
                });

                setTimeout(() =>{
                    logoSpan.forEach((span, idx)=>{
                /* TEXT FADEOUT */
                        setTimeout(()=>{
                            span.classList.remove('active');
                            span.classList.add('fade');
                        }, (idx +1) * 50)


                    })
                }, 2000);
                /* CONTAINER OUT */
                setTimeout(() =>{
                    intro.style.top = '-100vh';
                }, 2400)


            })
        })