 <?php
// Author: Lauren Olson
//
class DatabaseAdaptor2 {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;
  // Make a connection to the data based named 'imdb_small' (described in project). 
  public function __construct() {
    $db = 'mysql:dbname=interests;host=127.0.0.1;charset=utf8';
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
  
  // Return all movie records where actors like the inputted text 
  // as an associative PHP array.
  // TODO 3: Return all roles records where role like the inputted text 
  // as an associate PHP array

  public function getHobbies() {
      $stmt = $this->DB->prepare( "SELECT * FROM hobbies WHERE id='1' or id='6' or id='11' or id='16' or id='21';");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getShows() {
      $stmt = $this->DB->prepare( "SELECT * FROM shows WHERE id='1' or id='6' or id='11' or id='16' or id='21';");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getMusic() {
      $stmt = $this->DB->prepare( "SELECT * FROM music WHERE id='1' or id='6' or id='11' or id='16' or id='21';");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getMovies() {
      $stmt = $this->DB->prepare( "SELECT * FROM movies WHERE id='1' or id='6' or id='11' or id='16' or id='21';");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getBooks() {
      $stmt = $this->DB->prepare( "SELECT * FROM books WHERE id='1' or id='6' or id='11' or id='16' or id='21';");
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

  public function getHobbies2($hobby) {
      $hobby2 = $hobby + 5;
      $hobby1 = $hobby + 1;
      $stmt = $this->DB->prepare( "SELECT * FROM hobbies WHERE id BETWEEN :hobby1 AND :hobby2 ;");
      $stmt->bindParam( 'hobby1', $hobby1);
      $stmt->bindParam( 'hobby2', $hobby2);
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getShows2($show) {
      $show2 = $show + 5;
      $show1 = $show + 1;
      $stmt = $this->DB->prepare( "SELECT * FROM shows WHERE id BETWEEN :show1 AND :show2 ;");
      $stmt->bindParam( 'show1', $show1);
      $stmt->bindParam( 'show2', $show2);
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getMusic2($music) {
      $music2 = $music + 5;
      $music1 = $music + 1;
      $stmt = $this->DB->prepare( "SELECT * FROM music WHERE id BETWEEN :music1 AND :music2 ;");
      $stmt->bindParam( 'music1', $music1);
      $stmt->bindParam( 'music2', $music2);
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getMovies2($movie) {
      $movie2 = $movie + 5;
      $movie1 = $movie + 1;
      $stmt = $this->DB->prepare( "SELECT * FROM movies WHERE id BETWEEN :movie1 AND :movie2 ;");
      $stmt->bindParam( 'movie1', $movie1);
      $stmt->bindParam( 'movie2', $movie2);
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getBooks2($book) {
      $book2 = $book + 5;
      $book1 = $book + 1;
      $stmt = $this->DB->prepare( "SELECT * FROM books WHERE id BETWEEN :book1 AND :book2 ;");
      $stmt->bindParam( 'book1', $book1);
      $stmt->bindParam( 'book2', $book2);
      $stmt->execute ();
      return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
} // End class DatabaseAdaptor

// Testing code that should not be run when a part of MVC
$theDBA2 = new DatabaseAdaptor2 ();
// $arr = $theDBA->getMoviesByYear (2000);
// print_r($arr);

// $arr = $theDBA->getMoviesByRank (6);
// print_r($arr);

 
?>