
// - utilities.js

var U = {

    // For getting the document element by ID:
    $: function(id) {
        'use strict';
        if (typeof id == 'string') {
            return document.getElementById(id);
        }
    }, // End of $() function.

    // Function for setting the text of an element:
    setText: function(id, message) {
        'use strict';
        if ( (typeof id == 'string')
        && (typeof message == 'string') ) {
    
            // Get a reference to the element:
            var output = this.$(id);
            if (!output) return false;
        
            // Set the text
            if (output.textContent !== undefined) {
                output.textContent = message;
            } else {
                output.innerText = message;
            }
            return true;
        } // End of main IF.
    }, // End of setText() function.
    
    // Function for creating event listeners:
    addEvent: function(obj, type, fn) {
        'use strict';
        if (obj && obj.addEventListener) { // W3C
            obj.addEventListener(type, fn, false);
        } else if (obj && obj.attachEvent) { // Older IE
            obj.attachEvent('on' + type, fn);
        }
    }, // End of addEvent() function.
    
    // Function for removing event listeners:
    removeEvent: function(obj, type, fn) {
        'use strict';
        if (obj && obj.removeEventListener) { // W3C
            obj.removeEventListener(type, fn, false);
        } else if (obj && obj.detachEvent) { // Older IE
            obj.detachEvent('on' + type, fn);
        }
    }, // End of removeEvent() function.

	enableTooltips: function(id) {
	    'use strict';
	
		// Get a reference to the element:
		var elem = this.$(id);

		// Add four event handlers to the element:
		this.addEvent(elem, 'focus', this.showTooltip);
	    this.addEvent(elem, 'mouseover', this.showTooltip);
	    this.addEvent(elem, 'blur', this.hideTooltip);
	    this.addEvent(elem, 'mouseout', this.hideTooltip);
	
	}, // End of enableTooltips() function.

	showTooltip: function(e) {
	    'use strict';
	
		// Get the event object:
		if (typeof e == 'undefined') var e = window.event;

		// Get the event target:
		var target = e.target || e.srcElement;
        target.nextSibling.style.opacity = '1.0';

	}, // End of showTooltip() function.

	hideTooltip: function(e) {
	    'use strict';
	
		// Get the event object:
		if (typeof e == 'undefined') var e = window.event;

		// Get the event target:
		var target = e.target || e.srcElement;
        target.nextSibling.style.opacity = '0.0';

	}, // End of hideTooltip() function.

    // function called on scroll
    // function adds background to nav on scroll
    blurNav: function() {
        'use strict';

        var navList = U.$('nav');
        var lists = navList.querySelectorAll('li');

        for (var i = 0; i < lists.length; i ++) {
            if (document.documentElement.scrollTop > 100) {
                navList.classList.add('blur');
                lists[i].classList.add('blur');
            } else {
                navList.classList.remove('blur');
                lists[i].classList.remove('blur');
            }
        }
    },  // end of blurNav() function

    // function called when menu button is clicked
    // function opens nav menu in mobile format
    openMenu: function() {
        'use strict';

        U.$('navContainer').classList.toggle('display');

    }, // end of openMenu() function

    // function called when window loads
    // function allows 'submit' button to be activated with keyboard enter
    keebInput: function () {
        'use strict';

        var inputs = document.querySelectorAll('input');

        inputs.forEach((input) => {
            U.addEvent(input, 'keypress', function (event) {
                // If the user presses the "Enter" key on the keyboard
                if (event.key === "Enter") {
                    // Cancel the default action, if needed
                    event.preventDefault();

                    // Trigger the button element with a click
                    input.click();
                }
            });
        });
    } // end of keebInput() function

}; // End of U declaration.
