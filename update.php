<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Unified Update Page</title>
  <style>
    body { font-family: "Segoe UI", Arial, sans-serif; background:#f4f6f9; margin:0; }
    header { background:#2c3e50; color:#fff; padding:20px; text-align:center; }
    .container { max-width:900px; margin:30px auto; background:#fff; padding:20px; border-radius:8px; }
    h1 { margin-top:0; color:white; }
    form { margin-bottom:20px; background:#ecf0f1; padding:15px; border-radius:6px; }
    input, select, button { margin:5px; padding:8px; border-radius:4px; border:1px solid #ccc; }
    button { background:#2c3e50; color:#fff; border:none; cursor:pointer; }
    button:hover { background:#2980b9; }
    table { width:100%; border-collapse:collapse; margin-top:10px; }
    th, td { border:1px solid #ddd; padding:10px; text-align:left; }
    th { background:#3498db; color:#fff; }
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
      <a href="./index.php">Home-Page</a>
      <a href="./update.php">update-Info</a>
</nav>
<div class="container">

<form method="POST">
  <label>Select Table:</label>
  <select name="table" required>
    <option value="item">Item</option>
    <option value="accessory">Accessory</option>
    <option value="electronicgadget">Electronic Gadget</option>
    <option value="users">Users</option>
    <option value="orders">Orders</option>
    <option value="category">Category</option>
  </select><br>

  <label>Primary Key (ID):</label>
  <input name="id" placeholder="Enter ID" required><br>

  <label>Field to Update:</label>
  <input name="field" placeholder="Column name" required><br>

  <label>New Value:</label>
  <input name="value" placeholder="New value" required><br>

  <button type="submit" name="update">Update Record</button>
</form>

<?php
if (isset($_POST['update'])) {
    $table = $_POST['table'];
    $id = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Map primary key column names for each table
    $pk = [
      'item' => 'itemid',
      'accessory' => 'itemid',
      'electronicgadget' => 'itemid',
      'users' => 'userid',
      'orders' => 'ordered',
      'category' => 'categoryid'
    ];

    if (!array_key_exists($table, $pk)) {
        echo "<p style='color:red'>Invalid table selected.</p>";
    } else {
        $primaryKey = $pk[$table];
        // Build dynamic SQL safely
        $sql = "UPDATE $table SET $field = :val WHERE $primaryKey = :id";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':val'=>$value, ':id'=>$id]);
            echo "<p style='color:green'>Record updated in $table!</p>";
        } catch (Exception $e) {
            echo "<p style='color:red'>Error: ".$e->getMessage()."</p>";
        }
    }
}
?>

</div>
</body>
</html>