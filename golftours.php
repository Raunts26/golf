<?php
  $page_file = "golftours.php";
  $page_file_name = "Golf and Culture Tours";
  require_once("header.php");
?>
 
<?php
  $page_id = 3;
  $page = $Admin->showPage($page_id);
?>

  <div id="page-id" style="display: none;"><?=$page_id?></div>
  
				<div class="clearfix"></div>
				<div class="content">
				
					<div class="col-xs-12 col-sm-4 submenu-col">
						<ul class="submenu">
						  <li><a onclick="$('#golf-and-culture-content').show(); $('#book-a-tour-content').hide();"><img class="submenu-icon" src="images/rahvamuster.png"><span id="page-1"><?=$page->title;?></span></a></li>
				      <li><a onclick="$('#book-a-tour-content').show(); $('#golf-and-culture-content').hide();"><img class="submenu-icon" src="images/rahvamuster.png">Book a tour</a></li>
					</div>

					<div class="col-xs-12 col-sm-8">

						<div class="col-xs-12 sisu">
							<div class="sisu" id="golf-and-culture-content">
								<h2><?=$page->title;?></h2>

              <div id="edit-area" class="input-group" style="display: none;">
                <input id="edit-title" name="title" type="text" class="form-control">
                <span class="input-group-btn">
                  <button id="cancel_title" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove"></span></button>
                  <button id="save_title" class="btn btn-default" type="button"><span class="glyphicon glyphicon-ok"></span></button>
                </span>
              </div>


				<div id="history-text" class="col-xs-12 sisu-col-12">
                <div id="text-area">
						  	  <?=$page->content;?>
                </div>

                <div id="edit-text" style="display: none">
                  <textarea name="editor1" id="editor1" rows="10" cols="80">
                      <?=$page->content?>
                  </textarea>

                  <script>
                    function saveArt()
                    {
                        for (instance in CKEDITOR.instances) {
                            CKEDITOR.instances[instance].updateElement();
                        }


                     }
                      CKEDITOR.replace( 'editor1' );
                      /*var new_height = document.querySelector("#text-area").offsetHeight;
                      var editor = CKEDITOR.replace('editor1', { height: new_height });*/
                  </script>
                  <div class="pull-right">
                    <br>
                    <button class="btn btn-danger" id="cancel_text" name="save_content" onclick="saveArt()">Katkesta</button>
                    <button class="btn btn-success" id="save_text" name="save_content" onclick="saveArt()">Salvesta</button>
                  </div>
                </div>
				</div>
					</div>
								
								
							<div id="book-a-tour-content" style="display:none">
							<h2>Book a tour</h2>


							<div class="col-xs-12">
								<form class="form-horizontal custom-input-group">
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Name</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">E-mail</label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" placeholder="E-mail">
		    						</div>
									</div>
								  <div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Phone</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" placeholder="Phone number">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Osalejate arv</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" placeholder="...">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Päevade arv</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" placeholder="...">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Hotellieelistus<p>5*, 4*, SPA hotel, apartments</p></label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" placeholder="...">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Lisainfo</label>
								  	<div class="col-sm-8">
		      						<textarea class="form-control" rows="3"></textarea>
		    						</div>
									</div>
									<button type="submit" class="btn btn-success btn-form-send" name="sendForm">Send</button>
									<button type="button" class="btn btn-danger btn-form-cancel" name="cancelForm">Cancel</button> 
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		

 
<?php
  require_once("footer.php");
?>