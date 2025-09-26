gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(SplitText);

const header = document.querySelector(".header");
const footer = document.querySelector(".footer");
const footerNav = footer.querySelector(".footer-nav");
const main = document.querySelector(".main");
const mediaQuery = window.matchMedia("(max-width: 600px)");

const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const headerHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--header-height", `${header.offsetHeight}px`);
};

const footerHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--footer-height", `${footer.offsetHeight}px`);
};

const scrollToPosition = (element) => {
    const paddingOffset = 128;
    const offsetPosition = element.getBoundingClientRect().top + window.scrollY - paddingOffset;
    window.scrollTo({
        top: offsetPosition,
        behavior: "smooth"
    });
};

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
};

const loader = () => {
    const removeLoader = () => {
        document.querySelector(".loader").remove()
    };
    gsap.to(document.querySelector(".loader"), {
        autoAlpha: 0,
        duration: 0.25,
        onComplete: removeLoader
    });
};

const animatePaths = () => {
    const buttons = document.querySelectorAll(".header .button, .footer .button, .page-intro .button");
    buttons.forEach(button => {
        const paths = button.querySelectorAll("path");
        paths.forEach((path, i) => {
            const length = path.getTotalLength();
            path.style.strokeDasharray = length;
            path.style.transitionDelay = `${i * .1}s`;

            button.addEventListener('mouseenter', () => {
                path.style.strokeDashoffset = length;
            });

            button.addEventListener('mouseleave', () => {
                path.style.strokeDashoffset = 0;
            });
        });
    });
};

const cursor = () => {
    const handleMediaQuery = (e) => {
        if (!e.matches) {
            const cursor = document.createElement("span");
            cursor.classList.add("cursor");
            document.querySelector(".cursor-wrapper").appendChild(cursor);

            window.addEventListener("mousemove", (e) => {
                gsap.set(".cursor", {
                    xPercent: -50,
                    yPercent: -50,
                });
                gsap.to(".cursor", 0, {
                    display: "block",
                    x: e.clientX,
                    y: e.clientY,
                });
            });
            // .accordion-topbar-item[data-item="date"], .accordion-topbar-item[data-item="type"], .accordion-topbar-item[data-item="title"]
            const anchorTags = document.querySelectorAll("a, .button, .ui-button, .filter, .filter-deselect");
            anchorTags.forEach(a => {
                a.addEventListener("mouseenter", () => {
                    gsap.to(".cursor", {
                        duration: 1,
                        scale: 0.4,
                        opacity: 1,
                        ease: "power1.out",
                    });
                });

                a.addEventListener("mouseleave", () => {
                    gsap.to(".cursor", {
                        duration: 1,
                        delay: 0.2,
                        scale: 1,
                        opacity: 1,
                        ease: "power1.out",
                    });
                });
            });

            const darkElements = document.querySelectorAll(".filters-wrapper, .document-wrapper, .audio-player, .filters .ui-button");
            darkElements.forEach(element => {
                element.addEventListener("mouseenter", () => {
                    gsap.to(".cursor", {
                        duration: 0,
                        background: "var(--white)",
                        ease: "none",
                    });
                });
                element.addEventListener("mouseleave", () => {
                    gsap.to(".cursor", {
                        duration: 0,
                        background: "var(--black)",
                        ease: "none",
                    });
                });
            });
        } else {
            const cursor = document.querySelector(".cursor");
            if (cursor) {
                cursor.remove();
            };
        };
    };
    handleMediaQuery(mediaQuery);
};

const logoAnimation = () => {
    document.fonts.ready.then(() => {
        let splitLogo = SplitText.create(".logo-word", {
            type: "words, chars",
            tag: "span",
            ignore: ".ignore",
            charsClass: "letter",
        });

        gsap.from(splitLogo.chars, {
            duration: 1,
            autoAlpha: 0,
            scale: 0,
            stagger: 0.2,
            repeat: -1,
            repeatDelay: 2,
            yoyo: true,
        });
    });
};

const titlesAnimation = (items, xDirection, yDirection) => {
    document.fonts.ready.then(() => {
        let splitTitles = SplitText.create(items, {
            type: "words, chars",
            tag: "span",
            charsClass: "letter",
            wordsClass: "word",
        });

        gsap.from(splitTitles.chars, {
            duration: 0.5,
            yPercent: yDirection,
            xPercent: xDirection,
            autoAlpha: 0,
            stagger: 0.05,
        });
    });
};

const handleTitleHover = () => {
    const titles = document.querySelectorAll(".item-title a");
    titles.forEach(title => {
        title.addEventListener("mouseenter", () => {
            const letters = title.querySelectorAll(".letter");
            gsap.to(letters, {
                duration: 0.1,
                color: "var(--main-color)",
                stagger: 0.01,
            });
        });
        title.addEventListener("mouseleave", () => {
            const letters = title.querySelectorAll(".letter");
            gsap.to(letters, {
                duration: 0.1,
                color: "var(--black)",
                stagger: 0.01,
            });
        });
    });
};

const horizontalScroll = () => {
    let items = gsap.utils.toArray(".scroll-items");
    let pageWrapper = document.querySelector("main");

    items.forEach(container => {
        let localItems = container.querySelectorAll(".scroll-item");
        let distance = () => {
            let lastItemBounds = localItems[localItems.length - 1].getBoundingClientRect();
            let containerBounds = container.getBoundingClientRect();
            return Math.max(0, lastItemBounds.right - containerBounds.right);
        };
        gsap.to(container, {
            x: () => -distance(),
            ease: "none",
            scrollTrigger: {
                trigger: container,
                start: "top top",
                pinnedContainer: pageWrapper,
                end: () => "+=" + distance(),
                pin: pageWrapper,
                scrub: true,
                invalidateOnRefresh: true,
            },
        });
    });
};

const sliderOpener = () => {
    const sliderContainer = document.querySelectorAll(".slider");
    const blurredElements = document.querySelectorAll(".header, section:not(.slider):not(.page-intro), .footer");
    const shrinkElement = document.querySelector(".page-intro");
    const openButton = document.getElementById("slider-opener");
    sliderContainer.forEach(slider => {
        const sliderWrapper = slider.querySelector(".slider-wrapper");
        const sliderButton = slider.querySelector(".x-button");
        const sliderContent = slider.querySelector(".slider-content");

        const addClasses = () => {
            slider.classList.add("--display");
            setTimeout(() => {
                sliderWrapper.classList.add("--translateX");
                blurredElements.forEach(element => {
                    element.classList.add("--blur");
                });
                shrinkElement.style.width = `calc(100% - ${sliderContent.clientWidth}px)`;
                shrinkElement.classList.add("--shrink");
                scrollToTop();
            }, 200);
            setTimeout(() => {
                sliderButton.classList.add("--opacity");
            }, 600);
        };

        const removeClasses = () => {
            sliderWrapper.classList.remove("--translateX");
            shrinkElement.style.width = "100%";
            shrinkElement.classList.remove("--shrink");
            blurredElements.forEach(element => {
                element.classList.remove("--blur");
            });
            sliderButton.classList.remove("--opacity");
            setTimeout(() => {
                sliderContent.scrollTo(0, 0);
                slider.classList.remove("--display");
            }, 500);
        };

        openButton.addEventListener("click", () => {
            addClasses();
        });

        sliderButton.addEventListener("click", () => {
            removeClasses();
        });
    });
};

const bannerOpener = () => {
    const banner = document.querySelector(".banner");
    const bannerContent = document.querySelector(".banner-content");
    const bannerButton = banner.querySelector(".x-button");
    const openButton = document.getElementById("contact-opener");
    const bodyElements = gsap.utils.toArray(".main");
    const bannerelements = gsap.utils.toArray(bannerContent, bannerButton);

    const addClasses = () => {
        footerNav.classList.add("--hide");
        banner.classList.add("--display");
        gsap.set(bannerelements, {
            opacity: 0
        });
        const tl = gsap.timeline();
        tl.to(bodyElements, {
            duration: 0,
            y: `-${bannerContent.clientHeight}`,
        });
        tl.to(bannerelements, {
            duration: 0.5,
            opacity: 1,
        });
        tl.from(".contact-block", {
            y: 20,
            duration: 0.25,
            stagger: 0.1,
        }, "-=75%");
    };

    const removeClasses = () => {
        gsap.to(bodyElements, {
            duration: 0,
            y: 0,
        });
        banner.classList.remove("--display");
        footerNav.classList.remove("--hide");
    };

    openButton.addEventListener("click", () => {
        addClasses();
    });

    bannerButton.addEventListener("click", () => {
        removeClasses();
    });
};

const showInnerMenu = () => {
    const targetElement = document.querySelector(".inner-menu");
    if (!targetElement) return;
    const toTopButton = document.querySelector(".top-button");
    if (!toTopButton) return;
    const callback = (entries) => {
        entries.forEach(entry => {
            if (entry.boundingClientRect.top <= 0) {
                targetElement.classList.add("--sticky");
            } else {
                targetElement.classList.remove("--sticky");
            };
            if (entry.boundingClientRect.top <= 32) {
                header.classList.add("--blur");
                toTopButton.classList.add("--show");
            } else {
                header.classList.remove("--blur");
                toTopButton.classList.remove("--show");
            };
        });
    };

    const observer = new IntersectionObserver(callback);
    observer.observe(targetElement);
}

const handleFiltersBox = () => {
    const container = document.querySelector(".filters");
    if (!container) return;
    const openButton = container.querySelector(".filter-button");
    if (!openButton) return;
    const innerBox = document.querySelector(".filters-wrapper");
    const closeButton = container.querySelector(".x-button");
    const deselecter = document.querySelector(".filter-deselect");

    const addClasses = () => {
        innerBox.classList.add("--scale-in");
        openButton.classList.add("--scale-out");
        setTimeout(() => {
            closeButton.classList.add("--opacity");
        }, 500);
    };

    const removeClasses = () => {
        setTimeout(() => {
            closeButton.classList.remove("--opacity");
            innerBox.classList.remove("--scale-in");
            openButton.classList.remove("--scale-out");
        }, 250);
    };

    openButton.addEventListener("click", () => {
        addClasses();
    });

    closeButton.addEventListener("click", () => {
        removeClasses();
    });

    deselecter.addEventListener("click", () => {
        removeClasses();
    });
};

// const longerHandleFilters = (items) => {
//     const innerMenu = document.querySelector(".inner-menu");
//     const filterContainer = document.querySelector(".filters");
//     if (!innerMenu || !filterContainer) return;
//     const filters = document.querySelectorAll(".filter");
//     const categories = document.querySelectorAll(".category");
//     const itemsContainer = document.querySelector(".items-container");
//     if (!itemsContainer) return;
//     const filterClear = document.querySelector(".filter-deselect");
//     const categoryClear = document.querySelector(".category-deselect");

//     const counter = document.querySelector(".filter-button-counter");

//     let currentFilter = null;
//     let currentCategory = null;

//     const applyFilters = () => {
//         const filterItems = (item) => {
//             item.classList.remove("--unfiltered");
//             item.classList.add("--filtered");
//         };

//         const unfilterItems = (item) => {
//             item.classList.add("--unfiltered");
//             item.classList.remove("--filtered");
//         };

//         items.forEach(item => {
//             let matchedFilter = false;
//             let matchedCategory = false;
//             // --- check filters ---
//             if (currentFilter && currentFilter.id !== "all") {
//                 const filterId = currentFilter.id;
//                 Object.keys(item.dataset).forEach(key => {
//                     if (
//                         item.dataset[key] === filterId ||
//                         (key === "members" && item.dataset[key].includes(currentFilter.dataset.key))
//                     ) {
//                         matchedFilter = true;
//                     }
//                 });
//             } else {
//                 matchedFilter = true; // no filter = all pass
//             };

//             // --- check categories ---
//             if (currentCategory && currentCategory.id !== "all") {
//                 const categoryId = currentCategory.id;
//                 Object.keys(item.dataset).forEach(key => {
//                     if (item.dataset[key] === categoryId) {
//                         matchedCategory = true;
//                     }
//                 });
//             } else {
//                 matchedCategory = true; // no category = all pass
//             };

//             // must satisfy both
//             if (matchedFilter && matchedCategory) {
//                 filterItems(item);
//             } else {
//                 unfilterItems(item);
//             };
//         });

//         // show/hide counter only when filter is active
//         if (counter && currentFilter && currentFilter.id !== "all") {
//             counter.style.display = "block";
//         } else if (counter && !currentFilter) {
//             counter.style.display = "none";
//         };
//     };

//     // --- disable filters only if a category is selected ---
//     const disableFilters = () => {
//         if (currentCategory && currentCategory.id !== "all") {
//             filters.forEach(filter => {
//                 if (filter.id === "all") return;
//                 const isAvailable = Array.from(items).some(item => {
//                     if (!item.classList.contains("--filtered")) return false;
//                     return Object.keys(item.dataset).some(key =>
//                         item.dataset[key] === filter.id
//                     );
//                 });
//                 filter.classList.toggle("--disabled", !isAvailable);
//             });
//         } else {
//             filters.forEach(filter => filter.classList.remove("--disabled"));
//         };
//     };

//     // --- reset only filters ---
//     const removeFilters = () => {
//         filterClear.classList.remove("--opacity");
//         filterClear.classList.remove("--display");

//         filters.forEach(filter => filter.classList.remove("--target"));
//         currentFilter = null;

//         applyFilters();
//     };

//     // --- reset only categories ---
//     const removeCategories = () => {
//         categories.forEach(c => c.classList.remove("--target"));
//         currentCategory = null;

//         // make categoryClear act as "all"
//         categoryClear.classList.add("--target");

//         applyFilters();
//     };

//     // --- filters group ---
//     if (!filters) return;
//     filters.forEach(filter => {
//         filter.addEventListener("click", () => {
//             [...filters].filter(i => i !== filter).forEach(i => i.classList.remove("--target"));
//             filter.classList.add("--target");
//             currentFilter = filter;
//             filterClear.classList.add("--display");
//             setTimeout(() => filterClear.classList.add("--opacity"), 100);
//             applyFilters();
//             scrollToPosition(itemsContainer);
//         });
//     });

//     // --- categories group ---
//     if (!categories) return;
//     categories.forEach(category => {
//         category.addEventListener("click", () => {
//             [...categories].filter(i => i !== category).forEach(i => i.classList.remove("--target"));
//             category.classList.add("--target");
//             currentCategory = category;
//             applyFilters();
//             disableFilters();
//             scrollToPosition(itemsContainer);
//         });
//     });

//     // --- clear only filters ---
//     if (!filterClear) return;
//     filterClear.addEventListener("click", () => {
//         removeFilters();
//         scrollToPosition(itemsContainer);
//     });

//     // --- clear only categories ---
//     if (!categoryClear) return;
//     categoryClear.addEventListener("click", () => {
//         removeCategories();
//         scrollToPosition(itemsContainer);
//     });
// }

const handleFilters = (items) => {
    const innerMenu = document.querySelector(".inner-menu");
    const filterContainer = document.querySelector(".filters");
    const itemsContainer = document.querySelector(".items-container");
    if (!innerMenu || !filterContainer || !itemsContainer) return;

    const filters = document.querySelectorAll(".filter");
    const categories = document.querySelectorAll(".category");
    const filterClear = document.querySelector(".filter-deselect");
    const categoryClear = document.querySelector(".category-deselect");
    const counter = document.querySelector(".filter-button-counter");

    let currentFilter = null;
    let currentCategory = null;

    const applyFilters = () => {
        const filterIsAll = !currentFilter || currentFilter.id === "all";
        const categoryIsAll = !currentCategory || currentCategory.id === "all";
        const filterKey = currentFilter?.dataset?.key ?? null;
        const filterId = currentFilter?.id ?? null;
        const categoryId = currentCategory?.id ?? null;

        items.forEach(item => {
            const dataset = item.dataset;

            let matchesFilter = filterIsAll;
            if (!matchesFilter) {
                for (const key in dataset) {
                    const value = dataset[key];
                    if (!value) continue;
                    if (key === "members") continue;
                    if ((filterId && value === filterId) || (filterKey && value === filterKey)) {
                        matchesFilter = true;
                        break;
                    };
                };

                if (!matchesFilter && dataset.members) {
                    const members = dataset.members
                        .split(",")
                        .map(name => name.trim())
                        .filter(Boolean); // remove empty entries
                    if (filterKey && members.includes(filterKey)) {
                        matchesFilter = true;
                    };
                };
            };

            let matchesCategory = categoryIsAll;
            if (!matchesCategory) {
                for (const key in dataset) {
                    const value = dataset[key];
                    if (!value) continue;
                    if ((categoryId && value === categoryId)) {
                        matchesCategory = true;
                        break;
                    };
                };
            };

            const isMatch = matchesFilter && matchesCategory;
            item.classList.toggle("--filtered", isMatch);
            item.classList.toggle("--unfiltered", !isMatch);
        });

        if (counter) {
            counter.style.display = (!filterIsAll) ? "block" : "none";
        };
    };

    const disableFilters = () => {
        if (currentCategory && currentCategory.id !== "all") {
            filters.forEach(filter => {
                if (filter.id === "all") return;
                const isAvailable = [...items].some(item =>
                    item.classList.contains("--filtered") &&
                    Object.keys(item.dataset).some(key => item.dataset[key] === filter.id)
                );
                filter.classList.toggle("--disabled", !isAvailable);
            });
        } else {
            filters.forEach(f => f.classList.remove("--disabled"));
        };
    };

    const removeFilters = () => {
        filterClear?.classList.remove("--opacity", "--display");
        filters.forEach(f => f.classList.remove("--target"));
        currentFilter = null;
        applyFilters();
    };

    const removeCategories = () => {
        categories.forEach(c => c.classList.remove("--target"));
        currentCategory = null;
        categoryClear?.classList.add("--target");
        applyFilters();
    };

    // --- filters group ---
    filters.forEach(filter => {
        filter.addEventListener("click", () => {
            filters.forEach(f => f.classList.remove("--target"));
            filter.classList.add("--target");
            currentFilter = filter;

            filterClear?.classList.add("--display");
            setTimeout(() => filterClear?.classList.add("--opacity"), 100);

            applyFilters();
            scrollToPosition(itemsContainer);
        });
    });

    // --- categories group ---
    categories.forEach(category => {
        category.addEventListener("click", () => {
            categories.forEach(c => c.classList.remove("--target"));
            category.classList.add("--target");
            currentCategory = category;
            removeFilters();
            applyFilters();
            disableFilters();
            scrollToPosition(itemsContainer);
        });
    });

    // --- clear buttons ---
    filterClear?.addEventListener("click", () => {
        removeFilters();
        scrollToPosition(itemsContainer);
    });

    categoryClear?.addEventListener("click", () => {
        removeCategories();
        scrollToPosition(itemsContainer);
    });
};

const handleGallery = () => {
    const galleryItems = document.querySelectorAll(".gallery-item");
    const triggerElements = document.querySelectorAll(".gallery-item img, .gallery-item video");


    const addClasses = (item) => {
        galleryItems.forEach(i => {
            if (i !== item) {
                i.classList.remove("--zoom-in");
                i.classList.add("--opacity");
            } else {
                i.classList.remove("--opacity");
                i.classList.add("--zoom-in");
            };
        });
        const video = item.querySelector("video");
        if (video) video.controls = true;

        main.style.cursor = "zoom-out";
    }

    const removeClasses = (item) => {
        galleryItems.forEach(i => {
            i.classList.remove("--opacity");
        });
        item.classList.remove("--zoom-in");

        const video = item.querySelector("video");
        if (video) video.controls = false;

        main.style.cursor = "none";
    }

    triggerElements.forEach(el => {
        el.addEventListener("click", event => event.stopPropagation());
    });

    triggerElements.forEach(el => {
        el.addEventListener("click", () => {
            const itemParent = el.parentNode;
            const isOpen = itemParent.classList.contains("--zoom-in");
            if (isOpen) {
                removeClasses(itemParent);
            } else {
                addClasses(itemParent);
                scrollToPosition(itemParent);
            };
        });
    });

    document.body.addEventListener("click", () => {
        galleryItems.forEach(itemParent => {
            itemParent.classList.remove("--opacity");
            if (itemParent.classList.contains("--zoom-in")) {
                const video = itemParent.querySelector("video");
                if (video) video.controls = false;

                itemParent.classList.remove("--zoom-in");
                triggerElements.forEach(i => i.classList.remove("--clicked"));
                scrollToPosition(itemParent);
            };
        });
        main.style.cursor = "none";
    });
};

const accordion = () => {
    const accordion = document.querySelectorAll(".accordion");
    accordion.forEach(item => {
        const openers = item.querySelectorAll(".accordion-title .title, .accordion-topbar");
        const elements = item.querySelectorAll(".accordion-title, .accordion-image, .accordion-text");
        openers.forEach(opener => {
            opener.addEventListener("click", () => {
                [...accordion].filter(i => i !== item).forEach(i => i.classList.remove("--open"));
                item.classList.toggle("--open");
                gsap.from(elements, {
                    duration: 0.5,
                    opacity: 0,
                });
                scrollToPosition(item);
            });
        });
    });
};

// const sortAccordion = () => {
//     const sortButtons = document.querySelectorAll('.accordion-topbar-item[data-item]');
//     const container = document.querySelector(".accordion-list");

//     let currentSort = {
//         key: null,
//         ascending: true
//     };

//     sortButtons.forEach(button => {
//         button.addEventListener("click", () => {
//             const sortKey = button.dataset.item;
//             const svg = button.querySelector("svg");

//             // Check if clicked the same key
//             const isSameKey = currentSort.key === sortKey;

//             currentSort.key = sortKey;
//             currentSort.ascending = isSameKey ? !currentSort.ascending : true;

//             // Reset all arrows
//             sortButtons.forEach(btn => {
//                 const arrow = btn.querySelector("svg");
//                 if (arrow) {
//                     arrow.classList.remove("--asc", "--desc");
//                 };
//             });

//             // Set arrow direction
//             if (svg) {
//                 svg.classList.add(currentSort.ascending ? "--asc" : "--desc");
//             };

//             // Sort elements
//             const items = Array.from(document.querySelectorAll(".accordion"));

//             items.sort((a, b) => {
//                 let aValue = a.dataset[sortKey] || "";
//                 let bValue = b.dataset[sortKey] || "";

//                 // Normalize values for string comparisons (case insensitive)
//                 aValue = sortKey === "type" ? aValue.toLowerCase() : aValue;
//                 bValue = sortKey === "type" ? bValue.toLowerCase() : bValue;

//                 // If sorting by date, convert to timestamp
//                 if (sortKey === "date") {
//                     aValue = new Date(aValue).getTime();
//                     bValue = new Date(bValue).getTime();
//                 }

//                 // Perform the sorting based on ascending/descending
//                 if (aValue < bValue) return currentSort.ascending ? -1 : 1;
//                 if (aValue > bValue) return currentSort.ascending ? 1 : -1;
//                 return 0;
//             });

//             items.forEach(item => container.appendChild(item));
//         });
//     });
// };

const sortAccordion = () => {
    const sortButtons = document.querySelectorAll(".button.sort[data-item]");
    const accordionContainer = document.querySelector(".accordion-list");
    const itemsContainer = document.querySelector(".items-container");

    let currentSort = {
        key: null,
        ascending: true
    };

    sortButtons.forEach(button => {
        button.addEventListener("click", () => {
            [...sortButtons].filter(i => i !== button).forEach(i => i.classList.remove("--target"));
            button.classList.add("--target");

            const sortKey = button.dataset.item;
            const svg = button.querySelector("svg");

            // Check if clicked the same key
            const isSameKey = currentSort.key === sortKey;

            currentSort.key = sortKey;
            currentSort.ascending = isSameKey ? !currentSort.ascending : true;

            // Reset all arrows
            sortButtons.forEach(btn => {
                const arrow = btn.querySelector("svg");
                if (arrow) {
                    arrow.classList.remove("--asc", "--desc");
                };
            });

            // Set arrow direction
            if (svg) {
                svg.classList.add(currentSort.ascending ? "--asc" : "--desc");
            };

            // Sort elements
            const items = Array.from(document.querySelectorAll(".accordion"));

            items.sort((a, b) => {
                let aValue = a.dataset[sortKey] || "";
                let bValue = b.dataset[sortKey] || "";

                // Normalize values for string comparisons (case insensitive)
                aValue = sortKey === "type" ? aValue.toLowerCase() : aValue;
                bValue = sortKey === "type" ? bValue.toLowerCase() : bValue;

                // If sorting by date, convert to timestamp
                if (sortKey === "date") {
                    aValue = new Date(aValue).getTime();
                    bValue = new Date(bValue).getTime();
                }

                // Perform the sorting based on ascending/descending
                if (aValue < bValue) return currentSort.ascending ? -1 : 1;
                if (aValue > bValue) return currentSort.ascending ? 1 : -1;
                return 0;
            });

            items.forEach(item => accordionContainer.appendChild(item));
            scrollToPosition(itemsContainer);
        });
    });
};

const handleMenuOnMobile = () => {
    const banner = document.querySelector(".banner");
    const menuButton = document.querySelector(".nav-mobile-opener");
    const headerNavButtons = document.querySelectorAll(".header .button");
    const menuElements = document.querySelectorAll(".contact-block, .header .button");
    const blurredElements = document.querySelectorAll("section:not(.slider)");
    const openElement = document.querySelector(".filters");
    const handleMediaQuery = (e) => {
        if (e.matches) {
            menuButton.addEventListener("click", () => {
                menuButton.classList.toggle("--open");
                footer.classList.toggle("--show");
                headerNavButtons.forEach(btn => {
                    btn.classList.toggle("--show");
                });
                banner.classList.toggle("--display");
                blurredElements.forEach(element => {
                    element.classList.toggle("--blur");
                });
                if (openElement) {
                    openElement.classList.toggle("--hide");
                };
                const tl = gsap.timeline();
                tl.from(menuElements, {
                    duration: 0.5,
                    opacity: 0,
                },);
                tl.from(menuElements, {
                    y: 40,
                    stagger: 0.1,
                }, "-=75%");
            });
            headerNavButtons.forEach(button => {
                button.addEventListener("click", () => {
                    menuButton.classList.remove("--open");
                    footer.classList.remove("--show");
                    headerNavButtons.forEach(btn => {
                        btn.classList.remove("--show");
                    });
                    banner.classList.remove("--display");
                    blurredElements.forEach(element => {
                        element.classList.remove("--blur");
                    });
                    if (openElement) {
                        openElement.classList.remove("--hide");
                    };
                })
            })
        }
    };
    handleMediaQuery(mediaQuery);
};

const lazyloading = () => {
    let lazyloadMedia = document.querySelectorAll(".lazy");

    const callback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const media = entry.target;
                media.onload = () => {
                    media.classList.add("lazy-loaded");
                };
                media.src = media.dataset.src;
                observer.unobserve(media);
            };
        });
    };

    const observer = new IntersectionObserver(callback, {
        root: null,
        rootMargin: "200px 0px"
    });

    lazyloadMedia.forEach(media => {
        observer.observe(media);
    });
};

const audioPlayer = () => {
    const audioPlayer = document.querySelectorAll(".audio-player");
    const playBtns = document.querySelectorAll(".audio-play");
    audioPlayer.forEach(component => {
        playBtns.forEach(btn => {
            if (btn.parentNode.parentNode === component) {
                const seekSlider = component.querySelector(".seek-slider");
                const audio = component.querySelector("audio");
                const playIcon = component.querySelector(".play-icon");
                const pauseIcon = component.querySelector(".pause-icon");
                const volumeIcon = component.querySelector(".volume-icon");
                const muteIcon = component.querySelector(".mute-icon");
                const durationContainer = component.querySelector(".audio-duration");
                const currentTimeContainer = component.querySelector(".audio-progress");
                const volumeContainer = component.querySelector(".audio-volume");
                let raf = null;

                if (audio) {
                    btn.addEventListener("click", () => {
                        if (audio.paused) {
                            audio.play();
                            requestAnimationFrame(whilePlaying);
                        } else {
                            audio.pause();
                            cancelAnimationFrame(raf);
                        };
                        playIcon.classList.toggle("toggle-play");
                        pauseIcon.classList.toggle("toggle-play");
                    });

                    audio.addEventListener("timeupdate", () => {
                        if (audio.duration === audio.currentTime) {
                            stopAudio();
                        };
                    });

                    volumeContainer.addEventListener("click", () => {
                        controlVolume();
                    })

                    const controlVolume = () => {
                        if (audio.volume > 0) {
                            audio.volume = 0;
                            volumeIcon.classList.add("toggle-volume");
                            muteIcon.classList.add("toggle-volume");
                        } else {
                            audio.volume = 1;
                            volumeIcon.classList.remove("toggle-volume");
                            muteIcon.classList.remove("toggle-volume");
                        }
                    }

                    const stopAudio = () => {
                        audio.pause();
                        audio.currentTime = 0;
                        playIcon.classList.remove("toggle-play");
                        pauseIcon.classList.remove("toggle-play");
                    };

                    const showRangeProgress = (rangeInput) => {
                        component.style.setProperty("--seek-before-width", rangeInput.value / rangeInput.max * 100 + "%");
                    };

                    seekSlider.addEventListener("input", (e) => {
                        showRangeProgress(e.target);
                    });

                    const calculateTime = (sec) => {
                        let minutes = Math.floor(sec / 60);
                        let seconds = Math.floor(sec - minutes * 60);
                        if (seconds < 10) {
                            seconds = `0${seconds}`;
                        }
                        return `${minutes}:${seconds}`;
                    };

                    const displayDuration = () => {
                        durationContainer.textContent = calculateTime(audio.duration);
                    };

                    const setSliderMax = () => {
                        seekSlider.max = Math.floor(audio.duration);
                    };

                    const whilePlaying = () => {
                        seekSlider.value = Math.floor(audio.currentTime);
                        currentTimeContainer.textContent = calculateTime(seekSlider.value);
                        component.style.setProperty("--seek-before-width", `${seekSlider.value / seekSlider.max * 100}%`);
                        raf = requestAnimationFrame(whilePlaying);
                    };

                    if (audio.readyState > 0) {
                        displayDuration();
                        setSliderMax();
                    }

                    audio.addEventListener("playing", () => {
                        displayDuration();
                        setSliderMax();
                    });

                    seekSlider.addEventListener("input", () => {
                        currentTimeContainer.textContent = calculateTime(seekSlider.value);
                        if (!audio.paused) {
                            cancelAnimationFrame(raf);
                        };
                    });

                    seekSlider.addEventListener("change", () => {
                        audio.currentTime = seekSlider.value;
                        if (!audio.paused) {
                            requestAnimationFrame(whilePlaying);
                        }
                    });
                };
            };
        });
    });
};

const topButtonEvent = () => {
    const toTopButton = document.querySelector(".top-button");
    if (!toTopButton) return;
    toTopButton.addEventListener("click", () => {
        scrollToTop();
    });
};

window.addEventListener("load", () => {
    loader();
    history.scrollRestoration = "manual";
    documentHeight();
    headerHeight();
    footerHeight();
    animatePaths();
    cursor();
    logoAnimation();
    sliderOpener();
    bannerOpener();
    handleMenuOnMobile();
});

window.addEventListener("resize", () => {
    documentHeight();
    headerHeight();
    footerHeight();
});