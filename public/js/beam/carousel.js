(function () {
// setup your carousels as you normally would using JS
// or via data attributes according to the documentation
// http://getbootstrap.com/javascript/#carousel
    $('#main-carousel').carousel({interval: false});
}());

(function () {
    $('.carousel-showmanymoveone .item').each(function () {
        var itemToClone = $(this);
        var numberOfImages = $('#numberOfImages').val();
        for (var i = 1; i < numberOfImages; i++) {
            itemToClone = itemToClone.next();

            // wrap around if at end of item collection
            if (!itemToClone.length) {
                itemToClone = $(this).siblings(':first');
            }

            // grab item, clone, add marker class, add to collection
            itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
        }
    });
}());