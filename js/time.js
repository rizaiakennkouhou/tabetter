document.addEventListener('DOMContentLoaded', function() {
    var splideElements = document.querySelectorAll('.splide');

    for (var i = 0; i < splideElements.length; i++) {
        var splideId = splideElements[i].id;

        new Splide('#' + splideId).mount();
    }
});