<html>
	<head>
		<?php
		include("top.html");
		?>
		<title>Carousel</title>

		<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="imgslider.js"></script>
		<link rel="stylesheet" type="text/css" href="imageslider.css">
		<style>
			#shirts div.img-selected {
				border-top:2px solid #CCCCCC;
			}

			#shoes div.img-selected {
				border-bottom:2px solid #CCCCCC;
			}

			#dressup {
				width:500px;
				margin:0 auto;
				box-sizing:border-box;
				border:1px solid #CCCCCC;
			}

			#saveBtnDiv {
				text-align:center;
			}
		</style>
		<script type="text/javascript">


		// Get json data for pants, shirts, and shoes.
		// The data expected is an array of images urls.
		$.get('pants.json', function(data) {
			// imageSlider.setImages(id, array) - Loads array of images to div with id.
			imageSlider.setImages('pants', data);
		}, 'json');

		$.get('shirts.json', function(data) {
			imageSlider.setImages('shirts', data);
		}, 'json');

		$.get('shoes.json', function(data) {
			imageSlider.setImages('shoes', data);
		}, 'json');

		function saveOutfit() {
			var shirt = imageSlider.getSelected('shirts');
			var pants = imageSlider.getSelected('pants');
			var shoes = imageSlider.getSelected('shoes');

			var outfit = {shirt: shirt, pants: pants, shoes: shoes};

			// here is the outfit object with shirt, pants, and shoes URLs.
			// Save this to a database using ana API call. The guy from Meteor can help you here.
			var result = JSON.stringify(outfit);
			alert(result);
		}
		</script>
	</head>
	<body>

<div id="dressup">
	<div id="shirts" class='img-scroll'></div>
	<div id="pants" class='img-scroll'></div>
	<div id="shoes" class='img-scroll'></div>
	<div class='clear-fix'></div>
	<div id="saveBtnDiv">
		<button onclick="saveOutfit();">Save</button>
	</div>
</div>

	</body>
</html>