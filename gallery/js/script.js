// 2/02/2024
// hours wasted here: probably about 130
// IT WORKS!!!!!


const expandedImage = U.$('expandedImage');
const imageList = document.querySelectorAll('.galleryImage');
const sliderList = document.querySelectorAll('.sliderImage');
const container = document.querySelector('.container');


// get the src attribute of an image element
function getSource(img) {
    'use strict'
    let srcSplit = img.src.split("-g")
    return srcSplit[0] + '.jpg';
} // end of getSource() function


// get the list index of an element
function getIndex(elem, elementList) {
    'use strict';

    const elementArray = Array.from(elementList);
    return elementArray.indexOf(elem);
} // end of getIndex() function


// expands the image when user clicks on it
function openModal() {
    'use strict';

    const imagePopup = U.$('imagePopup');

    imageList.forEach(function(image) {
        U.addEvent(image, 'click', function() {

            let index = getIndex(image, imageList);

            // set image src and display window
            // expandedImage.src = getSource(image)
            // expandedImage.alt = image.alt;
            imagePopup.classList.add('display');

            // enable navigation
            scrollDir.setImage(index);
            navigateImage();
            // set inert property
            setInert();
        })
    });
} // end of openModal() function


// function called when user clicks outside modal
function closeModal() {
    'use strict';

    let imagePopup = U.$('imagePopup');
    imagePopup.classList.remove('display');

    let inert = document.querySelectorAll('#skipnav, header, #gallery, footer');

    inert.forEach((elem) => {
        if (elem.hasAttribute('inert')) {
            elem.toggleAttribute('inert');
        }
    })

} // end of closeModal() function


// stores functions for navigating slider and updating selected image in modal
let scrollDir = {
    setImage: function (index) {

        // reset all images
        sliderList.forEach(img => {
            img.removeAttribute('tabindex');
            img.setAttribute('aria-selected', 'false');
            img.classList.remove('currentImage');
        })

        // initialisations
        let scrollLeft = 0;
        let imgWidth = sliderList[0].offsetWidth;
        let visible;

        // update image source and alt
        const newImg = imageList[index];
        expandedImage.src = getSource(newImg);
        expandedImage.alt = newImg.alt;

        // calculate scroll position
        for (let j = 0; j < index; j ++) {
            scrollLeft += imgWidth + 10;
        }
        scrollLeft -= (container.offsetWidth - imgWidth) / 2;

        container.scrollTo({
            left: scrollLeft,
            behavior: "smooth"
        })

        sliderList[index].setAttribute('aria-selected', 'true');
        sliderList[index].classList.add('currentImage');

        // enable tabindex on currently visible images
        for (let j = 0; j < 5; j++) {

            visible = index - 2 + j;

            if (index < 2) {
                visible = j;
            }

            if (index > imageList.length - 3) {
                visible = imageList.length - j - 1;
            }

            for (let k = 0; k < imageList.length; k++) {
                if (k === visible) {
                    sliderList[k].setAttribute('tabindex', '0');
                }
            }
        }
    },
    forwards: function () {

        // initialisations
        let index;
        let nextSet;

        for (let i = 0; i < imageList.length; i++) {
            if (getSource(imageList[i]) === expandedImage.src) {

                index = getIndex(sliderList[i], sliderList)

                if (index >= (imageList.length - 8)) {
                    switch (true) {
                        case index >= (imageList.length - 3):
                            nextSet = 0;
                            console.log(index);
                            break
                        default:
                            nextSet = imageList.length - 3;
                    }
                } else {
                    nextSet =  i + 5;
                }
            }
        }
        scrollDir.setImage(nextSet);
    },

    backwards: function () {

        // initialisations
        let index;
        let prevSet;

        for (let i = 0; i < imageList.length; i++) {
            if (getSource(imageList[i]) === expandedImage.src) {

                index = getIndex(sliderList[i], sliderList)

                if (index < 5) {
                    switch (index) {
                        case index = 0:
                            prevSet = imageList.length - 1;
                            break
                        default:
                            prevSet = 0;
                    }
                } else {
                    prevSet =  i - 5;
                }
            }
        }
        scrollDir.setImage(prevSet);
    }
}


// allows user to click through images forwards and backwards
function navigateImage() {
    'use strict';

    let scrollForward = function () {

        // clear focus
        if (document.activeElement) {
            document.activeElement.blur();
        }

        // add focus to right nav button
        U.$('navRight').focus();

        // initialisations
        let nextIndex;

        for (let i = 0; i < sliderList.length; i++) {
            if (getSource(sliderList[i]) === expandedImage.src) {

                if (i === (sliderList.length - 1)) {
                    nextIndex = 0;
                } else {
                    nextIndex =  i + 1;
                }
            }
        }
        scrollDir.setImage(nextIndex);

    } // end of scrollForward() function

    let scrollBack = function () {

        // clear focus
        if (document.activeElement) {
            document.activeElement.blur();
        }

        // add focus to left nav button
        U.$('navLeft').focus();

        let prevIndex;

        for (let i = 0; i < sliderList.length; i++) {
            if (getSource(sliderList[i]) === expandedImage.src) {

                if (i === 0) {
                    prevIndex = sliderList.length - 1;
                } else {
                    prevIndex =  i - 1;
                }
            }
        }
        scrollDir.setImage(prevIndex);

    } // end of scrollBack() function

    // click event listeners
    U.addEvent(U.$('navRight'), 'click', scrollForward);
    U.addEvent(U.$('navLeft'), 'click', scrollBack);
    // arrow key listeners
    U.addEvent(window, 'keydown', function (e) {
        if (e.key === 'ArrowRight') {
            e.preventDefault();
            scrollForward();
        }
    })
    U.addEvent(window, 'keydown', function (e) {
        if (e.key === 'ArrowLeft') {
            e.preventDefault();
            scrollBack();
        }
    })
} // end of navigateImage() function


// traps focus inside modal while it is open
function setInert() {
    'use strict';

    let inert = document.querySelectorAll('#skipnav, header, #gallery, footer');

    inert.forEach((elem) => {
        elem.toggleAttribute('inert');
    })
}


// function called when window loads 
// initial setup 
function init() {
    'use strict'

    // assign event handlers to their events
    U.addEvent(window, 'load', openModal);
    U.addEvent(U.$('blocker'), 'click', closeModal);

    U.addEvent(U.$('sliderRight'), 'click', function() {
        scrollDir["forwards"]();
    })
    U.addEvent(U.$('sliderLeft'), 'click', function() {
        scrollDir["backwards"]();
    })

    sliderList.forEach(img => {
        U.addEvent(img, 'click', function () {
            let index = getIndex(img, sliderList);

            scrollDir.setImage(index);
        })
    })

    U.addEvent(window, 'keydown', function (e) {
        console.log(e.key);
        if (e.key === 'Escape') {
            e.preventDefault();
            closeModal();
        }
    })

    U.addEvent(window, 'load', U.keebInput);
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);


} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();