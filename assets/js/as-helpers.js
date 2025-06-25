export const disableScroll = () => {
    const body = document.body;

    let paddingOffset = window.innerWidth - body.offsetWidth + 'px';
    let pagePosition = window.scrollY;

    body.style.paddingRight = paddingOffset;
    body.classList.add('lock');
    body.dataset.position = pagePosition;
    body.style.top = -pagePosition + 'px';
}

export const enableScroll = () => {
    const body = document.body;

    let pagePosition = parseInt(body.dataset.position, 10);

    body.style.top = 'auto';
    body.classList.remove('lock');

    body.style.paddingRight = '0px';

    window.scroll({
        top: pagePosition,
        left: 0
    });

    body.removeAttribute('data-position');
}