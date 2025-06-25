document.addEventListener('DOMContentLoaded', () => {
    const blocks = document.querySelectorAll('.as-block-reviews');

    if (!blocks.length) return;

    blocks.forEach(block => {
        const slider = block.querySelector('.swiper');
        const buttonNext = block.querySelector('.swiper-button-next');
        const buttonPrev = block.querySelector('.swiper-button-prev');

        const swiper = new Swiper(slider, {
            slidesPerView: 1,
            navigation: {
                nextEl: buttonNext,
                prevEl: buttonPrev,
            }
        });
    });
});