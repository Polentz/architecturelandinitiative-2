window.addEventListener("load", () => {
    lazyloading();
    handleFiltersBox();
    handleFiltersAndCategories();
    handleGallery();
    audioPlayer();
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});