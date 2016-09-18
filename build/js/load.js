jQuery(document).ready(function($) {

    var $window = $(window),
        pageHeight = $(document).height();

    $window.scroll(function() {
		var scroll = $window.scrollTop();

        // if(scroll > (pageHeight * .8)) {
        //     $('.load-more a').click();
        // }
    });

    $('.load-more a').on('click', function(e) {
        e.preventDefault();

        $('.articles').append(
            $("<div>").load( $(this).attr('href') + ' .articles' );
        );
    });

});