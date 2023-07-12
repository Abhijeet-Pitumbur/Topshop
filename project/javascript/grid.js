// Abhijeet Pitumbur - Topshop 2023
function sticktothetop() {
	var t = $("#stick-here"),
		i = $(".elemento-stick"),
		e = $(window).scrollTop();
	t.offset().top < e ? (i.addClass("sticky"), t.height(i.outerHeight())) : (i.removeClass("sticky"), t.height(0))
}
jQuery(function (t) {
	t(window).scroll(sticktothetop), sticktothetop()
}), $("#sidebar-fixed").theiaStickySidebar({
	minWidth: 991,
	updateSidebarHeight: !0,
	additionalMarginTop: 90
}), $(".filters-listing .dropdown-menu .filter-type ul").on("click", function (t) {
	t.stopPropagation()
}), $("a.open-filters").on("click", function () {
	$(".filter-col").toggleClass("show"), $("main").toggleClass("freeze"), $(".layer").toggleClass("layer-is-visible")
});
var $headingFilters = $(".filter-type h4 a");
$headingFilters.on("click", function () {
	$(this).toggleClass("opened")
}), $headingFilters.on("click", function () {
	$(this).toggleClass("closed")
});