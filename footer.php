<div class="footer">
  <div class="footer-content">
    <div class="col-xs-12 col-sm-4"><img class="nav-logo footer-logo" src="images/TallEst_logo.png" style="height:150px"></div>
    <div class="col-xs-12 col-sm-8">
      <p>TallEst Incentive Travels OÜ</p>
      <p>Reg nr. 2020020220202</p>
      <p>info@tallest.com</p>
      <p>+372 1234 5678</p>
      <p><a href="admin" style="color: #333">Sisene<span class="glyphicon glyphicon-chevron-right"></span></a></p>
    </div>
  </div>
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script src="js/functions.js"></script>
<?php if(isset($_SESSION['logged_id'])):?>
<script src="js/app.js"></script>
<script>window.allowed = true;</script>
<?php endif; ?>
<script src="js/calendar.js"></script>
<script src="js/timetable.js"></script>

<script>


    /*window.onload = function() {
      var app = new App();

      init();

    };

    function init() {
      //console.log(App.instance.contents);

    }*/

    if(document.querySelector("#editor1")) {
      function saveArt()
      {
        for (instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
        }


      }

      CKEDITOR.replace( 'editor1' );
      /*var new_height = document.querySelector("#text-area").offsetHeight;
      var editor = CKEDITOR.replace('editor1', { height: new_height });*/

    }

    if(document.querySelector("#editor2")) {

      function saveArt2()
      {
        for (instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
        }


      }
      CKEDITOR.replace( 'editor2');
      /*var new_height = document.querySelector("#text-area").offsetHeight;
      var editor = CKEDITOR.replace('editor1', { height: new_height });*/

    }


</script>


</body>
</html>
