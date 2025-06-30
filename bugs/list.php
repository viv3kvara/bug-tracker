<?php include("../db/config.php"); session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>All Bugs</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Bug List</h2>
<table border="1">
<tr>
    <th>ID</th><th>Title</th><th>Status</th><th>Priority</th><th>Created At</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM bugs");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['title']}</td>
        <td>{$row['status']}</td>
        <td>{$row['priority']}</td>
        <td>{$row['created_at']}</td>
    </tr>";
}
?>
</table>

<?php
// Show dashboard link based on user role
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    $dashboard = ($role == 'admin') ? '../admin/dashboard.php' : '../dashboard.php';
    echo "<p style='margin-top:20px;'><a href='$dashboard'>⬅️ Back to Dashboard</a></p>";
}
?>

</body>
</html>
