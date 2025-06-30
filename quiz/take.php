<?php include("../db/config.php"); session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Take Quiz</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Take Quiz</h2>
<form method="POST" action="result.php">
<?php
$q = $conn->query("SELECT * FROM quiz_questions");
while ($row = $q->fetch_assoc()) {
    echo "<p><strong>{$row['question']}</strong><br>";
    echo "<input type='radio' name='quiz[{$row['id']}]' value='A'> A. {$row['option_a']}<br>";
    echo "<input type='radio' name='quiz[{$row['id']}]' value='B'> B. {$row['option_b']}<br>";
    echo "<input type='radio' name='quiz[{$row['id']}]' value='C'> C. {$row['option_c']}<br>";
    echo "<input type='radio' name='quiz[{$row['id']}]' value='D'> D. {$row['option_d']}<br></p>";
}
?>
<input type="submit" name="submit" value="Submit Quiz">
</form>

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
