gsap.registerPlugin(ScrollTrigger, Flip);

const footer = document.querySelector(".footer");
const nav = footer.querySelector(".nav");
const navElement = document.querySelectorAll(".menu-element, .button");
const main = document.querySelector(".main");
const header = document.querySelector(".header");
const logo = document.querySelector(".logo");
const mediaQuery = window.matchMedia("(max-width: 600px)");

const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const documentWidth = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-width", `${window.innerWidth}px`);
};

const loader = () => {
    gsap.to(document.querySelector(".loader"), {
        autoAlpha: 0,
        duration: 1,
        onComplete: () => {
            document.querySelector(".loader").remove();
        },
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

            const anchorTags = document.querySelectorAll("a, .menu-element, button, .filter, .deselect-filters");
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

            const blackBox = document.querySelectorAll(".inner-box, .pdf, .audio-player");
            blackBox.forEach(box => {
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

    let loopTl = gsap.timeline({ delay: 12, repeat: -1, repeatDelay: 8 });
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

const animateName = () => {
    gsap.to(all, {
        duration: 1.5,
        autoAlpha: 0,
        stagger: 0.2,
        scale: 0,
    });
};

const reverseAnimateName = () => {
    gsap.to(all, {
        duration: 1.5,
        autoAlpha: 1,
        stagger: 0.2,
        scale: 1,
    });
};

logo.addEventListener("mouseenter", () => {
    reverseAnimateName();
});

logo.addEventListener("mouseleave", () => {
    animateName();
});

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
            clipPath: "none"
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
    document.querySelectorAll(".item-title a").forEach(title => {
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
        ["#4864f9", "#f0eceb"],
        ["#9fbd58", "#f0eceb"],
        ["#a867fd", "#f0eceb"],

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
    sliderContainer.forEach(slider => {
        const sliderWrapper = slider.querySelector(".slider-wrapper");
        const sliderButton = sliderWrapper.querySelector(".slider-button");
        const sliderContent = sliderWrapper.querySelector(".slider-content");

        const addClasses = () => {
            slider.classList.add("--display");
            setTimeout(() => {
                sliderWrapper.classList.add("--translateX");
                main.classList.add("--blur");
            }, 200);
            setTimeout(() => {
                sliderButton.classList.add("--opacity");
            }, 600);
        };

        const removeClasses = () => {
            sliderWrapper.classList.remove("--translateX");
            main.classList.remove("--blur");
            sliderButton.classList.remove("--opacity");
            setTimeout(() => {
                sliderContent.scrollTo(0, 0);
                slider.classList.remove("--display");
            }, 500);
        };

        navElement.forEach(element => {
            element.addEventListener("click", () => {
                console.log("clicked")
                if (element.id.includes(slider.id)) {
                    element.classList.add("--target");
                    addClasses();
                };
            });
        });
        sliderButton.addEventListener("click", () => {
            navElement.forEach(element => {
                element.classList.remove("--target");
            });
            removeClasses();
        });
    });
};

const bannerOpener = () => {
    const banner = document.querySelector(".banner");
    const bannerContent = document.querySelector(".banner-content");
    const bannerButton = banner.querySelector(".banner-button");
    const bodyElements = gsap.utils.toArray(".main, .box-container, .info-slider, .slider");
    const bannerelements = gsap.utils.toArray(bannerContent, bannerButton);

    const addClasses = () => {
        nav.classList.add("--hide");
        banner.classList.add("--display");
        const tl = gsap.timeline();
        gsap.set(bannerelements, {
            opacity: 0
        });
        tl.to(bodyElements, {
            y: `-${bannerContent.clientHeight}`,
        });
        tl.to(bannerelements, {
            duration: 0.5,
            opacity: 1,
        }, "-=75%");
        tl.from(".contact-block", {
            y: 20,
            stagger: 0.1,
        }, "<");
    };

    const removeClasses = () => {
        gsap.to(bodyElements, {
            y: 0,
        });
        banner.classList.remove("--display");
        nav.classList.remove("--hide");
    };

    navElement.forEach(element => {
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

const handleBoxElements = () => {
    const boxes = document.querySelectorAll(".box");
    boxes.forEach(box => {
        const openButton = box.querySelector(".button");
        const innerBox = box.querySelector(".inner-box");
        const innerBoxItems = box.querySelectorAll(".inner-box-column, .inner-box-header, .inner-box-content");
        const closeButton = box.querySelector(".x-button");
        const deselecter = document.querySelector(".deselect-filters");

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

        openButton.addEventListener("click", () => {
            addClasses();
        });

        closeButton.addEventListener("click", () => {
            removeClasses();
        });

        deselecter.addEventListener("click", () => {
            removeClasses();
        });
    });
};

const handleProjectInfo = () => {
    const gallery = document.querySelector(".gallery");
    const slider = document.querySelector(".info-slider");
    const sliderButton = slider.querySelector(".slider-button");
    const sliderContent = slider.querySelector(".slider-content");
    const infoButton = document.querySelector(".i-button");
    const innerBox = document.querySelectorAll(".inner-box");
    const readMoreButton = document.querySelector(".read-more-button");
    let tl = gsap.timeline();

    sliderButton.addEventListener("click", () => {
        const state = Flip.getState(".gallery, .gallery-item");
        gallery.classList.add("--width");
        infoButton.classList.remove("--scale-out");

        tl.to(slider, {
            duration: 0.5,
            xPercent: 100,
            ease: "power1.out",
        });

        tl.to(slider, {
            display: "none",
            onUpdate: () => sliderContent.scrollTo(0, 0),
        });

        Flip.from(state, {
            absolute: true,
            duration: 0.75,
            stagger: {
                from: "start",
                axis: "x",
                amount: 0.25,
            },
            ease: "power1.out",
        });

        gsap.to(infoButton, {
            duration: 0.5,
            delay: 1,
            opacity: 1,
            pointerEvents: "all",
            ease: "power1.out",
        });
    });

    const openInfoSlider = () => {
        const state = Flip.getState(".gallery, .gallery-item");
        gallery.classList.remove("--width");
        innerBox.forEach(box => {
            if (box.classList.contains("--scale-in")) {
                box.classList.remove("--scale-in");
            };
        });

        gsap.to(infoButton, {
            duration: 0.5,
            opacity: 0,
            pointerEvents: "none",
            ease: "power1.out",
        });

        tl.to(slider, {
            duration: 0.15,
            display: "flex",
        });

        tl.to(slider, {
            duration: 0.5,
            xPercent: 0,
            ease: "power1.out",
        });

        Flip.from(state, {
            absolute: true,
            duration: 0.5,
            stagger: {
                from: "start",
                axis: "x",
                amount: 0,
            },
            ease: "power1.out",
        });
    };

    const handleMediaQuery = (e) => {
        if (e.matches) {
            gallery.classList.add("--width");
            infoButton.addEventListener("click", () => {
                openInfoSlider();
            });
        } else {
            readMoreButton.addEventListener("click", () => {
                openInfoSlider();
            });
        };
    };
    handleMediaQuery(mediaQuery);
};

const handleFilters = () => {
    const filters = document.querySelectorAll(".filter");
    const items = document.querySelectorAll(".gallery-item, .accordion");
    const filterClear = document.querySelector(".deselect-filters");

    const applyFilters = (filter) => {
        window.scrollTo(0, 0);
        const filterId = filter.id;

        items.forEach(item => {
            const itemType = item.dataset.type;
            const itemCategory = item.dataset.category;
            const itemProject = item.dataset.project;
            const itemMembers = item.dataset.members;
            if (itemType === filterId) {
                item.classList.remove("--unfiltered");
                item.classList.add("--filtered");
            } else if (itemCategory === filterId) {
                item.classList.remove("--unfiltered");
                item.classList.add("--filtered");
            } else if (itemProject === filterId) {
                item.classList.remove("--unfiltered");
                item.classList.add("--filtered");
            } else if (itemMembers && itemMembers.includes(filter.textContent)) {
                item.classList.remove("--unfiltered");
                item.classList.add("--filtered");
            } else {
                item.classList.add("--unfiltered");
                item.classList.remove("--filtered");
            };
        });
    };

    const removeFilters = () => {
        filterClear.classList.remove("--opacity");
        filterClear.classList.remove("--display");
        filters.forEach(filter => {
            filter.classList.remove("--target");
        });
        items.forEach(item => {
            item.classList.remove("--unfiltered");
            item.classList.add("--filtered");
        });
    }

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

const zoomer = () => {
    const imageItems = document.querySelectorAll(".image-item");
    const zoomedContainer = document.querySelector(".zoomed-container");
    const zoomedButton = zoomedContainer.querySelector(".zoomed-button");

    imageItems.forEach(item => {
        const imageElement = item.querySelector(".image");
        imageElement.addEventListener("click", () => {
            if (item.classList.contains("--zoom-in")) {
                if (imageElement.naturalHeight * 2 > imageElement.naturalWidth) {
                    zoomedContainer.classList.add("--portrait");
                } else {
                    zoomedContainer.classList.add("--landscape");
                };
                zoomedContainer.style.display = "block";

                const clonedImage = imageElement.cloneNode(true);
                zoomedContainer.appendChild(clonedImage);
                setTimeout(() => {
                    zoomedButton.classList.add("--opacity");
                }, 500);

                if (zoomedContainer.classList.contains("--landscape")) {
                    zoomedContainer.addEventListener("wheel", (event) => {
                        event.preventDefault();
                        zoomedContainer.scrollLeft += event.deltaY;
                    });
                } else {
                    zoomedContainer.addEventListener("wheel", (event) => {
                        event.preventDefault();
                        zoomedContainer.scrollTop += event.deltaY;
                    });
                };
            };
        });
    });

    zoomedButton.addEventListener("click", () => {
        zoomedButton.classList.remove("--opacity");
        zoomedContainer.classList.remove("--portrait");
        zoomedContainer.classList.remove("--landscape");
        zoomedContainer.scrollTo(0, 0);
        zoomedContainer.style.display = "none";
        const zoomedImage = zoomedContainer.querySelector(".image");
        zoomedImage.remove();
    });
}

const handleGallery = () => {
    const handleMediaQuery = (e) => {
        if (!e.matches) {
            const galleryItems = document.querySelectorAll(".gallery-item");
            const triggerElements = document.querySelectorAll(".gallery-item img, .gallery-item video");
            const ignoredElements = document.querySelectorAll(".media-text-wrapper, .gallery-item img, .gallery-item video, .zoomed-button");
            const paddingOffset = 128;

            const addClasses = (item) => {
                [...galleryItems].filter(i => i !== item).forEach(i => {
                    i.classList.remove("--zoom-in");
                    i.classList.add("--opacity");
                });
                item.classList.remove("--opacity");
                item.classList.add("--zoom-in");

                const itemPosition = item.getBoundingClientRect().top;
                const offsetPosition = itemPosition + window.scrollY - paddingOffset;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth",
                });

                gsap.to(".box-container", {
                    autoAlpha: 0,
                    ease: "power1.out",
                });

                const video = item.querySelector("video");
                if (item.contains(video)) {
                    video.controls = true;
                };

                main.style.cursor = "zoom-out";
            };

            const removeClasses = (item) => {
                [...galleryItems].filter(i => i !== item).forEach(i => {
                    i.classList.remove("--opacity");
                });
                item.classList.remove("--zoom-in");

                gsap.to(".box-container", {
                    autoAlpha: 1,
                    ease: "power1.out",
                });

                const video = item.querySelector("video");
                if (item.contains(video)) {
                    video.controls = false;
                };

                main.style.cursor = "none";
            };

            triggerElements.forEach(item => {
                item.addEventListener("click", () => {
                    addClasses(item.parentNode);
                });
            });
            document.body.addEventListener("click", () => {
                ignoredElements.forEach(element => {
                    element.addEventListener("click", (event) => {
                        event.stopPropagation();
                    });
                });
                triggerElements.forEach(item => {
                    if (item.parentNode.classList.contains("--zoom-in")) {
                        removeClasses(item.parentNode);
                    };
                });
            });
        };
    };
    handleMediaQuery(mediaQuery);
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
                    behavior: "smooth",
                });
                gsap.from(elements, {
                    duration: 0.5,
                    opacity: 0,
                });
            });
        });
    });
};

const handleMenuOnMobile = () => {
    const menuButton = document.querySelector(".mobile-menu-button");
    const menuElements = document.querySelectorAll(".menu-element");
    const handleMediaQuery = (e) => {
        if (e.matches) {
            menuButton.addEventListener("click", () => {
                nav.classList.toggle("--show");
                const tl = gsap.timeline();
                tl.from(menuElements, {
                    duration: 0.5,
                    opacity: 0,
                },);
                tl.from(menuElements, {
                    y: 20,
                    stagger: 0.1,
                }, "-=75%");
            });
            menuElements.forEach(element => {
                element.addEventListener("click", () => {
                    if (nav.classList.contains("--show")) {
                        nav.classList.remove("--show");
                    };
                });
            });
        } else {
            menuButton.remove();
        };
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

window.addEventListener("load", () => {
    history.scrollRestoration = "manual";
    documentHeight();
    documentWidth();
    loader();
    cursor();
    animateAll();
    sliderOpener();
    bannerOpener();
    shuffleColors();
    handleMenuOnMobile();
});

window.addEventListener("resize", () => {
    documentHeight();
    documentWidth();
});




