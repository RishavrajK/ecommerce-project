# 📦 Clothify – E-commerce Website

![PHP](https://img.shields.io/badge/PHP-7.4+-blue?logo=php)  
![MySQL](https://img.shields.io/badge/MySQL-5.7+-yellow?logo=mysql)

## 📖 Overview
**Clothify** is a simple e-commerce website built as a **Minimum Viable Product**.  
It demonstrates core online shopping functionalities such as browsing products, adding items to a cart, checkout, and basic order management. An admin panel is included for product management.  

⚡ Focus: Functionality over aesthetics.  

---

## ✨ Features
### 🛒 User
- Browse product listings  
- View product details  
- Register & login (with password hashing)  
- Session-based shopping cart  
- Checkout with shipping details  
- Simulated payment (no gateway)  
- View order history  

### 🔑 Admin
- Admin login (basic authentication)  
- Add new products (with image upload)  
- View all products  
- Delete products  

---

## 🗂️ Project Structure
```
clothify/
│── db.php               # Database connection
│── header.php           # Common header & navigation
│── footer.php           # Common footer
│── style.css            # Stylesheet
│── index.php            # Product listing (homepage)
│── product_details.php  # Single product details
│── user_register.php    # User registration
│── user_login.php       # User login
│── logout.php           # Logout
│── cart.php             # Shopping cart
│── checkout.php         # Checkout flow
│── my_orders.php        # User orders
│
├── admin/
│   ├── admin_login.php    # Admin login
│   ├── insert_product.php # Add product
│   └── view_product.php   # View/Delete products
│
└── uploads/             # Product images
```

---

## 🛠️ Tech Stack
- **Frontend:** HTML, CSS, JavaScript (basic interactivity)  
- **Backend:** PHP (procedural)  
- **Database:** MySQL  

---

## 🗄️ Database Setup
### 1. Create Database
```sql
CREATE DATABASE clothify;
USE clothify;
```

### 2. Tables
```sql
-- Users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Products
CREATE TABLE products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_title VARCHAR(150) NOT NULL,
  product_desc TEXT,
  product_price DECIMAL(10,2) NOT NULL,
  product_image VARCHAR(255)
);

-- Orders
CREATE TABLE user_orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  order_date DATETIME,
  order_status VARCHAR(50),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Order Details
CREATE TABLE orders_pending (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  quantity INT,
  FOREIGN KEY (order_id) REFERENCES user_orders(order_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);
```

---

## 🚀 Installation & Setup
1. Install **XAMPP/WAMP/LAMP**.  
2. Clone this repository into your server directory:  
   ```bash
   git clone https://github.com/<your-username>/clothify.git
   ```
3. Import `clothify.sql` into **phpMyAdmin**.  
4. Update `db.php` with your database credentials.  
5. Run in browser:  
   ```
   http://localhost/clothify/
   ```

---

## 🔑 Default Credentials
- **Admin Login**  
  - Username: `raj`  
  - Password: `1234`  

---

## 🖼️ Screenshots
>   

- 🏠 Homepage (Product Listing)  
- 📄 Product Details  
- 🛒 Shopping Cart  
- ✅ Checkout Page  
- 📦 My Orders  
- ⚙️ Admin Dashboard  

---

## ⚠️ Limitations
- No real payment gateway (simulated).  
- No product categories/filters.  
- Admin can only add/delete products (no edit).  
- Basic UI (focus on working features).  

---

## 🚧 Future Improvements
- Integrate real payment gateway (Stripe, Razorpay, PayPal).  
- Add product categories, filters, and search.  
- Improve UI/UX with a modern frontend framework.  
- Email notifications for order confirmation.  
- Role-based authentication (user vs admin).  

---

## 👨‍💻 Author
- **Rishav Raj**  
📧 [rishavraj3378kant@gmail.com](mailto:rishavraj3378kant@gmail.com)  
🔗 [LinkedIn](https://www.linkedin.com/in/rishav-raj-713392315) | [GitHub](https://github.com/RishavrajK)  
