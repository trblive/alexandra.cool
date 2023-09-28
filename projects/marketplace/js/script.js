
// 31/05/2023
// script.js 1.1 – completed draft


// function called when user clicks on toggle button
// function changes example menu to mobile format (drop down list)
function aboutMenu() {
    'use strict';

    var aboutMenu = U.$('about-menu');
    var aboutList = U.$('aboutList');

    aboutMenu.classList.toggle('mobileMenu');
    aboutList.classList.toggle('false');

} // end of aboutMenu() function


// function called when user clicks on toggle button
// function changes example timeline to mobile format (accordion)
function collapseTimeline() {
    'use strict';

    var timeline = U.$('timeline');

    timeline.classList.toggle('mobileAcc');

} // end of collapseTimeline() function


// function called when user clicks on drop down menu
// function controls drop down menu functionality
function openAboutMenu() {
    'use strict';

    var aboutList = document.getElementById('aboutList');
    aboutList.classList.toggle('false');
} // end of openAboutMenu() function


// function called when window loads
// function controls accordion functionality 
function accordion() {
    'use strict';

    var acc = document.getElementsByTagName('dt');
    var i;

    for (i = 0; i < acc.length; i++) {
        U.addEvent(acc[i], 'click', function() {

            this.classList.toggle('active');
            var icon = this.querySelector('i');
            icon.classList.toggle('rotate');

            var panel = this.nextElementSibling;

            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        });
    }
} // end of accordion() function

// function called when window loads 
// initial setup 
function init() {
    'use strict'

    // assign event handlers to their events
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('mobile-toggle'), 'click', aboutMenu);
    U.addEvent(U.$('mobile-toggle'),'click', collapseTimeline);
    U.addEvent(U.$('aboutButton'), 'click', openAboutMenu);
    U.addEvent(U.$('mobile-toggle'), 'click', accordion);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(U.$('galleryButton'), 'click', U.goToGallery);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();