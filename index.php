<?php
if (isset($_GET['delete'])) {
    $projects = json_decode(file_get_contents('projects.json'), true) ?? [];
    $key = (int)$_GET['delete'];
    if (isset($projects[$key])) {
        unset($projects[$key]);
        $projects = array_values($projects);
        file_put_contents('projects.json', json_encode($projects, JSON_PRETTY_PRINT));
        header('Location: index.php');
        exit;
    }
}

$projects = json_decode(file_get_contents('projects.json'), true) ?? [];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои проекты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container py-5">
    <a href="author.html" style="
    padding: 15px 30px;
    font-weight: bold;
    border: 1.5px solid #001c9c" 
    class="btn btn-primary"
    >Войти</a>

    <h1 class="text-center mb-4">Мои проекты</h1>
    <div class="row">
        <?php foreach ($projects as $key => $project): ?>
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card h-100 shadow-hover">
                <img src="<?= $project['image'] ?: 'https://via.placeholder.com/300' ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $project['title'] ?></h5>
                    <p class="card-text"><?= $project['description'] ?></p>
                    <a href="/admin.php?project_name=<?= $project['title'] ?>" class="btn btn-primary" target="_blank">Редактировать</a>
                    <a href="<?= $project['link'] ?>" class="btn btn-primary" target="_blank">Смотреть</a>
                    <a href="?delete=<?= $key ?>" class="btn btn-danger" onclick="return confirm('Удалить проект?')">Удалить</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <a href="admin.php" class="btn btn-success mt-3">Добавить проект</a>
</div>
</body>
</html>