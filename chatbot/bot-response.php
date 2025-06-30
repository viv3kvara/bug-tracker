<?php
$msg = strtolower(trim($_POST['msg']));

$replies = [
    "hi" => "Hello! How can I help you with your bugs today?",
    "hello" => "Hi there! Need help with bug tracking?",
    "how to report a bug" => "Go to 'Report Bug' from the dashboard, fill in details, and submit.",
    "view bugs" => "Click on 'View Bugs' from your dashboard to see all reported issues.",
    "quiz" => "You can test your debugging skills from the Quiz section.",
    "bye" => "Goodbye! Come back if you need help again.",
];

$response = "Sorry, I didn’t understand that. Try asking: 'how to report a bug', 'quiz', or 'view bugs'.";

foreach ($replies as $key => $value) {
    if (strpos($msg, $key) !== false) {
        $response = $value;
        break;
    }
}

echo $response;
?>
