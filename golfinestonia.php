

<?php

  $page_file = "golfinestonia.php";
  $page_file_name = "Golf in estonia";
  require_once("header.php");

?>

<?php
  $page_id = 2;
  $page = $Admin->showPage($page_id);

  if(isset($_SESSION['logged_id'])) {

  }

  //golf courses edit page_id's
  $page_id10 = 10;
  $page10 = $Admin->showPage($page_id10);

  $page_id11 = 11;
  $page11 = $Admin->showPage($page_id11);

  $page_id12 = 12;
  $page12 = $Admin->showPage($page_id12);

  $page_id13 = 13;
  $page13 = $Admin->showPage($page_id13);

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
						  <div class="u-smartClear col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img.jpg">

                <div class="sisu" id="golf-and-culture-content">

                  <div id="golf-area" class="col-xs-12 sisu-col-12 golf">
                    <div id="golf-10" class="golf-area" data-id="10">
                      <?=$page10->content;?>
                    </div>
                  </div>

                </div>

						  </div>
						  <div class="u-smartClear col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img2.jpg">

                <div class="sisu" id="golf-and-culture-content">

                  <div id="golf-area" class="col-xs-12 sisu-col-12 golf">
                    <div id="golf-11" class="golf-area" data-id="11">
                      <?=$page11->content;?>
                    </div>
                  </div>

                </div>

						  </div>
              <div class="clearfix"></div>

						  <div class="u-smartClear col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img2.jpg">

                <div class="sisu" id="golf-and-culture-content">

          				<div id="golf-area" class="col-xs-12 sisu-col-12 golf">
                    <div id="golf-12" class="golf-area" data-id="12">
          			  	  <?=$page12->content;?>
                    </div>
                  </div>

      				  </div>

						  </div>
						   <div class="u-smartClear col-xs-12 col-sm-6 golf-couses-block">
						  	<img class="courses-img" src="images/courses-img.jpg">

						  	<div class="sisu" id="golf-and-culture-content">

          				<div id="golf-area" class="col-xs-12 sisu-col-12 golf">
                    <div id="golf-13" class="golf-area" data-id="13">
          			  	  <?=$page13->content;?>
                    </div>
                  </div>

      				  </div>

					    </div>
						  </div>
						</div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Golfiklubi muutmine</h4>
                  </div>
                  <div class="modal-body">

                    <div id="edit-golf-text">
                      <textarea name="editor2" id="editor2" rows="10" cols="80">

                      </textarea>



                    </div>


                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" id="cancel_golf" name="save_golf" onclick="saveArt2()"  data-dismiss="modal">Katkesta</button>
                    <button class="btn btn-success" id="save_golf" name="save_golf" onclick="saveArt2()">Salvesta</button>
                  </div>
                </div>
              </div>
            </div>

					</div>
				</div><!--content lõpp-->
			</div><!--header-sisuleht lõpp-->
		</div><!--body-wrapper lõpp-->


		<div class="clearfix"></div>

<?php require_once("footer.php");?>
