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
	<link rel="stylesheet" type="text/css" href="css/jquery.formstyler.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.formstyler.theme.css">
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<section>
		<!-- Small modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".congratulations">Поздравляем</button>

		<div class="modal fade congratulations" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Поздравляем!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<span class="lilac">Ваш аккаунт успешно создан</span>
						<p>На Ваш Email отправлено письмо с дальнейшими инструкциями</p>
						<button type="button">Проверить Email</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Small modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-register">Регистрация</button>

		<div class="modal fade bd-example-register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Регистрация</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="formGroupExampleInput">Ваш Email</label>
								<input type="email" class="form-control" id="formGroupExampleInput" placeholder="" name="email">
							</div>
							<div class="form-group">
								<div class="input-group">
									<div style="width: 90%;padding: 0px 0px;">
										<label>Ваш Пароль</label>
									<input id="pass" name="password" type="password" class="form-control bbq_license" id="formGroupExampleInput2" placeholder="">
									</div>
									<div style="width: 10%; height: 100%;">
										<input onchange="if ($('#pass').get(0).type=='password') $('#pass').get(0).type='text'; else $('#pass').get(0).type='password';" name="fff" type="checkbox" value="false">
									</div>
								</div>
								
							</div>

							<div class="form-group">
								<div class="input-group">
									<div style="width: 90%;padding: 0px 0px;">
										<label>Повторите Пароль</label>
									<input id="pass2" name="password" type="password" class="form-control bbq_license" id="formGroupExampleInput2" placeholder="">
									</div>
									<div style="width: 10%; height: 100%;">
										<input onchange="if ($('#pass2').get(0).type=='password') $('#pass2').get(0).type='text'; else $('#pass2').get(0).type='password';" name="fff" type="checkbox" value="false">
									</div>
								</div>
							</div>
							<div class="g-recaptcha" data-sitekey="6Lc-fU0UAAAAANVwdFAFllNV2gdVt3Vdn-YqkrQE"></div>
							<button type="button">Регистрация</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Small modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".confirm-login">Подтвердите вход</button>

		<div class="modal fade confirm-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Подтвердите вход</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="formGroupExampleInput">Код СМС</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="login">
							</div>
							<div class="g-recaptcha" data-sitekey="6Lc-fU0UAAAAANVwdFAFllNV2gdVt3Vdn-YqkrQE"></div>
							<button type="button">Вход</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Small modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".remind-password">Напомнить пароль</button>

		<div class="modal fade remind-password" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Напомнить пароль</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="formGroupExampleInput">Ваш Email</label>
								<input type="email" class="form-control" id="formGroupExampleInput" placeholder="" name="email">
							</div>
						  <div class="g-recaptcha" data-sitekey="6Lc-fU0UAAAAANVwdFAFllNV2gdVt3Vdn-YqkrQE"></div>
							<button type="button">Напомнить пароль</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Small modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".to-come-in">Войти как пользователь</button>

		<div class="modal fade to-come-in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Войти как пользователь</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="formGroupExampleInput">Ваш Email</label>
								<input type="email" class="form-control" id="formGroupExampleInput" placeholder="" name="email">
							</div>
							<div class="form-group">	
								<div class="input-group">
									<div style="width: 90%;padding: 0px 0px;">
										<label>Ваш Пароль</label>
									<input id="pass5" name="password" type="password" class="form-control bbq_license" id="formGroupExampleInput2" placeholder="">
									</div>
									<div style="width: 10%; height: 100%;">
										<input onchange="if ($('#pass5').get(0).type=='password') $('#pass5').get(0).type='text'; else $('#pass5').get(0).type='password';" name="fff" type="checkbox" value="false">
									</div>
								</div>
							</div>
							
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="inlineFormCheck">
								<label class="form-check-label" for="inlineFormCheck">
									Запомнить меня
								</label>
								<a href="#" class="form-check-a">Напомнить пароль</a>
							</div>
							<div class="g-recaptcha" data-sitekey="6Lc-fU0UAAAAANVwdFAFllNV2gdVt3Vdn-YqkrQE"></div>
							<button type="button">Вход</button>
						</form>
					</div>
				</div>
			</div>
		</div>


	</section>


	



						

							<footer>
								<div class="bottom-footer">
									<span>© 2018 RUCOIN, АНО Научно-исследовательский институт инновационных технологий.</span>
								</div><!-- -->
							</footer>




               
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
							<!--<script src="js/jquery.formstyler.js"></script>-->
							<script>
								(function($) {
									$(function() {
										$('.modal-content input,.modal-content select').styler({
											selectSearch: true,
										});
									});
								})(jQuery);
							</script>
							<script src="js/jquery.formstyler.min.js"></script>
							
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
									<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

						

</body>
</html>