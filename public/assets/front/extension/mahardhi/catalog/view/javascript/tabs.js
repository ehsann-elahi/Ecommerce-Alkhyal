$.fn.mttabs = function() {
	var selector = this;

	this.each(function() {
		var obj = $(this);

		$(obj.attr('href')).hide();

		obj.click(function() {
			$(selector).removeClass('selected');

			$(this).addClass('selected');

			$($(this).attr('href')).fadeIn();

			$(selector).not(this).each(function(i, element) {
				$($(element).attr('href')).hide();
			});
			// 
			setTimeout(function() {
				$('.product-carousel').each(function () {
					if ($(this).is(":visible")) {
						if ($.fn && $.fn.slick && $(this).slick) $(this).slick('resize');
					}
				});
			}, 250);
			return false;
		});
	});

	$(this).show();

	$(this).first().click();
};
