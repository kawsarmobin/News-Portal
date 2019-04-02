$('.post_textarea').keyup(function () {
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
    current.text(characterCount);
    /*This isn't entirely necessary, just playin around*/
    if (characterCount > 300 && characterCount < 349) {
        current.css('color', '#8f0001');
    }
    if (characterCount >= 350) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight', 'bold');
    } else {
        maximum.css('color', '#666');
        theCount.css('font-weight', 'normal');
    }
});

$('.post_title').keyup(function () {
    var characterCount = $(this).val().length,
        current = $('#current_title'),
        maximum = $('#maximum_title'),
        theCount = $('#the-title-count');
    current.text(characterCount);
    /*This isn't entirely necessary, just playin around*/
    if (characterCount >= 70) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight', 'bold');
    } else {
        maximum.css('color', '#666');
        theCount.css('font-weight', 'normal');
    }
});