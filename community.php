<!DOCTYPE html>
<html>
	<head>
				<meta charset="utf-8">
		<title>WINFO</title>
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
		<link href="community.css" type="text/css" rel="stylesheet" />
	</head>

	<body class="front not-logged-in page-home no-sidebars right">
		<h1>My community's wardrobe</h1>	
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
					<span class="sdt_link">COLLECTION</span>
					<span class="sdt_descr">Discover your outfits</span>
					</span>
						<div class="sdt_box">
							<a href="upload.html">Upload</a>
							<a href="collection.php">Fitting Room</a>
							<a href="collection.html">Fashion</a>
					  	</div>
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
		<div id="allPhotos">
		<!-- Amy -->
		<div class="friend">
			<div>Name: Amy</div>
			<div><img src="images/outfit1.jpg" alt="Amy's outfit" style="width: 300px; height: 250px" /></div>
			<ul class="likeAndComment">
				<li>Like!</li>
				<li>Comments</li>
			</ul>
		</div>	

		<!-- Linda -->
		<div class="friend">
			<div>Name: Linda</div>
			<div><img src="images/outfit2.jpg" alt="Linda's outfit" style="width: 300px; height: 250px"/></div>
			<ul class="likeAndComment">
				<li>Like!</li>
				<li>Comments</li>
			</ul>
		</div>

		<!-- Yuki -->
		<div class="friend">
			<div>Name: Yuki</div>
			<div><img src="images/outfit3.jpg" alt="Yuki's outfit" style="width: 300px; height: 250px"/></div>
			<ul class="likeAndComment">
				<li>Like!</li>
				<li>Comments</li>
			</ul>
		</div>
		</div>
	</body>
</html>