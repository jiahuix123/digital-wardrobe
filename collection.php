<html>
	<head>
		<title>Carousel</title>
		<link rel="stylesheet" href="main.css" type="text/css">
		<!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
				/**
				* for each menu element, on mouseenter, 
				* we enlarge the image, and show both sdt_active span and 
				* sdt_wrap span. If the element has a sub menu (sdt_box),
				* then we slide it - if the element is the last one in the menu
				* we slide it to the left, otherwise to the right
				*/
                $('#sdt_menu > li').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'170px',
							'height':'170px',
							'left':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'140px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'170px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '170px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-170px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'25px'},500);
				});
            });
        </script>
		<style>
			span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:12px;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				text-shadow:1px 1px 1px #000;
				margin-right:30px;
			}
			span.reference a:hover{
				color:#ddd;
			}
			ul.sdt_menu{
				margin-top:82px;
			}
		</style>
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
	<body class="front not-logged-in page-home no-sidebars right">
		<div id="top">
				<ul id="sdt_menu" class="sdt_menu">
					<li>
					<span class="sdt_active"></span>
					<span class="sdt_wrap">
					<span class="sdt_link">
					<a href="main.html">HOME</a></span>
					<span class="sdt_descr">MY STATUS</span></span>	
					</li>

				  	<li>
				  	<span class="sdt_active"></span>
					<span class="sdt_wrap">
					<span class="sdt_link">
						<a href="collection.html">COLLECTION</a></span>
					<span class="sdt_descr">Discover your outfits</span>
					 </span>
				  	</li>
					
					<li>
				  	<span class="sdt_active"></span>
					<span class="sdt_wrap">
					<span class="sdt_link">
          			<a href="community.php">FRIENDS</a></span>
					<span class="sdt_descr">Discover your community</span></span>
					</li>
					
					<li>
					<span class="sdt_active"></span>
					<span class="sdt_wrap">
						<span class="sdt_link">Settings</span>
						<span class="sdt_descr">My account</span></span> 
					</li>
				</ul>
			</div>
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