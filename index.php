<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mekelle second-hand Electronics Shop</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      margin: 0;
      background: #f4f6f9;
      color: #333;
    }
    header {
      background: #2c3e50;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    header h1 { margin: 0; font-size: 26px; }
    header p { margin: 5px 0 0; font-size: 14px; color: #ddd; }
    .container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 20px;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }
    .card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.2s;
    }
    .card:hover { transform: translateY(-5px); }
    .card h2 {
      margin: 0 0 10px;
      font-size: 18px;
      color: #2c3e50;
    }
    .card p {
      font-size: 14px;
      color: #666;
      margin-bottom: 15px;
    }
    .card a {
      display: inline-block;
      padding: 10px 15px;
      background: #2c3e50;
      color: #fff;
      border-radius: 4px;
      text-decoration: none;
      transition: background 0.2s;
    }
    .card a:hover { background: #2c3e50; }
    footer {
      text-align: center;
      padding: 20px;
      font-size: 12px;
      color: #777;
    }
    nav {
    background: #2c3e50;         
    display: flex;                
    justify-content: center;      
    padding: 12px 0;
    gap: 30px;                  
  }

  nav a {
    color: #ecf0f1;               
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    padding: 8px 12px;
    border-radius: 4px;
    transition: background 0.3s, color 0.3s;
  }

  </style>
</head>
<body>
  <header>
    <h1>Mekelle Second-Hand Electronics Shop</h1>
    <p>Manage gadgets, accessories, users, and orders</p>
  </header>
  <nav>
      <a href="http://localhost/DBgroupassignment/index.php">Home-Page</a>
      <a href="http://localhost/DBgroupassignment/update.php">update-Info</a>
  </nav>

  <div class="container">
    <div class="grid">
      <div class="card">
        <h2>Accessory</h2>
        <p>Manage accessory items (type, material, warranty).</p>
        <a href="accessory.php">Go to Accessory</a>
      </div>
      <div class="card">
        <h2>Category</h2>
        <p>Define categories and descriptions for items.</p>
        <a href="category.php">Go to Category</a>
      </div>
      <div class="card">
        <h2>Electronic Gadget</h2>
        <p>Manage gadgets (processor, RAM, storage, OS).</p>
        <a href="electronicgadget.php">Go to Gadget</a>
      </div>
      <div class="card">
        <h2>Item</h2>
        <p>Full item details including seller, brand, price, and stock.</p>
        <a href="item.php">Go to Item</a>
      </div>
      <div class="card">
        <h2>Orders</h2>
        <p>Track buyer orders, amounts, and statuses.</p>
        <a href="orders.php">Go to Orders</a>
      </div>
      <div class="card">
        <h2>Users</h2>
        <p>Manage user profiles, roles, and registration info.</p>
        <a href="users.php">Go to Users</a>
      </div>
    </div>
  </div>

  <footer>
    &copy; <?= date("Y"); ?>Mekelle Second-Hand Electronics Shop. All rights reserved.
  </footer>
</body>
</html>