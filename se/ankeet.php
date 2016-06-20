
<?php

  $page_file = "ankeet.php";
  $page_file_name = "Golf & culture";
  require_once("header.php");

?>

				<div class="content">
				<div class="clearfix"></div>
					<div class="col-xs-12 col-sm-4 submenu-col">
						<ul class="submenu">
						  <li><a onclick="$('#golf-and-culture-content').show(); $('#book-a-tour-content').hide();"><img class="submenu-icon" src="images/rahvamuster.png">Golf & culture tours</a></li>
				      <li><a onclick="$('#book-a-tour-content').show(); $('#golf-and-culture-content').hide();"><img class="submenu-icon" src="images/rahvamuster.png">Book a tour</a></li>
					</div>

					<div class="col-xs-12 col-sm-8">

						<div class="col-xs-12 sisu">
							<div class="sisu" id="golf-and-culture-content">
								<h2>Golf & culture</h2>
								<div class="col-xs-12 sisu-col-12">
							  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat. Aliquam tempor condimentum diam eget cursus. Phasellus et dui a sapien tempus hendrerit eget vitae nisl. Aenean congue viverra mi eget congue. Sed malesuada viverra pharetra. Ut eu nulla in nibh aliquet sagittis. Pellentesque et vulputate justo. Vivamus ornare nulla nec dolor eleifend ultrices. Suspendisse in lacinia ipsum. Aenean nec vestibulum ante. Nam semper nec nunc id pellentesque.</p>
							  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat. Aliquam tempor condimentum diam eget cursus. Phasellus et dui a sapien tempus hendrerit eget vitae nisl. Aenean congue viverra mi eget congue. Sed malesuada viverra pharetra. Ut eu nulla in nibh aliquet sagittis. Pellentesque et vulputate justo. Vivamus ornare nulla nec dolor eleifend ultrices. Suspendisse in lacinia ipsum. Aenean nec vestibulum ante. Nam semper nec nunc id pellentesque.</p>
							  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus luctus massa quis vestibulum. Morbi sagittis lobortis interdum. Duis augue nisi, molestie eu tortor quis, molestie imperdiet erat. Aliquam tempor condimentum diam eget cursus. Phasellus et dui a sapien tempus hendrerit eget vitae nisl. Aenean congue viverra mi eget congue. Sed malesuada viverra pharetra. Ut eu nulla in nibh aliquet sagittis. Pellentesque et vulputate justo. Vivamus ornare nulla nec dolor eleifend ultrices. Suspendisse in lacinia ipsum. Aenean nec vestibulum ante. Nam semper nec nunc id pellentesque.</p>
								</div>
							</div>
							<div class="sisu" id="book-a-tour-content" style="display:none">
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
									<div class="form-group">
								  	<label for="" class="col-sm-4 control-label">Lisainfo</label>
								  	<div class="col-sm-8">
		      						<textarea class="form-control" rows="3"></textarea>
		    						</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

<?php require_once("footer.php"); ?>
