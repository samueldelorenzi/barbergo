const testimonials_barber_1 = [
    {
        img: "https://i.pravatar.cc/150?img=7",
        quote: "Serviço impecável! O atendimento da BarberGO é excelente e o corte ficou perfeito.",
        author: "João Almeida"
    },
    {
        img: "https://i.pravatar.cc/150?img=8",
        quote: "A BarberGO superou minhas expectativas. Ambiente agradável e profissionais capacitados.",
        author: "Marcelo Costa"
    },
    {
        img: "https://i.pravatar.cc/150?img=9",
        quote: "Muito satisfeito com o corte e a barba. Com certeza voltarei.",
        author: "Pedro Oliveira"
    },
    {
        img: "https://i.pravatar.cc/150?img=10",
        quote: "Ótima experiência! A BarberGO é a melhor barbearia que já frequentei.",
        author: "Gustavo Lima"
    },
    {
        img: "https://i.pravatar.cc/150?img=11",
        quote: "Atendimento excelente e resultado melhor ainda. Recomendo muito.",
        author: "Lucas Moreira"
    }
];

const testimonials_barber_2 = [
    {
        img: "https://i.pravatar.cc/150?img=12",
        quote: "Adorei o ambiente e o serviço. Fui muito bem atendido!",
        author: "Fábio Santos"
    },
    {
        img: "https://i.pravatar.cc/150?img=13",
        quote: "A BarberGO sempre me atende com perfeição. Altamente recomendada!",
        author: "Rafael Souza"
    },
    {
        img: "https://i.pravatar.cc/150?img=14",
        quote: "Cortes modernos e barbeiros muito profissionais. Experiência incrível.",
        author: "Mateus Dias"
    },
    {
        img: "https://i.pravatar.cc/150?img=15",
        quote: "Ambiente acolhedor e resultado perfeito no corte e barba.",
        author: "Leonardo Alves"
    },
    {
        img: "https://i.pravatar.cc/150?img=16",
        quote: "Recomendo para todos! Atendimento e serviço impecáveis.",
        author: "Thiago Ramos"
    }
];

const testimonials_barber_3 = [
    {
        img: "https://i.pravatar.cc/150?img=17",
        quote: "Melhor barbearia da cidade! Muito atenciosos e serviço de qualidade.",
        author: "Carlos Eduardo"
    },
    {
        img: "https://i.pravatar.cc/150?img=18",
        quote: "Ótimo atendimento, profissionais qualificados. Voltarei com certeza.",
        author: "André Oliveira"
    },
    {
        img: "https://i.pravatar.cc/150?img=19",
        quote: "Corte rápido e bem feito. Serviço excelente.",
        author: "José Roberto"
    },
    {
        img: "https://i.pravatar.cc/150?img=20",
        quote: "Gostei muito do corte e da barba. Vale cada centavo.",
        author: "Bruno Lima"
    },
    {
        img: "https://i.pravatar.cc/150?img=21",
        quote: "Ambiente confortável e profissionais experientes. Recomendo!",
        author: "Henrique Cardoso"
    }
];

let currentTestimonialIndex1 = 0;
let currentTestimonialIndex2 = 0;
let currentTestimonialIndex3 = 0;

function updateTestimonials() {
    const testimonial1 = testimonials_barber_1[currentTestimonialIndex1];
    $('#1 .card-img-top').attr('src', testimonial1.img);
    $('#1 .card-title').text(testimonial1.quote);
    $('#1 .card-title').text(testimonial1.author);
    
    const testimonial2 = testimonials_barber_2[currentTestimonialIndex2];

    $('#2 .card-img-top').attr('src', testimonial2.img);
    $('#2 .card-title').text(testimonial2.quote);
    $('#2 .card-title').text(testimonial2.author);

    const testimonial3 = testimonials_barber_3[currentTestimonialIndex3];

    $('#3 .card-img-top').attr('src', testimonial3.img);
    $('#3 .card-title').text(testimonial3.quote);
    $('#3 .card-title').text(testimonial3.author);

   

    currentTestimonialIndex1 = (currentTestimonialIndex1 + 1) % testimonials_barber_1.length;
    currentTestimonialIndex2 = (currentTestimonialIndex2 + 1) % testimonials_barber_2.length;
    currentTestimonialIndex3 = (currentTestimonialIndex3 + 1) % testimonials_barber_3.length;
}

$(document).ready(function() {
    updateTestimonials();
    setInterval(updateTestimonials, 5000);
});
