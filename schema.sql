CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  phone VARCHAR(20),
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE admins (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL
);
CREATE TABLE services (
  service_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  duration_minutes INT NOT NULL,
  price DECIMAL(8,2) NOT NULL
);
CREATE TABLE stylists (
  stylist_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  bio TEXT
);
CREATE TABLE appointments (
  appointment_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  stylist_id INT,
  service_id INT,
  appointment_date DATE,
  appointment_time TIME,
  status VARCHAR(20) DEFAULT 'confirmed',
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (stylist_id) REFERENCES stylists(stylist_id),
  FOREIGN KEY (service_id) REFERENCES services(service_id)
);
CREATE TABLE feedback (
  feedback_id INT AUTO_INCREMENT PRIMARY KEY,
  appointment_id INT,
  rating TINYINT,
  comments TEXT,
  FOREIGN KEY (appointment_id) REFERENCES appointments(appointment_id)
);
