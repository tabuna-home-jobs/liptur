$(".reset-form").click(function () {
    $(this).closest('form').find("input[type=text], textarea").val("");
    $(this).closest('form').find("input[type=radio]").prop('checked', false);


    $(this).closest('form').find("input[name=distance]").val(1);
    $('.slider-handle').css('left', '0');
    $('.slider-selection').css('width', '0');

});