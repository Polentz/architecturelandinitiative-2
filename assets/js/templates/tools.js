document.querySelectorAll(".item-title a").forEach(title => {
    const thisContent = title.dataset.name;
    splitTitle(title, thisContent);
});

// const observerElements = document.querySelectorAll(".item-title");
// const observerOptions = {
//     root: null,
//     rootMargin: '0px 0px',
//     threshold: 0
// };
// const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//         const animatedEl = entry.target.querySelectorAll(".letter");
//         if (entry.intersectionRatio > 0) {
//             let tl = gsap.timeline();
//             tl.to(animatedEl, {
//                 autoAlpha: 1,
//                 duration: 0.3,
//             });
//             tl.from(animatedEl, {
//                 duration: 0.3,
//                 yPercent: 100,
//                 stagger: 0.05,
//             });
//             tl.to(".word", {
//                 clipPath: "none"
//             });
//             observer.unobserve(entry.target);
//         };
//     });
// }, observerOptions);

// observerElements.forEach(el => {
//     observer.observe(el);
// });

window.addEventListener("load", () => {
    horizontalScroll();
    animateTitle(110, "none", 0.1);
    handleTitleHover();
});