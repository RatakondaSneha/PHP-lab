USE database;

CREATE TABLE authors(
    email VARCHAR(128) NOT NULL PRIMARY KEY,
    hash_password VARCHAR(255) NOT NULL ,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    biography TEXT NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO authors (email, hash_password, first_name, last_name, biography) VALUES ("ratakondasneha@gmail.com","$2y$10$5lkf6snGlf.zPytnwYl9YeWW/Kz7nRZn5i3ytDQlltC9xGic9QWCm","Sneha","Ratakonda","Professor");


CREATE TABLE posts (
    slug VARCHAR(128) NOT NULL PRIMARY KEY, 
    title VARCHAR(225) NOT NULL,
    content TEXT,
    author VARCHAR(128) NOT NULL,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (author),
    FOREIGN KEY (author)
    REFERENCES authors (email)

);

INSERT INTO `posts` (slug , title , content , author) VALUES ("post-a" , "Post A" , "<article><h2>Post A<h2><section><p>  This is just a sample article </p></section></article>"  , "ratakondasneha@gmail.com");
INSERT INTO `posts` (slug , title , content , author) VALUES ("post-b" , "Post B" , "<article><h2>Post B<h2><section><p>  This is just a sample article </p></section></article>"  , "ratakondasneha@gmail.com");
INSERT INTO `posts` (slug , title , content , author) VALUES ("post-c" , "Post C" , "<article><h2>Post C<h2><section><p>  This is just a sample article </p></section></article>"  , "ratakondasneha@gmail.com");
INSERT INTO `posts` (slug , title , content , author) VALUES ("post-d" , "Post D" , "<article><h2>Post D<h2><section><p>  This is just a sample article </p></section></article>"  , "ratakondasneha@gmail.com");
INSERT INTO `posts` (slug , title , content , author) VALUES ("post-e" , "Post E" , "<article><h2>Post E<h2><section><p>  This is just a sample article </p></section></article>"  , "ratakondasneha@gmail.com");

