const testimonials_barber_1 = [
    {
        img: "https://img.freepik.com/fotos-gratis/jovem-barbudo-com-camiseta-branca_273609-7190.jpg?t=st=1730982482~exp=1730986082~hmac=2391bb25cd83fa2f63389c8ece7a0d1633d2ed543b841016cf9abe72a9faf0ac&w=1380",
        quote: "Agendar pelo BarberGO é muito prático! Sempre encontro horários disponíveis sem complicação.",
        author: "João Almeida"
    },
    {
        img: "https://img.freepik.com/fotos-gratis/jovem-barbudo-com-camisa-listrada_273609-5677.jpg?t=st=1730982497~exp=1730986097~hmac=e205331319e6d82c1491daf3e86dfc72aaaa58f9c1b326db895d45d319c82b81&w=1380",
        quote: "Excelente app! O BarberGO me economiza tempo e facilita meu agendamento na barbearia de sempre.",
        author: "Marcelo Costa"
    },
    {
        img: "https://img.freepik.com/fotos-gratis/retrato-de-um-jovem-sorridente-esfregando-as-maos_171337-10297.jpg?t=st=1730982535~exp=1730986135~hmac=b0acaf17da5562e1491973f9d4dbe6935c11938802a364009530f4f616d8b4bc&w=1380",
        quote: "Não perco mais tempo esperando! Com o BarberGO, agendo e chego na hora certa.",
        author: "Pedro Oliveira"
    }
];

const testimonials_barber_2 = [
    {
        img: "https://img.freepik.com/fotos-gratis/retrato-horizontal-de-bonito-homem-com-barba-por-fazer-e-barba-por-fazer-vestido-com-uma-camiseta-branca-casual-aponta-para-o-espaco-em-branco-da-copia-para-seu-projeto-usa-oculos-homem-serio-vendedor-de-roupas_273609-16083.jpg?t=st=1730982678~exp=1730986278~hmac=56895c3d4dfa50bd8be9216dbec67c21fbf1c3d241f4ac3aa017e225affb45d8&w=1380",
        quote: "Como barbeiro, o BarberGO ajuda a organizar meus horários e evita que eu perca clientes.",
        author: "Fábio Santos"
    },
    {
        img: "https://img.freepik.com/fotos-gratis/jovem-adulto-vestindo-camisa-em-branco_23-2149321808.jpg?t=st=1730982692~exp=1730986292~hmac=1ba5aa3c865a1663b01c597711dbb3c3ffc9459228a2965b4fc60b1d870a4ad3&w=740",
        quote: "Meus clientes conseguem agendar com facilidade e meu dia fica mais organizado.",
        author: "Rafael Souza"
    },
    {
        img: "https://img.freepik.com/fotos-gratis/macho-barbudo-brutal-com-bracos-cruzados-vestido-com-uma-camisa-xadrez-amarela_613910-1818.jpg?t=st=1730982901~exp=1730986501~hmac=d3f683f99f8310a199edb7ce3864d11ed0a819bf06ad4ec37240e8ab6abee418&w=1380",
        quote: "O BarberGO agilizou meu atendimento, agora é só ver o app e seguir a lista de clientes.",
        author: "Mateus Dias"
    }
];

const testimonials_barber_3 = [
    {
        img: "https://img.freepik.com/fotos-gratis/cintura-para-cima-retrato-de-bonito-homem-serio-com-barba-por-fazer-mantem-as-maos-juntas-vestido-com-camisa-azul-escura-tem-conversa-com-o-interlocutor-fica-contra-a-parede-branca-freelancer-homem-autoconfiante_273609-16320.jpg?t=st=1730982707~exp=1730986307~hmac=90f33ff59a64bdd0125b886d269a58b3ae175efb7276207b3f53ade067b54da9&w=1380",
        quote: "Agendar pelo BarberGO é muito fácil, e a barbearia sempre está pronta para me atender.",
        author: "Carlos Eduardo"
    },
    {
        img: "https://img.freepik.com/fotos-gratis/foto-de-um-homem-atraente-e-sorridente-com-um-penteado-na-moda-aparencia-positiva-vestido-com-uma-roupa-elegante-e-festiva-encostada-na-parede-rosa_273609-23540.jpg?t=st=1730982801~exp=1730986401~hmac=abf3d0e1732b2a9d003ab16c70ffb70af28c8d1199c8c2f1df128ca74a15b5b0&w=1380",
        quote: "Gostei muito do BarberGO, tudo rápido e sem filas. Só chego e corto!",
        author: "André Oliveira"
    },
    {
        img: "https://img.freepik.com/fotos-gratis/sorrindo-alegre-barbudo-cara-de-camiseta_176420-17977.jpg?t=st=1730982821~exp=1730986421~hmac=714611de31ff7e7d418e683d8d06b14a7239f0443b05b12dfb9d621f5705d69a&w=1380",
        quote: "Uso o BarberGO toda semana, nunca tive problemas com os horários.",
        author: "José Roberto"
    }
];

let currentTestimonialIndex1 = 0;
let currentTestimonialIndex2 = 0;
let currentTestimonialIndex3 = 0;

function updateTestimonials() {
    const testimonial1 = testimonials_barber_1[currentTestimonialIndex1];
    $('#1 .card-img-top').attr('src', testimonial1.img);
    $('#1 .card-quote').text(testimonial1.quote);
    $('#1 .card-author').text(testimonial1.author);
    
    const testimonial2 = testimonials_barber_2[currentTestimonialIndex2];
    $('#2 .card-img-top').attr('src', testimonial2.img);
    $('#2 .card-quote').text(testimonial2.quote);
    $('#2 .card-author').text(testimonial2.author);

    const testimonial3 = testimonials_barber_3[currentTestimonialIndex3];
    $('#3 .card-img-top').attr('src', testimonial3.img);
    $('#3 .card-quote').text(testimonial3.quote);
    $('#3 .card-author').text(testimonial3.author);

    currentTestimonialIndex1 = (currentTestimonialIndex1 + 1) % testimonials_barber_1.length;
    currentTestimonialIndex2 = (currentTestimonialIndex2 + 1) % testimonials_barber_2.length;
    currentTestimonialIndex3 = (currentTestimonialIndex3 + 1) % testimonials_barber_3.length;
}

$(document).ready(function() {
    updateTestimonials();
    setInterval(updateTestimonials, 5000);
});
