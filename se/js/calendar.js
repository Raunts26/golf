var months = ['Jaanuar','Veebruar','Märts','Aprill','Mai','Juuni','Juuli','August','September','Oktoober','November','Detsember'];
var monthLengths = [31,28,31,30,31,30,31,31,30,31,30,31];
var timeNow;
var monthNow;
var yearNow;
var dayNow;
var monthShown;
var yearShown;
var dates = [];
var calTable = "";
//identifikaator peaks olema ürituse kuupäev andmebaasist, 14.6.2016 formaadis
//var identifikaator = ["18.06.2016"];
var identifikaator = [];
var modal;
var span;
var selected = [];




window.onload = function(){
	getEvents();
	timeNow = new Date();
	monthNow = timeNow.getMonth();
	yearNow = timeNow.getFullYear();
	dayNow = timeNow.getDate();
	monthShown = monthNow;
	yearShown = yearNow;
	modal = document.getElementById('modal2');
	span = document.getElementById('close');


	if(window.allowed) {

		var app = new App();
	}

	var timetable = new Timetable();


	if(document.getElementById('month-year')) {document.getElementById('month-year').innerHTML = months[monthNow]+' '+yearNow;}
	if(document.getElementById('next')) {document.getElementById('next').addEventListener('click', nextMonth);}
	if(document.getElementById('previous')) {document.getElementById('previous').addEventListener('click', previousMonth);}
	if(document.getElementById('month-year')) {document.getElementById('month-year').addEventListener('click',thisMonth);}

	//document.addEventListener('click', saveEvent);



	//var midaiganes = document.getElementsByClassName('submenu');
	//midaiganes[0].addEventListener('click',thisMonth);
	//thisMonth();
};


function getEvents() {

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			m = JSON.parse(xhttp.responseText);
			for(var i = 0; i < m.length; i++){
				var day = m[i].date.substring(8,12);
				var month = m[i].date.substring(5,7);
				var year = m[i].date.substring(0,4);

				var new_date = day + "." + month + "." + year;

				identifikaator.push(new_date);
				console.log(identifikaator);

			}
			thisMonth();

		}
	};
	xhttp.open("GET", "../inc/ajax.php?get_events", true);
	xhttp.send();
}

//järgmine kuu
function nextMonth(){
	dates = [];
	monthShown++;
	if(monthShown==12){
		monthShown=0;
		yearShown++;
	}
	document.getElementById('month-year').innerHTML = months[monthShown]+' '+yearShown;
	showDates();
	calTable = "";
}

//eelmine kuu
function previousMonth(){
	dates = [];
	monthShown--;
	if(monthShown==-1){
		monthShown=11;
		yearShown--;
	}
	document.getElementById('month-year').innerHTML = months[monthShown]+' '+yearShown;
	showDates();
	calTable = "";
}

//praegune kuu
function thisMonth(){
	dates = [];
	monthShown = monthNow;
	yearShown = yearNow;
	if(document.getElementById('month-year')) {document.getElementById('month-year').innerHTML = months[monthNow]+' '+yearNow;}
	showDates();
	calTable = "";
}

//kuupäevade näitamine
function showDates(){
	//liigaastate kompensatsioon
	if(yearShown%4 != 0){
		monthLengths[1] = 28;
	}else if(yearShown%100 != 0){
		monthLengths[1] = 29;
	}else if(yearShown%400 != 0){
		monthLengths[1] = 28;
	}else{
		monthLengths[1] = 29;
	}

	//Kuupäeva elementide loomine
	for(var i=1;i<=monthLengths[monthShown];i++){
		dates.push(new DateElement(i,monthShown,yearShown));
	}

	//Kalendri tabeli tegemine
	//Eelmise kuu kontroll
	var lastMonth = monthShown-1;
	if(lastMonth < 0){
		lastMonth = 11;
	}
	//millisest nädalapäevast kuu algab ja eelneva kuu päevad tabelisse
	var start = dates[0].elementWeekDay;
	calTable+='<tr>';
	if(start!=0){
		for(var k=1;k<start;k++)
			calTable+='<td class="nil">'+(monthLengths[lastMonth]-start+k+1)+'</td>';
	}else{
		for(var k=1;k<7;k++)
			calTable+='<td class="nil">'+(monthLengths[lastMonth]-7+k+1)+'</td>';
	}
	//kuu päevad tabelisse
	for(var j = 0; j<monthLengths[monthShown] ; j++){
		if((start+j-1)%7==0 && j!=0){
			calTable+='</tr><tr>';
		}
		if(dates[j].elementYear == yearNow && dates[j].elementMonth == monthNow && dates[j].elementDay == dayNow){
			if(dates[j].events==true){
				calTable+='<td class="today events" id="'+dates[j].id+'">'+dates[j].elementDay+'</td>';
			}else{
				calTable+='<td class="today">'+dates[j].elementDay+'</td>';
			}
		}else if(dates[j].events==true){
			calTable+='<td class="events" id="'+dates[j].id+'">'+dates[j].elementDay+'</td>';
		}else{
			calTable+='<td id="'+dates[j].id+'">'+dates[j].elementDay+'</td>';
		}
	}
	if(start == 0){
		start = 7;
	}
	//järgmise kuu päevad tabelisse
	for(var l = monthLengths[monthShown];l<=(42-start);l++){
		if((start+l-1)%7==0){
			calTable+='</tr><tr>';
		}
		calTable+='<td class="nil">'+(l-monthLengths[monthShown]+1)+'</td>';
	}
	calTable+='</tr>';

	if(document.getElementById('table')) {document.getElementById('table').innerHTML = calTable;}


	//üritustele eventlisteneride külge panemine
	var eventElements = document.getElementsByClassName('events');
	//console.log(eventElements);
	for(var m=0;m<eventElements.length;m++){
		var elementID = eventElements[m].id;
		eventElements[m].addEventListener('click',showEvent);
	}
}

//kuupäeva elemendid
function DateElement(day,month,year){
	this.dayID = day;
	if(day<10){
		this.dayID = '0'+day;
	}
	this.monthID = month + 1;
	if(month+1<10){
		this.monthID = '0'+(month+1);
	}
	this.id = this.dayID+'.'+this.monthID+'.'+year;
	this.date = new Date(year,month,day);
	this.elementDay = this.date.getDate();
	this.elementWeekDay = this.date.getDay();
	this.elementMonth = this.date.getMonth();
	this.elementYear = this.date.getFullYear();
	//identifikaator = andmebaas
	for(var i=0;i<identifikaator.length;i++){
		if(this.id==identifikaator[i]){
			this.events = true;
			//eventText on selle identifikaatori(ürituse) juures olev tekst
			this.eventText = '<div id="event_data" class="checkbox"></div>';
		}
	}
}

//Ürituse välja näitamine
function showEvent(e){
	for(var i=0;i<dates.length;i++){
		if(dates[i].id === e.target.id){
			var content = dates[i].eventText;
		}
	}
	document.getElementById('modalContent').innerHTML = content;
	getData(e.target.id);

	// Ava modal
    modal.style.display = "block";

	// Sulge modal spannile vajutades
	span.onclick = function() {
		modal.style.display = "none";
	}

	// Sulge modal kui kasutaja klikib kuhugi mujale
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
}

function getData(date) {
	var year = date.substring(6,12);
	var month = date.substring(5,3);
	var day =date.substring(0,2);

	date = year + "-" + month + "-" + day;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
		 var m = JSON.parse(xhttp.responseText);
		 var t = "<table class='table table-striped'>";
		 t += "<thead><th>Event</th><th>Description</th><th>Place</th><th>Date</th><th>Time</th></thead>";
		 for(var i = 0; i < m.length; i++){
			 var exists = false;
			 t += "<tr>";

			 t += "<td>" + m[i].name + "</td>";
			 t += "<td>" + m[i].text + "</td>";
			 t += "<td>" + m[i].place + "</td>";
			 t += "<td>" + m[i].date + "</td>";
			 t += "<td>" + m[i].time + "</td>";
			 t += "</tr>";
		 }
		 t += "</table>";
    }

		document.querySelector("#event_data").innerHTML = t;


  };
  xhttp.open("GET", "../inc/ajax.php?get_data&date=" + date, true);
  xhttp.send();
}
