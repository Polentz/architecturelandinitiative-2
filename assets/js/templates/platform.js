window.addEventListener("load", () => {

    handleFiltersBox();
    handleFilters();
    accordion();
    sortAccordion();
    handleTopButton();
});

window.addEventListener("resize", () => {
    handleTopButton();
});

window.addEventListener("scroll", () => {
    handleTopButton();
});