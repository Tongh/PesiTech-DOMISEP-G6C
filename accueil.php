<!DOCTYPE html>

<htlm>
	<head>
		<title>EZ-Home</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/inter.css"/>
		<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css"/>
		<link rel="stylesheet" type="text/css" href="css/swiper.min.css">
		<script type="text/javascript" src="swiper.min.js"></script>
		<script src="https://use.fontawesome.com/e3c7c95da8.js"></script>
	</head>
	<body>

		<!-- Header -->
		<?php
		include 'Header_accueil.html';
		?>

		<div id='DIYbody' style="top: 125px">
			<div class='content'>
				<div class='mainImg'>
					<div class="swiper-container swiper-container-horizontal">
						<div class="swiper-wrapper" style="transform: translate3d(-7680px, 0px, 0px); transition-duration: 0ms;">
							<div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="2"">
								<a href="javascript:;">
									<img style="width: 100%; height: 720px" src="Image/swiper_3D_maison.jpg" alt="Image_3D_maison">
								</a>
							</div>
							<div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0">
								<a href="javascript:;">
									<img style="width: 100%; height: 720px" src="Image/img-accueil.jpg" alt="Domotique"/>
								</a>
							</div>
							<div class="swiper-slide" data-swiper-slide-index="1">
								<a href="javascript:;">
									<img style="width: 100%; height: 720px" src="Image/swiper_maison.jpg" alt="Image_maison">
								</a>
							</div>
							<div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="2">
								<a href="javascript:;">
									<img style="width: 100%; height: 720px" src="Image/swiper_3D_maison.jpg" alt="Image_3D_maison">
								</a>
							</div>
							<div class="swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0">
								<a href="javascript:;">
									<img style="width: 100%; height: 720px" src="Image/img-accueil.jpg" alt="Domotique"/>
								</a>
							</div>
						</div>
						<a href="javascript:;" class="swiper-button-prev"></a>
						<a href="javascript:;" class="swiper-button-next"></a>
						<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
							<span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
							<span class="swiper-pagination-bullet"></span>
							<span class="swiper-pagination-bullet"></span></div>
						</div>
						<script>
							var mySwiper = new Swiper('.swiper-container', {
								autoplay: 4000,//option sélectionné, peut swiper automatiquement
								loop : true,
								prevButton:'.swiper-button-prev',
								nextButton:'.swiper-button-next',
								pagination : '.swiper-pagination',
								autoplayDisableOnInteraction : false,
								paginationClickable :true,
								autoplayDisableOnInteraction : false,
							})
						</script>
					</div>

					<div class="icone">
						<div class="sectionIcone">
							<i class="fa fa-lock fa-5x" aria-hidden="true"></i>
						</br>
						<h4>Assure la sécurité de votre maison</h4>
					</div>

					<div class="sectionIcone">
						<i class="fa fa-fire-extinguisher fa-5x" aria-hidden="true"></i>
					</br>
					<h4>Vous alerte en cas d'incident</h4>
				</div>


				<div class="sectionIcone">
					<i class="fa fa-thermometer-three-quarters fa-5x" aria-hidden="true"></i>
				</br>
				<h4>Contrôle de la température à n'importe quel moment</h4>
			</div>

			<div class="sectionIcone">
				<i class="fa fa-laptop fa-5x" aria-hidden="true"></i>
			</br>
			<h4>Accès à vos informations en ligne</h4>
		</div>

	</div>
</div>
</div>


</div>
<footer class="DIYfooter">
	<nav>
		<div id="barre">
			<ul>
				<li class='adminfooter'>
					<a href="connexion.php"> Interface administrateur </a>
				</li>
				<li class='nouscontacterfooter'>
					<a href="nous_contacter.php"> Nous contacter </a>
				</li>
				<li class='DOMISEPfooter'>
					<a href="domisep.html"> DOMISEP </a>
				</li>
			</ul>
		</div>
		<div>
			<p>
				Developed by PESITech ©
			</p>
			<div>
			</nav>

		</footer>
	</body>
</htlm>
</body>

</htlm>
