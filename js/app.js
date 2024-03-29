(function(){
  "use strict";

  var App = function() {

    if(App.instance) {
      return App.instance;
    }

    App.instance = this;
    this.page_id = 0;
    this.contents = "";
    //console.log(App.instance.contents);
    this.init();
    };

    window.App = App;

    App.prototype = {
      init: function() {

        this.listenClick();


      },

      listenClick: function() {

        document.addEventListener("dblclick", function(e) {
          var content = "";
          if(e.target.tagName.toLowerCase() === "h2" && e.target.className.toLowerCase() === "edit-heading") {
            content = e.target.innerHTML;

            document.querySelector("#edit-area").style.display = "table";
            document.querySelector("#edit-title").value = content;
            e.target.style.display = "none";
          } else if(e.target.id.toLowerCase() === "history-text" || e.target.id.toLowerCase() === "text-area" || e.target.parentElement.id.toLowerCase() === "history-text" || e.target.parentElement.parentElement.id.toLowerCase() === "history-text") {


            content = document.querySelector('#text-area').innerHTML;

            document.querySelector("#edit-text").style.display = "block";
            document.querySelector("#text-area").innerHTML = content;
            document.querySelector('#text-area').style.display = "none";
          } else if (e.target.parentElement.id.toLowerCase() === 'golf-area' || e.target.parentElement.parentElement.id.toLowerCase() === 'golf-area' || e.target.id.toLowerCase() === 'golf-area') {
            if(e.target.dataset.id) {
              App.instance.page_id = e.target.dataset.id;
            } else if(e.target.parentElement.dataset.id) {
              App.instance.page_id = e.target.parentElement.dataset.id;
            }
            //console.log(App.instance.page_id);

            $('#myModal').modal('show');

            var id = "";

            if(e.target.id) {
              id = e.target.id;
            }
            else if(document.querySelector("#" + e.target.parentElement.id)) {
              id = e.target.parentElement.id;
            }


            content = document.querySelector("#" + id).innerHTML;
            console.log(content);

            App.instance.contents = content;
            CKEDITOR.instances['editor2'].setData(App.instance.contents);

          } else if(e.target.className.toLowerCase() === "courses-img") {
            if(document.querySelector("#file_upload")) {
              document.querySelector("#file_upload").remove();
            }
            var img_id = e.target.id;
            $('<form action="upload.php" id="file_upload" method="post" enctype="multipart/form-data"><input type=file name="fileToUpload" id="fileToUpload"><input name="course_id" type="hidden" value="' + img_id + '"><input type="submit" value="Lae üles" name="submit"></form>').insertAfter("#" + img_id);

          }
        });

        if(  document.querySelector("#save_title")) {
          document.querySelector("#save_title").addEventListener("click", function() {
            var content = document.querySelector("#edit-title").value;
            var page_id = document.querySelector("#page-id").innerHTML;

            $.ajax({
              url: "inc/ajax.php",
              type: "POST",
              data: {title: content,
                id: page_id,
                save_title: 'yes'},
                success: function(data){
                  document.querySelector("#edit-area").style.display = "none";
                  document.querySelector("h2").style.display = "block";
                  document.querySelector("#edit-title").value = content;
                  document.querySelector("h2").innerHTML = content;
                  document.querySelector("#page-1").innerHTML = content;
                  //console.log(data+"");
                }
              });

            });

        }

        if(document.querySelector("#cancel_title")) {
          document.querySelector("#cancel_title").addEventListener("click", function() {


            document.querySelector("#edit-area").style.display = "none";
            document.querySelector("h2").style.display = "block";



          });

        }

        if(document.querySelector("#save_text")) {

          document.querySelector("#save_text").addEventListener("click", function() {

            var content = document.querySelector("#editor1").value;
            var page_id = document.querySelector("#page-id").innerHTML;

            $.ajax({
              url: "inc/ajax.php",
              type: "POST",
              data: {editor1: content,
                id: page_id,
                save_content: 'yes'},
                dataType: "text",
                success: function(data){
                  document.querySelector("#edit-text").style.display = "none";
                  document.querySelector("#text-area").style.display = "block";
                  document.querySelector("#text-area").innerHTML = content;
                  //console.log(data+"");
                }
              });

            });
        }

        if(document.querySelector("#cancel_text")) {

          document.querySelector("#cancel_text").addEventListener("click", function() {


            document.querySelector("#edit-text").style.display = "none";
            document.querySelector("#text-area").style.display = "block";


          });
        }


        if(document.querySelector("#save_golf")) {

          document.querySelector("#save_golf").addEventListener("click", function() {

            var content = document.querySelector("#editor2").value;
            var page_id = App.instance.page_id;

            console.log(App.instance.page_id);
            $.ajax({
              url: "inc/ajax.php",
              type: "POST",
              data: {editor1: content,
                id: page_id,
                save_content: 'yes'},
                dataType: "text",
                success: function(data){
                  $('#myModal').modal('hide');
                  document.querySelector("#golf-" + App.instance.page_id).innerHTML = content;
                  //console.log(data+"");
                }
              });

            });

        }


      },


    };




}) ();
