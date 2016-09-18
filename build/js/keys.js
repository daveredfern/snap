jQuery(document).ready(function($) {

    function nextPost() {
        $('.panel').each(function() {
			var $this = $(this);

			if ($this.position().top > $(document).scrollTop()) {
				$('html, body').clearQueue().animate({
                    scrollTop: $this.position().top
                });
                return false;
			}
		}); 
    }

    function previousPost() {
        var $prev;
        $('.panel').each(function() {
			var $this = $(this);

			if ($this.position().top >= $(document).scrollTop()) {
				$('html, body').clearQueue().animate({
                    scrollTop: $prev.position().top
                });
                return false;
			}

            $prev = $this;
		});
    }

    document.onkeydown = function(e) {
        e = e || window.event;
        switch (e.keyCode) {
        case 37: // left
            previousPost();
            break;
        case 38: // up
            previousPost();
            break;
        case 39: // right
            nextPost();
            break;
        case 40: // down
            nextPost();
            break;
        }
    };

});