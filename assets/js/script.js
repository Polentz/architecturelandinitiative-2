gsap.registerPlugin(ScrollTrigger, Flip);

const header = document.querySelector(".header");
const footer = document.querySelector(".footer");
const nav = footer.querySelector(".footer-nav");
const buttons = document.querySelectorAll(".button");
const main = document.querySelector(".main");
const logo = document.querySelector(".logo");
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
            const letters = ["A", "L", "I", "N"];
            letters.forEach(letter => {
                const follower = document.createElement("span");
                follower.classList.add("follower");
                follower.innerHTML = letter;
                document.querySelector(".cursor-wrapper").appendChild(follower);
            });
            const cursor = document.createElement("span");
            cursor.classList.add("cursor");
            document.querySelector(".cursor-wrapper").appendChild(cursor);

            window.addEventListener("mousemove", (e) => {
                gsap.set(".cursor", {
                    xPercent: -50,
                    yPercent: -50,
                });
                gsap.set(".follower", {
                    xPercent: -50,
                    yPercent: -50,
                });
                gsap.to(".cursor", 0, {
                    display: "block",
                    x: e.clientX,
                    y: e.clientY,
                });
                gsap.to(".follower", 0.8, {
                    display: "block",
                    x: e.clientX,
                    y: e.clientY,
                    stagger: 0.1,
                });
            });

            const anchorTags = document.querySelectorAll("a, .button, .filter, .filter-deselect");
            anchorTags.forEach(a => {
                a.addEventListener("mouseenter", () => {
                    gsap.to(".cursor", {
                        duration: 1,
                        scale: 0.4,
                        opacity: 1,
                        ease: "power1.out",
                    });
                    gsap.to(".follower", {
                        scale: 0,
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
                    gsap.to(".follower", {
                        scale: 1,
                    });
                });
            });

            const darkElements = document.querySelectorAll(".filters-wrapper, .pdf, .audio-player");
            darkElements.forEach(box => {
                box.addEventListener("mouseenter", () => {
                    gsap.to(".cursor", {
                        duration: 0,
                        background: "var(--white)",
                        ease: "none",
                    });
                    gsap.to(".follower", {
                        duration: 0,
                        autoAlpha: 0,
                        ease: "none",
                    });
                });
                box.addEventListener("mouseleave", () => {
                    gsap.to(".cursor", {
                        duration: 0,
                        background: "var(--black)",
                        ease: "none",
                    });
                    gsap.to(".follower", {
                        duration: 0,
                        autoAlpha: 1,
                        ease: "none",
                    });
                });
            });
        } else {
            const cursors = document.querySelectorAll(".cursor, .follower");
            cursors.forEach(cursor => {
                if (cursor) {
                    cursor.remove();
                }
            });
        };
    };
    handleMediaQuery(mediaQuery);
};

const split = (domElement) => {
    let words = domElement.textContent.split(' ');
    words = words.map(word => {
        let letters = word.split('');
        letters = letters.map(letter => `<span class="letter">${letter}</span>`);
        return letters.join('');
    });
    domElement.innerHTML = words.join(' ');
};

split(document.querySelector(".logo-word-1"));
split(document.querySelector(".logo-word-2"));
split(document.querySelector(".logo-word-3"));
if (document.querySelector(".logo-element")) {
    split(document.querySelector(".logo-element"));
};

const architecture = Array.from(document.querySelectorAll(".logo-word-1 .letter"));
const land = Array.from(document.querySelectorAll(".logo-word-2 .letter"));
const initiative = Array.from(document.querySelectorAll(".logo-word-3 .letter"));
const elements = Array.from(document.querySelectorAll(".logo-element .letter"));
const a = architecture.splice(1, 11);
const l = land.splice(1, 3);
const i = initiative.splice(2, 8);
const all = [a, l, i];

const animateAll = () => {
    elements.forEach(element => {
        element.parentElement.style.display = "inline-block";
    });
    let tl = gsap.timeline();
    tl.from(elements, {
        autoAlpha: 0,
        stagger: 0.1,
        scale: 0,
    });
    tl.to(all, {
        duration: 1,
        autoAlpha: 0,
        stagger: 0.2,
        scale: 0,
    });

    let loopTl = gsap.timeline({ delay: 2, repeat: -1, repeatDelay: 2 });
    loopTl.to(all, {
        duration: 1,
        autoAlpha: 1,
        stagger: 0.2,
        scale: 1,
    });
    loopTl.to(all, {
        duration: 1,
        autoAlpha: 0,
        stagger: 0.2,
        scale: 0,
    });

};

// const animateName = () => {
//     gsap.to(all, {
//         duration: 1.5,
//         autoAlpha: 0,
//         stagger: 0.2,
//         scale: 0,
//     });
// };

// const reverseAnimateName = () => {
//     gsap.to(all, {
//         duration: 1.5,
//         autoAlpha: 1,
//         stagger: 0.2,
//         scale: 1,
//     });
// };

// logo.addEventListener("mouseenter", () => {
//     reverseAnimateName();
// });

// logo.addEventListener("mouseleave", () => {
//     animateName();
// });

const splitTitle = (element, content) => {
    const eachWord = content.match(/([\w-/]+)/g);
    eachWord.forEach(word => {
        let div = document.createElement("div");
        div.classList.add("word");
        let text = document.createTextNode(word);
        div.appendChild(text);
        element.appendChild(div);
        split(div);
    });
};

const animateTitle = (x, y, stagger) => {
    document.querySelectorAll(".word").forEach(word => {
        const letters = word.querySelectorAll(".letter");
        const labels = gsap.utils.toArray(".item-title-label");
        let tl = gsap.timeline();
        tl.to(letters, {
            autoAlpha: 1,
            duration: 0.3,
        });
        tl.from(letters, {
            duration: 0.3,
            delay: 0.25,
            xPercent: x,
            yPercent: y,
            stagger: stagger,
        });
        tl.to(word, {
            clipPath: "none",
        });
        labels.forEach(label => {
            if (label) {
                tl.to(label, {
                    opacity: 1,
                    duration: 0.3,
                });
            };
        });
    });
};

const handleTitleHover = () => {
    const titles = document.querySelectorAll(".item-title a");
    titles.forEach(title => {
        title.addEventListener("mouseenter", () => {
            const letters = title.querySelectorAll(".word .letter");
            gsap.to(letters, {
                duration: 0.1,
                color: "var(--main-color)",
                stagger: 0.01,
            });
        });
        title.addEventListener("mouseleave", () => {
            const letters = title.querySelectorAll(".word .letter");
            gsap.to(letters, {
                duration: 0.1,
                color: "var(--black)",
                stagger: 0.01,
            });
        });
    });
};

const shuffleColors = () => {
    const colors = [
        ["#4864f9a0", "#f0eceb"],
        ["#9fbd58a0", "#f0eceb"],
        ["#a867fda0", "#f0eceb"],

    ];
    const randomColorSet = colors[Math.floor(Math.random() * colors.length)];
    const randomDeg = Math.floor(Math.random() * (350 - 10) + 10);
    const mainColor = document.documentElement;
    const accentColor = document.documentElement;
    const mainBackground = document.documentElement;
    mainColor.style.setProperty("--main-color", `${randomColorSet[0]}`);
    accentColor.style.setProperty("--acc-color", `${randomColorSet[1]}`);
    mainBackground.style.setProperty("--background", `linear-gradient(0deg, ${randomColorSet[1]} 0%, ${randomColorSet[1]} 10%, ${randomColorSet[0]} 100%)`);
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
                document.querySelector(".page-intro").style.width = `calc(100% - ${sliderContent.clientWidth}px)`;
                document.body.style.overflow = "hidden";
            }, 200);
            setTimeout(() => {
                sliderButton.classList.add("--opacity");
            }, 600);
        };

        const removeClasses = () => {
            sliderWrapper.classList.remove("--translateX");
            document.querySelector(".page-intro").style.width = "100%";
            document.body.style.overflow = "auto";
            blurredElements.forEach(element => {
                element.classList.remove("--blur");
            });
            sliderButton.classList.remove("--opacity");
            setTimeout(() => {
                sliderContent.scrollTo(0, 0);
                slider.classList.remove("--display");
            }, 500);
        };

        buttons.forEach(element => {
            element.addEventListener("click", () => {
                if (element.id.includes(slider.id)) {
                    addClasses();
                    setTimeout(() => {
                        element.classList.add("--target");
                    }, 200);
                };
            });
        });
        sliderButton.addEventListener("click", () => {
            buttons.forEach(element => {
                element.classList.remove("--target");
            });
            removeClasses();
        });
    });
};

const bannerOpener = () => {
    const banner = document.querySelector(".banner");
    const bannerContent = document.querySelector(".banner-content");
    const bannerButton = banner.querySelector(".x-button");
    const bodyElements = gsap.utils.toArray(".main, .filters, .slider");
    const bannerelements = gsap.utils.toArray(bannerContent, bannerButton);

    const addClasses = () => {
        nav.classList.add("--hide");
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
        nav.classList.remove("--hide");
    };

    buttons.forEach(element => {
        element.addEventListener("click", () => {
            if (element.id.includes(banner.id)) {
                addClasses();
            };
        });
    });
    bannerButton.addEventListener("click", () => {
        removeClasses();
    });
};

const handleFiltersBox = () => {
    const container = document.querySelector(".filters");
    const openButton = container.querySelector(".filter-button");
    const innerBox = document.querySelector(".filters-wrapper");
    const innerBoxItems = document.querySelectorAll(".filters-wrapper-column, .filters-wrapper-header, .filters-wrapper-content");
    const closeButton = container.querySelector(".x-button");
    const deselecter = document.querySelector(".filter-deselect");

    const addClasses = () => {
        innerBox.classList.add("--scale-in");
        openButton.classList.add("--scale-out");
        setTimeout(() => {
            innerBoxItems.forEach(content => {
                content.classList.add("--opacity");
            });
            closeButton.classList.add("--opacity");
        }, 500);
    };

    const removeClasses = () => {
        innerBoxItems.forEach(content => {
            content.classList.remove("--opacity");
        });
        setTimeout(() => {
            closeButton.classList.remove("--opacity");
            innerBox.classList.remove("--scale-in");
            openButton.classList.remove("--scale-out");
        }, 250);
    };

    if (openButton) {
        openButton.addEventListener("click", () => {
            addClasses();
        });

        closeButton.addEventListener("click", () => {
            removeClasses();
        });

        deselecter.addEventListener("click", () => {
            removeClasses();
        });
    }

};

const handleFilters = () => {
    const filters = document.querySelectorAll(".filter");
    const itemsContainer = document.querySelector(".items-container");
    const items = itemsContainer.querySelectorAll(".gallery-item, .accordion");
    const filterClear = document.querySelector(".filter-deselect");
    const counter = document.querySelector(".filter-button-counter");

    const applyFilters = (filter) => {
        const paddingOffset = 96;
        const offsetPosition = itemsContainer.getBoundingClientRect().top + window.scrollY - paddingOffset;
        window.scrollTo({
            top: offsetPosition,
            // behavior: "smooth",
        });
        const filterId = filter.id;

        const filterItems = (item) => {
            item.classList.remove("--unfiltered");
            item.classList.add("--filtered");
        };

        const unfilterItems = (item) => {
            item.classList.add("--unfiltered");
            item.classList.remove("--filtered");
        };

        items.forEach(item => {
            const itemType = item.dataset.type;
            const itemCategory = item.dataset.category;
            const itemProject = item.dataset.project;
            const itemMembers = item.dataset.members;
            if (itemType === filterId) {
                filterItems(item);
            } else if (itemCategory === filterId) {
                filterItems(item);
            } else if (itemProject === filterId) {
                filterItems(item);
            } else if (itemMembers && itemMembers.includes(filter.textContent)) {
                filterItems(item);
            } else {
                unfilterItems(item);
            };
        });
        counter.style.display = "block";
    };

    const removeFilters = () => {
        filterClear.classList.remove("--opacity");
        filterClear.classList.remove("--display");
        filters.forEach(filter => {
            filter.classList.remove("--target");
        });
        items.forEach(item => {
            item.classList.remove("--unfiltered");
            item.classList.remove("--filtered");
        });
        counter.style.display = "none";
        window.scrollTo({
            top: 0,
        });
    };

    filters.forEach(filter => {
        filter.addEventListener("click", () => {
            [...filters].filter(i => i !== filter).forEach(i => i.classList.remove("--target"));
            filter.classList.add("--target");
            filterClear.classList.add("--display");
            setTimeout(() => {
                filterClear.classList.add("--opacity");
            }, 100);
            applyFilters(filter);
        });
    });

    filterClear.addEventListener("click", () => {
        removeFilters();
    });
};

const handleGallery = () => {
    const galleryItems = document.querySelectorAll(".gallery-item");
    const triggerElements = document.querySelectorAll(".gallery-item img, .gallery-item video");
    const paddingOffset = 160;

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
        const offsetPosition = item.getBoundingClientRect().top + window.scrollY - paddingOffset;
        window.scrollTo({
            top: offsetPosition,
            // behavior: "smooth",
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

    triggerElements.forEach(item => {
        item.addEventListener("click", () => {
            const itemParent = item.parentNode;
            const isOpen = itemParent.classList.contains("--zoom-in");
            if (isOpen) {
                removeClasses(itemParent);
            } else {
                addClasses(itemParent);
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
            }
        });
        main.style.cursor = "none";
    });
};

const accordion = () => {
    const accordion = document.querySelectorAll(".accordion");
    accordion.forEach(item => {
        const openers = item.querySelectorAll(".accordion-title, .accordion-topbar");
        const elements = item.querySelectorAll(".accordion-image, .accordion-text");
        openers.forEach(opener => {
            opener.addEventListener("click", () => {
                [...accordion].filter(i => i !== item).forEach(i => i.classList.remove("--open"));
                item.classList.toggle("--open");
                const paddingOffset = 128;
                const itemPosition = item.getBoundingClientRect().top;
                const offsetPosition = itemPosition + window.scrollY - paddingOffset;
                window.scrollTo({
                    top: offsetPosition,
                    // behavior: "smooth",
                });
                gsap.from(elements, {
                    duration: 0.5,
                    opacity: 0,
                });
            });
        });
    });
};

const sortAccordion = () => {
    const sortButtons = document.querySelectorAll('.accordion-topbar-item[data-item]');
    const container = document.querySelector(".accordion-list");

    let currentSort = {
        key: null,
        ascending: true
    };

    sortButtons.forEach(button => {
        button.addEventListener("click", () => {
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

            items.forEach(item => container.appendChild(item));
        });
    });
};

const handleMenuOnMobile = () => {
    const banner = document.querySelector(".banner");
    const menuButton = document.querySelector(".nav-mobile-opener");
    const headerNavEButtons = document.querySelectorAll(".header .button");
    const menuElements = document.querySelectorAll(".contact-block, .header .button");
    const blurredElements = document.querySelectorAll("section:not(.slider)");
    const handleMediaQuery = (e) => {
        if (e.matches) {
            menuButton.addEventListener("click", () => {
                menuButton.classList.toggle("--open");
                footer.classList.toggle("--show");
                headerNavEButtons.forEach(btn => {
                    btn.classList.toggle("--show");
                });
                banner.classList.toggle("--display");
                blurredElements.forEach(element => {
                    element.classList.toggle("--blur");
                });
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
            headerNavEButtons.forEach(button => {
                button.addEventListener("click", () => {
                    menuButton.classList.remove("--open");
                    footer.classList.remove("--show");
                    headerNavEButtons.forEach(btn => {
                        btn.classList.remove("--show");
                    });
                    banner.classList.remove("--display");
                    blurredElements.forEach(element => {
                        element.classList.remove("--blur");
                    });
                })
            })
        }
    };
    handleMediaQuery(mediaQuery);
};

const lazyloading = () => {
    let lazyloadMedia;
    lazyloadMedia = document.querySelectorAll(".lazy");
    const mediaObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const media = entry.target;
                media.src = media.dataset.src;
                lazyloadContainer = media.parentNode;
                media.classList.remove("lazy");
                mediaObserver.unobserve(media);
            };
        });
    });
    lazyloadMedia.forEach((media) => {
        mediaObserver.observe(media);
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

const handleTopButton = () => {
    const target = document.querySelector(".top-button");
    const scrollThreshold = window.innerHeight / 2;
    const scrolled = window.scrollY || window.pageYOffset;

    if (document.documentElement.scrollHeight > window.innerHeight && scrolled > scrollThreshold) {
        target.classList.add("--show");
    } else {
        target.classList.remove("--show");
    };

    target.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            // behavior: "smooth",
        });
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
    animateAll();
    sliderOpener();
    bannerOpener();
    shuffleColors();
    handleMenuOnMobile();
});

window.addEventListener("resize", () => {
    documentHeight();
    headerHeight();
    footerHeight();
});

