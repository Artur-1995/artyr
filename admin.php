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
            <h2 class="mb-4">Новый проект</h2>
            <form method="POST" action="save.php" class="p-4 border rounded bg-light">
                <input type="text" name="title" placeholder="Название" class="form-control mb-2" required>
                <textarea name="description" placeholder="Описание" class="form-control mb-2"></textarea>
                <input type="url" name="link" placeholder="Ссылка" class="form-control mb-2">
                <input type="url" name="image" placeholder="URL картинки" class="form-control mb-2">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="index.php" class="btn btn-secondary">Назад</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>