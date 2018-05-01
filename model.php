 <?php
// Author: Lauren Olson
//
class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;
  // Make a connection to the data based named 'imdb_small' (described in project). 
  public function __construct() {
    $db = 'mysql:dbname=social;host=127.0.0.1;charset=utf8';
    $user = 'root';
    $password = '';
    
    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      echo ('Error establishing Connection');
      exit ();
    }
  }
  
  public function change_info($change, $user, $info){
      if($info == "gender"){
          $stmt = $this->DB->prepare("UPDATE users SET gender = :change WHERE username = :user");
      }
      elseif($info == "bio"){
          $stmt = $this->DB->prepare("UPDATE users SET bio = :change WHERE username = :user");
      }
      elseif($info == "hobbies"){
          $stmt = $this->DB->prepare("UPDATE users SET hobbies = :change WHERE username = :user");
      }
      elseif($info == "music"){
          $stmt = $this->DB->prepare("UPDATE users SET music = :change WHERE username = :user");
      }
      elseif($info == "shows"){
          $stmt = $this->DB->prepare("UPDATE users SET shows = :change WHERE username = :user");
      }
      elseif($info == "career"){
          $stmt = $this->DB->prepare("UPDATE users SET career = :change WHERE username = :user");
      }
      elseif($info == "education"){
          $stmt = $this->DB->prepare("UPDATE users SET education = :change WHERE username = :user");
      }
      elseif($info == "books"){
          $stmt = $this->DB->prepare("UPDATE users SET books = :change WHERE username = :user");
      }
      elseif($info == "movies"){
          $stmt = $this->DB->prepare("UPDATE users SET movies = :change WHERE username = :user");
      }
      $stmt->bindParam("change", $change);
      $stmt->bindParam("user", $user);
      $stmt->execute();
  }
  public function getProfileData($user) {
      $stmt = $this->DB->prepare( "SELECT * FROM users where username = :user" );
      $stmt->bindParam("user", $user);
      $stmt->execute();
      return $stmt->fetchAll( PDO::FETCH_ASSOC );
  }
  
  // Return all movie records where actors like the inputted text 
  // as an associative PHP array.
  public function putUser($username, $password, $gender, $bio, $hobbies, $music, $shows, $career, $education, $books, $movies) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      password_verify( $password, $hash);
      $stmt = $this->DB->prepare("insert into users(username, hash, gender, bio, hobbies, music, shows, career, education, books, movies) values(:username, :hash, :gender, :bio, :hobbies, :music, :shows, :career, :education, :books, :movies )");
      $stmt->bindParam( 'username', $username);
      $stmt->bindParam( 'hash', $hash);
      $stmt->bindParam( 'gender', $gender);
      $stmt->bindParam( 'bio', $bio);
      $stmt->bindParam( 'hobbies', $hobbies);
      $stmt->bindParam( 'music', $music);
      $stmt->bindParam( 'shows', $shows);
      $stmt->bindParam( 'career', $career);
      $stmt->bindParam( 'education', $education);
      $stmt->bindParam( 'books', $books);
      $stmt->bindParam( 'movies', $movies);
      $stmt->execute ();
  }
  
  // TODO 3: Return all roles records where role like the inputted text 
  // as an associate PHP array


  public function getUser($username){
      $stmt = $this->DB->prepare("SELECT * from users WHERE username = :username");
      $stmt->bindParam( 'username', $username);
      $stmt->execute();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
 
  public function changeRating($rating, $post_id){
      $stmt = $this->DB->prepare("UPDATE posts SET rating = :rating WHERE id= :post_id");
      $stmt->bindParam('rating', $rating);
      $stmt->bindParam('post_id', $post_id);
      $stmt->execute();
      return 1;
  }
  public function addComment($comment, $post_id, $user_id){
      $stmt = $this->DB->prepare('INSERT INTO comments(comment, user_id, post_id) VALUES (:comment , :user_id , :post_id)');
      $stmt->bindParam('comment', $comment);
      $stmt->bindParam('user_id', $user_id);
      $stmt->bindParam('post_id', $post_id);
      $stmt->execute();
  }
  
  public function addPost($post, $user_id){
      $stmt = $this->DB->prepare('INSERT INTO posts(post, user_id, rating) VALUES(:post, :user_id,"0")');
      $stmt->bindParam('post', $post);
      $stmt->bindParam('user_id', $user_id);
      $stmt->execute();
      return 1;
  }
  public function getAllPosts(){
      $stmt = $this->DB->prepare("SELECT users.username, posts.post, posts.id, posts.rating FROM posts
       JOIN users ON posts.user_id = users.id ORDER BY rating DESC");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getAllUsers(){
      $stmt = $this->DB->prepare( "SELECT * FROM users");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getAllComments($post_id){
      $stmt = $this->DB->prepare('SELECT comments.comment, users.username FROM comments
                                  JOIN users ON comments.user_id = users.id
                                  WHERE comments.post_id= :post_id');
      $stmt->bindParam('post_id', $post_id);
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
} // End class DatabaseAdaptor

// Testing code that should not be run when a part of MVC
$theDBA = new DatabaseAdaptor ();
// $arr = $theDBA->getMoviesByYear (2000);
// print_r($arr);

// $arr = $theDBA->getMoviesByRank (6);
// print_r($arr);

 
?>