-- Create database
CREATE DATABASE college_website;
USE college_website;

-- Users table (for admin, student, faculty)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Hashed
    role ENUM('admin', 'student', 'faculty') NOT NULL,
    email VARCHAR(100),
    name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Students table (extends users)
CREATE TABLE students (
    id INT PRIMARY KEY,
    roll_no VARCHAR(20) UNIQUE,
    department VARCHAR(50),
    year INT,
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

-- Faculty table (extends users)
CREATE TABLE faculty (
    id INT PRIMARY KEY,
    department VARCHAR(50),
    designation VARCHAR(50),
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

-- News table
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Attendance table
CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    faculty_id INT,
    subject VARCHAR(100),
    date DATE,
    status ENUM('present', 'absent'),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (faculty_id) REFERENCES faculty(id)
);

-- Insert sample data
INSERT INTO users (username, password, role, email, name) VALUES
('admin', '$2y$10$examplehashedpassword', 'admin', 'admin@college.com', 'Admin User'),
('student1', '$2y$10$examplehashedpassword', 'student', 'student@college.com', 'John Doe'),
('faculty1', '$2y$10$examplehashedpassword', 'faculty', 'faculty@college.com', 'Dr. Smith');

INSERT INTO students (id, roll_no, department, year) VALUES (2, '12345', 'CS', 3);
INSERT INTO faculty (id, department, designation) VALUES (3, 'CS', 'Professor');