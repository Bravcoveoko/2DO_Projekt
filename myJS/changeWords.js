$(function () {
    let count = 0;
    let words = [" life", " work", " future", " day"];

    setInterval(function () {
        let obj = $('#words');

        obj.fadeOut(400, function () {
            $(this).text(words[count++]).fadeIn(400);
            if (count >= 4) count = 0;
        });

    }, 2000);
})
