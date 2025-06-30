<?php
$keyword = urlencode($_GET['q']);
$apiKey = "AIzaSyDTmLQHyoVwcGdUs9wxbRUC2l6QbSG8N1o"; // ⚠️ Replace this!

$url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$keyword&type=video&maxResults=3&key=$apiKey";

$response = file_get_contents($url);
$data = json_decode($response, true);

echo "<h2>Top 3 YouTube Results for: <i>" . htmlspecialchars($_GET['q']) . "</i></h2>";

foreach ($data['items'] as $item) {
    $title = $item['snippet']['title'];
    $thumb = $item['snippet']['thumbnails']['medium']['url'];
    $videoId = $item['id']['videoId'];
    $link = "https://www.youtube.com/watch?v=" . $videoId;

    echo "<div style='margin-bottom:20px;'>
        <img src='$thumb' style='width:200px'><br>
        <strong>$title</strong><br>
        <a href='$link' target='_blank'>Watch Video</a>
    </div>";
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
