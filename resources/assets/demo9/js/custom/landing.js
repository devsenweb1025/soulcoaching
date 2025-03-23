"use strict";

// Class definition
var KTLandingPage = function () {
    // Private methods
    var initTyped = function() {
        var typed = new Typed("#kt_landing_hero_text", {
            strings: ["The Best Theme Ever", "The Most Trusted Theme", "#1 Selling Theme"],
            typeSpeed: 50,
            loop: true
        });
    }

    // Public methods
    return {
        init: function () {
            // initTyped();
            AOS.init({
                once: true
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTLandingPage;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTLandingPage.init();
});
