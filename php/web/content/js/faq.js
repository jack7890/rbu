(function(win, doc) {

	var container = $('#faq-1');
	var speed = 200;

	$('#faq-1 dt').click(function() {
		var self = $(this);
		if (!self.hasClass('active')) {
			container.find('dd').slideUp(speed);
			container.find('dt').removeClass('active');
			self.addClass('active');
			self.next('dd').slideDown(speed);
		} else {
			self.removeClass('active').next('dd').slideUp(speed);
		}
	});

})(window, document);