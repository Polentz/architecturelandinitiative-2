window.addEventListener("load", () => {
    lazyloading();
    handleFiltersBox();
    handleFilters();
    handleGallery();
    audioPlayer();
    handleTopButton();
});

window.addEventListener("resize", () => {
    handleTopButton();
});

window.addEventListener("scroll", () => {
    handleTopButton();
});