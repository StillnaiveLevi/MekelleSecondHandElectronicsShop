<?php
include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Mekelle second-hand electronics</title>
  <style>
    body { 
      font-family: Arial; 
      margin:20px; 
    }
    input, button { 
      margin:5px; 
      padding:6px; 
    }
    table { 
      border-collapse: collapse; 
      width:100%; 
      margin-top:10px; 
    }
    th, td { 
      border:1px solid #ccc; 
      padding:8px; 
    }
    th { 
      background:#2c3e50; 
      color:#fff; 
    }
    button.delete { 
      background:#e74c3c; 
      color:#fff; 
      border:none; 
    }
  </style>
</head>
<body>
<h4 align="right"><a href="http://localhost/DBgroupassignment/index.php">Home-Page</a></h4>
<h1><center>Accessory Table</center></h1>

<!-- Create/Update Form -->
<form method="POST">
  <input name="itemid" placeholder="Item ID">
  <input name="accessorytype" placeholder="Type">
  <input name="compatibility" placeholder="compatibility">
  <button type="submit" name="add">Add</button>
</form>

<?php
// CREATE
if (isset($_POST['add'])) {
  $stmt = $pdo->prepare("INSERT INTO accessory (itemid, accessorytype, compatibility)
                         VALUES (:id,:type,:compat)");
  $stmt->execute([
    ':id'=>$_POST['itemid'], ':type'=>$_POST['accessorytype'],
    ':compat'=>$_POST['compatibility']
  ]);
  echo "<p style='color:green'>Accessory added!</p>";
}

// DELETE
if (isset($_GET['delete'])) {
  $stmt = $pdo->prepare("DELETE FROM accessory WHERE itemid=:id");
  $stmt->execute([':id'=>$_GET['delete']]);
  echo "<p style='color:red'>Accessory deleted!</p>";
}

// READ
$rows = $pdo->query("SELECT * FROM accessory")->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
<tr><th>ItemID</th><th>Type</th><th>Compatability</th><th>Material</th><th>Warranty</th><th>Actions</th></tr>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['itemid'] ?></td>
  <td><?= htmlspecialchars($r['accessorytype']) ?></td>
  <td><?= htmlspecialchars($r['compatibility']) ?></td>
  <td><a href="?delete=<?= $r['itemid'] ?>"><button class="delete">Delete</button></a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>