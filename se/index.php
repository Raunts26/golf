<?php
  $page_file = "index.php";
  $page_file_name = "Home";
  require_once("header_desktop.php");
?>
<?php
  $page_id1 = 31;
  $page1 = $Admin->showPage($page_id1);
  $page_id2 = 32;
  $page2 = $Admin->showPage($page_id2);
?>

					<div class="clearfix"></div>

					<div class="content">
							<div class="col-xs-12 col-sm-4 golf-courses-block">
							<div class="fixed-height-img">
						  	  <img id="courses-1" class="courses-img" src="images/courses/courses-1.jpg">
							</div>

              <div class="sisu" id="golf-and-culture-content">

                <div id="golf-area" class="col-xs-12 sisu-col-12 golf">
                  <div id="golf-31" class="golf-area" data-id="31">
                    <?=$page1->content;?>
                  </div>
                </div>

              </div>

						</div>
						<div class="col-xs-12 col-sm-4 golf-courses-block">
							<div class="fixed-height-img">
						  	  <img id="courses-2" class="courses-img" src="images/courses/courses-2.jpg">
							</div>

              <div class="sisu" id="golf-and-culture-content">

                <div id="golf-area" class="col-xs-12 sisu-col-12 golf">
                  <div id="golf-32" class="golf-area" data-id="32">
                    <?=$page2->content;?>
                  </div>
                </div>

              </div>

						</div>
						<div class="col-xs-12 col-sm-4 golf-courses-block">
																					<!--calendar-->
									<!--<h3 class="text-center">Cultural events calendar</h3>-->
									<div id="cal" class="index-calendar">
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
									<div id="modal2" class="modal2" >
									<!-- Modali sisu -->
										<div class="modal2-content">
											<span id="close">x</span>
											<p id="modalContent"></p>
										</div>
									</div>
									<!-- Modal end -->
							</div>
							<!--<div class="col-xs-12 col-sm-4 golf-courses-block">
							<div class="fixed-height-img">
						  	<img class="courses-img" src="images/vabaohumuuseum.jpeg">
							</div>
						  <h4>Incentive tours</h4>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
							<a href="#">Read more..</a>
						</div>
						<div class="col-xs-12 col-sm-4 golf-courses-block">
							<div class="fixed-height-img">
						  	<img class="courses-img" src="images/piritaklooster.jpeg">
							</div>
						  <h4>Golf courses</h4>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
							<a href="#">Read more..</a>
						</div>
						<div class="col-xs-12 col-sm-4 golf-courses-block">
							<div class="fixed-height-img">
						  	<img class="courses-img" src="images/piritaklooster.jpeg">
							</div>
						  <h4>Golf courses</h4>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat.</p>
							<a href="#">Read more..</a>
						</div>-->

					<div class="clearfix"></div>

					</div><!--body wrapper end-->
					</div><!--content end-->

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1111">
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
                  <button class="btn btn-danger" id="cancel_golf" name="save_golf" onclick="saveArt2()" data-dismiss="modal">Katkesta</button>
                  <button class="btn btn-success" id="save_golf" name="save_golf" onclick="saveArt2()">Salvesta</button>
                </div>
              </div>
            </div>
          </div>

<?php
  require_once("footer.php");
?>
