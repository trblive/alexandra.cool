
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
        U.addEvent(acc[i], 'click', toggleContent);
    }
} // end of accordion() function

// function called in accordion() function
// function allows keyboard accessibility for accordion
function toggleContent() {
    'use strict';

    var controls = document.querySelectorAll('dt');

    controls.forEach((control) => {

        U.addEvent(control, 'click', function (e){

            var type = e.type,
                button = this,
                content = this.nextElementSibling;

            // Return if key pressed was not Space Bar or Enter
            if (type === 'keydown' && (e.keyCode !== 13 && e.keyCode !== 32)) {
                return true;
            }
            e.preventDefault();

            if (content.getAttribute('aria-hidden') === 'true') {
                content.setAttribute('aria-hidden', 'false');
                button.setAttribute('aria-expanded', 'true');
            } else {
                content.setAttribute('aria-hidden', 'true');
                button.setAttribute('aria-expanded', 'false');
            }
        })
    })
} // end of toggleContent() function

// function called when user submits password 
// function validates password and triggers display of page content
function validatePassword() {
    'use strict';

    var password = document.getElementById('password');
    var wrapper = document.getElementById('wrapper');
    var popup = document.getElementById('popup');

    if (password.value === 'rose3307') {
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
    U.addEvent(window, 'load', U.keebInput);
    U.addEvent(U.$('submit'), 'click', validatePassword);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(U.$('menu'), 'click', U.openMenu);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();