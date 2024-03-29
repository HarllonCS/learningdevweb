<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Price Readjuster</title>
	
	<link rel="stylesheet" href="./style.css">
</head>
<body>
	<?php
		$currency = numfmt_create("en", NumberFormatter::CURRENCY);
		$price = $_GET['price'] ?? 0;
		$readjust = $_GET['readjust'] ?? 20;
		$cost = $price + ($price*$readjust/100);
	?>
	<main role="main">
		<h1>Price readjuster</h1>
		
		<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
			<div style="margin-bottom: 16px;">
				<label for="price">Product Price (R$)</label>
				<input type="number" id="price" name="price" min="1" step=".01" value="<?=$price?>" autofocus>
			</div>
			
			<div style="margin-bottom: 16px;">
				<label for="readjust">Readjustment percentage (<span id="percent" style="color: #d895fc;"><?=$readjust?></span>%)</label>
				<input type="range" id="readjust" name="readjust" value="<?=$readjust?>" step=".1">
			</div>
			
			<div style="padding-bottom: 6px;">
				<button type="submit">Readjust</button>
			</div>
		</form>
	</main>
	
	<section>
		<h2>Results</h2>
		
		<div style="margin-top: 10px;">
			<p>Product Price = <span><?=numfmt_format_currency($currency, $price, "BRL")?></span></p>
			<p><span><?=$readjust?>%</span> of Increase = <span><?=numfmt_format_currency($currency, $cost, "BRL")?></span></p>
		</div>
	</section>

	<script src="./script.js"></script>
</body>
</html>