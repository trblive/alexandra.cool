
// 1/02/2024
// hours wasted here: probably about 120
// ITS GOOD ENOUGH


const expandedImage = U.$('expandedImage');
const imageList = document.querySelectorAll('.galleryImage');
const imageArray = Array.from(imageList);
const sliderList = document.querySelectorAll('.sliderImage');
const container = document.querySelector('.container');

sliderList.forEach(img => {
    setImageClick(img, sliderList);
})

// get the src attribute of an image element
function getSource(img) {
    'use strict'
    var srcSplit = img.src.split("-g")
    return srcSplit[0] + '.jpg';
} // end of getSource() function


// get the list index of element
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

            // set image src and display window
            expandedImage.src = getSource(image)
            expandedImage.alt = image.alt;
            imagePopup.classList.add('display');

            // enable navigation
            createSlider(image);
            navigateImage();
            U.keebInput();
            // set inert property
            setInert();
        })
    });
} // end of openImagePopup() function


// function allows user to click through images forwards and backwards
function navigateImage() {
    'use strict';

    // initialisations to scroll slider bar
    const slider = document.querySelector('.slider');
    let imgWidth = sliderList[0].offsetWidth;

    let scrollForward = function () {

        // clear focus
        if (document.activeElement) {
            document.activeElement.blur();
        }

        // add focus to right nav button
        U.$('navRight').focus();

        let scrollLeft = 0;

        // initialisations
        let nextIndex;

        for (let i = 0; i < imageList.length; i++) {
            if (getSource(imageList[i]) === expandedImage.src) {

                nextIndex =  i + 1;
                // if (i === (imageList.length - 1)) {
                //     nextIndex = 0;
                //     //newIndex = 2;
                // }
                //
                // for (let j = 0; j < nextIndex; j++) {
                //     scrollLeft += (imgWidth + 10);
                // }
                // scrollLeft -= (container.offsetWidth - imgWidth) / 2;
                //
                // for (let j = 0; j < 5; j++) {
                //     if (getSource(sliderImages[j]) === expandedImage.src) {
                //         if (j === 2) {
                //             newIndex = i + 3;
                //         } else {
                //             newIndex = undefined;
                //         }
                //     }
                // }
                // if (newIndex >= imageList.length) {
                //     switch (i) {
                //         case i = imageList.length - 1:
                //             newIndex = 2;
                //             break
                //         case i = imageList.length - 2:
                //             newIndex = 1;
                //     }
                // }

                // if (i < 2 && imageList[0].src === sliderImages[0].src) {
                //     newIndex = undefined;
                //
                // } else {
                //     newIndex = i + 3;
                //
                //
                // }
                //console.log(newIndex);
            }
        }

        console.log(scrollLeft);
        console.log(nextIndex);

        // get next sibling and update modal
        const nextImg = imageList[nextIndex];
        expandedImage.src = getSource(nextImg);
        expandedImage.alt = nextImg.alt;

        scrollSlider(nextImg);

        // container.scrollTo({
        //     left: scrollLeft,
        //     behavior: "smooth"
        // })

        // create new slider item
        // if (newIndex !== undefined) {
        //     let nextItem = document.createElement('li');
        //     let newImg = imageList[newIndex];
        //     let clone = newImg.cloneNode();
        //
        //     clone.setAttribute('tabindex', '0');
        //     clone.classList.remove('galleryImage');
        //     clone.classList.add('sliderImage');
        //
        //     nextItem.appendChild(clone);
        //
        //     // add new item to slider
        //     slider.classList.add('sliding-transition');
        //     slider.appendChild(nextItem);
        //
        //     // move container to the left by width of 1 slide
        //     setTimeout(() => {
        //         slider.style.transform = `translateX(-${imgWidth}px)`;
        //     }, 100)
        //
        //     // rearrange DOM after transition is complete
        //     setTimeout(() => {
        //         slider.classList.remove('sliding-transition');
        //         slider.style.transform = '';
        //         slider.removeChild(firstChild);
        //     }, 400);
        // }

        sliderList.forEach(img => {
            if (getSource(img) === expandedImage.src) {
                img.setAttribute('aria-selected', 'true');
                img.classList.add('currentImage');
            } else {
                img.classList.remove('currentImage');
                img.setAttribute('aria-selected', 'false');
            }
        })

    } // end of scrollForward() function

    let scrollBack = function () {

        // clear focus
        if (document.activeElement) {
            document.activeElement.blur();
        }

        // add focus to left nav button
        U.$('navLeft').focus();

        // initialisations
        let sliderImages = document.querySelectorAll('.sliderImage');
        let imgWidth = sliderImages[0].offsetWidth + 10;
        let prevIndex;

        let insertChild = function (newIndex) {

            // create new slider item
            let prevItem = document.createElement('li');
            let newImg = imageList[newIndex];
            let clone = newImg.cloneNode();

            clone.setAttribute('tabindex', '0');
            clone.classList.remove('galleryImage');
            clone.classList.add('sliderImage');

            prevItem.appendChild(clone);

            // add new item to slider
            slider.classList.add('sliding-transition');
            slider.insertBefore(prevItem, slider.firstChild)
        }

        for (let i = 0; i < imageList.length; i++) {
            if (getSource(imageList[i]) === expandedImage.src) {

                if (i === 0) {
                    prevIndex = imageList.length - 1;

                } else {
                    prevIndex =  i - 1;
                }

                if (imageList[0].src === sliderImages[0].src) {
                    switch (i) {
                        case i = 2:
                            insertChild(imageList.length - 1);
                            break
                        case i = 1:
                            insertChild(imageList.length - 1);
                            insertChild(imageList.length - 2);
                            imgWidth = imgWidth * 2;
                            break
                        case i = 0:
                            insertChild(imageList.length - 1);
                            insertChild(imageList.length - 2);
                            insertChild(imageList.length - 3);
                            imgWidth = imgWidth * 3;
                            break
                        default:
                            insertChild(i - 3);
                    }

                } else {
                    if (i === 1) {
                        insertChild(imageList.length - 2);
                    } else if (i === 0) {
                        insertChild(imageList.length - 3);
                    } else {
                        insertChild(i - 3);
                    }
                }
            }
        }

        // get previous sibling and update modal
        const lastChild = slider.lastChild;
        const prevImg = imageList[prevIndex];
        expandedImage.src = getSource(prevImg);
        expandedImage.alt = prevImg.alt;

        // re-fetch images
        let newImages = slider.querySelectorAll('.sliderImage');

        slider.classList.add('sliding-transition');
        slider.style.justifyContent = 'flex-end';

        // move container to the right by width of 1 slide
        setTimeout(() => {
            slider.style.transform = `translateX(${imgWidth}px)`;

        }, 100);

        // rearrange DOM after transition is complete
        setTimeout(() => {
            slider.style.transform = '';
            slider.classList.remove('sliding-transition');
            slider.style.justifyContent = 'normal';
            if (newImages.length > 5) {
                for (let i = 5; i < newImages.length; i++) {
                    slider.removeChild(newImages[i].parentElement);
                }
            } else {
                slider.removeChild(lastChild);
            }
        }, 400);

        newImages.forEach(img => {
            if (getSource(img) === expandedImage.src) {
                img.setAttribute('aria-selected', 'true');
                img.classList.add('currentImage');
            } else {
                img.classList.remove('currentImage');
                img.setAttribute('aria-selected', 'false');
            }
        })
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


// generates "slider" navigation to scroll through galley
function scrollSlider(image) {
    'use strict';

    let index = getIndex(image, imageList);
    let visible;
    let scrollLeft = 0;

    for (let j = 0; j < 5; j++) {

        visible = index - 2 + j;

        if (index < 2) {
            visible = j;
        }

        if (index > imageList.length - 3) {
            visible = imageList.length - j - 1;
        }

        for (let k = 0; k < imageList.length; k++) {

            let imgWidth = sliderList[k].offsetWidth;

            // reset attributes
            sliderList[k].removeAttribute('tabindex');
            sliderList[k].setAttribute('aria-selected', 'false');

            if (k === visible) {

                sliderList[k].setAttribute('tabindex', '0');

                if (k === index) {
                    sliderList[k].classList.add('currentImage');
                    sliderList[k].setAttribute('aria-selected', 'true');

                    for (let l = 0; l < k; l++) {
                        scrollLeft += imgWidth + 10;
                    }
                    scrollLeft -= (container.offsetWidth - imgWidth) / 2;
                }
            }
        }
    }
    container.scrollTo({
        left: scrollLeft
    })

    sliderNav();
}

function setImageClick(img, list) {
    'use strict';

    U.addEvent(img, 'click', function () {

        // remove classes on all
        list.forEach(item => {
            item.classList.remove('currentImage');
        })

        // set for clicked image
        expandedImage.src = getSource(img);
        expandedImage.alt = img.alt;
        img.classList.add('currentImage');

        // get list index of image for debugging purposes
        let listIndex;
        if (getSource(img) === expandedImage.src) {
            let match = imageArray.find(image => getSource(image) === expandedImage.src);
            listIndex = getIndex(match, imageList);
            console.log(listIndex);
        }
    })
}


// function called when user clicks outside popup
// function closes expanded image popup
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

} // end of closeImagePopup() function


// function called when window loads
// function executes when user clicks slider navigation arrow
// function scrolls slider to display images
function sliderNav() {
    'use strict';

    // initialisations to scroll slider bar
    const slider = document.querySelector('.slider');
    let listIndex;

    imageList.forEach((img) => {
        if (getSource(img) === expandedImage.src) {
            listIndex = getIndex(img, imageList);
        }
    })

    let scrollDir = {
        forwards: function () {

            let nextSet;
            let sliderImages = document.querySelectorAll('.sliderImage');
            let imgWidth = sliderImages[0].offsetWidth;

            for (let i = 0; i < 5; i++) {

                if (listIndex < 2) {
                    if ((listIndex === 0) && sliderImages[0].src === imageList[imageList.length - 2].src) {
                        listIndex = 0;
                    } else if ((listIndex === 1) && sliderImages[0].src === imageList[imageList.length - 1].src) {
                        listIndex = 1;
                    } else {
                        listIndex = 2;
                    }
                    nextSet = listIndex + i + 3;

                } else {
                    nextSet = listIndex + i + 3;

                    if (nextSet > imageList.length - 1) {
                        nextSet = listIndex - (imageList.length - 1) + i + 2;
                    }
                }

                // create new slider item
                let newItem = document.createElement('li');
                let newImg = imageList[nextSet];

                let clone = newImg.cloneNode();

                clone.setAttribute('tabindex', '0');
                clone.classList.remove('galleryImage');
                clone.classList.add('sliderImage');

                newItem.appendChild(clone);

                slider.appendChild(newItem);
            }

            slider.classList.add('sliding-transition');

            // move container to the left by width of 1 slide
            setTimeout(() => {
                slider.style.transform = `translateX(-${imgWidth * 6}px)`;
            }, 100);

            // rearrange DOM after transition is complete
            setTimeout(() => {
                slider.classList.remove('sliding-transition');
                slider.style.transform = '';

                for (let i = 0; i < 5; i++) {
                    let child =  sliderImages[i].parentElement;
                    slider.removeChild(child);
                }

            }, 400);

            // fetch slider images again and add event listener
            let newImages = slider.querySelectorAll('.sliderImage');
            newImages.forEach(img => {
                setImageClick(img, newImages);
                U.addEvent(img, 'click', function () {
                    console.log(getIndex(img, newImages));
                })
            })

            listIndex += 5;

            if (listIndex >= imageList.length) {
                listIndex = listIndex - imageList.length;
            }

            U.keebInput();
        },

        backwards: function () {

            let nextSet;
            let sliderImages = document.querySelectorAll('.sliderImage');
            let imgWidth = sliderImages[0].offsetWidth;

            for (let i = 0; i < 5; i++) {
                if (listIndex < 2) {
                    if ((listIndex === 0) && sliderImages[0].src === imageList[imageList.length - 2].src) {
                        listIndex = 0;
                    } else if ((listIndex === 1) && sliderImages[0].src === imageList[imageList.length - 1].src) {
                        listIndex = 1;
                    } else {
                        listIndex = 2;
                    }
                    nextSet = listIndex + (imageList.length - 1) - i - 2;
                } else {
                    nextSet = listIndex - i - 3;
                    if (nextSet < 0) {
                        nextSet = listIndex + (imageList.length - 1) - i - 2;
                    }
                }

                // create new slider item
                let newItem = document.createElement('li');
                let newImg = imageList[nextSet];

                let clone = newImg.cloneNode();

                clone.setAttribute('tabindex', '0');
                clone.classList.remove('galleryImage');
                clone.classList.add('sliderImage');

                newItem.appendChild(clone);
                slider.insertBefore(newItem, slider.firstChild)

            }

            // fetch slider images again and add event listener
            let newImages = slider.querySelectorAll('.sliderImage');
            newImages.forEach(img => {
                setImageClick(img, newImages);
                U.addEvent(img, 'click', function () {
                    console.log(getIndex(img, newImages));
                })
            })

            slider.style.justifyContent = 'flex-end';
            slider.classList.add('sliding-transition');

            // move container to the right by width of 1 slide
            setTimeout(() => {
                slider.style.transform = `translateX(${imgWidth * 6}px)`;
            }, 100);

            // rearrange DOM after transition is complete
            setTimeout(() => {
                slider.style.justifyContent = 'normal';
                slider.style.transform = '';
                slider.classList.remove('sliding-transition');
                for (let i = 5; i < 10; i++) {
                    let child =  newImages[i].parentElement;
                    slider.removeChild(child);
                }
            }, 400);

            listIndex -= 5;
            if (listIndex < 0) {
                listIndex = listIndex + imageList.length;
            }

            U.keebInput();
        }
    }

    // scroll forwards on click
    U.addEvent(U.$('sliderRight'), 'click', function() {
        scrollDir["forwards"]();
    })

    // scroll backwards on click
    U.addEvent(U.$('sliderLeft'), 'click', function() {
        scrollDir["backwards"]();
    })
} // end of sliderNav() function

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

    // U.addEvent(window, 'load', keebImgInput);
    U.addEvent(U.$('blocker'), 'click', closeModal);
    // disable inert attribute with `esc`
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