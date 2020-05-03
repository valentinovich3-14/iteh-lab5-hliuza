<?php require 'connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1 лабораторная - 3 вариант</title>
</head>
<body>
<!--  -->
<?php require 'select-forms/nurse.php'; ?>
<form action="result-forms/nurse.php">
    <p><b>Медсестры выбранного отделения</b></p>
        <select name="nurse">
            <?php
                foreach ($dbh->query($nursestart) as $row) {
                    echo '<option>'.$row['name'].'</option>';
                }
            ?>
        </select>
    <p><input type="submit" value="Выбрать"></p>
</form>
<!--  -->
<?php require 'select-forms/choose.php'; ?>
<form action="result-forms/choose.php">
    <p><b>перечень палат, в которых дежурит выбранная медсестра</b></p>
    <select name="nursechoose">
        <?php
            foreach ($dbh->query($choosestart) as $row) {
                echo '<option>'.$row['name'].'</option>';
            }
        ?>
    </select>
    <p><input type="submit" value="Выбрать"></p>
</form>
<!--  -->
<?php require 'select-forms/shifts.php'; ?>
<form action="result-forms/shifts.php">
    <p><b>дежурства (в любых палатах) в указанную смену.</b></p>
    <select name="shift_choose">
        <?php
            foreach ($dbh->query($shiftsstart) as $row) {
                echo '<option>'.$row['shift'].'</option>';
            }
        ?>
    </select>
    <p><input type="submit" value="Выбрать"></p>
</form>


<!-- хз почему, но автоинкремент не работает в таблице, поэтому id добавляем вручную -->
<form action="insert-forms/insert-nurse.php">
    <p><b>Добавление медсестры в бд</b></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя медсестры</th>
            <th>Дата дежурства</th>
            <th>Отдел</th>
            <th>Смена</th>
        </tr>
        <tr>
            <td><input type="text" name="nurse_id" required="required"></td>
            <td><input type="text" name="nurse_name" required="required"></td>
            <td><input type="date" name="nurse_date" required="required"></td>
            <td><input type="number" name="nurse_depart" required="required"></td>
            <td><input type="text" name="nurse_shift" required="required"></td>
        </tr>
    </table>
    <p><input type="submit" value="Добавить"></p>
</form>

<form action="insert-forms/insert-ward.php">
    <p><b>Добавление палаты в бд</b></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Название палаты</th>
        </tr>
        <tr>
            <td><input type="text" name="ward_id" required="required"></td>
            <td><input type="text" name="ward_name" required="required"></td>
        </tr>
    </table>
    <p><input type="submit" value="Добавить"></p>
</form>

<form action="insert-forms/insert-connection.php">
    <p><b>Установка связи между палатой и медсестрой</b></p>
    <table>
        <tr>
            <th>Медсестра</th>
            <th>Палата</th>
        </tr>
        <tr>
            <td>
                <select name="nurse_name">
                    <?php
                        foreach ($dbh->query($choosestart) as $row) {
                            echo '<option>'.$row['name'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>
                <select name="ward_name">
                    <?php
                        foreach ($dbh->query($nursestart) as $row) {
                            echo '<option>'.$row['name'].'</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <p><input type="submit" value="Добавить"></p>
</form>


</body>
</html>