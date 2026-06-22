<?php
$title = $_POST['title'] ?? '';
$desc = $_POST['description'] ?? '';
$link = $_POST['link'] ?? '';
$image = $_POST['image'] ?? '';
$date = $_POST['date'] ?? '';

$data = json_decode(file_get_contents('projects.json'), true) ?? [];
$project_data = [];


foreach ($data as $key => $project) {
    if ($project['title'] === $title) {
        $data[$title] = ['title' => $title, 'description' => $desc, 'link' => $link, 'image' => $image, 'date' => $date];
        file_put_contents('projects.json', json_encode($data, JSON_PRETTY_PRINT));

        header('Location: index.php');
        exit;
    }
}

if ($title && $desc) {
    $data[$title] = ['title' => $title, 'description' => $desc, 'link' => $link, 'image' => $image, 'date' => $date];
    touch($title . '.php');
    file_put_contents('projects.json', json_encode($data, JSON_PRETTY_PRINT));
}

header('Location: index.php');
exit;
?>