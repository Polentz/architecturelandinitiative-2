window.addEventListener("load", () => {
    titlesAnimation(0, -100);
    handleTitleHover();
    sortElements(document.querySelector(".scroll-items"), document.querySelector(".scroll-layout"));
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});