<?php include 'connect.php'; ?>
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
    color: #white;
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
      <a href="http://localhost/DBgroupassignment/index.php">Home-Page</a>
      <a href="http://localhost/DBgroupassignment/update.php">update-Info</a>
</nav>
<form method="POST">
  <input name="itemid" placeholder="Item ID">
  <input name="processor" placeholder="Processor">
  <input name="ram" placeholder="RAM">
  <input name="storage" placeholder="Storage">
  <input name="batterycapacity" placeholder="Battery">
  <input name="screensize" placeholder="Screen Size">
  <input name="operatingsystem" placeholder="OS">
  <button type="submit" name="add">Add</button>
</form>

<?php
if (isset($_POST['add'])) {
  $stmt = $pdo->prepare("INSERT INTO electronicgadget (itemid, processor, ram, storage, batterycapacity, screensize, operatingsystem)
                         VALUES (:id,:proc,:ram,:stor,:bat,:screen,:os)");
  $stmt->execute([
    ':id'=>$_POST['itemid'], ':proc'=>$_POST['processor'], ':ram'=>$_POST['ram'],
    ':stor'=>$_POST['storage'], ':bat'=>$_POST['batterycapacity'],
    ':screen'=>$_POST['screensize'], ':os'=>$_POST['operatingsystem']
  ]);
  echo "<p>Gadget added!</p>";
}
if (isset($_GET['delete'])) {
  $pdo->prepare("DELETE FROM electronicgadget WHERE itemid=:id")->execute([':id'=>$_GET['delete']]);
  echo "<p>Gadget deleted!</p>";
}
$rows = $pdo->query("SELECT * FROM electronicgadget")->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1"><tr><th>ItemID</th><th>Processor</th><th>RAM</th><th>Storage</th><th>Battery</th><th>Screen</th><th>OS</th><th>Actions</th></tr>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['itemid'] ?></td>
  <td><?= $r['processor'] ?></td>
  <td><?= $r['ram'] ?></td>
  <td><?= $r['storage'] ?></td>
  <td><?= $r['batterycapacity'] ?></td>
  <td><?= $r['screensize'] ?></td>
  <td><?= $r['operatingsystem'] ?></td>
  <td><a href="?delete=<?= $r['itemid'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>