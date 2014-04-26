// image slider for CodeDay - team BOSS - Tony Bennett - tony@brownpapertickets.com

$(document).ready(function() {
	var images = imageSlider.images;
	for (id in images) {
		imageSlider.showImages(id);
	}
	imageSlider.loaded=true;
});

var imageSlider = {};
imageSlider.effect = null;

imageSlider.nav = function(id,leftRight) {
	$.when(imageSlider.effect).done( function() {
		var $images = $('#' + id + ' div.img-items');
		var marginLeft = parseInt($images.css('marginLeft'));

		// find the widht of images in the slider
		var maxwidth = 0;
		$images.find('img').each(function(index){
			maxwidth+=$(this).width();
		});
		
		if (leftRight === 'left' && (maxwidth+marginLeft) <= 100) return;
		if (leftRight === 'right' && marginLeft === 0) return;
		marginLeft += (leftRight==='left') ? -100 : 100;
		imageSlider.effect = $images.animate({marginLeft: marginLeft}, { duration: 250, queue: true });
	});
};

imageSlider.images = {};

imageSlider.setImages = function(id, value) {
	imageSlider.images[id] = value;
	if (imageSlider.loaded === true) {
		imageSlider.showImages(id);
	}
};

imageSlider.tpl = "\n\
<div class='img-container'>\n\
	<div class='img-items'>@images</div>\n\
</div>\n\
<div class='clear-fix'></div>";

imageSlider.showImages = function(id) {
	var el = document.getElementById(id);
	var items = imageSlider.images[id];

	var images = "";
	for (var i = 0, len=items.length; i < len; i++) {
		images += "<img src='" + items[i] + "'/>"
	}


	var html = imageSlider.tpl.replace(/@id/g,id).replace(/@images/,images);
	el.innerHTML = html;

	$('#' + id + ' div.img-items > img:nth-child(1)').addClass('selected');
	$('#' + id + ' div.img-items > img').click(function() {
		var position = $(this).position();
		var $images = $(this).closest('.img-items');
		var left = position.left;
		$.when(imageSlider.effect).done( function() {
			$images.find('img').removeClass('selected');

			var marginLeft = parseInt($images.css('marginLeft'));
			if (left == 0) {
				marginLeft += 200;
			} else if (left == 100) {
				marginLeft += 100;
			} else if (left == 300) {
				marginLeft -= 100;
			} else if (left == 400) {
				marginLeft -= 200;
			}

			var index = ((marginLeft * -1) / 100) +1;
			$images.find('img:nth-child(' + index + ')').addClass('selected');

			imageSlider.effect = $images.animate({marginLeft: marginLeft}, { duration: 250, queue: true });
		});
	});
};

imageSlider.getSelected = function(id) {
	var src = $('#' + id + ' img.selected').attr('src');
	return src
};

// From stackoverflow.com
// http://stackoverflow.com/questions/5598953/find-elements-that-are-stacked-under-visually-an-element-in-jquery
function GetAllElementsAt(x, y) {
    var $elements = $("body *").map(function() {
        var $this = $(this);
        var offset = $this.offset();
        var l = offset.left;
        var t = offset.top;
        var h = $this.height();
        var w = $this.width();

        var maxx = l + w;
        var maxy = t + h;

        return (y <= maxy && y >= t) && (x <= maxx && x >= l) ? $this : null;
    });

    return $elements;
}
