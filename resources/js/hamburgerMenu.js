export function hamburgerMenu() {
    const btn = document.querySelector(".hamburger");
    const nav = document.querySelector(".hamburgerMenu");

// Toggle menu
    btn.addEventListener("click", () => {
        nav.classList.toggle("active");
    });

// Hide menu on click inside menu
    nav.addEventListener("click", () => {
        nav.classList.remove("active");
    });

// Hide menu on Escape key
    document.body.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            nav.classList.remove("active");
        }
    });
}


