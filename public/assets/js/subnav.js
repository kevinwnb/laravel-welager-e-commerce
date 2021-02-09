var x, y, top, left, down;

$(".subnav").mousedown(function(e) {
    e.preventDefault();
    down = true;
    x = e.pageX;
    left = $(this).scrollLeft();
});

$("body").mousemove(function(e) {
    if (down) {
        var newX = e.pageX;

        $(".subnav").scrollLeft(left - newX + x);
    }
});

$("body").mouseup(function(e) {
    down = false;
});
