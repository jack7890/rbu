$(document).ready(function() {
	var loop = setTimeout(togglePledgePane, 15000);

	$('.pledged').click(togglePledgePane);

	function togglePledgePane() {
		clearTimeout(loop);
		$('.pledged').toggleClass('obscured');
		loop = setTimeout(togglePledgePane, 15000);
	}

	if ($('input[type="checkbox"]').length > 0) {
		$('input[type="checkbox"]').iCheck();
	}
});