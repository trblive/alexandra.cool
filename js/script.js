
// 31/05/2023
// home.js 1.1 – completed draft


// function is called when button is clicked
// function triggers animation to display page content 
function animation() {
    'use strict';
    
    var button = U.$('button');
    var wrapper = U.$('wrapper');

    wrapper.classList.toggle('open');
    button.classList.toggle('click');

} // end of animation() function


// function called on scroll
// function triggers animation to reveal page content
function reveal() {
    'use strict';

    var reveals = document.querySelectorAll('.reveal');

    for (var i = 0; i < reveals.length; i ++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add('active');
        } else {
            reveals[i].classList.remove('active');
        }
    }
} // end of reveal() function


// Function is called when window loads:
// Initial setup:
function init() {
    'use strict';

    // assign event handlers to their events
    U.addEvent(U.$('button'), 'click', animation);
    U.addEvent(U.$('skipnav'), 'click', animation);
    U.addEvent(window, 'scroll', reveal);
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();