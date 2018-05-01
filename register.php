<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" type="text/css" href="final.css">
</head>
<body>
<?php
session_start ();
// TODO 5: Consider an HTML form that calls the controller 
?>
<h1><a href="index.php" id="title">Social Media</a></h1><br><br><br><br><br><br>
<h2>Register</h2><br><br><br><br><br>
	<form action="controller.php" method="POST">
		Username: <input id="user1" type="text" name="regUser"  pattern="^[a-z0-9_-]{3,15}$" autofocus> <br>
		Verify Username: <input id="user2"  type="text" name="regUser" oninput="checkUser()" pattern="^[a-z0-9_-]{3,15}$"> <br>
		<div id="checkUser"></div><br>
		Password: <br><input id="pass1" type="password" name="regPass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br>
		Verify Password: <br><input id="pass2" type="password" name="regPass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninput="checkPass()"> <br>
		<div id="checkPass"></div><br>
		Gender: <br><input type="radio" name="regGender" value="male"> Male<br>
  		<input type="radio" name="regGender" value="female"> Female<br>
  		<input type="radio" name="regGender" value="other" checked> Other <br> <br>
  		
		Bio: <br>Please say something about yourself!<br> <input id="bio2"type="text" name="regBio"  maxlength="500"> <br>
		Hobbies: <br> Type in your favorite hobbies or select a hobby and others will be recommended<br>
		 <input id="hobbiesInput" type="text" name="regHobbies"> <br>
		<div id="hobbies"></div>
		Music: <br> Type in your favorite artists or select a artist and others will be recommended<br>
		 <input  id="musicInput" type="text" name="regMusic"> <br>
		<div id="music"></div>
		Shows: <br> Type in your favorite series or select a show and others will be recommended<br> 
		<input id="showsInput" type="text" name="regShows"> <br>
		<div id="shows"></div>
		Career: <input type="text" name="regCareer"> <br>
		Education: <input type="text" name="regEd"> <br>
		Books: <br> Type in your favorite books or select a book and others will be recommended<br>
		 <input id="booksInput"  type="text" name="regBooks" > <br>
		<br>
		<div id="books"></div>
		Movies: <br> Type in your favorite movies or select a movie and others will be recommended<br>
		<input id="moviesInput" type="text" name="regMovies" > <br>
		 <br>
		<div id="movies"></div>
	<input type="submit" name="Register" value="Register" > <br> <br>
		<?php
  // TODO 6: Show message indicating the credentials were not Rick and 1234
  if( isset(  $_SESSION['regError']))
    echo   $_SESSION['regError'];
	?>
</form>
</body>
<script>
showHobbies();
showMusic();
showShows();
showBooks();
showMovies();

function checkUser(){
	var user1 = document.getElementById("user1").value;
	var user2 = document.getElementById("user2").value;
	var user1Style = document.getElementById("user1").style;
	var user2Style = document.getElementById("user2").style;
	var check = document.getElementById("checkUser");
	if(user1.length != user2.length){
		check.innerHTML = "usernames don't match";
		user1Style.border = "2px red solid";
		user2Style.border = "2px red solid";
		return;
		}
	for(var i = 0; i < user1.length; i++){
		if(user1[i] != user2[i]){
			check.innerHTML = "usernames don't match";
			user1Style.border = "2px red solid";
			user2Style.border = "2px red solid";
			break;
			}
		}
	check.innerHTML = "usernames match";
	user1Style.border = "2px green solid";
	user2Style.border = "2px green solid";
}

function checkPass(){
	var pass1 = document.getElementById("pass1").value;
	var pass2 = document.getElementById("pass2").value;
	var pass1Style = document.getElementById("pass1").style;
	var pass2Style = document.getElementById("pass2").style;
	var check = document.getElementById("checkPass");
	if(pass1.length != pass2.length){
		check.innerHTML = "passwords don't match";
		pass1Style.border = "2px red solid";
		pass2Style.border = "2px red solid";
		return;
		}
	for(var i = 0; i < pass1.length; i++){
		if(pass1[i] != pass2[i]){
			check.innerHTML = "passwords don't match";
			pass1Style.border = "2px red solid";
			pass2Style.border = "2px red solid";
			break;
			}
		}
	check.innerHTML = "passwords match";

	pass1Style.border = "2px green solid";
	pass2Style.border = "2px green solid";
}

function showMusic() {
	  var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showMusic=show", true);
	  anObj.send();

	  anObj.onreadystatechange = function () {
		  
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("music");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addMusic(\"" + array[i]["id"] + "\",\"" + array[i]["artist"] +"\") 'value='" + array[i]["artist"] + "'>";
	        	  			str += array[i]["artist"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
	}
function showMovies() {
	  var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showMovies=show", true);
	  anObj.send();

	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("movies");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addMovie(\"" + array[i]["id"] + "\",\"" + array[i]["movie"] +"\") 'value='" + array[i]["movie"] + "'>";
	        	  			str += array[i]["movie"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
	}
function showBooks() {
	  var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showBooks=show", true);
	  anObj.send();

	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("books");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addBook(\"" + array[i]["id"] + "\",\"" + array[i]["book"] +"\") 'value='" + array[i]["book"] + "'>";
	        	  			str += array[i]["book"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
	}
function showHobbies() {
	  var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showHobbies=show", true);
	  anObj.send();

	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("hobbies");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addHobbies(\"" + array[i]["id"] + "\",\"" + array[i]["hobby"] +"\")' value='" + array[i]["hobby"] + "'>";
	        	  			str += array[i]["hobby"] + " ";
	          		}	
          		change.innerHTML += "<br><br>";
	   }
	 }
	}

function showShows() {
	  var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showShows=show", true);
	  anObj.send();

	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("shows");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addShow(\"" + array[i]["id"] + "\",\"" + array[i]["series"] +"\")' value='" + array[i]["series"] + "'>";
	        	  			str += array[i]["series"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
	}
function addMusic(music, title){
	var change = document.getElementById("music");
	var value = document.getElementById("musicInput");
	value.value += title + " ";
	var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showMusic2=" + music, true);
	  anObj.send();
	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("music");
	          var array = JSON.parse(anObj.responseText);
	          change.innerHTML += "Other music you may like:<br>"
	          var str = "";
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addMusic(\"" + array[i]["id"] + "\",\"" + array[i]["artist"] +"\")' value='" + array[i]["artist"] + "'>";
	        	  			str += array[i]["artist"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
	
}
function addShow(show, title){
	var change = document.getElementById("shows");
	var value = document.getElementById("showsInput");
	value.value += title + " ";
	  var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showShows2=" + show, true);
	  anObj.send();
	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("shows");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          change.innerHTML += "Other shows you may like:<br>"
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addShow(\"" + array[i]["id"] + "\",\"" + array[i]["series"] +"\")' value='" + array[i]["series"] + "'>";
	        	  			str += array[i]["series"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
}
function addHobbies(hobby, title){
	var change = document.getElementById("hobbies");
	var value = document.getElementById("hobbiesInput");
	value.value += title + " ";
	var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showHobbies2=" + hobby, true);
	  anObj.send();
	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("hobbies");
	          console.log(anObj.responseText);
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          change.innerHTML += "Other hobbies you may like:<br>"
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addHobbies(\"" + array[i]["id"] + "\",\"" + array[i]["hobby"] +"\")' value='" + array[i]["hobby"] + "'>";
	        	  			str += array[i]["hobbies"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
}
function addMovie(movie, title){
	var change = document.getElementById("movies");
	var value = document.getElementById("moviesInput");
	value.value += title + " ";
	var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showMovies2=" + movie, true);
	  anObj.send();
	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("movies");
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          change.innerHTML += "Other movies you may like:<br>"
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addMovie(\"" + array[i]["id"] + "\" ,\"" + array[i]["movie"] +"\")' value='" + array[i]["movie"] + "'>";
	        	  			str += array[i]["movies"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
}
function addBook(book, title){
	var change = document.getElementById("books");
	var value = document.getElementById("booksInput");
	value.value += title + " ";
	var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?showBooks2=" + book, true);
	  anObj.send();
	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
	          var change = document.getElementById("books");
	          console.log(anObj.responseText);
	          var array = JSON.parse(anObj.responseText);
	          var str = "";
	          change.innerHTML += "Other books you may like:<br>"
	          	for (i = 0; i < array.length; i++){
	          		change.innerHTML += "<input type='button' onclick='addBook(\"" + array[i]["id"] + "\",\"" + array[i]["book"] +"\")' value='" + array[i]["book"] + "'>";
	        	  			str += array[i]["book"] + " ";
	          		}	
	          	change.innerHTML += "<br><br>";
	   }
	 }
}
</script>
</html>