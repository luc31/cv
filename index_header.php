<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Title site</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vue/css/eatList.css">	
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">	
	<link href="https://fonts.googleapis.com/css?family=Dancing Script" rel="stylesheet">
</head>
<body>



<div class="jumbotron" id="jumb">
<div class="container contenu">
<header>
<div class="container">
	<h1 class="col-sm-3">EatList</h1>
	<ul class="col-sm-9">
		<li class="col-sm-2 mm"><a href="<?=BASE_URL?>index.php?page=home">Accueil</a></li>
		<li class="col-sm-3 mm" id="menubars"><a href="#">Repas du monde</a>
			<div class="col-sm-2 lol" id="ff">
				<!-- <figure class="indicateur"><img src="vue/images/triangle.png"></figure>	 -->
				<figure><a href="#"><img src="vue/images/terre.png"><figcaption>Toutes les recettes</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/allemagne.png"><figcaption>Allemagne</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/amerique.png"><figcaption>Amérique</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/chinois.png"><figcaption>Chinois</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/france.png"><figcaption>France</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/espagne.png"><figcaption>Espagne</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/indien.png"><figcaption>Indien</figcaption></a></figure>
				<figure><a href="#"><img src="vue/images/italie.png"><figcaption>Italie</figcaption></a></figure>
			</div>		
		</li>
		<li class="col-sm-2"><a href="#">Thème</a></li>
		<li class="col-sm-3"><a href="<?=BASE_URL?>index.php?page=addRecette">Création Repas</a></li>
		<li class="col-sm-2"><a href="<?=BASE_URL?>index.php?page=inscription">Inscription</a></li>
	</ul>
</div>	
</header>