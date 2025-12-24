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
    color: #2c3e50;
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
</style>
</head>
<body>
<h4 align="right"><a href="http://localhost/DBgroupassignment/index.php">Home-Page</a></h4>
<h1>Users Table</h1>

<form method="POST">
  <input name="userid" placeholder="User ID">
  <input name="fullname" placeholder="Full Name">
  <input name="email" placeholder="Email">
  <input name="phone" placeholder="Phone">
  <input name="password" placeholder="Password">
  <input name="role" placeholder="Role">
  <input name="registrationdate" placeholder="Registration Date (YYYY-MM-DD)">
  <input name="status" placeholder="Status">
  <button type="submit" name="add">Add</button>
</form>

<?php
// CREATE
if (isset($_POST['add'])) {
  $stmt = $pdo->prepare("INSERT INTO users (userid,fullname,email,phone,password,role,registrationdate,status)
                         VALUES (:id,:name,:email,:phone,:pass,:role,:reg,:status)");
  $stmt->execute([
    ':id'=>$_POST['userid'], ':name'=>$_POST['fullname'], ':email'=>$_POST['email'],
    ':phone'=>$_POST['phone'], ':pass'=>$_POST['password'], ':role'=>$_POST['role'],
    ':reg'=>$_POST['registrationdate'], ':status'=>$_POST['status']
  ]);
  echo "<p style='color:green'>User added!</p>";
}

// DELETE
if (isset($_GET['delete'])) {
  $pdo->prepare("DELETE FROM users WHERE userid=:id")->execute([':id'=>$_GET['delete']]);
  echo "<p style='color:red'>User deleted!</p>";
}

// READ
$rows = $pdo->query("SELECT * FROM users ORDER BY registrationdate DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1">
<tr><th>UserID</th><th>Name</th><th>Email</th><th>Phone</th><th>Role</th><th>Status</th><th>Actions</th></tr>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['userid'] ?></td>
  <td><?= htmlspecialchars($r['fullname']) ?></td>
  <td><?= htmlspecialchars($r['email']) ?></td>
  <td><?= $r['phone'] ?></td>
  <td><?= $r['role'] ?></td>
  <td><?= $r['status'] ?></td>
  <td><a href="?delete=<?= $r['userid'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>