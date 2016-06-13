

<?php

  $page_file = "golfinestonia.php";
  $page_file_name = "Golf in estonia";
  require_once("header.php");

?>

<?php
  $page_id = 2;
  $page = $Admin->showPage($page_id);
?>

<div id="page-id" style="display: none;"><?=$page_id?></div>


				<div class="clearfix"></div>

				<div class="content">
					<div class="col-xs-12 col-sm-4 submenu-col">
						<ul class="submenu">
						  <li><a onclick="$('#history-content').show(); $('#golfcourses-content').hide();"><img class="submenu-icon" src="images/rahvamuster.png"><span id="page-1"><?=$page->title;?></span></a></li>
				      <li><a onclick="$('#golfcourses-content').show(); $('#history-content').hide();"><img class="submenu-icon" src="images/rahvamuster.png"><span id="page-2">Golf courses</span></a></li>
				     </ul>
					</div>

					<div class="col-xs-12 col-sm-8 sisu">
						<div class="sisu" id="history-content">


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


						<div class="sisu" id="golfcourses-content">
							<h2>Colf courses</h2>
						  <div class="col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img.jpg">
						  	<a href="#"><h4>Niitvälja golf</h4></a>
						  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
						  </div>
						  <div class="col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img2.jpg">
						  	<a href="#"><h4>Pärnu Bay Golf</h4></a>
						  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
						  </div>
						  <div class="col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img2.jpg">
						  	<a href="#"><h4>Pärnu Bay Golf</h4></a>
						  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
						  </div>
						   <div class="col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img.jpg">
						  	<a href="#"><h4>Niitvälja golf</h4></a>
						  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
						  </div>
						</div>
					</div>
				</div><!--content lõpp-->
			</div><!--header-sisuleht lõpp-->
		</div><!--body-wrapper lõpp-->


		<div class="clearfix"></div>

<?php require_once("footer.php");?>
