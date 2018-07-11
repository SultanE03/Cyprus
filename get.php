

<html>
<head><title>Weather<?php echo $_GET['q']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<style>
#ac{
	color: white;
	margin-top: -120px;
}
#az{
	color: white
}
b p{
	color: 	#DC143C
}
</style>
<body>

<?php
error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
date_default_timezone_set($get['timezone']);
$city = $_GET['q'];
 $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=f0f1ac6c9fc362d8bc1d489caf825179";
 $data = json_decode(file_get_contents($string),true);

 $temp = $data['main']['temp'];

 $icon = $data['weather'][0]['icon'];
 $visibility = $data['visibility'];
 $visibilitykm = $visibility / 1000;
 $country =  "<h1 class='w3-xxxlarge'><b>".$data['name'].",".$data['sys']['country']."</h1></b>";

 $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
 $desc = "<b><p>".$data['weather'][0]['description']."</p></b>";

 $temperature =  "<b>Temp:".$temp."°C</b><br>";
?>

	<div class="w3-display-container w3-wide">
		<img src="http://aboutkazakhstan.com/blog/wp-content/uploads/2016/05/astana-at-night-kazakhstan-1.jpg" style="width:100%;height:100%;" class="w3-image">
		  <div class="w3-display-topmiddle w3-margin-top">

				<?php
				echo $country;
				echo $logo;
				echo "<center><h2>".$desc."</h1></center>";
				?>

		  </div>

	<div id="ac" class="w3-display-middle ">
<h1  class="w3-xlarge">
<?php echo $temperature; ?>
			</h2>
		</div>

	</div>

	</div>

</body>
</html>
