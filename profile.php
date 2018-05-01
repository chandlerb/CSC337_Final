<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="final.css">

</head>
<?php 
session_start ();
if (isset($_GET['user'])){
  $val = $_GET['user'];
  $fix = strtolower((string)$val);
  echo '<body onload=getData('.'"'.$fix.'"'.')>';
}
if(isset($_GET['fail'])){
  echo "<script type='text/javascript'>alert('This user does not have permission to change data');</script>";
}
?>

<h2>Profile Page</h2>
<ul style="clear:both">
  <li><a href="homepage.php">Go to Homepage</a></li>
</ul>



<div id="toChange">
</div>

<script>
    function getData($user) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET","controller.php?mode=user&val="+$user, true);
        ajax.send();
        ajax.onreadystatechange = function() {
          if (ajax.readyState == 4 && ajax.status == 200) {
            console.log(ajax.responseText);
            array = JSON.parse(ajax.responseText);
            console.log(array);
            $name = array[0]['username'];
            $gender = array[0]['gender'];
            $bio = array[0]['bio'];
            $hobbies = array[0]['hobbies'];
            $music = array[0]['music'];
            $shows = array[0]['shows'];
            $career = array[0]['career'];
            $education = array[0]['education'];
            $books = array[0]['books'];
            $movies = array[0]['movies'];
            
            
            str = '<ul class="list-group" style="width:80%; padding-left:15%; padding-bottom:5%;padding-top:2%; background-color:transparent;";><li class="list-group-item"> <h4>Name:</h4> ' + $name + '</li>';
            str += '<ul class="list-group"><li class="list-group-item" id="gender"> <h4>Gender:</h4> ' + $gender + '<input style="float:right;" type="button" value="Edit" onclick=edit("gender"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="bio"> <h4>Bio:</h4> ' + $bio + '<input style="float:right;" type="button" value="Edit" onclick=edit("bio"'+','+'"'+$name+'"'+')></li>';           
            str += '<ul class="list-group"><li class="list-group-item" id="hobbies"> <h4>Hobbies:</h4> ' + $hobbies + '<input style="float:right;" type="button" value="Edit" onclick=edit("hobbies"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="music"> <h4>Music:</h4> ' + $music + '<input style="float:right;" type="button" value="Edit" onclick=edit("music"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="shows"> <h4>Shows:</h4> ' + $shows + '<input style="float:right;" type="button" value="Edit" onclick=edit("shows"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="career"> <h4>Career:</h4> ' + $career + '<input style="float:right;" type="button" value="Edit" onclick=edit("career"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="education"> <h4>Education:</h4> ' + $education + '<input style="float:right;" type="button" value="Edit" onclick=edit("educations"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="books"> <h4>Books:</h4> ' + $books + '<input style="float:right;" type="button" value="Edit" onclick=edit("books"'+','+'"'+$name+'"'+')></li>';
            str += '<ul class="list-group"><li class="list-group-item" id="movies"> <h4>Movies:</h4> ' + $movies + '<input style="float:right;" type="button" value="Edit" onclick=edit("movies"'+','+'"'+$name+'"'+')></li></ul>';
            document.getElementById("toChange").innerHTML = str;
        }
      }
      }

      function edit($info, $name) {

        document.getElementById($info).innerHTML = '<form action="controller.php" method="get">Edit: '+$info+
        '<input type="text" name="change"><input type="hidden" name="info" value='+$info+
        '><input type="hidden" name="name" value='+$name+'><br><input type="submit" value="Submit"></form>';
      }


</script>

</html>