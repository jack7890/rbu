(function(win, doc) {

	var defaultUrl = $('#categories a:first').attr('href');

	$('#categories').stick_in_parent({
		parent: $('#causes-2')
	});

	$('#categories-mobile').change(function(e) {
		var obj = $('#categories a[href="' + $(this).val() + '"]');
		var href = obj.attr('href');
		loadData(obj, href);
	});

	if (history && history.pushState) {

		$('#categories li a').click(function(e) {
			e.preventDefault();
			var obj = $(this);
			var href = obj.attr('href');
			loadData(obj, href);
			history.pushState({ href: href }, null, href);
		});

		function loadData(obj, href) {
			href = obj.attr('href');
			$('#causes').addClass('loading').load(href + ' #causes .cause-container', function() {
				$(this).removeClass('loading');
				$(doc.body).trigger("sticky_kit:recalc");
				obj.parent().addClass('selected').siblings().removeClass('selected');
				$('#categories-mobile').val(href);
				$('html, body').animate({
					scrollTop: $('#causes-2 .header').offset().top + 'px'
				}, 'fast');
			});
		}

		win.onpopstate = function(e) {
			var obj;
			var href;
			if (e.state && e.state.href) {
				href = e.state.href;
			}
			if (href) {
				obj = $('#categories a[href="' + href + '"]');
				loadData(obj, href);
			}
		}

		if (win.location.pathname.match(/causes\/?/)) {
			history.replaceState({ href: defaultUrl });
		}

	}

})(window, document);