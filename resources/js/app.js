import "./bootstrap";

import.meta.glob(["../images/**"]);

import gsap from "gsap";

// underline hover animation
// Mouseenter function
function enterAnimation(link, e, index) {
    link.tl.tweenFromTo(0, "midway");
}

// Mouseleave function
function leaveAnimation(link, e) {
    link.tl.play();
}

// Animations variables
let workLinkUnderlineAnimEnter;
let workLinkUnderlineAnimLeave;

// Get all links
let workLinks = document.querySelectorAll(".js-work-link");

workLinks.forEach((link, index, value) => {
    let underline = link.querySelector(".underline");
    link.tl = gsap.timeline({ paused: true });

    link.tl.fromTo(
        underline,
        {
            width: "0%",
            left: "0%",
        },
        {
            width: "100%",
            duration: 0.3,
        }
    );

    link.tl.add("midway");

    link.tl.fromTo(
        underline,
        {
            width: "100%",
            left: "0%",
        },
        {
            width: "0%",
            left: "100%",
            duration: 0.3,
            immediateRender: false,
        }
    );

    // Mouseenter
    link.addEventListener("mouseenter", (e) => {
        enterAnimation(link, e, index);
    });

    // Mouseleave
    link.addEventListener("mouseleave", (e) => {
        leaveAnimation(link, e);
    });
});

//navbar scroll animation
let prevScrollpos = window.scrollY;
window.onscroll = function () {
    let currentScrollPos = window.scrollY;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-120px";
    }
    prevScrollpos = currentScrollPos;
};
