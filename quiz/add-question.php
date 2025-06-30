<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include("../db/config.php");
?>

<!DOCTYPE html>
<html>
<head><title>Add Quiz Question</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Add Quiz Question</h2>
<form method="POST">
    Question: <textarea name="question" required></textarea><br>
    Option A: <input type="text" name="a" required><br>
    Option B: <input type="text" name="b" required><br>
    Option C: <input type="text" name="c" required><br>
    Option D: <input type="text" name="d" required><br>
    Correct Option: 
    <select name="correct">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select><br>
    <input type="submit" name="submit" value="Add Question">
</form>

<?php
    
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO quiz_questions (question, option_a, option_b, option_c, option_d, correct_option) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $_POST['question'], $_POST['a'], $_POST['b'], $_POST['c'], $_POST['d'], $_POST['correct']);
    $stmt->execute();
    echo "Question Added Successfully!";
}
?>

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
