<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Человеческие сверхспособности</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'index.php'; ?>
    <header>
        <div id="название">
            <h1>Сверхспособности</h1>
        </div>
    </header>
    <div class="container">
    <?php
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            echo '<div class="errors">';
            foreach ($_SESSION['errors'] as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
        } elseif (isset($_COOKIE['name'])) {
            echo '<div class="success">';
            echo '<p>Форма успешно отправлена</p>';
            echo '</div>';
        }
        ?>
        <form action="index.php" method="POST" id="form">
            <label>
                Введите имя:<br>
                <?= showError('name') ?>
                <input name="name" type="text" id="name" placeholder="Введите имя" value="<?= getFieldValue('name') ?>"/><br>
            </label>
            <label>
                Адрес электронной почты:<br>
                <?= showError('email') ?>
                <input name="email" type="email" placeholder="Введите email" value="<?= getFieldValue('email') ?>"/><br>
            </label>
            <label for="year">Год рождения</label>
            <?= showError('year') ?>
            <select name="year" id="year">
                <option value="<?= getSelected('year', "") ?>">Выберите год</option>
            </select>
            <br>
            Выберите пол:<br>
            <?= showError('gender') ?>
            <label><input type="radio" name="gender" value="female" <?= getChecked('gender', 'female') ?>/>
            Женский</label>
            <label><input type="radio" name="gender" value="male" <?= getChecked('gender', 'male') ?>/>
            Мужской</label>
            <br>
            Количество конечностей:<br>
            <?= showError('limbs') ?>
            <label><input type="radio" name="limbs" value="1" <?= getChecked('limbs', '1') ?>/>
                1</label>
            <label><input type="radio" name="limbs" value="2" <?= getChecked('limbs', '2') ?>/>
                2</label>
            <label><input type="radio" name="limbs" value="3" <?= getChecked('limbs', '3') ?>/>
                3</label>
            <label><input type="radio" name="limbs" value="4" <?= getChecked('limbs', '4') ?>/>
                4</label>
            <label>
                <br>
                Сверхспособности:<br>
                <select name="powers[]" id="powers" multiple="multiple">
                    <option value="invisibility" <?= getSelected('powers', 'invisibility') ?>>Невидимость</option>
                    <option value="stoppingtime" <?= getSelected('powers', 'stoppingtime') ?>>Остановка времени</option>
                    <option value="ignition" <?= getSelected('powers', 'ignition') ?>>Воспламенение</option>
                    <option value="elements" <?= getSelected('powers', 'elements') ?>>Управление стихиями</option>
                </select>
                <?php if (!empty($messages['powers'])) {print($messages['powers']);}?>
                <br>
                Биография:<br>
                <textarea name="biography" id="biography" placeholder="Напишите о себе"><?= getFieldValue('biography') ?></textarea><br>
                <label><input type="checkbox" name="check_kontrol" value="accepted" <?= getChecked('check_kontrol', 'accepted') ?>/>
                    с контрактом ознакомлен(а)</label>
                <br>
                <input type="submit" class="submit" value="Отправить" />
        </form>
        <script>
              const select = document.getElementById('year');
              const currentYear = new Date().getFullYear();
              for (let i = currentYear; i >= currentYear - 100; i--) {
                  const option = document.createElement('option');
                  option.value = i;
                  option.text = i;
                  if(i == <?= isset($_COOKIE['year']) ? $_COOKIE['year'] : '""' ?>) 
                     {
                     option.selected = true; // выбираем этот элемент, если год сохранен в куке
                     }
                  select.add(option);
}

    </script>
    </div>
</body>
