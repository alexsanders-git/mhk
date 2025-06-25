import { disableScroll, enableScroll } from "../as-helpers";

document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelectorAll('.as-header');

    if (!header) return;

    const menu = document.querySelector('.mobile-menu');
    const burger = document.querySelector('.burger');

    if (!menu || !burger) return;

    burger.addEventListener('click', () => {
        if (menu.classList.contains('active')) {
            menu.classList.remove('active');
            burger.classList.remove('active');

            enableScroll();
        } else {
            menu.classList.add('active');
            burger.classList.add('active');

            disableScroll();
        }
    });
});