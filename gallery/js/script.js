
// 03/05=6/2023
// gallery /script.js 1.1


// function gets list index of element
function getIndex(elem, elementList) {
    'use strict';

    const elementArray = Array.from(elementList);
    const index = elementArray.indexOf(elem);

    return index;
} // end of getIndex() function


// function called when page loads
// function expands the image when user clicks on it
function openImagePopup() {
    'use strict';

    var expandedImage = U.$('expandedImage');
    var imagePopup = U.$('imagePopup');
    const imageList = document.querySelectorAll('.galleryImage');
    const smallSliderImages = U.$('smallSlider').querySelectorAll('.sliderImage');
    const bigSliderImages = U.$('bigSlider').querySelectorAll('.sliderImage');

    imageList.forEach(function(image) {
        U.addEvent(image, 'click', function() {

            // set image src and display window
            var srcSplit = image.src.split("-g")
            var imageSrc = srcSplit[0] + '.jpg';
            expandedImage.src = imageSrc
            expandedImage.alt = image.alt;
            imagePopup.classList.add('display');

            // remove border highlight for current image
            for (var i = 0; i < bigSliderImages.length; i++) {
                bigSliderImages[i].classList.remove('currentImage');

                // add border highlight for large thumbnail
                if (imageSrc == bigSliderImages[i].src) {
                    bigSliderImages[i].classList.add('currentImage');
                }
            } 
            // remove border highlight for current image
            for (var i = 0; i < smallSliderImages.length; i++) {
                smallSliderImages[i].classList.remove('currentImage');

                // add border highlight for small thumbnail
                if (imageSrc == smallSliderImages[i].src) {
                    smallSliderImages[i].classList.add('currentImage');
                }
            }
            // call sliderScroll() function to centre thumbnail
            sliderScroll();
        })
    });
} // end of openImagePopup() function


// function called when user clicks outside popup
// function closes expanded image popup
function closeImagePopup() {
    'use strict';

    var imagePopup = U.$('imagePopup');
    imagePopup.classList.remove('display');

} // end of closeImagePopup() function


function getSource(image) {
    'use strict'
    var srcSplit = image.src.split("-g")
    var imageSrc = srcSplit[0] + '.jpg';
    return imageSrc;
}


// function called when user clicks navigation arrow
// change expanded image src to next image
function scrollForward() {
    'use strict';

    const imageList = document.querySelectorAll('.galleryImage');
    const imageArray = Array.from(imageList);
    var expandedImage = U.$('expandedImage');

    // get matching src and next sibling
    const srcMatch = imageArray.find(image => getSource(image) == expandedImage.src);
    var nextSrc = getSource(srcMatch.nextElementSibling);
    var nextAlt = getSource(srcMatch.nextElementSibling);
    expandedImage.src = nextSrc;
    expandedImage.alt = nextAlt;

    sliderScroll();

} // end of scrollForward() function


// function called when user clicks navigation arrow
// change expanded image src to previous image
function scrollBack() {
    'use strict';

    const imageList = document.querySelectorAll('.galleryImage');
    const imageArray = Array.from(imageList);
    var expandedImage = U.$('expandedImage');

    // get matching src and previous sibling
    const srcMatch = imageArray.find(image => getSource(image) == expandedImage.src);
    var previousSrc = getSource(srcMatch.previousElementSibling);
    var previousAlt = getSource(srcMatch.previousElementSibling);
    expandedImage.src = previousSrc;
    expandedImage.alt = previousAlt;

    sliderScroll();

} // end of scrollBack() function


// function centres image thumbnail in slider to match expanded image
function sliderScroll() {
    'use strict';

    const smallSliderContainer = U.$('smallSlider');
    const smallSliderImages = smallSliderContainer.querySelectorAll('.sliderImage');
    const bigSliderContainer = U.$('bigSlider');
    const bigSliderImages = bigSliderContainer.querySelectorAll('.sliderImage');

    bigSliderImages.forEach(image => {
        image.classList.remove('currentImage');
        var srcSplit = image.src.split("-bt")
        var imageSrc = srcSplit[0] + '.jpg';

        if (imageSrc == U.$('expandedImage').src) {
            // get index # of image
            var sliderIndex = getIndex(image, bigSliderImages);
            var scrollLeft = 0;
    
            // calculate scroll position to centre image
            for (var j = 0; j < sliderIndex; j++) {
                scrollLeft += (60);
            }
            scrollLeft -= (290 - 50) / 2;
    
            // scroll container
            bigSliderContainer.scrollTo({
                left: scrollLeft,
                behavior: 'smooth'
            });
            image.classList.add('currentImage');
        }
    })

    smallSliderImages.forEach(image => {
        image.classList.remove('currentImage');
        var srcSplit = image.src.split("-st")
        var imageSrc = srcSplit[0] + '.jpg';

        // get index # of image
        if (imageSrc == U.$('expandedImage').src) {
            var sliderIndex = getIndex(image, smallSliderImages);
            var scrollLeft = 0;

            // calculate scroll position to centre image
            for (var j = 0; j < sliderIndex; j++) {
                scrollLeft += (30);
            }
            scrollLeft -= (140 - 20) / 2;

            // scroll container
            smallSliderContainer.scrollTo({
                left: scrollLeft,
                behavior: 'smooth'
            });
            image.classList.add('currentImage');
        }
    })
} // end of sliderScroll() function


// function called when window loads
// function executes when user clicks slider navigation arrow
// function scrolls slider to display images
function sliderNav() {
    'use strict';

    const smallSliderContainer = U.$('smallSlider');
    const bigSliderContainer = U.$('bigSlider');

    // scroll forwards on click
    U.addEvent(U.$('sliderRight'), 'click', function() {
        smallSliderContainer.scrollBy({
            left: 90,
            behavior: 'smooth'
        });
        bigSliderContainer.scrollBy({
            left: 180,
            behavior: 'smooth'
        });
    })
    // scroll backwards on click
    U.addEvent(U.$('sliderLeft'), 'click', function() {
        smallSliderContainer.scrollBy({
            left: -90,
            behavior: 'smooth'
        });
        bigSliderContainer.scrollBy({
            left: -180,
            behavior: 'smooth'
        });
    })
} // end of sliderNav() funtion


// function called when page loads
// function sets image src in scroll bar
function changeImageSlider() {
    'use strict';

    var expandedImage = U.$('expandedImage');
    const smallSliderImages = U.$('smallSlider').querySelectorAll('.sliderImage');
    const bigSliderImages = U.$('bigSlider').querySelectorAll('.sliderImage');


    bigSliderImages.forEach(image => {
        U.addEvent(image, 'click', function() {

            var srcSplit = image.src.split("-bt")
            var imageSrc = srcSplit[0] + '.jpg';
            // set image src
            expandedImage.src = imageSrc;
            expandedImage.alt = image.alt;

            // remove border highlight for current image
            for (var i = 0; i < bigSliderImages.length; i++) {
                bigSliderImages[i].classList.remove('currentImage');
            } 
            for (var i = 0; i < smallSliderImages.length; i++) {
                smallSliderImages[i].classList.remove('currentImage');
                var imgSplit = smallSliderImages[i].src.split("-st");
                var smallSrc = imgSplit[0] + '.jpg';

                // add border highlight for small thumbnail
                if (imageSrc == smallSrc) {
                    smallSliderImages[i].classList.add('currentImage');
                }
            }
            // add border highlight for larger thumbnail
            image.classList.add('currentImage');
        })
    })
} // end of changeImageSlider() function


// function called when window loads 
// initial setup 
function init() {
    'use strict'

    // assign event handlers to their events
    U.addEvent(window, 'load', openImagePopup);
    U.addEvent(U.$('blocker'), 'click', closeImagePopup);
    U.addEvent(U.$('navRight'), 'click', scrollForward);
    U.addEvent(U.$('navLeft'), 'click', scrollBack);
    U.addEvent(window, 'click', sliderNav);
    U.addEvent(window, 'load', changeImageSlider);
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(U.$('galleryButton'), 'click', U.goToGallery);

} // end of init() function

// Assign an event handler to the window's load event:
window.onload = init();