// initialise scripts

astro.init({
    toggleActiveClass: 'active', // Class added to active dropdown toggles on small screens
    navActiveClass: 'active', // Class added to active dropdown content areas on small screens
    initClass: 'js-astro', // Class added to `<html>` element when initiated
    callbackBefore: function ( toggle, navID ) {}, // Function that's run before a dropdown is toggled
    callbackAfter: function ( toggle, navID ) {} // Function that's run after a dropdown is toggled
});

drop.init({
    toggleSelector: '.dropdown', // Class used for the dropdown <li> element
    contentSelector: '.dropdown-menu', // Class used for the dropdown content <div>
    toggleActiveClass: 'active', // Class added to active dropdown toggles
    contentActiveClass: 'active', // Class added to active dropdown content
    initClass: 'js-drop', // Class added to `<html>` element when initiated
    callbackBefore: function ( toggle ) {}, // Function that's run before a dropdown is toggled
    callbackAfter: function ( toggle ) {} // Function that's run after a dropdown is toggled
});

houdini.init({
    toggleActiveClass: 'active', // Class added to active toggle elements
    contentActiveClass: 'active', // Class added to active content elements
    initClass: 'js-houdini', // Class added to `<html>` element when initiated
    callbackBefore: function ( toggle, contentID ) {}, // Function that's run before content is expanded or collapsed
    callbackAfter: function ( toggle, contentID ) {} // Function that's run after content is expanded or collapsed
});

tabby.init({
    toggleActiveClass: 'active', // Class added to active toggle elements
    contentActiveClass: 'active', // Class added to active tab content areas
    initClass: 'js-tabby', // Class added to <html> element when initiated
    callbackBefore: function ( toggle, tabID ) {}, // Function that's run before tab content is toggled
    callbackAfter: function ( toggle, tabID ) {} // Function that's run after tab content is toggled
});

modals.init({
    modalActiveClass: 'active', // Class applied to active modal windows
    modalBGClass: 'modal-bg', // Class applied to the modal background overlay
    offset: 50, // How far from the top of the viewport to offset modal windows in pixels
    callbackBeforeOpen: function ( toggle, modalID ) {}, // Functions to run before opening a modal
    callbackAfterOpen: function ( toggle, modalID ) {}, // Functions to run after opening a modal
    callbackBeforeClose: function () {}, // Functions to run before closing a modal
    callbackAfterClose: function () {} // Functions to run after closing a modal
});

xray.init({
    toggleActiveClass: 'active', // Class added to active password toggle button
    initClass: 'js-x-ray', // Class added to <html> element when initiated
    callbackBefore: function ( toggle, pwID ) {}, // Function that's run before password visibility is toggled
    callbackAfter: function ( toggle, pwID ) {} // Function that's run after password visibility is toggled
});

formSaver.init({
    deleteClear: true, // Boolean. Reload the page after deleting form data.
    saveMessage: 'Saved!', // Message to display when form data is successfully saved.
    deleteMessage: 'Deleted!', // Message to display when form data is successfully deleted.
    saveClass: '', // Class to add to save success message <div>
    deleteClass: '', // Class to add to delete success message <div>
    initClass: 'js-form-saver', // Class added to `<html>` element when initiated
    callbackBeforeSave: function ( btn, form ) {}, // Function to run before a form is saved
    callbackAfterSave: function ( btn, form ) {}, // Function to run after a form is saved
    callbackBeforeDelete: function ( btn, form ) {}, // Function to run before a form is deleted
    callbackAfterDelete: function ( btn, form ) {}, // Function to run after a form is deleted
    callbackBeforeLoad: function ( form ) {}, // Function to run before form data is loaded from storage
    callbackAfterLoad: function ( form ) {} // Function to run after form data is loaded from storage
});

smoothScroll.init({
    speed: 500, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutCubic', // Easing pattern to use
    updateURL: false, // Boolean. Whether or not to update the URL with the anchor hash on scroll
    offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
    callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
    callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
});

rightHeight.init({
    callbackBefore: function ( container ) {}, // Function that runs before content height is adjusted
    callbackAfter: function ( container ) {} // Function that runs after content height is adjusted
});


// slider
    window.sliderInit = (function (window, document, undefined) {

        'use strict';

        // Feature Test
        if ( 'querySelector' in document && 'addEventListener' in window && Array.prototype.forEach ) {

            // SELECTORS
            var sliders = document.querySelectorAll('[data-slider]');
            var mySwipe = Array;


            // EVENTS, LISTENERS, AND INITS

            // Add class to HTML element to activate conditional CSS
            document.documentElement.className += ' js-slider';

            // Activate all sliders
            Array.prototype.forEach.call(sliders, function (slider, index) {

                // SELECTORS

                var slideCount = slider.querySelector('[data-slider-count]'); // Slider count wrapper
                var slideNav = slider.querySelector('[data-slider-nav]'); // Slider nav wrapper


                // METHODS

                // Display count of slides
                var createSlideCount = function () {
                    var slideTotal = mySwipe[index].getNumSlides();
                    var slideCurrent = mySwipe[index].getPos();
                    if ( slideCount !== null ) {
                        slideCount.innerHTML = slideCurrent + ' of ' + slideTotal;
                    }
                };

                // Display Slider navigation
                var createNavButtons = function () {
                    if ( slideNav !== null ) {
                        slideNav.innerHTML = '<a data-slider-nav-prev href="#">Previous</a> | <a data-slider-nav-next href="#">Next</a>';
                    }
                };

                // Stop YouTube, Vimeo, and HTML5 videos from playing when leaving the slide
                var stopVideo = function () {
                    var currentSlide = mySwipe[index].getPos() - 1;
                    var iframe = slider.querySelector( '[data-index="' + currentSlide + '"] iframe');
                    var video = slider.querySelector( '[data-index="' + currentSlide + '"] video' );
                    if ( iframe !== null ) {
                        var iframeSrc = iframe.src;
                        iframe.src = iframeSrc;
                    }
                    if ( video !== null ) {
                        video.pause();
                    }
                };

                // Handle next button
                var handleNextBtn = function (event) {
                    event.preventDefault();
                    stopVideo();
                    mySwipe[index].next();
                };

                // Handle previous button
                var handlePrevBtn = function (event) {
                    event.preventDefault();
                    stopVideo();
                    mySwipe[index].prev();
                };

                // Handle keypress
                var handleKeypress = function (event) {
                    if ( event.keyCode == 37 ) {
                        mySwipe[index].prev();
                    }
                    if ( event.keyCode == 39) {
                        mySwipe[index].next();
                    }
                };


                // EVENTS, LISTENERS, AND INITS

                // Activate Slider
                mySwipe[index] = Swipe(slider, {
                    // startSlide: 2,
                    // speed: 400,
                    // auto: 3000,
                    continuous: true,
                    // disableScroll: false,
                    // stopPropagation: false,
                    callback: function(index, elem) {
                        createSlideCount(); // Update with new position on slide change
                    },
                    // transitionEnd: function(index, elem) {}
                });

                // Create slide count and nav
                createSlideCount();
                createNavButtons();
                var btnNext = slider.querySelector('[data-slider-nav-next]'); // Next slide button
                var btnPrev = slider.querySelector('[data-slider-nav-prev]'); // Previous slide button

                // Toggle Previous & Next Buttons
                if ( btnNext ) {
                    btnNext.addEventListener('click', handleNextBtn, false);
                }
                if ( btnPrev ) {
                    btnPrev.addEventListener('click', handlePrevBtn, false);
                }

                // Toggle Left & Right Keypress
                window.addEventListener('keydown', handleKeypress, false);

            });

        }

    })(window, document);