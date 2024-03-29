// Abhijeet Pitumbur - Topshop 2023
var HeaderVideo = function (o) {
	var r = {
			container: o(".header-video"),
			header: o(".header-video--media"),
			videoTrigger: o("#video-trigger"),
			videoCloseTrigger: o("#video-close-trigger"),
			teaserVideo: o("#teaser-video"),
			autoPlayVideo: !1
		},
		i = function () {
			return videoDetails = {
				id: r.header.attr("data-video-src"),
				teaser: r.header.attr("data-teaser-source"),
				provider: r.header.attr("data-provider").toLowerCase(),
				videoHeight: r.header.attr("data-video-height"),
				videoWidth: r.header.attr("data-video-width")
			}, videoDetails
		},
		t = function () {
			r.container.data("aspectRatio", videoDetails.videoHeight / videoDetails.videoWidth), o(window).resize(function () {
				var e = o(window).width(),
					i = o(window).height();
				r.container.width(e).height(e * r.container.data("aspectRatio")), i < r.container.height() && r.container.width(e).height(i)
			}).trigger("resize")
		},
		d = function () {
			r.videoTrigger.on("click", function (e) {
				e.preventDefault(), n(), r.videoCloseTrigger.fadeIn()
			}), r.videoCloseTrigger.on("click", function (e) {
				e.preventDefault(), l()
			})
		},
		a = function () {
			if (Modernizr.video && !c()) {
				var e = videoDetails.teaser,
					i = '<video autoplay="true" loop="loop" muted id="teaser-video" class="teaser-video"><source src="' + e + '.mp4" type="video/mp4"><source src="' + e + '.ogv" type="video/ogg"></video>';
				r.container.append(i)
			}
		},
		n = function () {
			r.header.hide(), r.container.append(function () {
				if ("youtube" === videoDetails.provider) var e = '<iframe id="video" src="http://www.youtube.com/embed/' + videoDetails.id + '?rel=0&amp;hd=1&autohide=1&showinfo=0&autoplay=1&enablejsapi=1&origin=*" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
				else if ("vimeo" === videoDetails.provider) e = '<iframe id="video" src="http://player.vimeo.com/video/' + videoDetails.id + '?title=0&amp;byline=0&amp;portrait=0&amp;color=3d96d2&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
				else if ("html5" === videoDetails.provider) e = '<video autoplay="true" loop="loop" id="video"><source src="' + videoDetails.id + '.mp4" type="video/mp4"><source src="' + videoDetails.id + '.ogv" type="video/ogg"></video>';
				return e
			}()), e(), r.teaserVideo.hide()
		},
		l = function () {
			o("#video").remove(), r.teaserVideo.fadeIn(), v(), s()
		},
		e = function () {
			r.videoTrigger && r.videoTrigger.fadeOut("slow")
		},
		v = function () {
			r.videoTrigger && r.videoTrigger.fadeIn("slow")
		},
		s = function () {
			r.videoCloseTrigger.hide()
		},
		c = function () {
			return !!(o(window).width() < 900 && Modernizr.touch)
		};
	return {
		init: function (e) {
			r = o.extend(r, e), i(), t(), d(), r.videoCloseTrigger.hide(), videoDetails.teaser && a(), r.autoPlayVideo && n()
		}
	}
}(jQuery, document);