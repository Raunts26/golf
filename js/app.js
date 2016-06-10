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

      },




      // 2 COMMIT LÕPP







    };


    window.onload = function() {
      var app = new App();

    };





}) ();
