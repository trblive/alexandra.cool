
// - utilities.js
// 28/11/2023

var U = {

    // For getting the document element by ID:
    $: function(id) {
        'use strict';
        if (typeof id == 'string') {
            return document.getElementById(id);
        }
    }, // End of $() function.

    // Function for creating event listeners:
    addEvent: function(obj, type, fn) {
        'use strict';
        if (obj && obj.addEventListener) { // W3C
            obj.addEventListener(type, fn, false);
        } else if (obj && obj.attachEvent) { // Older IE
            obj.attachEvent('on' + type, fn);
        }
    }, // End of addEvent() function.

    // function sets light or dark mode class on html element
    setTheme: function(themeName, mode) {
        'use strict';

        localStorage.setItem('theme', themeName);
        document.documentElement.className = themeName;

        let themeText = document.querySelector('.theme-toggle-text');
        themeText.innerText = mode;
    },


    // function is called when page loads
    // function gets colour scheme preference based on system settings
    getDefaultTheme: function() {
        'use strict';

        const theme = localStorage.getItem('theme');

        // check for existing preference
        // default to light mode if none
        if (theme === 'dark-mode') {
            U.setTheme('dark-mode', 'Dark');
            document.getElementById('theme-toggle').checked = true;
        } else {
            U.setTheme('light-mode', 'Light');
            document.getElementById('theme-toggle').checked = false;
        }

        // check for preferences in system settings
        let prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
        if (prefersDarkMode.matches) {
            U.setTheme('dark-mode', 'Dark');
            document.getElementById('theme-toggle').checked = true;
        }
    },

    // function is called when user clicks on toggle button
    // function changes colour scheme to light or dark
    toggleTheme: function() {
        'use strict';

        let theme = localStorage.getItem('theme');
        let mode;

        switch (theme) {
            case 'dark-mode':
                theme = 'light-mode';
                mode = 'Light';
                break
            case 'light-mode':
                theme = 'dark-mode';
                mode = 'Dark';
                break
            case null:
                theme = ('dark-mode' ? 'light-mode' : 'dark-mode');
                mode = ('Dark' ? 'Light' : 'Dark');
        }

        U.setTheme(theme, mode);
    },

    stickyNav: function() {
        'use strict';

        var header = document.querySelector('header');
        var nav = document.querySelector('.nav');

        let navOffset = nav.getBoundingClientRect().top;

        header.style.top = '-' + navOffset + 'px';
    }
}





