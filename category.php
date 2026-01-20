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
  <input name="categoryid" placeholder="Category ID">
  <input name="categoryname" placeholder="Name">
  <input name="description" placeholder="Description">
  <button type="submit" name="add">Add</button>
</form>

<?php
if (isset($_POST['add'])) {
  $stmt = $pdo->prepare("INSERT INTO category (categoryid, categoryname, description) VALUES (:id,:name,:desc)");
  $stmt->execute([':id'=>$_POST['categoryid'], ':name'=>$_POST['categoryname'], ':desc'=>$_POST['description']]);
  echo "<p>Category added!</p>";
}
if (isset($_GET['delete'])) {
  $pdo->prepare("DELETE FROM category WHERE categoryid=:id")->execute([':id'=>$_GET['delete']]);
  echo "<p>Category deleted!</p>";
}
$rows = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1"><tr><th>ID</th><th>Name</th><th>Description</th><th>Actions</th></tr>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['categoryid'] ?></td>
  <td><?= htmlspecialchars($r['categoryname']) ?></td>
  <td><?= htmlspecialchars($r['description']) ?></td>
  <td><a href="?delete=<?= $r['categoryid'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>