<?php
// This controller acts as the go between the view and the model.
//
// Author Lauren Olson
//don't allow for replicate usernames
//make the buttons appear only when the user is logged in
include 'model.php'; 
include 'model2.php'; // for $theDBA2, an instance of DataBaseAdaptor
session_start();
unset($_SESSION['loginError'] );
unset($_SESSION['registerError']);
$userArray = $theDBA->getAllUsers();
$postArray = $theDBA->getAllPosts();

if(isset($_GET["change"]) && isset($_GET["name"]) && isset($_GET["info"])) {
    $change = $_GET["change"];
    $change = htmlspecialchars($change);
    $user = $_GET["name"];
    $user = htmlspecialchars($user);
    $info = $_GET["info"];
    $info = htmlspecialchars($info);
    if($user == $_SESSION['user']){
        $theDBA->change_info($change, $user, $info);
        header('location: profile.php?user='.$user);
    }
    else {
        header('location: profile.php?fail="fail"&user='.$user);
    }
}

if (isset($_GET['mode'])) {
    $val = $_GET['mode'];
}
else {
    $val = NAN;
}

if ($val == 'user'){
    $data = $_GET['val'];
    $data = htmlspecialchars($data);
    echo json_encode($theDBA->getProfileData($data));
}

if(isset($_GET['showHobbies'])){
    $arr = $theDBA2->getHobbies();
    echo json_encode($arr);
}

if(isset($_GET['showMusic'])){
    $arr = $theDBA2->getMusic();
    echo json_encode($arr);
}

if(isset($_GET['showMovies'])){
    $arr = $theDBA2->getMovies();
    echo json_encode($arr);
}

if(isset($_GET['showShows'])){
    $arr = $theDBA2->getShows();
    echo json_encode($arr);
}
if(isset($_GET['showBooks'])){
    $arr = $theDBA2->getBooks();
    echo json_encode($arr);
}

if(isset($_GET['showHobbies2'])){
    $arr = $theDBA2->getHobbies2($_GET['showHobbies2']);
    echo json_encode($arr);
}

if(isset($_GET['showMusic2'])){
    $arr = $theDBA2->getMusic2($_GET['showMusic2']);
    echo json_encode($arr);
}

if(isset($_GET['showMovies2'])){
    $arr = $theDBA2->getMovies2($_GET['showMovies2']);
    echo json_encode($arr);
}

if(isset($_GET['showShows2'])){
    $arr = $theDBA2->getShows2($_GET['showShows2']);
    echo json_encode($arr);
}
if(isset($_GET['showBooks2'])){
    $arr = $theDBA2->getBooks2($_GET['showBooks2']);
    echo json_encode($arr);
}

if(isset($_GET['showUsers'])){
    echo json_encode($userArray);
    return;
}
if(isset($_GET['showPosts'])){
    echo json_encode($postArray);
    return;
}
if(isset($_POST['post'])){
    $post= $_POST['post'];
    $post = htmlspecialchars($post);
    for($i=0; $i<count($userArray); $i++){
        if($_SESSION['user']==$userArray[$i]['username']){
            $user_id= $userArray[$i]['id'];
            break;
        }
    }
    $return= $theDBA->addPost($post, $user_id);
    if($return==1){
        header('location: homepage.php');
        return;
    }
}
if(isset($_POST['user']) && isset($_POST['pswd'])){
    $username = $_POST['user'];
    $username = htmlspecialchars($username);
    $pswd = $_POST['pswd'];
    $pswd = htmlspecialchars($pswd);
    for($i=0; $i<count($userArray); $i++){
        if($userArray[$i]['username'] == $username){
            $hash= $userArray[$i]['hash'];
            $return = password_verify($pswd, $hash) . PHP_EOL;
            if($return==1){
                $_SESSION['user']= $username;
                $_SESSION['user_id'] = $userArray[$i]['id'];
                header('location: homepage.php');
                return;
            }
        }
    }
    $_SESSION['loginError'] = 'Invalid username or password';
    unset($_SESSION['user']);
    header('location: login.php');
}

if(isset($_GET['show'])){
    $arr = $theDBA->getQuotes();
    echo json_encode($arr);
}
    
    
if(isset($_POST['logUser'])  && isset($_POST['logPass'])) {
    // See if we can log in. Avoid database needs by only allowing
    // 'Rick' to login with password = '1234'
    $user_info = $theDBA->getUser($_POST['logUser']);
    if(count($user_info) == 0){
        $_SESSION['loginError'] = 'Invalid credentials.';
        header('Location: login.php');
    }
    else{
        $_SESSION['user'] = $_POST['logUser'];
        header('Location: index.php');
    }
}

// TODO 9: Unset everything upon logout
// Avoid undefined indexes with isset
else if (isset ( $_POST ['regUser'] ) && isset($_POST ['regPass']) &&
    isset ( $_POST ['regGender'] ) && isset($_POST ['regBio']) &&
        isset ( $_POST ['regHobbies'] ) && isset($_POST ['regMusic']) &&
            isset ( $_POST ['regShows'] ) && isset($_POST ['regCareer']) &&
    isset ( $_POST ['regEd'] ) && isset($_POST ['regMovies']) && isset($_POST ['regBooks'])) {
    $username = $_POST['regUser'];
    $username = htmlspecialchars($username);
    $password = $_POST['regPass'];
    $password = htmlspecialchars($password);
    $gender = $_POST['regGender'];
    $gender = htmlspecialchars($gender);
    $bio = $_POST['regBio'];
    $bio = htmlspecialchars($bio);
    $hobbies = $_POST['regHobbies'];
    $hobbies = htmlspecialchars($hobbies);
    $music = $_POST['regMusic'];
    $music = htmlspecialchars($music);
    $shows = $_POST['regShows'];
    $shows = htmlspecialchars($shows);
    $career = $_POST['regCareer'];
    $career = htmlspecialchars($career);
    $ed = $_POST['regEd'];
    $ed = htmlspecialchars($ed);
    $books = $_POST ['regBooks'];
    $books = htmlspecialchars($books);
    $movies = $_POST['regMovies'];
    $movies = htmlspecialchars($movies);
    $user_info = $theDBA->getUser($username);
    if(count($user_info) == 0){
        $user_info = $theDBA->putUser($username, $password, $gender, $bio,
            $hobbies, $music, $shows, $career, $ed, $books,$movies);
        header('Location: index.php');
    }
    else{
        $_SESSION['regError'] = "Username already taken!";
        header ( 'Location: register.php' );
    }
    
}
if(isset($_GET['addRating'])&& isset($_GET['rating'])){
    $rating = $_GET['rating'] +1;
    $post_id = $_GET['addRating'];
    $return = $theDBA->changeRating($rating, $post_id);
    if($return==1){
        header('Location: homepage.php');
    }
}
if(isset($_GET['lowerRating'])&& isset($_GET['rating'])){
    $rating = $_GET['rating'] -1;
    $post_id = $_GET['lowerRating'];
    $return = $theDBA->changeRating($rating, $post_id);
    if($return==1){
        header('Location: homepage.php');
    }
}
if(isset($_GET['showComments']) && isset($_GET['post_id'])){
    $id = $_GET['post_id'];
    $commentArray = $theDBA->getAllComments($id);
    echo json_encode($commentArray);
}

if(isset($_POST['postId']) && isset($_POST['comment'])){
    $post_id = $_POST['postId'];
    $post_id = htmlspecialchars($post_id);
    $comment = $_POST['comment'];
    $comment = htmlspecialchars($comment);
    $user_id = $_SESSION['user_id'];
    $return = $theDBA->addComment($comment, $post_id, $user_id);
    header('Location: homepage.php');
}


else if (isset ( $_POST ['logout'] ) && $_POST ['logout'] === 'Logout') {
    session_destroy ();
    header ( 'Location: index.php' );
}
// else
//   header ( 'Location: index.php' );





?>