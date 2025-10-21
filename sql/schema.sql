-- Skema MySQL dasar (versi awal). Sesuaikan setelah review.
CREATE DATABASE IF NOT EXISTS siakad CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE siakad;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(50) NOT NULL,
  person_id INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE prodi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(10) NOT NULL,
  name VARCHAR(150) NOT NULL
);

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nim VARCHAR(30) NOT NULL UNIQUE,
  name VARCHAR(150) NOT NULL,
  prodi_id INT,
  year INT,
  user_id INT,
  pa_lecturer_id INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE lecturers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nidn VARCHAR(50) NOT NULL UNIQUE,
  name VARCHAR(150) NOT NULL,
  user_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE semesters (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(50),
  name VARCHAR(100),
  is_open TINYINT(1) DEFAULT 0
);

CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(50),
  name VARCHAR(200),
  sks INT DEFAULT 3,
  prodi_id INT
);

CREATE TABLE classes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_id INT NOT NULL,
  semester_id INT NOT NULL,
  prodi_id INT NOT NULL,
  lecturer_id INT DEFAULT NULL,
  quota INT DEFAULT 30
);

CREATE TABLE krs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  semester_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  approved_by_pa TINYINT(1) DEFAULT 0
);

CREATE TABLE krs_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  krs_id INT NOT NULL,
  class_id INT NOT NULL,
  sks INT DEFAULT 0
);

CREATE TABLE payments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  amount DECIMAL(12,2) DEFAULT 0,
  va_number VARCHAR(100),
  paid_at DATETIME DEFAULT NULL,
  note TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE grades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  class_id INT NOT NULL,
  grade VARCHAR(5),
  created_by INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE payments_lock (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_user_id INT NOT NULL,
  locked_until DATETIME NOT NULL,
  note TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- contoh data
INSERT INTO prodi (code, name) VALUES ('TI', 'Teknik Informatika'), ('SI', 'Sistem Informasi');
INSERT INTO semesters (code, name, is_open) VALUES ('2025-1', '2025 Ganjil', 1), ('2024-2', '2024 Genap', 0);