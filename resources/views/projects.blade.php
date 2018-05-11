<!doctype html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinHTML5.css" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<title>PROJECTS RUCOIN LOYALTY</title>
	<meta name="keywords" content='projects' />
    <meta name="description" content='PROJECTS RUCOIN LOYALTY.' />

	<script type="text/javascript">

		function openbox(id){
			display = document.getElementById(id).style.display;

			if(display=='none'){
				document.getElementById(id).style.display='block';
			}else{
				document.getElementById(id).style.display='none';
			}
		}
	</script>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container justify-content-between container-nav">
			<a class="navbar-brand" href="/"><img src="images/logo.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

				<ul class="navbar-nav">               
					<li class="nav-item active">
						<a class="nav-link" href="/">ГЛАВНАЯ</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							УЗНАЙТЕ БОЛЬШЕ
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="about.blade.php">ABOUT</a>
							<a class="dropdown-item" href="bounties.blade.php">BOUNTY</a>
							<a class="dropdown-item" href="https://boomstarter.ru/projects/ruc/rucoin_-_rossiyskaya_kriptovalyuta" target="_blank">DONATIONS</a>
							<a class="dropdown-item" href="features.blade.php">FEATURES</a>
							<a class="dropdown-item" href="faq.blade.php">FAQ</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.blade.php#brand-blok">БИРЖИ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.blade.php#purse">ЗАГРУЗКИ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="community.blade.php">ПРОЕКТЫ СООБЩЕСТВА <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<ul class="navbar-nav right-nav">               
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Ссылки
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a href="https://explorer.thepower.io" class="dropdown-item" target="_blank">Blockchain Explorer</a>
              <a href="https://www.coingecko.com/en/coins/rucoin" class="dropdown-item" target="_blank">Coingecko</a>
              <a href="https://coinmarketcap.com/currencies/rucoin/" class="dropdown-item" target="_blank">Coinmarketcap</a>
              <a href="https://bitinfocharts.com/top-100-richest-rucoin-addresses.html" class="dropdown-item" target="_blank">Richest Addresses</a>
              <a href="https://ico.ru-coin.com/" class="dropdown-item" target="_blank">Token Sale</a>
              <a href="https://bitcointalk.org/index.php?topic=2534183" class="dropdown-item" target="_blank">BitcoinTalk</a>
		          <a href="https://en.wikipedia.org/wiki/RuCoin" class="dropdown-item" target="_blank">Wikipedia</a>
						</div>
					</li>
					<li class="nav-item dropdown lang-ico">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#"><img src="images/gb.png" alt=""></a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle btn-news" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="openbox('box'); return false">
							Новости
						</a>
					</li>
				</ul>

			</div>

		</nav>
		<div class="container" style="position: relative;">
			<div class="row">
				<div id="box" class="col-lg-12" style="display: none;">
					<a class="news-close" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="openbox('box'); return false">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>
					<div class="row">
						<div class="col-lg-4">
							<div class="dropdown-header"><i class="fa fa-line-chart" aria-hidden="true"></i>Курсы</div>
							<div class="textwidget">
								<script type="text/javascript">
									baseUrl = "https://widgets.cryptocompare.com/";
									var scripts = document.getElementsByTagName("script");
									var embedder = scripts[ scripts.length - 1 ];
									var cccTheme = {"General":{"background":"#333","borderColor":"#545454","borderRadius":"4px 4px 0 0"},"Header":{"background":"#000","color":"#FFF"},"Followers":{"background":"#f7931a","color":"#FFF","borderColor":"#e0bd93","counterBorderColor":"#fdab48","counterColor":"#f5d7b2"},"Data":{"priceColor":"#FFF","infoLabelColor":"#CCC","infoValueColor":"#CCC"},"Chart":{"fillColor":"rgba(86,202,158,0.5)","borderColor":"#56ca9e"},"Conversion":{"background":"#000","color":"#999"}};
									(function (){
										var appName = encodeURIComponent(window.location.hostname);
										if(appName==""){appName="local";}
										var s = document.createElement("script");
										s.type = "text/javascript";
										s.async = true;
										var theUrl = baseUrl+'serve/v1/coin/chart?fsym=BTC&tsym=USD';
										s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
										embedder.parentNode.appendChild(s);
									})();
								</script>

						</div>
							<div class="textwidget">
								<center><p style="color: #d7bc91;">More charts: <a href="https://bittrex.com/Market/Index" target="_blank"><span style="color: #d7bc91;">BITTREX </span></a>;
									<a href="https://www.cryptocompare.com/exchanges/exmo/overview/USD" target="_blank"><span style="color: #d7bc91;"> EXMO  </span></a>;
									<a href="https://www.cryptocompare.com/exchanges/yobit/overview" target="_blank"><span style="color: #d7bc91;"> YOBIT </span></a>
								</p>
							</center>
						</div>

						<div class="textwidget">
							<script type="text/javascript">
								baseUrl = "https://widgets.cryptocompare.com/";
								var scripts = document.getElementsByTagName("script");
								var embedder = scripts[ scripts.length - 1 ];
								(function (){
									var appName = encodeURIComponent(window.location.hostname);
									if(appName==""){appName="local";}
									var s = document.createElement("script");
									s.type = "text/javascript";
									s.async = true;
									var theUrl = baseUrl+'serve/v1/coin/list?fsym=BTC&tsyms=USD,EUR,CNY,GBP';
									s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
									embedder.parentNode.appendChild(s);
								})();
							</script>

						</div>


						
					
						
					</div><!--col-lg-4-->
										<div class="col-lg-4">
											<div class="news-header"><i class="fa fa-rss" aria-hidden="true"></i>
											ЧТО НОВОГО</div>
											<ul class="news-body">
												<li><a href="https://news-factor.ru/category/crypto/39743" target="_blank">Международный блокчейн-форум #DECENTER CRYPTOEVENT
													<span>19.03.2018</span></a>
												</li>
												<li><a href="https://news-factor.ru/category/breaking/38364" target="_blank">Crypto lady-популяризация Блокчейн технологий и криптоиндустрии среди женщин
													<span>09.02.2018</span></a>
												</li>
												<li><a href="https://news-factor.ru/category/tech/38466" target="_blank">Бизнес-форуме INTERNETMOST FORUM SUMMER 2018
													<span>12.02.2018</span></a>
												</li>
												<li><a href="https://vk.com/ru_coin_com?w=wall-151787317_69" target="_blank">Blockchain ExpoFarm выставка криптоферм 2018
													<span>10.02.2018</span></a>
												</li>
												<li><a href="https://news-factor.ru/category/crypto/39051" target="_blank">Креативный мультфильм. Как цыгане Сатоши биткойн продали
													<span>12.02.2018</span></a>
												</li>
												<li><a href="https://news-factor.ru/category/tech/38184" target="_blank">Крупнейший форум-интенсив «Трансформация»
													<span>05.02.2018</span></a>
												</li>
												<li><a href="https://news-factor.ru/category/economy/35665" target="_blank">НИИ Инновационных Технологий подал заявку на регистрацию патента RUCOIN
													<span>01.12.2017</span></a>
												</li>

											</ul>
										</div>

										
										<div class="col-lg-4">
											<div class="textwidget-header">
												<i class="fa fa-twitter" aria-hidden="true"></i>Twitter
											</div>
											<div class="news-twitter">
												<a class="twitter-timeline" data-theme="dark" data-tweet-limit="20" href="https://twitter.com/RuCoin2017?ref_src=twsrc%5Etfw">Tweets by RuCoin2017</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8" style="background-color: transparent!important;"></script>
											</div>
										</div>

										</div>
									</div>
								</div>
							</div>




							<div class="content">
								<div id="large-header" class="large-header-page">
									<canvas id="demo-canvas"></canvas>
									<section class="top-info  ">
										<div class="main-title container-fluid">
											<div class="row">
												<div class="col-lg-12 top-info-text">
													<h3>PROJECTS</h3>
												</div>
											</div><!--row-->
										</div><!--container-->
									</section><!--top-info-->
								</div>
							</div>
				


							<section class="wraper-blok page">
								<div class="top-line">
									<div class="fa-wrap">
										<i class="fa fa-angle-double-down" aria-hidden="true"></i>
									</div><!--fa-wrap -->
								</div><!--top-line -->
								<div class="container">
									<h1>PROJECTS RUCOIN LOYALTY</h1>
									<div class="row">
										<div class="col-lg-12 page-body">
											
											PROJECTS RUCOIN LOYALTY

										</div>
									</div>
									<div class="row purse" id="purse">
										<div class="col-lg-3 col-md-12 offset-lg-1">
											<h3>Мобильный кошелек:</h3>
											<div class="row">
												<div class="col-lg-4 col-md-4">
													<a href="#">
														<img src="images/win-ico.png" alt="">
														<p>v 1.00</p>
													</a>
												</div>
												<div class="col-lg-4 col-md-4">
													<a href="#">
														<img src="images/android-ico.png" alt="">
														<p>v 1.00</p>
													</a>
												</div>
												<div class="col-lg-4 col-md-4">
													<a href="#">
														<img src="images/ios-ico.png" alt="">
														<p>v 1.00</p>
													</a>
												</div>	
											</div>
										</div> 
										<div class="col-lg-1">
											<div class="one-line"></div>
										</div>
										<div class="col-lg-2 col-md-12">
											<h3>Веб-кошелек</h3>
											<a href="#">
												<img src="images/ios-ico.png" alt="">
												<p>v 1.00</p>	
											</a>
										</div> 
										<div class="col-lg-1">
											<div class="one-line"></div>
										</div>
										<div class="col-lg-3 col-md-12">
											<h3>Кошелек для ОС</h3>
											<div class="row">
												<div class="col-lg-4 col-md-4">
													<a href="#">
														<img src="images/win-ico.png" alt="">
														<p>v 1.00</p>
													</a>
												</div>
												<div class="col-lg-4 col-md-4">
													<a href="#">
														<img src="images/android-ico.png" alt="">
														<p>v 1.00</p>
													</a>	
												</div>
												<div class="col-lg-4 col-md-4">
													<a href="#">
														<img src="images/ios-ico.png" alt="">
														<p>v 1.00</p>
													</a>
												</div><!-- -->	
											</div><!--row-->
										</div> <!--col-lg-3 col-md-12 -->
									</div><!--row purse-->
								</div><!--container-->
							</section>

							<footer>
								<div class="top-footer">
									<div class="container">
										<div class="row justify-content-center">
											<div class="col-lg-6">
												<h3>Узнавайте о всех новостях первым</h3>
												<div class="col-lg-12 btn-search">
														<form class="form-inline">
														<div class="form-footer">
															<input id="" placeholder="Ваш Email" type="email" name="address" size="20">
														<button type="submit"  value="Check" name="B1">Подписаться</button>
														</div>
														<div class="g-recaptcha" data-sitekey="6Lc-fU0UAAAAANVwdFAFllNV2gdVt3Vdn-YqkrQE"></div>
													</form>
												</div><!-- -->
												<div class="soc-ico">
													<ul class="d-flex justify-content-between">
														<li><a href="https://www.facebook.com/groups/rucoin/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
														<li><a href="https://twitter.com/RuCoin2017" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
														<li><a href="https://t.me/ru_coin" target="_blank"><i class="fab fa-telegram-plane"></i></a></li>
														<li><a href="https://www.instagram.com/rucoin/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
														<li><a href="https://www.youtube.com/channel/UCN7iKkMetI8bKB0QTiL7r-g" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></a></i></li>
														<li><a href="https://vk.com/ru_coin_com" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
														<li><a href="https://plus.google.com/u/0/116607238113189747117" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
													</ul>
												</div><!-- -->
												<div class="suppot">
													<h4>Support Rucoin</h4>
													<a href="bounties.html">BOUNTY</a>
													<a href="https://boomstarter.ru/projects/ruc/rucoin_-_rossiyskaya_kriptovalyuta" target="_blank">DONATIONS</a>
												</div><!-- -->
											</div><!-- -->
										</div><!-- -->
									</div><!-- -->
								</div><!-- -->
								<div class="bottom-footer">
									<span>© 2018 RUCOIN, АНО Научно-исследовательский институт инновационных технологий.</span>
								</div><!-- -->
							</footer>




               
							<div class="scrollup">
								<div class="fa-wrap">
									<i class="fa fa-angle-double-up" aria-hidden="true"></i>
								</div>
							</div>



							<script src="js/jquery-1.12.3.min.js"></script>
							<script src="js/ion.rangeSlider.js" defer></script>
							<script>

								$(function () {

									$("#range").ionRangeSlider({
										min: 0,
										max: 500000,
										from: 250000,
									});

								});
							</script>

							<!-- Optional JavaScript -->
							<!-- jQuery first, then Popper.js, then Bootstrap JS -->
							<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
							<script src="js/TweenLite.min.js"></script>
							<script src="js/EasePack.min.js"></script>
							<script src="js/demo-1.js"></script>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
							<script src="js/jquery.flexslider.js"></script>
							<script type="text/javascript">
								$(document).ready(function(){
									$("#menu").on("click","a", function (event) {
										event.preventDefault();
										var id  = $(this).attr('href'),
										top = $(id).offset().top;
										$('body,html').animate({scrollTop: top}, 1500);
									});
								});
							</script>
							<script>
								$(function() {
                 // при нажатии на кнопку scrollup
                 $('.scrollup').click(function() {
                 // переместиться в верхнюю часть страницы
                 $("html, body").animate({
                 	scrollTop:0
                 },1000);
               })
               })
                  // при прокрутке окна (window)
                  $(window).scroll(function() {
                  // если пользователь прокрутил страницу более чем на 200px
                  if ($(this).scrollTop()>200) {
                  // то сделать кнопку scrollup видимой
                  $('.scrollup').fadeIn();
                }
                 // иначе скрыть кнопку scrollup
                 else {
                 	$('.scrollup').fadeOut();
                 }
               });
             </script>
							<script type="text/javascript"> 
								function diplay_hide (blockId)

								{ 
									if ($(block).css('display') == 'none') 
									{ 
										$(block).animate({height: 'show'}, 500); 
									} 
									else 
									{     
										$(block).animate({height: 'hide'}, 500); 
									}} 
								</script>

								<script type="text/javascript">
									$(window).load(function() {

  // store the slider in a local variable
  var $window = $(window),
  flexslider = { vars:{} };

  // tiny helper function to add breakpoints
  function getGridSize() {
  	return (window.innerWidth < 700) ? 1 :
  	(window.innerWidth < 900) ? 2 : 
  	(window.innerWidth < 1200) ? 3 : 4;
  }

  $(function() {
  	SyntaxHighlighter.all();
  });

  $window.load(function() {
  	$('.flexslider').flexslider({
  		animation: "slide",
  		animationLoop: true,
  		slideshow: true,
  		touch: true,
  		controlNav: false,
  		directionNav: true,
  		itemWidth: 230,
  		itemMargin: 5,
  		move: 1, 
  		easing: "swing", 
  		itemMargin: 0, 
  		prevText:  "",
  		nextText: "",
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize() // use function to pull in initial value
    });
  });

  // check grid size on resize event
  $window.resize(function() {
  	var gridSize = getGridSize();

  	flexslider.vars.minItems = gridSize;
  	flexslider.vars.maxItems = gridSize;
  });
}());
</script>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'Ia0AMdOmds';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->

</body>
</html>