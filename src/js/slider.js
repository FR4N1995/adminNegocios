import Swiper, {Navigation} from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

document.addEventListener('DOMContentLoaded', function(){
    if (document.querySelector('.slider')) {
        const opciones = {
            slidesPerView: 1,
            spaceBetween: 15,
            freeNode: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                768: {
                    slidesPerView: 2

                },
                1024: {
                    slidesPerView: 3

                },
                1200: {
                    slidesPerView: 3

                }
            }
        };
        Swiper.use([Navigation])
        new Swiper('.slider', opciones)
    }
});