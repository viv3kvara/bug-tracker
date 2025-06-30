<!DOCTYPE html>
<html>
<head>
    <title>BugBot - Chat Assistant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>💬 BugBot - Your Debugging Assistant</h2>
<div class="chatbox" id="chatbox"></div>

<form id="chat-form">
    <input type="text" id="user-input" placeholder="Ask me something..." required>
    <button type="submit">Send</button>
</form>

<script>
const form = document.getElementById('chat-form');
const input = document.getElementById('user-input');
const chatbox = document.getElementById('chatbox');

form.onsubmit = async function(e) {
    e.preventDefault();
    const userText = input.value;
    chatbox.innerHTML += "<div class='user-msg'>👤: " + userText + "</div>";

    const res = await fetch("bot-response.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "msg=" + encodeURIComponent(userText)
    });

    const data = await res.text();
    chatbox.innerHTML += "<div class='bot-msg'>🤖: " + data + "</div>";
    chatbox.scrollTop = chatbox.scrollHeight;
    input.value = "";
};
</script>

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
