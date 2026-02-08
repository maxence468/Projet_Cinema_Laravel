export function carousel3Items() {
    document.querySelectorAll('.carousel-3-per-3 .carousel-item').forEach((el) => {
        const minPerSlide = 3;
        let next = el.nextElementSibling;

        for (let i = 1; i < minPerSlide; i++) {
            if (!next) {
                next = el.parentNode.firstElementChild;
            }
            const clone = next.children[0].cloneNode(true);
            el.appendChild(clone);
            next = next.nextElementSibling;
        }
    });
}
