<!DOCTYPE html>
<html>
<head>
<!-- Programmer: Joccelyn Cardenas -->
<meta charset="UTF-8">
<title>Homepage</title>
<link href="homepage.css" type="text/css" rel="stylesheet">
<style>
#buttonBox{
margin-bottom: -25px;
margin-left: -25px;
margin-right: -25px;
}
#hideAllComments{
    background-color: #000033;
	-webkit-transition-duration: 0.5s;
	tansition-duration: 0.5s;
	color: whitesmoke;
	cursor: pointer;
	text-align: center;
	border: solid whitesmoke 1px;
	width: 100%;
}
#hideAllComments:hover{
	box-shadow: 0px 0px 5px black;
	background-color: #e6e6ff;
	color: black;
}
#commentButton{
    background-color: #000033;
	-webkit-transition-duration: 0.5s;
	tansition-duration: 0.5s;
	color: whitesmoke;
	cursor: pointer;
	text-align: center;
	border: solid whitesmoke 1px;
	width: 100%;
}
#commentButton:hover{
	box-shadow: 0px 0px 5px white;
	background-color: #e6e6ff;
	color: black;
}
#leftButton{
    background-color: #000033;
	-webkit-transition-duration: 0.5s;
	tansition-duration: 0.5s;
	color: whitesmoke;
	cursor: pointer;
	text-align: center;
	border: solid whitesmoke 1px;
	border-radius: 0px 0px 0px 5px;
	width: 50%;
}
h2 {
    color:#ffef96;
    display: block;
    text-align: center;
    text-decoration: none;
    font-variant: small-caps;
    text-shadow: 2px 2px black;
}
#indexButton{
    background-color: #000033;
    border: white 1pt ridge;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    text-outline: 2px 2px #50394c;
    text-shadow: 2px 2px #ffef96;
}
#rightButton{
	background-color: #000033;
	-webkit-transition-duration: 0.5s;
	tansition-duration: 0.5s;
	color: whitesmoke;
	cursor: pointer;
	text-align: center;
	border: solid whitesmoke 1px;
	border-radius: 0px 0px 5px 0px;
	float: right;
	width: 50%;
}
#rightButton:hover{
	box-shadow: 0px 0px 5px black;
	background-color: #e6e6ff;
	color: black;
}
#leftButton:hover{
	box-shadow: 0px 0px 5px black;
	background-color: #e6e6ff;
	color: black;
}

</style>
</head>
<body id="body" onload="displayAllUsers();displayAllPosts();">
<?php 
session_start();
echo '<h1>Welcome to your homepage, '.$_SESSION['user'].'</h1>';
?>
<div id="left">
<h2 style="text-align: center">ALL USERS</h2>
<hr>
<div id="toChange">   </div>
</div>

<div id= "addPost">
<h2  style="text-align: center">ADD A POST HERE</h2>
<form action='controller.php' method="POST">
<textarea name="post" id="textPost" style="border-radius: 5px;" placeholder="Write a post here..."required></textarea><input style="margin:5px; border: 2px solid whitesmoke; background-color: #000033; color: white;font-size: 8pt;" type="submit" value="Post">
</form>
</div>
<div id = "postsArea" >
<h2  style="text-align: center">ALL POSTS</h2>
<hr>
<div id = "allPosts">
</div></div>
<a href="index.php"><button id="indexButton">Index</button></a>

<?php 
include 'model.php';
$userArray = $theDBA->getAllUsers();
$index=0;
for($i=0; $i<count($userArray); $i++){
    if($userArray[$i]['username']==$_SESSION['user']){
        $index=$i;
        break;
    }
}
echo (  '<div style="float:left; background-color: #000033; box-shadow: 5px 5px 5px gray;
         width: 25%; color: white; border-radius: 5px; margin:15px; padding: 15px; ">' . 
        '<h2 style="background-color: white; padding: 15px;"> ABOUT YOU </h2><hr>'.
        '<p style="text-align: center;">USERNAME: '. $userArray[$index]['username']. '</p>' .
        '<p style="text-align: center;">GENDER: '. $userArray[$index]['gender'] . '</p>' .
        '<p style="text-align: center;">BIO: '. $userArray[$index]['bio'] . '</p>' .
        '<p style="text-align: center;">HOBBIES: '. $userArray[$index]['hobbies'] . '</p>' .
        '<p style="text-align: center;">MUSIC: '. $userArray[$index]['music'] . '</p>' . 
        '<p style="text-align: center;">SHOWS: '. $userArray[$index]['shows'] . '</p>' . 
        '<p style="text-align: center;">CAREER: '. $userArray[$index]['career']. '</p>' . 
        '<p style="text-align: center;">EDUCATION: '. $userArray[$index]['education']. '</p>'.
        '<p style="text-align: center;">BOOKS: '. $userArray[$index]['books']. '</p>'. 
        '<p style="text-align: center;">MOVIES: '. $userArray[$index]['movies']. '</p>'.
        '</div>'
    );  
?>

</body>
<script>
var userArray;
var postArray;

function displayAllUsers(){
	 var anObj = new XMLHttpRequest();
	 anObj.open("GET", "controller.php?showUsers=1", true);
	 anObj.send();
	 anObj.onreadystatechange = function () {
	      if (anObj.readyState == 4 && anObj.status == 200) {    
	          var array = JSON.parse(anObj.responseText);
	          userArray=array;
	          var str = "";
	          for(i=0; i<array.length; i++){
	        	  str+='<p style="margin: 25px; padding: 25px; border: 2px dashed lightgray;"><a style="color: black; text-decoration: none;" href="profile.php?user='+array[i]['username']+
	        	  '"><img style="width:50px; height: 50px; float: left; margin: 5px;" src="images/emoji.jpg">' 
			          + array[i]['username'] + '<br>'+ array[i]['gender'] + '</p></a>';
	          }
		      document.getElementById("toChange").innerHTML=str;
		      
	 }
}
}

	function displayAllPosts(){
		 var anObj = new XMLHttpRequest();
		 anObj.open("GET", "controller.php?showPosts=1", true);
		 anObj.send();
		 anObj.onreadystatechange = function () {
		      if (anObj.readyState == 4 && anObj.status == 200) {    
		          var array = JSON.parse(anObj.responseText);
		          var str = "";
		          for(i=0; i<array.length; i++){
		        	 
		        	  str+= '<div style="margin: 25px; padding: 25px;background-color:#000033; width:80%; border-radius: 5px;">'
							 +'<div style="float: right; padding: 2px; font-weight: bold; color: white; border: dashed white; border-width: 1px; padding 15px;">'+array[i]['rating'] +'</div>'
					         +'<img style="width:50px; height: 50px; float: left; margin:5px;" src="images/emoji.jpg"/>'
							 +'<p style="padding: 5px; color: white;">'+ array[i]['post']+ '</p>'
							 + '<a href="profile.php?user='+array[i]['username']+'"><p id="insertUser" style="float: right; padding: 0px; color: white;">-'+array[i]['username']+'</p></a><br>'
							 + '<br><br><form onsubmit="addComment('+array[i]['id']+');"><textarea id="commentBox'+array[i]['id']+'" placeholder="Write a comment..."style="width: 80%; background-color: whitesmoke; border-radius: 5px; border: none;" required></textarea>'
							 + '<input style="margin:5px; border: 2px solid whitesmoke; background-color: #2d1f2a; color: white;font-size: 8pt;" type="submit" value="Comment"></form>'
							 + '<div id ='+ array[i]['id'] +'></div><br><div id="buttonBox">'
							 + '<button id="commentButton" onclick="getAllComments('+array[i]['id']+');">Show all Comments</button> <br>'
					 		 + '<button class="button" id="leftButton" onclick="addRating('+array[i]['id']+','+array[i]['rating']+')">+'
							 +'</button><button class="button" id="rightButton" onclick="lowerRating('+array[i]['id']+','+array[i]['rating']+')">-</button></div></div>';
						 continue;
			     }
		 }
		      document.getElementById("allPosts").innerHTML=str;
		 }
	}
	function addRating(postId, rating){
		 var anObj = new XMLHttpRequest();
		 anObj.open("GET", "controller.php?addRating="+postId+"&rating="+rating, true);
		 anObj.send();
		 displayAllPosts();
	}
	function lowerRating(postId, rating){
		 var anObj = new XMLHttpRequest();
		 anObj.open("GET", "controller.php?lowerRating="+postId+"&rating="+rating, true);
		 anObj.send();
		 displayAllPosts();
		
	}
	function addComment(post_id){
		var comment = document.getElementById("commentBox"+post_id).value;
		var anObj = new XMLHttpRequest();
		 anObj.open("POST", "controller.php", true);
		 anObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 anObj.send("comment="+comment+"&postId="+post_id);
		 displayAllPosts();
	}
	function getAllComments(post_id){
		var anObj = new XMLHttpRequest();
		anObj.open("GET", "controller.php?showComments=1&post_id="+post_id, true);
		anObj.send();
		anObj.onreadystatechange = function () {
		      if (anObj.readyState == 4 && anObj.status == 200) {
			      var array = JSON.parse(anObj.responseText);
			      console.log(anObj.responseText);
			      var str = "";
			      for(i=0; i<array.length; i++){
				         str+='<div style="border-radius: 4px;  background-color: white; margin-left: 25px; margin-right: 25px;'
					         	+ 'padding: 15px; margin:15px;" >'+ array[i]['comment']
					         	+ '<br><a href="profile.php?user='+array[i]['username']+'"><div style="float: right; color: black;">-' +array[i]['username']+'</div></a></div>';
			      }
			      str+= '<br><button id="hideAllComments" onclick="hideAllComments('+post_id+')">Hide all Comments </button>';
			      document.getElementById(post_id).innerHTML=str;
		      }
		}
	}
	function hideAllComments(post_id){
		document.getElementById(post_id).innerHTML="";
	}
		
</script>
</html>
