
//Get the button:
var Topbtn = $('#ToTopbutton');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        Topbtn.addClass('showbutton');
    } else {
        Topbtn.removeClass('showbutton');
    }
});

Topbtn.on('click', function(e) {
    e.preventDefault();
    scrollToTop();
});
const scrollToTop = () => {
    // Let's set a variable for the number of pixels we are from the top of the document.
    const c = document.documentElement.scrollTop || document.body.scrollTop;
    // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
    // We'll also animate that scroll with requestAnimationFrame:
    // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
    if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        // ScrollTo takes an x and a y coordinate.
        // Increase the '10' value to get a smoother/slower scroll!
        window.scrollTo(0, c - c / 15);
    }
};
