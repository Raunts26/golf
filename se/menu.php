<div class="body-wrapper">
	<div class="content-wrapper">

		<?php if($page_file == "index.php"): ?>
			<div class="header-desktop">
		<?php else: ?>
			<div class="header-content-page">
		<?php endif; ?>

			<nav class="navbar navbar-default golf-navbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" onclick="$('#submenu').toggle();" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><img class="nav-logo" src="images/TallEst_logo.png"></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="navi-wrapper">
							<ul class="lang-selector lang-selector-white">
						        <li>
						        	<a href="/se"><img class="lang-flags" src="images/se.png"></a><a href="../index.php"><img class="lang-flags" src="images/gb.png"></a><a href="/ru"><img class="lang-flags" src="images/ru.png"></a>
						        </li>
							</ul>
							<ul class="nav navbar-nav navbar-desktop">
								<li><a href="index.php">Hem</a></li>
								<li><a href="golfinestonia.php">Golf i Estland</a></li>
								<li><a href="golftours.php">Golf & kulturresor</a></li>
								<li><a href="incentivetours.php">Incentiveresor</a></li>
								<li><a href="contact.php">Kontakt</a></li>
							</ul>
							<?php
							if(isset($_SESSION['logged_id'])):
							?><br>
							<ul class="nav navbar-nav navbar-desktop pull-right">
								<li><a href="../admin/culture.php">Kultuuriüritused</a></li>
								<li><a href="../admin/incentive.php">Motivatsiooniüritused</a></li>
							</ul>
							<?php endif; ?>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</div>
			</nav>
		</div>
