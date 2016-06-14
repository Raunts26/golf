<?php
  $page_file = "incentivetours.php";
  $page_file_name = "Culture and Incentive Tours";
  require_once("header.php");
?>

<?php
  $page_id = 4;
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

					<div class="col-xs-12">
						<div  id="golf-and-culture-content">
              <h2><?=$page->title;?></h2>

              <div id="edit-area" class="input-group" style="display: none;">
                <input id="edit-title" name="title" type="text" class="form-control">
                <span class="input-group-btn">
                  <button id="cancel_title" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove"></span></button>
                  <button id="save_title" class="btn btn-default" type="button"><span class="glyphicon glyphicon-ok"></span></button>
                </span>
              </div>


				<div id="history-text" class="col-xs-12 content-col-12">
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
		      						<input type="email" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">E-mail</label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
								  <div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Phone</label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Osalejate arv</label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Päevade arv</label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Hotellieelistus<p>5*, 4*, SPA hotel, apartments</p></label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" placeholder="Name">
		    						</div>
									</div>
									<!--calendar-->
									<div id="cal"> 
									    <div class="header"> 
											<span class="left button" id="previous"> &lang; </span> 
											<span class="month-year" id="month-year"></span>
											<span class="right button" id="next"> &rang; </span>
									    </div> 
									    <table id="days"> 
											<td>Mon</td> 
											<td>Tue</td> 
											<td>Wed</td> 
											<td>Thu</td> 
											<td>Fri</td>
											<td>Sat</td> 
											<td>Sun</td> 
									    </table> 
									    <div id="cal-frame"> 
											<table id="table"> 
													
											</table>
									    </div> 
									</div>
									<!--end of calendar-->
									<!-- The Modal -->
									<div id="modal" class="modal" >
									<!-- Modali sisu -->
										<div class="modal-content">
											<span id="close">x</span>
											<p id="modalContent"></p>
										</div>
									</div>
									<!-- Modali lõpp -->
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
