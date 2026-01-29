CREATE DATABASE IF NOT EXISTS myapp;
USE myapp;

-- Create users table
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_hash VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a child table which will store a users notes. Link it to the users table using foreign key. 
CREATE TABLE IF NOT EXISTS notes (
    note_id AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    content VARCHAR(5000),
    parentid INT,
    FOREIGN KEY (parentid) REFERENCES user(id)
);


