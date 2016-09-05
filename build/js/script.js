$(document).ready(function() {

	// selectors
	var $window = $(window),
		$body = $('body'),
		$panel = $('.article'),
		oldCount = 1,
		newCount = 1;
	
	$(window).scroll(function() {
		var scroll = $window.scrollTop() + ($window.height() * .5); 

		$panel.each(function() {
			var $this = $(this);
			if ($this.position().top <= scroll && $this.position().top + $this.height() > scroll) {
				newCount = $this.index();
			}
		}); 

		if(newCount !== oldCount) {
			$('.article').removeClass('is-active');
			$('.article:eq(' + (newCount - 1) + ')').addClass('is-active');
			$body.css('background-color',$('.article:eq(' + (newCount - 1) + ')').data('bg-color'));
			oldCount = newCount;
		}
	}).scroll();
	
});