<?php
$title = $_POST['title'] ?? '';
$desc = $_POST['description'] ?? '';
$link = $_POST['link'] ?? '';
$image = $_POST['image'] ?? '';
$date = $_POST['date'] ?? '';

if ($title && $desc) {
    $data = json_decode(file_get_contents('projects.json'), true) ?? [];
    $data[] = ['title' => $title, 'description' => $desc, 'link' => $link, 'image' => $image, 'date' => $date];
    touch($title . '.php');
    file_put_contents('projects.json', json_encode($data, JSON_PRETTY_PRINT));
}

header('Location: index.php');
exit;
?>