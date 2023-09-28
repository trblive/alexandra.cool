
// 31/05/2023
// experience /script.js 1.1 – completed draft


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


// function called when user submits password 
// function validates password and triggers display of page content
function validatePassword() {
    'use strict';

    var password = document.getElementById('password');
    var wrapper = document.getElementById('wrapper');
    var popup = document.getElementById('popup');

    if (password.value == 'rose3307') {
        wrapper.classList.add('unlocked');
        wrapper.classList.remove('locked');
    } else {
        wrapper.classList.value = 'locked';
        popup.classList.remove('shaking');
        void popup.offsetWidth;
        popup.classList.add('shaking');
    }
}


// function called when window loads 
// initial setup 
function init() {
    'use strict'

    // assign event handlers to their events
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(window, 'load', accordion);
    U.addEvent(U.$('submit'), 'click', validatePassword);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(U.$('galleryButton'), 'click', U.goToGallery);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();