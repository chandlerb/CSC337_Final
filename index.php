<!DOCTYPE html>
<!-- 


Author: Lauren Olson
-->
<html>
<head>
<meta charset="UTF-8">
<title>Social Media</title>
<link rel="stylesheet" type="text/css" href="final.css">
</head>
<body>
<?php 
    session_start();
?>
<div id="whole">
<h1><a href="index.php" id="title">Social Media</a></h1><br><br><br><br><br><br>
<ul>
  <li><a href="login.php">Login</a></li>
  <li><a href="register.php">Register</a></li>
</ul>


<?php
 if(isset($_SESSION['user'])) {
   echo '	<form action="controller.php" method="POST">
		<input type="submit" name="logout" value="Logout">
	</form>';
 }
?>
<br>
<br>

<div id="toChange"></div>
</div>
<script>
var divToChange = document.getElementById("toChange");
showQuotes();

function showQuotes() {
  var anObj = new XMLHttpRequest();
  anObj.open("GET", "controller.php?show=show", true);
  anObj.send();

  anObj.onreadystatechange = function () {
      if (anObj.readyState == 4 && anObj.status == 200) {	
          var array = JSON.parse(anObj.responseText);
          var quotes = [];
          var str = "";
          	for (i = 0; i < array.length; i++){
        	  			if(array[i]['flagged'] == 0){
                       	str += "<div class='quote' id='"+ array[i]['author'] + array[i]['quote'].length +"'>" + array[i]['author'] + "<br>" + array[i]['quote']
                        + "<br><input class = 'flag' onclick='flag(\"" +array[i]['author'] + "\",\""+ array[i]['quote'] +"\")' type='button' value='Flag'>"
                        + "<br><input id = 'value' value ="+array[i]['rating']+" type= 'number' onclick='number(\""+array[i]['quote'] +"\")'></div>";
          			divToChange.innerHTML = str;
        	  			}
        	  			else{
        	  				str +="";
        	  			}
          		}	
   }
 }
}


function logout(){
	var anObj = new XMLHttpRequest();
	  anObj.open("GET", "controller.php?logout=Logout", true);	  
	  anObj.send();
	  anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {	
		      //console.log(anObj.responseText);
	      }
	      }
}

</script>

</body>
</html>