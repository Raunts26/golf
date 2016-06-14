(function(){
  "use strict";

  var App = function() {

    if(App.instance) {
      return App.instance;
    }

    App.instance = this;

    this.init();
    };

    App.prototype = {
      init: function() {

        this.listenClick();

      },

      listenClick: function() {
        document.addEventListener("dblclick", function(e) {
          var content = "";
          if(e.target.tagName.toLowerCase() === "h2") {
            content = e.target.innerHTML;

            document.querySelector("#edit-area").style.display = "table";
            document.querySelector("#edit-title").value = content;
            e.target.style.display = "none";
          } else if(e.target.id.toLowerCase() === "history-text" || e.target.id.toLowerCase() === "text-area" || e.target.parentElement.id.toLowerCase() === "history-text" || e.target.parentElement.parentElement.id.toLowerCase() === "history-text") {
            content = document.querySelector('#text-area').innerHTML;
            document.querySelector("#edit-text").style.display = "block";
            document.querySelector("#text-area").innerHTML = content;
            document.querySelector('#text-area').style.display = "none";
          }
        });

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

        document.querySelector("#cancel_title").addEventListener("click", function() {


          document.querySelector("#edit-area").style.display = "none";
          document.querySelector("h2").style.display = "block";



        });

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

        document.querySelector("#cancel_text").addEventListener("click", function() {


          document.querySelector("#edit-text").style.display = "none";
          document.querySelector("#text-area").style.display = "block";


        });
      },



    };


    window.onload = function() {
      var app = new App();

    };


}) ();
