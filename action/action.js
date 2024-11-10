

 document.addEventListener ('scroll',()=>
 {

    const navbar=document.querySelector('.navbar');
    const menuText = document.querySelector('.menu.text-right');

   
    if(window.scrollY>0)
    {
        navbar.classList.add('scrolled');
    
    }

    else
    {

        navbar.classList.remove('scrolled');

    }
 });

    
