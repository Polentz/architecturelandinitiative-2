window.addEventListener("load", () => {
    handleFiltersBox();
    handleFilters(document.querySelectorAll(".gallery-item"));
    handleGallery();
    audioPlayer();
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});