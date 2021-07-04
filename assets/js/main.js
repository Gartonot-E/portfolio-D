/**
 * Function scroll to id
 */

(() => {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(el => {
        el.addEventListener('click', e => {
            e.preventDefault();
            let id = el.getAttribute('href');
            if(id[1] !== undefined){
                document.querySelector(id).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
        });
    });
})();


/**
 * Function gamburger
 */
(() => {
    const gamb = document.querySelector('.gamburger');
    const topNav = document.querySelector('header nav ul.top');
    gamb.addEventListener('click', () => { 
        gamb.classList.toggle('active'); 
        topNav.classList.toggle('active');
    });
})();


/**
 * Function for click like
 */
(() => {
    const likes = document.querySelectorAll('.like');
    likes.forEach(el => {
        el.addEventListener('click', async e => {
            
            if(el.classList.contains('likeAdded')){
                el.children[1].innerHTML = parseInt(el.children[1].innerHTML) - 1;
            } else {
                el.children[1].innerHTML = parseInt(el.children[1].innerHTML) + 1;
            }
            el.classList.toggle('likeAdded');

            
            // Созадём обьеект, в котором фиксируем кол-во лайков и id фотографии
            countLike = {
                id: el.children[1].dataset.id,
                like: el.children[1].innerHTML
            }

            // Делаем AJAX запрос на functions.php и отправляем объект countLike
            $.ajax({
                url: '/functions.php',         
                method: 'post',
                data: countLike                    
            });

        });
    });

})();