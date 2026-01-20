<?php 
include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Mekelle second-hand electronics</title>
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
    padding: 15px;
    text-align: center;
  }
  .container {
    max-width: 900px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }
  h1 {
    margin-top: 0;
    color: white;
  }
  form {
    margin-bottom: 20px;
    background: #ecf0f1;
    padding: 15px;
    border-radius: 6px;
  }
  input, button {
    margin: 5px;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
  }
  button {
    background: #2c3e50;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background 0.2s;
  }
  button:hover { background: #2c3e50; }
  button.delete { background: #e74c3c; }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
  }
  th {
    background: #2c3e50;
    color: #fff;
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
      <a href="/index.php">Home-Page</a>
      <a href="/update.php">update-Info</a>
</nav>

<form method="POST">
  <input name="ordered" placeholder="Order ID">
  <input name="buyerid" placeholder="Buyer ID">
  <input name="orderdate" placeholder="Order Date (YYYY-MM-DD)">
  <input name="totalamount" placeholder="Total Amount">
  <input name="orderstatus" placeholder="Status">
  <button type="submit" name="add">Add</button>
</form>

<?php
// CREATE
if (isset($_POST['add'])) {
  $stmt = $pdo->prepare("INSERT INTO orders (ordered,buyerid,orderdate,totalamount,orderstatus)
                         VALUES (:id,:buyer,:date,:total,:status)");
  $stmt->execute([
    ':id'=>$_POST['ordered'], ':buyer'=>$_POST['buyerid'],
    ':date'=>$_POST['orderdate'], ':total'=>$_POST['totalamount'],
    ':status'=>$_POST['orderstatus']
  ]);
  echo "<p style='color:green'>Order added!</p>";
}

// DELETE
if (isset($_GET['delete'])) {
  $pdo->prepare("DELETE FROM orders WHERE ordered=:id")->execute([':id'=>$_GET['delete']]);
  echo "<p style='color:red'>Order deleted!</p>";
}

// READ
$rows = $pdo->query("SELECT * FROM orders ORDER BY orderdate DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1">
<tr><th>OrderID</th><th>BuyerID</th><th>Date</th><th>Total</th><th>Status</th><th>Actions</th></tr>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['orderid'] ?></td>
  <td><?= $r['buyerid'] ?></td>
  <td><?= $r['orderdate'] ?></td>
  <td><?= $r['totalamount'] ?></td>
  <td><?= $r['orderstatus'] ?></td>
  <td><a href="?delete=<?= $r['orderid'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>