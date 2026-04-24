-- Create Database
CREATE DATABASE IF NOT EXISTS pos_system;
USE pos_system;

-- USERS TABLE
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('student','cashier','admin')
);

-- PRODUCTS TABLE
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price DECIMAL(10,2),
  category VARCHAR(50),
  image VARCHAR(255),
  stock_quantity INT DEFAULT 0
);

-- ORDERS TABLE
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  total_amount DECIMAL(10,2),
  status ENUM('pending','preparing','ready','completed'),
  order_type ENUM('online','walk-in'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- ORDER ITEMS TABLE
CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  quantity INT,
  subtotal DECIMAL(10,2),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- INVENTORY LOGS (OPTIONAL BUT GOOD)
CREATE TABLE inventory_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  change_amount INT,
  reason VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- SAMPLE USERS
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@gmail.com', 'admin123', 'admin'),
('Cashier User', 'cashier@gmail.com', 'cashier123', 'cashier'),
('Student User', 'student@gmail.com', 'student123', 'student');

-- SAMPLE PRODUCTS
INSERT INTO products (name, price, category, stock_quantity) VALUES
('Burger', 50.00, 'Food', 100),
('Fries', 30.00, 'Food', 100),
('Coke', 20.00, 'Drinks', 100);
