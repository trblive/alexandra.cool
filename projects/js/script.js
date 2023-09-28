
// 31/05/2023
// projects /script.js 1.1 – completed draft


// function called when window loads 
// initial setup 
function init() {
    'use strict'

    // assign event handlers to their events
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(U.$('galleryButton'), 'click', U.goToGallery);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();