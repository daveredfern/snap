jQuery(document).ready(function($) {

	// selectors
	var $window = $(window),
		$body = $('html'),
		$panel = $('.panel'),
		oldCount = 1,
		newCount = 1;
	
	$window.on('scroll', function() {
		var scroll = $window.scrollTop() + ($window.height() / 2),
            count = 0; 

		$('.panel').each(function() {
			var $this = $(this);
			if($this.position().top <= scroll && $this.position().top + $this.height() >= scroll) {
				newCount = count;
			}
            count++;
		}); 

		if(newCount !== oldCount) {
			$('.panel').removeClass('is-active');
			$('.panel:eq(' + newCount + ')').addClass('is-active');
			$body.css('background-color', $('.panel:eq(' + newCount + ')').data('bg-color'));
			oldCount = newCount;
		}
	}).scroll();

    $('.articles').jscroll({
        padding: 20,
        nextSelector: '.load-more a:last',
        contentSelector: '.articles',
        autoTrigger: true
    });
	
});