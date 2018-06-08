<!-- ----------Scroll up knapp -------------->
// <button onclick="topFunction()" id="myBtn" title="GÅ til toppen"><span class="glyphicon glyphicon-arrow-up"></span></button> <-- TODO: Dette må på nettsiden


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


<!-- --------------- scroll up knapp ferdig --------------- -->