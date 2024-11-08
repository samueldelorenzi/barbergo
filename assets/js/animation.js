
const animacao = new ScrollReveal();
animacao.reveal('.card', {
    origin: 'right',
    distance: '10%',
    duration:400,
    delay:100,
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