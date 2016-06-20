(function(){
  "use strict";

  var Timetable = function() {

    if(Timetable.instance) {
      return Timetable.instance;
    }

    this.months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    this.selected = [];
    this.d = new Date();
    this.m = this.d.getMonth();
    this.y = this.d.getFullYear();
    this.event_type = "All";
    this.monthly_events = [];

    Timetable.instance = this;

    this.init();
    };

    window.Timetable = Timetable;

    Timetable.prototype = {

      init: function() {

        this.changeDate();
        this.addMonth();

        if(document.querySelectorAll(".event_check")) {
          document.addEventListener("click", Timetable.instance.saveEvent);
        }

        if(document.querySelector("#event_type")) {
          document.addEventListener("change", function() {
            Timetable.instance.event_type = document.querySelector("#event_type").value;
            Timetable.instance.getEventsDB();
        });
      }

      document.addEventListener("click", this.openModal.bind(this));



      },

      addMonth: function() {

        if(document.querySelector("#month_back")) {

            document.querySelector("#month_back").addEventListener("click", function() {
              Timetable.instance.m--;
              if(Timetable.instance.m < 0) {
                Timetable.instance.m = 11;
                Timetable.instance.y--;
              }
              Timetable.instance.changeDate();

            });
        }

        if(document.querySelector("#month_forward")) {
          document.querySelector("#month_forward").addEventListener("click", function() {

            Timetable.instance.m++;
            if(Timetable.instance.m > 11) {
              Timetable.instance.m = 0;
              Timetable.instance.y++;
            }
            Timetable.instance.changeDate();

          });
        }


      },

      changeDate: function() {
        if(document.querySelector("#event_month")) {
          document.querySelector("#event_month").innerHTML = this.months[this.m];
        }
        if(document.querySelector("#event_year")) {
          document.querySelector("#event_year").innerHTML = this.y;

        }
        this.getEventsDB();

      },

      getEventsDB: function() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              Timetable.instance.monthly_events = JSON.parse(xmlhttp.responseText);
              if(document.querySelector("#all_events")) {
                var t = document.querySelector("#all_events");


                t.innerHTML = "";

                if(Timetable.instance.monthly_events.length > 0) {

                  for(var i = 0; i < Timetable.instance.monthly_events.length; i++){
                    var exists = false;
                    var row  = t.insertRow(0);
                    row.setAttribute("data-id", Timetable.instance.monthly_events[i].id);
                    var column1  = row.insertCell(0);
                    var column2  = row.insertCell(1);
                    var column3  = row.insertCell(2);
                    var column4  = row.insertCell(3);
                    var column5  = row.insertCell(4);
                    var column6  = row.insertCell(5);

                    if(Timetable.instance.selected.length > 0) {
                     for(var j = 0; j < Timetable.instance.selected.length; j++) {
                       if(Timetable.instance.monthly_events[i].id === parseInt(Timetable.instance.selected[j])) {
                         column1.innerHTML = "<input class='event_check' type='checkbox' value='" + Timetable.instance.monthly_events[i].id + "' checked></td>";

                         exists = true;
                       }
                     }
                     if(exists === false) {
                       column1.innerHTML = "<input class='event_check' type='checkbox' value='" + Timetable.instance.monthly_events[i].id + "'></td>";
                     }
                   } else {
                     column1.innerHTML = "<input class='event_check' type='checkbox' value='" + Timetable.instance.monthly_events[i].id + "'></td>";

                   }

                    column2.innerHTML = Timetable.instance.monthly_events[i].name;
                    column3.innerHTML = Timetable.instance.monthly_events[i].type;
                    column4.innerHTML = Timetable.instance.monthly_events[i].place;
                    column5.innerHTML = Timetable.instance.monthly_events[i].date;
                    column6.innerHTML = Timetable.instance.monthly_events[i].time;


                  }

                } else {
                  t.innerHTML = "No events found!";

                }
            }

            }
        };


        if(document.querySelector("#page-id") && document.querySelector("#page-id").innerHTML === "4") {
          xmlhttp.open("GET", "../inc/ajax.php?incentivelist&month=" + (this.m + 1) + "&year=" + this.y + "&type=" + this.event_type, true);

        } else {
          xmlhttp.open("GET", "../inc/ajax.php?eventlist&month=" + (this.m + 1) + "&year=" + this.y + "&type=" + this.event_type, true);

        }
        xmlhttp.send();
      },

      saveEvent: function(e) {
      	if(e.target.className.toLowerCase() === "event_check") {
      		var exists = false;

      		if(e.target.checked === true) {
      			for(var i = 0; i < Timetable.instance.selected.length; i++) {
      				if(e.target.value === Timetable.instance.selected[i]) {
      					exists = true;
      				}
      			}

      			if(exists === false) {
      				Timetable.instance.selected.push(e.target.value);
      			}

      		} else {
      			for(var i = 0; i < Timetable.instance.selected.length; i++) {
      				if(e.target.value === Timetable.instance.selected[i]) {
      					Timetable.instance.selected.splice(i, 1);
      				}
      			}
      		}

      		document.querySelector("#event_input").value = Timetable.instance.selected;
      	}
      },

      openModal: function(e) {
        if(e.target.parentElement.tagName === "TR" && e.target.parentElement.dataset.id !== undefined) {
          for(var i = 0; i < this.monthly_events.length; i++) {

            if(parseInt(e.target.parentElement.dataset.id) === this.monthly_events[i].id) {


              document.querySelector(".modal-title").innerHTML = this.monthly_events[i].name;
              document.querySelector("#one_type").innerHTML = this.monthly_events[i].type;
              document.querySelector("#one_info").innerHTML = this.monthly_events[i].text;
              document.querySelector("#one_place").innerHTML = this.monthly_events[i].place;
              document.querySelector("#one_date").innerHTML = this.monthly_events[i].date;
              document.querySelector("#one_time").innerHTML = this.monthly_events[i].time;

            }
          }
          $('#myModal').modal('show');

        }
      }






    };



}) ();
