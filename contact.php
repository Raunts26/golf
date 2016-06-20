<?php
  $page_file = "contact.php";
  $page_file_name = "Contact";
  require_once("header.php");
 ?>
 <?php
   $page_id = 6;
   $page = $Admin->showPage($page_id);
?>

<?php
function send() {
  $msg = "Kas asi töötab nüüd ilusti?!!?!??!?";
  $msg = wordwrap($msg,100);
  mail("raiko.lepik@hotmail.com","Trololololol",$msg);
}





 ?>
  <div id="page-id" style="display: none;"><?=$page_id?></div>
				<div class="clearfix"></div>
				<div class="content">


					<div class="col-sm-6">

            <div id="history-text" class="col-xs-12 sisu-col-12">
              <div id="text-area">
                <?=$page->content;?>
              </div>

              <div id="edit-text" style="display: none">
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    <?=$page->content?>
                </textarea>

                <div class="pull-right">
                  <br>
                  <button class="btn btn-danger" id="cancel_text" name="save_content" onclick="saveArt()">Katkesta</button>
                  <button class="btn btn-success" id="save_text" name="save_content" onclick="saveArt()">Salvesta</button>
                </div>
              </div>

            </div>

		    	</div>
					<div class="col-sm-6 contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028.6600211282027!2d24.769451151700526!3d59.438744609196974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4692935c7ed21b5b%3A0x34ce7211e853036f!2sTallinn+University!5e0!3m2!1sen!2see!4v1465559896418" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
				<div class="clearfix"></div>
				</div><!--content end-->
			</div><!--header end-->
		</div><!--body-wrapper end-->
			</div>
		</div>


 <?php
  require_once("footer.php");
 ?>
