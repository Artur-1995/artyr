<?php
$data = json_decode(file_get_contents('projects.json'), true) ?? [];
$project_name = $_GET['project_name'] ?? '';
$project_data = [];
foreach ($data as $key => $project) {
    if ($project['title'] === $project_name) {
        $project_data = $project;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить проект</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4"><?= isset($project_data) ? $project_data['title'] : 'Новый проект' ?></h2>
                <form method="POST" action="save.php" class="p-4 border rounded bg-light">
                    <input type="text" name="title" placeholder="Название" class="form-control mb-2" required value="<?= $project_data['title'] ? $project_data['title'] : ''?>">
                    <textarea name="description" placeholder="Описание" class="form-control mb-2"><?= $project_data['description'] ? $project_data['description'] : ''?></textarea>
                    <input type="url" name="link" placeholder="Ссылка" class="form-control mb-2" value="<?= $project_data['link'] ? $project_data['link'] : ''?>">
                    <input type="url" name="image" placeholder="URL картинки" class="form-control mb-2" value="<?= $project_data['image'] ? $project_data['image'] : ''?>">
                    <input type="datetime-local" name="date" placeholder="Дата" class="form-control mb-2" value="<?= !empty($project_data['date']) ? $project_data['date'] : ''?>">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="index.php" class="btn btn-secondary">Назад</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>