<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>Симплекс: Админ-панель</title>
</head>

<body>
    <?php if (isset($data['selectedService'])) { ?>
        <article>
            <h2> <a href="./admin.php"><button>К списку услуг</button></a> Редактирование услуги</h2>
            <div class="container center">
                <form method="POST">
                    <label>ID<input type="text" name="id" size="10" readonly value="<?= $data['selectedService']['id'] ?>"></label>
                    <label>Название<input type="text" name="name" size="50" value="<?= $data['selectedService']['name'] ?>" required></label>
                    <label>Краткое описание<textarea name="short_description" required><?= $data['selectedService']['short_description'] ?></textarea></label>
                    <label>Полное описание<textarea name="full_description"><?= $data['selectedService']['full_description'] ?></textarea></label>
                    <label>Состав услуги
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </thead>
                            <tbody>
                                <?php foreach ($data['serviceContent'] as $entry) { ?>
                                    <tr>
                                        <td><?= $entry['id'] ?> <input type="hidden" name="serviceContent[<?= $entry['id'] ?>][id]" value="<?= $entry['id'] ?>"></td>
                                        <td>
                                            <input type="text" name="serviceContent[<?= $entry['id'] ?>][description]" maxlength="100" size="50" value="<?= $entry['description'] ?>">
                                        </td>
                                        <td>
                                            <input type="number" name="serviceContent[<?= $entry['id'] ?>][price]" min="0" max="999999" value="<?= $entry['price'] ?>"> рублей
                                        </td>
                                        <td>
                                            <input type="submit" formaction="?edit=<?= $data['selectedService']['id'] ?>&deleteRow=<?= $entry['id'] ?>" value="Удалить">
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3" class="text-center"><input type="submit" formaction="?edit=<?= $data['selectedService']['id'] ?>&addRow" value="Добавить"></td>
                                </tr>
                            </tbody>
                        </table>
                    </label>
                    <input type="submit" value="Сохранить">
                </form>
            </div>
        </article>
    <?php } else { ?>
        <article>
            <h2><a href="?logout"> <button>Выйти</button></a>Список услуг</h2>
            <div class="container center">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Название</th>
                        <th colspan="2">Действия</th>
                    </thead>
                    <tbody>
                        <?php foreach ($data['services'] as $service) { ?>
                            <tr>
                                <td><?= $service['id'] ?></td>
                                <td><?= $service['name'] ?></td>
                                <td><a href="?edit=<?= $service['id'] ?>"><button>Редактировать</button></a></td>
                                <td><a href="?delete=<?= $service['id'] ?>"><button>Удалить</button></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-center">
                                <a href="?new"><button>Создать</button></a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </article>
    <?php } ?>



</body>

</html>
