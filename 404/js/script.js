// 10/11/2023
// 404 /script.js 1.0 – draft


// function controls aura background animation
function aura() {
    'use strict';

    let canvas, context;
    const ani = ()=> {
        canvas = document.getElementById('canvas'),
            context = canvas.getContext('2d');
        let u = 0;

        const
            fill = function(x, y, r, g, b) {
                context.fillStyle = `rgb(${r}, ${g}, ${b})`;
                context.fillRect(x, y, 5, 5);
            },

            R = function(x, y, r) {
                return Math.floor(200 + 64 * Math.cos((x * x - y * y) / 300 + r));
            },

            G = function(x, y, r) {
                return Math.floor(100 + 64 * Math.sin((x * x * Math.cos(r / 4) + y * y * Math.sin(r / 3)) / 300));
            },

            B = function(x, y, r) {
                return Math.floor(150 + 64 * Math.sin(5 * Math.sin(r / 9) + ((x - 100) * (x - 100) + (y - 100) * (y - 100)) / 1100));
            },

            call = function() {
                let x, y;
                for (x = 0; x <= 30; x++) {
                    for (y = 0; y <= 30; y++) {
                        fill(x, y, R(x, y, u), G(x, y, u), B(x, y, u));
                    }
                }
                u = u + 0.025;
                window.requestAnimationFrame(call);
            };
        call();
    };
    ani();
}

// function called when window loads
// initial setup
function init() {
    'use strict'

    // assign event handlers to their events
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(window, 'load', aura);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();