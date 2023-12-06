
// 28/11/2023



// Function is called when window loads:
// Initial setup:
function init() {
    'use strict';

    // assign event handlers to their events
    U.addEvent(U.$('theme-toggle'), 'click', U.toggleTheme);
    U.addEvent(window, 'load', U.getDefaultTheme);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();
