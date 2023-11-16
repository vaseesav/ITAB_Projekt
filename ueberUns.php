<?php
include 'assets/php/head.php';
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<!-- <link rel="stylesheet" href="assets/css/login-style.css" /> -->
		<link rel="stylesheet" href="assets/css/ueberUns-style.css">
		<title>Über Uns</title>
	</head>
	<body>
	<div class="leitbild">Online-Plattform, auf der Privatpersonen ihre Räumlichkeiten und Flächen für unterschiedlichste Events in ihrer Umgebung anbieten können, und gleichzeitig Privatpersonen, die nach solchen Räumlichkeiten suchen, diese bequem finden und buchen können</div>

		<div id="js-preloader" class="js-preloader">
			<div class="preloader-inner">
				<span class="dot"></span>
				<div class="dots">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>

		<!-- Header Start-->
		<?php include("assets/php/header.php"); ?>
		<!-- Header End -->

		<!-- Header Mobile -->
		<?php 
 	 	include 'assets/php/mobileHeader.php'; 
  		?>
		<!-- Header Mobile End -->

		<!-- Panel Body Start -->

<div class="teamDiv" style="text-align:center">Unser Team</div>
<div class="row-team">
	<div class="column">
		<div class="card">
		<img src="assets/images/Cruncher6.png" alt="Jan" style="width:100%">
		<div class="teamcontainter">
			<h2>Jan Krüger</h2>
			<p class="title">Back-End Programmierer</p>
			<p>Jan ist unser junges Programmier-Talent. Mit nur 17 Jahren bringt er frische und innovative Ansichten in unsere technische Umsetzung. Seine Leidenschaft für das Programmieren und seine Fähigkeiten sind beeindruckend und tragen wesentlich dazu bei, dass "mieteinander" technisch auf dem neuesten Stand ist. </p>
			<br>
			<br>
			<br>
			<br>
            <div class="email-button-container">
                <p>jan@example.com</p>
                <p><button class="button">Contact</button></p>
            </div>
		</div>
		</div>
	</div>

	<div class="column">
		<div class="card">
		<img src="assets/images/Cruncher6.png" alt="Jan" style="width:100%">
		<div class="teamcontainter">
			<h2>Kilian Woldt</h2>
			<p class="title">Back-End Programmierer</p>
			<p>Kilian bringt Erfahrung und eine technische Expertise mit. Seine Programmierkenntnisse sind von unschätzbarem Wert für die technische Stabilität und Leistungsfähigkeit von "mieteinander". Er ist engagiert und arbeitet an der Weiterentwicklung der Plattform, um sicherzustellen, dass sie den Bedürfnissen unserer Nutzer gerecht wird.</p>
			<br>
			
			<br>
            <div class="email-button-container">
                <p>kilian@example.com</p>
                <p><button class="button">Contact</button></p>
            </div>
		</div>
		</div>
	</div>

	<div class="column">
		<div class="card">
		<img src="assets/images/Cruncher6.png" alt="Annika" style="width:100%">
		<div class="teamcontainter">
			<h2>Annika With</h2>
			<p class="title">Vorstandsvorsitzende und Designerin</p>
			<p>Annika ist die treibende Kraft hinter "mieteinander". Mit einem Hintergrund in Design und Kreativität bringt sie frische Ideen und Ästhetik in die Plattform ein. Als Geschäftsführerin hat sie die Vision und das Engagement, die die Plattform antreiben. Ihre Fähigkeiten in Design und Benutzererfahrung sind von unschätzbarem Wert, um "mieteinander" zu einem ansprechenden und benutzerfreundlichen Ort zu machen.</p>
            <br>
            <div class="email-button-container">
                <p>annika@example.com</p>
                <p><button class="button">Contact</button></p>
            </div>
		</div>
		</div>
	</div>
	<div class="column">
		<div class="card">
		<img src="assets/images/Cruncher6.png" alt="Mohammad" style="width:100%">
		<div class="teamcontainter">
			<h2>Mohammad Salim</h2>
			<p class="title">Vize-Vorstandsvorsitzender und Projektleiter</p>
			<p>Mohammad ist der strukturierte Kopf hinter "mieteinander". Als Vize-Geschäftsführer und Projektleiter ist er für die reibungslose Umsetzung unserer Vision verantwortlich. Mit einem Auge fürs Detail und der Fähigkeit, komplexe Projekte zu koordinieren, spielt er eine zentrale Rolle bei der Entwicklung und Umsetzung unserer Plattform. Er ist auch der kreative Kopf hinter vielen unserer Layouts und Designs.</p>
            <div class="email-button-container">
                <p>mohammad@example.com</p>
                <p><button class="button">Contact</button></p>
            </div>
		</div>
		</div>
	</div>
	<div class="column">
		<div class="card">
		<img src="assets/images/Cruncher6.png" alt="John" style="width:100%">
		<div class="teamcontainter">
			<h2>Leon Schulz</h2>
			<p class="title">Programmierer - Der Visionär</p>
			<p>Leon ist ein weiteres junges Talent in unserem Team und der kreative Kopf hinter der Idee von "mieteinander". Seine Begeisterung für Technologie und sein visionäres Denken haben die Grundlagen für unsere Plattform gelegt. Mit 19 Jahren bringt er eine frische Perspektive und innovative Ideen ein. Seine Vision, Raumknappheit entgegenzuwirken und gemeinschaftliche Ressourcennutzung zu fördern, ist der Antrieb unserer Plattform. </p>
            <div class="email-button-container">
                <p>leon@example.com</p>
                <p><button class="button">Contact</button></p>
            </div>
		</div>
		</div>
	</div>
</div> 
		<!-- Panel Body End -->

        <br>
        <br>
        <br>
        <br>
        <br>





		<!--Footer Start-->
        <?php
 	 	    include 'assets/php/footer.php';
  		?>
		<!--Footer End-->

		<!-- Scripts -->
		<!-- <script src="assets/js/login.js"></script> -->
		<script src="assets/js/main.js"></script>
		<script src="assets/js/navColor.js"></script>
	</body>
</html>
