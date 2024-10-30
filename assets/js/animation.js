
const animacao = new ScrollReveal();
animacao.reveal('.card', {
    origin: 'right',
    distance: '30%',
    duration:2000,
    
    
    reset :true
});

animacao.reveal('.services', {
    origin: 'top',
    distance: '30%',
    duration:2000,
    delay:250,
    
    reset :true
});
$(document).ready(function() {
    $('.navbar-toggler').click(function() {
       
        var icon = $(this).find('i');
        if (icon.hasClass('bi-list')) {
            icon.removeClass('bi-list').addClass('bi-x'); 
        } else {
            icon.removeClass('bi-x').addClass('bi-list'); 
        }
    });
});