# CSC337_Final
# CSC Web Programming Final Project
To run the mariaDB paste (/Applications/XAMPP/xamppfiles/bin/mysql -u root) into mac terminal
# COPY AND PASTE THIS INTO SQL DATABASE TO GET FULL USAGE 


create database social;
use social;
CREATE TABLE posts(
  id int(20) NOT NULL AUTO_INCREMENT,
  added datetime,
  post varchar(2000),
  user_id int(6),
  rating int(11),
  PRIMARY KEY (id)
);
CREATE TABLE comments(
  id int(20) NOT NULL AUTO_INCREMENT,
  added datetime,
  comment varchar(1000),
  user_id int(6),
  post_id int(20),
  PRIMARY KEY (id)
);
CREATE TABLE users (
  id int(6) unsigned AUTO_INCREMENT,
  username varchar(64),
  hash varchar(255),
  gender varchar(20),
  bio varchar(300),
  hobbies varchar(200),
  music varchar(100),
  shows varchar(200),
  career varchar(200),
  education varchar(200),
  books varchar(200),
  movies varchar(200),
  PRIMARY KEY (id)
);

insert into users(username, hash, gender, bio, hobbies, music, shows, career, education, books, movies) values('lauren', '0', 'female', 'bio', 'hobbies', 'music', 'shows', 'career', 'education', 'books', 'movies' );

insert into comments(comment, user_id, post_id) values('lauren', '2', '2');

insert into posts(post, user_id, rating) values('lauren', '2');

Create database interests;
Use interests;
CREATE TABLE music ( artist varchar(100), id int(6));
CREATE TABLE books (
  book varchar(100),
  id int(6)

);
CREATE TABLE hobbies (
  hobby varchar(100),
 id int(6)
);
CREATE TABLE movies (
  movie varchar(100),
id int(6)
);
CREATE TABLE shows ( series varchar(100), id int(6));
insert into movies(movie, id) values('Avengers: Infinity War', '1');
insert into movies(movie, id) values('Black Panther', '2');
insert into movies(movie, id) values('Jurassic World', '3');
insert into movies(movie, id) values('Star Wars', '4');
insert into movies(movie, id) values('Red Sparrow', '5');
insert into movies(movie, id) values('A Quiet Place', '6');
insert into movies(movie, id) values('Inception', '7');
insert into movies(movie, id) values('Se7en', '8');
insert into movies(movie, id) values('The Departed', '9');
insert into movies(movie, id) values('Kill Bill', '10');

insert into movies(movie, id) values('The Shining', '11');
insert into movies(movie, id) values('Alien', '12');
insert into movies(movie, id) values('Psycho', '13');
insert into movies(movie, id) values('Shaun of the Dead', '14');
insert into movies(movie, id) values('The Exorcist', '15');

insert into movies(movie, id) values('Silver Linings PLaybook', '16');
insert into movies(movie, id) values('La La Land', '17');
insert into movies(movie, id) values('The 40-Year-Old Virgin', '18');
insert into movies(movie, id) values('Tangled', '19');
insert into movies(movie, id) values('Knocked Up', '20');

insert into movies(movie, id) values('The Shawshank Redemption', '21');
insert into movies(movie, id) values('Fight Club', '22');
insert into movies(movie, id) values('Pulp Fiction', '23');
insert into movies(movie, id) values('The Godfather', '24');
insert into movies(movie, id) values('Saving Private Ryan', '25');


insert into music(artist, id) values('Taylor Swift', '1');
insert into music(artist, id) values('Beyonce', '2');
insert into music(artist, id) values('BTS', '3');
insert into music(artist, id) values('Ariana Grande', '4');
insert into music(artist, id) values('Zedd', '5');

insert into music(artist, id) values('Cardi B', '6');
insert into music(artist, id) values('Post Malone', '7');
insert into music(artist, id) values('Kendrick Lamar', '8');
insert into music(artist, id) values('Eminem', '9');
insert into music(artist, id) values('ASAP Mob', '10');

insert into music(artist, id) values('Alan Jackson', '11');
insert into music(artist, id) values('Luke Bryan', '12');
insert into music(artist, id) values('Keith Urban', '13');
insert into music(artist, id) values('Willie Nelson', '14');
insert into music(artist, id) values('Jason Aldean', '15');

insert into music(artist, id) values('Jorja Smith', '16');
insert into music(artist, id) values('Daniel Cesar', '17');
insert into music(artist, id) values('Janelle Monae', '18');
insert into music(artist, id) values('The Weeknd', '19');
insert into music(artist, id) values('Khalid', '20');

insert into music(artist, id) values('Journey', '21');
insert into music(artist, id) values('Toto', '22');
insert into music(artist, id) values('Green Day', '23');
insert into music(artist, id) values('Queen', '24');
insert into music(artist, id) values('The White Stripes', '25');

insert into shows(series, id) values('Game of Thrones', '1');
insert into shows(series, id) values('Better Call Saul', '2');
insert into shows(series, id) values('House of Cards', '3');
insert into shows(series, id) values('Stranger Things', '4');
insert into shows(series, id) values('The Handmaid’s Tale', '5');

insert into shows(series, id) values('The Americans', '6');
insert into shows(series, id) values('The Crown', '7');
insert into shows(series, id) values('Westworld', '8');
insert into shows(series, id) values('Ray Donovan', '9');
insert into shows(series, id) values('This Is Us', '10');

insert into shows(series, id) values('Homeland', '11');
insert into shows(series, id) values('Orange is the New Black', '12');
insert into shows(series, id) values('Shameless', '13');
insert into shows(series, id) values('Atlanta', '14');
insert into shows(series, id) values('Black-ish', '15');

insert into shows(series, id) values('Veep', '16');
insert into shows(series, id) values('Modern Family', '17');
insert into shows(series, id) values('Saturday Night Live', '18');
insert into shows(series, id) values('Baskets', '19');
insert into shows(series, id) values('Last Week Tonight with John Oliver', '20');

insert into shows(series, id) values('The Late Show with Stephen Colbert', '21');
insert into shows(series, id) values('Full Frontal with Samantha Bee', '22');
insert into shows(series, id) values('Real Time with Bill Maher', '23');
insert into shows(series, id) values('Jimmy Kimmel Live!', '24');
insert into shows(series, id) values('The Late Late Show with James Corden', '25');

insert into hobbies(hobby, id) values('Hiking', '1');
insert into hobbies(hobby, id) values('Biking', '2');
insert into hobbies(hobby, id) values('Sports', '3');
insert into hobbies(hobby, id) values('Yoga', '4');
insert into hobbies(hobby, id) values('Running', '5');

insert into hobbies(hobby, id) values('Painting', '6');
insert into hobbies(hobby, id) values('Scrapbooking', '7');
insert into hobbies(hobby, id) values('Drawing', '8');
insert into hobbies(hobby, id) values('Dancing', '9');
insert into hobbies(hobby, id) values('Photography', '10');

insert into hobbies(hobby, id) values('Listening to Music', '11');
insert into hobbies(hobby, id) values('Watching TV', '12');
insert into hobbies(hobby, id) values('Watching YouTube', '13');
insert into hobbies(hobby, id) values('Going to the Movies', '14');
insert into hobbies(hobby, id) values('Social Media', '15');

insert into hobbies(hobby, id) values('Reading', '16');
insert into hobbies(hobby, id) values('Programming', '17');
insert into hobbies(hobby, id) values('Writing', '18');
insert into hobbies(hobby, id) values('Chess', '19');
insert into hobbies(hobby, id) values('Board Games', '20');

insert into hobbies(hobby, id) values('Juggling', '21');
insert into hobbies(hobby, id) values('Lego Building', '22');
insert into hobbies(hobby, id) values('Magic', '23');
insert into hobbies(hobby, id) values('Yo-yoing', '24');
insert into hobbies(hobby, id) values('Soapmaking', '25');

insert into books(book, id) values('Harry Potter', '1');
insert into books(book, id) values('Percy Jackson', '2');
insert into books(book, id) values('Hunger Games', '3');
insert into books(book, id) values('Divergent', '4');
insert into books(book, id) values('Unwind', '5');

insert into books(book, id) values('American Psycho', '6');
insert into books(book, id) values('Disgrace', '7');
insert into books(book, id) values('Handmaid’s Tale', '8');
insert into books(book, id) values('The Color Purple', '9');
insert into books(book, id) values('Slaughterhouse Five', '10'); 

insert into books(book, id) values('Crime and Punishment', '11');
insert into books(book, id) values('1984', '12');
insert into books(book, id) values('Brave New World', '13');
insert into books(book, id) values('War and Peace', '14');
insert into books(book, id) values('Clockwork Orange', '15'); 


insert into books(book, id) values('The Girl with the Dragon Tattoo', '16');
insert into books(book, id) values('The Hunt for Red October', '17');
insert into books(book, id) values('Our Man in Havana', '18');
insert into books(book, id) values('The Day of the Jackal', '19');
insert into books(book, id) values('The Secret Agent', '20'); 


insert into books(book, id) values('The Notebook', '21');
insert into books(book, id) values('Fifty Shades of Grey', '22');
insert into books(book, id) values('Jane Eyre', '23');
insert into books(book, id) values('Wuthering Heights', '24');
insert into books(book, id) values('The Time Traveler’s Wife', '25'); 

