window.addEventListener("load", () => {
    handleFiltersBox();
    handleFilters();
    accordion();
    sortAccordion();
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});
