document.addEventListener('DOMContentLoaded', () => {
    const blocks = document.querySelectorAll('.as-block-banner');

    if (!blocks.length) return;

    blocks.forEach(block => {
        const slider = block.querySelector('.swiper');
        const pagination = block.querySelector('.swiper-pagination');

        const swiper = new Swiper(slider, {
            slidesPerView: 1,
            pagination: {
                el: pagination,
            }
        });
    });
});