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
	<link rel="stylesheet" type="text/css" href="lkstyle.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<title>Rucoin личный кабинет</title>

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
	<div class="container-fluid">
		<div class="row d-flex align-items-stretch">
			@include('sidebar')
			<div class="col-lg-10  lk-body">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid justify-content-between container-nav">
			<a class="navbar-text" href="#"><h3>Личный кошелек</h3></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

				<ul class="navbar-nav">  

					
				</ul>
				<ul class="navbar-nav right-nav">               
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Ссылки
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a href="https://explorer.thepower.io" class="dropdown-item" target="_blank">Blockchain Explorer</a>
              <a href="https://www.coingecko.com/en/coins/rucoin" class="dropdown-item" target="_blank">Coingecko</a>
              <a href="https://coinmarketcap.com/currencies/rucoin/#charts" class="dropdown-item" target="_blank">Coinmarketcap</a>
              <a href="https://bitinfocharts.com/top-100-richest-rucoin-addresses.html" class="dropdown-item" target="_blank"">Richest Addresses</a>
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
					<li class="nav-item options-menu">
						<a class="nav-link" href="options.blade.php"></a>
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
								<center><p style="color: #d7bc91;">More charts: <a href="https://bittrex.com/Market/" target="_blank"><span style="color: #d7bc91;">BITTREX </span></a>;
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

						</div><!--col-lg-4-->


						
					
						
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
										</div><!--col-lg-4-->


										
										<div class="col-lg-4">
											<div class="textwidget-header">
												<i class="fa fa-twitter" aria-hidden="true"></i>Twitter
											</div><!--textwidget-header-->
											<div class="news-twitter">
												<a class="twitter-timeline" data-theme="dark" data-tweet-limit="20" href="https://twitter.com/RuCoin2017?ref_src=twsrc%5Etfw">Tweets by RuCoin2017</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8" style="background-color: transparent!important;"></script>
											</div><!--news-twitter-->
										</div><!--col-lg-4-->

										</div><!--row-->
									</div><!--box-->
								</div><!--row-->
							</div><!--container-->

							<div class="send-top container-fluid justify-content-between">
								<div class="row">
									<div class="col-lg-12">
										<div class="send-top-left">
											<table class="send-top-left1">
												<tr>
													<td><span>0.00000000 RLC</span></td>
												</tr>
												<tr>
													<td>0.00000000 BTC</td>
												</tr>
												<tr>
													<td>0.00000000 ETH</td>
												</tr>
											</table>
											<table class="send-top-left2">
												<tr>
													<td>ID кошелька <span>{{"ID".$wallet->id}}</span></td>
												</tr>
												<tr>
													<td>Номер кошелька <span>{{$wallet->text_address}}</span>
														<img src="images/lk/namber-purse.png" alt=""></td>
													</tr>
													<tr>
														<td>Баланс: <span>{{$wallet->balance}}</span></td>
													</tr>
												</table>
											</div>
										
										<div class="send-top-right">
											<div class="send-top-kode">
											<a href="#"><img src="images/lk/short-kod.png" alt=""></a>
											<a href="#"><img src="images/lk/shtrich-kod.png" alt=""></a>
											<a href="#"><img src="images/lk/gray-circle.png" alt=""></a>
										</div>
											<table>
												<tr>
													<td><span>USD 0.00</span></td>
													
												</tr>
												<tr>
													<td><span>EUR 0.00</span></td>
													
												</tr>
												<tr>
													<td>Транзакций: <span>{{$transCountAll}}</span></td>
													
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
								<div class="import-wrap container-fluid">
								<div class="row">
									<div class="col-lg-12 personal-wallet">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Транзакции</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Комментарии</a>
											</li>
										
										</ul>
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
												<div class="row">
															<div class="col-lg-6">
										<div class="title-table"><span>Последние {{$transCount}} из {{$transCountAll}} операций</span></div>
									</div><!--col-lg-6-->
									<div class="col-lg-6">
										<div class="filter-table">
											<span><i class="fa fa-search" aria-hidden="true"></i>
											Активность</span><button type="submit">View all</button>
										</div><!--filter-table-->
									</div><!--col-lg-6-->
									<div class="col-lg-12" style="overflow-x: scroll;">
								@if($transCount !== 0)
									@include('transactions')
													@else
                                                <div>"Нет транзакций"</div>
													@endif
								</div><!--col-lg-12-->
												</div><!--row-->
											</div><!--tab-pane-->
											<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
												<div class="row">
													<div class="col-lg-12">
													@if($transCount !== 0)
													@foreach($transactions as $transaction)
													@if(is_null($transaction->comment))
                                                <p>Нет комментария</p>
												@continue
													@endif
                                                <p>{{$transaction->comment}}</p>
													@endforeach
													@else
                                                <p>Нет комментариев</p>
													@endif
												  </div><!--col-lg-3 lk-form-->
												</div><!--row-->
											</div><!--tab-pane-->

										</div>
									</div>
									
								</div><!--row-->
							</div><!--lk-content-->


						

							<div class="send-bottom container-fluid ">
								<div class="row justify-content-between">
										<a href="get.html" class="col"><i class="fa fa-download" aria-hidden="true"></i>Получить</a>
										<a href="#" class="col"><i class="fa fa-line-chart" aria-hidden="true"></i>активность</a>
										<a href="send.html" class="col"><i class="fa fa-paper-plane" aria-hidden="true"></i>отправить</a>
										<a href="#" class="col"><i class="fa fa-signal" aria-hidden="true"></i>Статистика</a>
										<a href="#" class="col"><i class="fa fa-retweet" aria-hidden="true"></i>Внутренний обмен</a>
								</div>
							</div>







<style>
/* fix = code from bootstrap 3 */
tbody.collapse.in {
  display: table-row-group;
}
</style>






			</div>
		</div>
	</div>
							@include('footer')
							<div class="scrollup">
								<div class="fa-wrap">
									<i class="fa fa-angle-double-up" aria-hidden="true"></i>
								</div>
							</div>

							<!-- Optional JavaScript -->
							<!-- jQuery first, then Popper.js, then Bootstrap JS -->
							<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
							
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

						

</body>
</html>