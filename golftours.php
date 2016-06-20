<?php
  $page_file = "golftours.php";
  $page_file_name = "Golf and Culture Tours";
  require_once("header.php");
?>
<?php
if(isset($_POST['send_form'])) {
  $name = cleanInput($_POST['name']);
  $email = cleanInput($_POST['email']);
  $phone = cleanInput($_POST['phone']);
  $people = cleanInput($_POST['people']);
  $days = cleanInput($_POST['days']);
  $hotel = cleanInput($_POST['hotel']);
  $event_list = cleanInput($_POST['event_input']);
  $info = cleanInput($_POST['info']);

  if($name != "" && $email != "" && $phone != "" && $people != "" && $days != "" && $hotel != "" && $event_list != "" && $info != "") {
    $Register->registerCulture($name, $email, $phone, $people, $days, $hotel, $event_list, $info);
  }

}
?>

<?php
  $page_id = 4;
  $page = $Admin->showPage($page_id);
?>

  <div id="page-id" style="display: none;"><?=$page_id?></div>

				<div class="clearfix"></div>
				<div class="content">

					<div class="col-xs-12 col-sm-4 submenu-col" id="submenu">
						<ul class="submenu">
						  <li><a onclick="$('#golf-and-culture-content').show(); $('#book-a-tour-content').hide();"><img class="submenu-icon" src="images/rahvamuster2.png"><span id="page-1"><?=$page->title;?></span></a></li>
				      <li><a onclick="$('#book-a-tour-content').show(); $('#golf-and-culture-content').hide();"><img class="submenu-icon" src="images/rahvamuster2.png">Book a tour</a></li>
					</div>

					<div class="col-xs-12 col-sm-8">

						<div class="col-xs-12 sisu">
              <?php
                #Success ja error sõnumid
                if(isset($_SESSION['success'])) {
                  echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
                  unset($_SESSION['success']);
                } else if(isset($_SESSION['error'])) {
                  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['success'] . '</div>';
                  unset($_SESSION['error']);
                }
              ?>
							<div class="sisu" id="golf-and-culture-content">
								<h2 class="edit-heading"><?=$page->title;?></h2>

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


							<div id="book-a-tour-content" style="display:none">
							<h2>Book a tour</h2>

							<div class="col-xs-12">
								<form class="form-horizontal custom-input-group" method="post" action="golftours.php">
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Contact person</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" name="name" placeholder="Firstname Lastname">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">E-mail</label>
								  	<div class="col-sm-8">
		      						<input type="email" class="form-control" id="" name="email" placeholder="example@tallest.com">
		    						</div>
									</div>
								  <div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Phone</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" name="phone" placeholder="+46 99 99 99">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Estimated persons</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" name="people" placeholder="6 persons">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Days</label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" name="days" placeholder="14 days">
		    						</div>
									</div>
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Preferred accommodation<!--<p>5*, 4*, SPA hotel, apartments</p>--></label>
								  	<div class="col-sm-8">
		      						<input type="text" class="form-control" id="" name="hotel" placeholder="5*, 4*, SPA hotel, apartments">
		    						</div>
									</div>

                  <div class="form-group">
                    <div class="col-sm-8">
                      <input type="hidden" class="form-control" id="event_input" name="event_input" placeholder="Ignore it! You are not supposed to see it!">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-12">Choose your events</label>
                    <p style="font-size: 11px; padding-left: 15px;">Click for more information</p><br>
                  </div>

                  <!-- Event table -->
                  <div id="event_table">
                    <div id="select_month">
                      <div class="col-sm-2" id="month_back"><span class="glyphicon glyphicon-menu-left"></span></div>
                      <div class="col-sm-8"><span id="event_month"></span> <span id="event_year">2016</span></div>
                      <div class="col-sm-2" id="month_forward"><span class="glyphicon glyphicon-menu-right"></span></div>
                    </div>
                    <table class="table table-responsive table-striped">
                      <thead>
                        <th>#</th>
                        <th>Event</th>
                        <th>
                          <select id="event_type" class="type-select">
                            <option value="All">All</option>
                            <option value="Music">Music</option>
                            <option value="Food">Food</option>
                            <option value="Fashion">Fashion</option>
                          </select>
                        </th>
                        <th>Place</th>
                        <th>Date</th>
                        <th>Time</th>
                      </thead>

                      <tbody id="all_events">

                      </tbody>
                    </table>
                  </div>

									<!--calendar
									<!--<div id="cal">
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
                  <br>-->
										<!--end of calendar-->

									<!-- The Modal
									<div id="modal" class="modal" >
									<!-- Modali sisu
										<div class="modal-content">
											<span id="close">x</span>
											<p id="modalContent"></p>
										</div>
									</div>
									<!-- Modali lõpp -->
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Additional information</label>
								  	<div class="col-sm-8">
		      						<textarea class="form-control" rows="3" name="info" ></textarea>
		    						</div>
									</div>
									<button type="submit" class="btn btn-success btn-form-send" name="send_form">Send</button>
									<button type="button" class="btn btn-danger btn-form-cancel" name="cancel_form">Cancel</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1111">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <span style="font-weight: 600">Type: </span><span id="one_type"></span><br>
            <span style="font-weight: 600">Info: </span><span id="one_info"></span><br>
            <span style="font-weight: 600">Place: </span><span id="one_place"></span><br>

          </div>
          <div class="modal-footer">
            <div class="pull-left">
              <span style="font-weight: 600">Date & time: </span><span id="one_date"></span> <span id="one_time"></span>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<?php
  require_once("footer.php");
?>
