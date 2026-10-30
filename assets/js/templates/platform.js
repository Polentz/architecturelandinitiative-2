document.addEventListener("DOMContentLoaded", () => {
    handleFiltersBox();
    handleFilters(document.querySelectorAll(".accordion"));
    accordion();
    sortElements(document.querySelector(".accordion-list"), document.querySelector(".items-container"));
    topButtonEvent();
});

window.addEventListener("scroll", () => {
    showInnerMenu();
});