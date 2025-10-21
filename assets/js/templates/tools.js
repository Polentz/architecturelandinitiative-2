window.addEventListener("load", () => {
    titlesAnimation(-100, 0);
    handleTitleHover();
    horizontalScroll();
    sortElements(document.querySelector(".scroll-items"), document.querySelector(".scroll-layout"));
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});