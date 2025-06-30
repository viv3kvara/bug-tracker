<?php
include("../db/config.php");
session_start();
$user_id = $_SESSION['user']['id'];

$answers = $_POST['quiz'];
$score = 0;
$total = count($answers);

foreach ($answers as $id => $ans) {
    $q = $conn->query("SELECT correct_option FROM quiz_questions WHERE id = $id");
    $row = $q->fetch_assoc();
    if ($row['correct_option'] == $ans) {
        $score++;
    }
}

// Optional: store result
$conn->query("INSERT INTO quiz_results(user_id, score, total) VALUES ($user_id, $score, $total)");

echo "<h2>Quiz Result</h2>";
echo "You scored <strong>$score out of $total</strong>";
?>

<?php
// Show dashboard link based on user role
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    $dashboard = ($role == 'admin') ? '../admin/dashboard.php' : '../dashboard.php';
    echo "<p style='margin-top:20px;'><a href='$dashboard'>⬅️ Back to Dashboard</a></p>";
}
?>
