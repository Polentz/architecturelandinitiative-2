document.querySelectorAll(".item-title a, .item-title p").forEach(title => {
    const thisContent = title.dataset.name;
    splitTitle(title, thisContent);
});

const handleMediaQuery = (event) => {
    if (event.matches) {
        // animateTitle(110, "none", 0.1);
        animateTitle("none", -110, 0.1);
    } else {
        animateTitle("none", -110, 0.1);
    };
};

window.addEventListener("load", () => {
    handleMediaQuery(mediaQuery);
    handleTitleHover();
});

window.addEventListener("resize", () => {
    handleMediaQuery(mediaQuery);
});