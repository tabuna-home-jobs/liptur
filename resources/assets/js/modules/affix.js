$(document).ready(function () {

    $('.aside-affix').affix({
        offset: {
            top: function () {

                if (document.getElementById('post-header')) {
                    var top = $('#post-header').outerHeight(true)
                } else {
                    var top = 0;
                }

                if (document.getElementById('post-title')) {
                    top += $('#post-title').outerHeight(true)
                }

                //console.log($('#header').outerHeight(true) + top + 15);
                return (this.top = $('#header').outerHeight(true) + top + 15)
            },
            bottom: function () {
                if (document.getElementById('bt-carousel')) {
                    var bottom = $('#bt-carousel').outerHeight(true)
                } else {
                    var bottom = 0;
                }
                if (document.getElementById('comments')) {
                    var comments = $('#comments').outerHeight(true)
                } else {
                    var comments = 0;
                }
                console.log($('#footer').outerHeight(true) + bottom + comments + 130);
                return (this.bottom = $('#footer').outerHeight(true) + bottom + comments + 130)
            }
        }
    })

});

