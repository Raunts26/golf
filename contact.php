<?php
  $page_file = "contact.php";
  $page_file_name = "Contact";
  require_once("header.php");
 ?>

<?php
function send() {
  $msg = " TestTestTestTestTestTest";
  $msg = wordwrap($msg,100);
  mail("raiko.lepik@hotmail.com","My subject",$msg);
}

send();



 ?>

				<div class="clearfix"></div>

				<div class="content">
				<div class="clearfix"></div>

				<div class="content">
					<div class="col-sm-6">
						<h3>Tekkis küsimus? Võta meiega ühendust!</h3>
						<p><b>TallEst Incentive Travels OÜ</b></p>
		    		<p>Reg nr. 2020020220202</p>
		    		<p>Puu 1 oks 2, 12213 Tallinn</p>
		    		<p>info@tallest.com</p>
		    		<p>+372 1234 5678</p>
		    	</div>
					<div class="col-sm-6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028.6600211282027!2d24.769451151700526!3d59.438744609196974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4692935c7ed21b5b%3A0x34ce7211e853036f!2sTallinn+University!5e0!3m2!1sen!2see!4v1465559896418" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>

				</div><!--content lõpp-->
			</div><!--header-sisuleht lõpp-->
		</div><!--body-wrapper lõpp-->
			</div>
		</div>
		<div class="clearfix"></div>

 <?php
  require_once("footer.php");
 ?>
