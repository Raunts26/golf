<?php
  $page_file = "index.php";
  $page_file_name = "Golf in Estonia";
  require_once("header.php");


  $page = $Admin->showPage(1);

  if(isset($_POST['save_content'])) {

    $content = $_POST['editor1'];
    $Admin->editPage("content", $content, 1); // 1 asendada IDga

  } else if(isset($_POST['save_title'])) {
    $title = $_POST['title'];

    $Admin->editPage("title", $title, 1); // 1 asendada IDga
  }

  echo("<h2>" . $page->title . "</h2>");
  echo("<pre>" . $page->content . "</pre>");

 ?>

 <form method="post" action="index.php">

     <textarea name="editor1" id="editor1" rows="10" cols="80">
         <?=$page->content?>
     </textarea>

     <script>
         CKEDITOR.replace( 'editor1' );
     </script>

     <button type="submit" name="save_content">Salvesta</button>

 </form>

 		<div class="body-wrapper">
 			<!--
       <div class="header-mobile-navi">
 				<div class="header-mobile-navi-wrapper">
 					<div class="header-mobile-navi-overlay"></div>
 					<div class="header-mobile-navi-content">
 						<div class="logo"><img src="/images/logo_et.png"></div>
 						<div class="mobile-navi-wrapper">
 							<ul class="navi">

 			            <li><a href="/anneta">Avaleht</a></li>
 			            <li><a href="/toetajad">Meist</a></li>
 			            <li><a href="/tegemised">Golf eesti?</a></li>
 			            <li><a href="/urmelid">Golfi- ja kultuurireisid</a></li>
 			            <li><a href="/uudised">Eesti golfikeskused</a></li>
 			            <li><a href="/toetusfondist">Kontakt</a></li>
 							</ul>
 						</div>
 					</div>
 			  	<div class="header-mobile-navi-close"><a onclick="TOETUSFOND.NAVI.hideMobileNavi()"><span class="icon-cancel-thin"></span></a></div>
 				</div>
 			</div>-->

      <!-- <div class="header-sticky">
 				<div class="header-mobile">
 					<div class="logo"><a href="/"><img src="/images/logo_et.png"></a></div>
 					<div class="menu"><a onclick="TOETUSFOND.NAVI.showMobileNavi()"><span class="icon-menu"></span></a></div>
 				</div>
 				<div class="header-desktop-sticky">
 					<div class="sticky-logo"><a href="/"><img src="/images/logo_et.png"></a></div>
 					<div class="navi-wrapper">
 						<ul class="lang-selector">
 							<li><a href="/en">In English<span class="icon-angle-right"></span></a></li>
 						</ul>
 						<ul class="nav navbar-nav">
 			            <li><a href="/anneta">Avaleht</a></li>
 			            <li><a href="/toetajad">Meist</a></li>
 			            <li><a href="/tegemised">Golf eesti?</a></li>
 			            <li><a href="/urmelid">Golfi- ja kultuurireisid</a></li>
 			            <li><a href="/uudised">Eesti golfikeskused</a></li>
 			            <li><a href="/toetusfondist">Kontakt</a></li>
 						</ul>

 					</div>
 				</div>
 				<div class="back-to-top-btn"><a onclick="TOETUSFOND.NAVI.backToTop()"><img src="/images/back-to-top.png"></a></div>
 			</div>-->

 			<div class="content-wrapper">
 				<div class="content">
 				</div>
 			</div>
 				  <div class="header-desktop">
 				  	<div class="logo"><a></a></div>
 						<div class="navi-wrapper">
 							<ul class="lang-selector lang-selector-white">
 				        <li><a href="/en">In English<span class="icon-angle-right"></span></a></li>
 							</ul>
 							<ul class="nav navbar-nav desktopmenyy">
 				            <li><a href="#anneta">Avaleht</a></li>
 				            <li><a href="#meist">Meist</a></li>
 				            <li><a href="#tegemised">Golf eesti?</a></li>
 				            <li><a href="#urmelid">Golfi- ja kultuurireisid</a></li>
 				            <li><a href="#uudised">Eesti golfikeskused</a></li>
 				            <li><a href="#toetusfondist">Kontakt</a></li>
 							</ul>
 						</div>
 					</div>

 					<div class="clearfix"></div>

 					<div id="meist" class="meist-wrapper">
 						<div class="meist-content">
 							<div class="col-xs-12"><h2 class="text-center">MEIST</h2></div>
 							<div class="col-xs-12 col-sm-6 text-col">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat. Aliquam tempor condimentum diam eget cursus. Phasellus et dui a sapien tempus hendrerit eget vitae nisl. Aenean congue viverra mi eget congue. Sed malesuada viverra pharetra. Ut eu nulla in nibh aliquet sagittis. Pellentesque et vulputate justo. Vivamus ornare nulla nec dolor eleifend ultrices. Suspendisse in lacinia ipsum. Aenean nec vestibulum ante. Nam semper nec nunc id pellentesque.
 							</div>
 							<div class="col-xs-12 col-sm-6"><img class="sisu-pilt" src="images/suvapilt.jpeg"></div>
 						</div>
 					</div>

 					<div class="golfeesti-wrapper">
 						<div class="golfeesti-content">
 							<div class="col-xs-12"><h2 class="text-center">GOLF EESTI?</h2></div>
 							<div class="col-xs-12 col-sm-6 text-col"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat. Aliquam tempor condimentum diam eget cursus. Phasellus et dui a sapien tempus hendrerit eget vitae nisl. Aenean congue viverra mi eget congue. Sed malesuada viverra pharetra. Ut eu nulla in nibh aliquet sagittis. Pellentesque et vulputate justo. Vivamus ornare nulla nec dolor eleifend ultrices. Suspendisse in lacinia ipsum. Aenean nec vestibulum ante. Nam semper nec nunc id pellentesque.</p>
 							</div>
 							<div class="col-xs-12 col-sm-6">
 								<p>Pellentesque efficitur nec enim ut sollicitudin. Aliquam erat volutpat. Maecenas sed congue nibh. Curabitur scelerisque erat nulla, sit amet gravida sapien tincidunt non. Maecenas vitae lacinia quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac arcu tortor.

 								Maecenas ac nibh eget est elementum pellentesque. Proin ipsum nisi, mattis eu justo eget, porta tristique nibh. Sed gravida dui sed augue sollicitudin rhoncus. Aenean leo diam, commodo id fermentum mollis, blandit vitae odio. Curabitur scelerisque nisi congue ligula accumsan porttitor. Nulla eu leo commodo leo congue sollicitudin in gravida nunc. Phasellus id ultricies nisi.
 								</p>
 							</div>
 							<div class="col-xs-12"><img class="sisu-pilt" src="images/suvapilt.jpeg" style="height:200px;"></div>
 						</div>
 					</div>

 					<div class="kultuurireisid-wrapper">
 						<div class="kultuurireisid-content">
 							<div class="col-xs-12"><h2 class="text-center">GOLFI- JA KULTUURIREISID</h2></div>
 							<div class="col-xs-12 col-sm-6 text-col">
 								<h3>Rühmadele</h3>
 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
 								<h3>Individuaalne</h3>
 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
 							</div>
 							<div class="col-xs-12 col-sm-6"><img class="sisu-pilt" src="images/suvapilt.jpeg"></div>
 						</div>
 					</div>

 					<div class="golfikeskused-wrapper">
 							<div class="col-xs-12"><h2 class="text-center">EESTI GOLFIKESKUSED</h2></div>
 							<iframe src="https://www.google.com/maps/d/embed?mid=1OlVatktlUHO5n_cywddjBnHBzec" width="100%" height="500"></iframe></div>
 							<!--<div class="col-xs-12 col-sm-6">
 								<img class="sisu-pilt" src="images/suvapilt.jpeg">
 								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
 							</div>

 							<div class="col-xs-12 col-sm-6">
 								<img class="sisu-pilt" src="images/suvapilt.jpeg">
 								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
 							</div>

 							<div class="col-xs-12 col-sm-6">
 								<img class="sisu-pilt" src="images/suvapilt.jpeg">
 								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
 							</div>

 							<div class="col-xs-12 col-sm-6">
 								<img class="sisu-pilt" src="images/suvapilt.jpeg">
 								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
 							</div>-->
 						</div>
 					</div>


 					<div class="kontakt-wrapper">
 						<div class="kontakt-content">
 							<div class="col-xs-12"><h2 class="text-center">KONTAKT</h2></div>
 							<div class="col-xs-12 col-sm-6 text-col">
 								<h4>GOLF OÜ</h4>
 								<h4>Puu 1, Oks 2, Tallinn</h4>
 								<h4>+372 1234 5678</h4>
 								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum.</p>
 							</div>
 							<div class="col-xs-12 col-sm-6"><img class="sisu-pilt" src="images/suvapilt.jpeg"></div>
 					</div>

<?php
  require_once("footer.php");
 ?>
