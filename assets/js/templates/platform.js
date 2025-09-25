window.addEventListener("load", () => {
    handleFiltersBox();
    handleFilters(document.querySelectorAll(".accordion"));
    accordion();
    sortAccordion();
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});
