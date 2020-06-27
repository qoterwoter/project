<style>
    table * {
        margin:0;
        font-size: 15px !important;
    }
    table th:nth-child(4) {
        width: 1100px;
    }
    table tbody > tr {
        background-color: wheat;
    }
</style>

<?php

    $connection = mysqli_connect('std-mysql','std_962','12345678','std_962');

    echo $news_number;
    function newsOut($link) {
        $sql_news = 'SELECT * FROM planes_news';
        $result = mysqli_query($link, $sql_news);
        $data = mysqli_fetch_all($result);

        echo '<h4 class="table_title">Данные в таблице <b>planes_news</b></h4>';
        echo '<table>
        <tr>
            <th>Номер</th>
            <th>Заголовок</th>
            <th>Дата</th>
            <th>Описание</th>
        </tr>
        ';

        for ($i = 0; $i < count($data); $i++) {
            echo '<tr>';
            for ($a = 0; $a < count($data[$i]);$a++) {
                echo '<td>'.$data[$i][$a].'</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
    } 
    function planesOut($link) {
        $sql_news = 'SELECT * FROM planes';
        $result = mysqli_query($link, $sql_news);
        $data = mysqli_fetch_all($result);

        echo '<h4 class="table_title">Данные в таблице <b>planes</b></h4>';
        echo '<table>
        <tr>
            <th>Номер</th>
            <th>Название самолёта</th>
            <th>Дата создания</th>
            <th>Описание</th>
        </tr>
        ';

        for ($i = 0; $i < count($data); $i++) {
            echo '<tr>';
            for ($a = 0; $a < count($data[$i]);$a++) {
                echo '<td>'.$data[$i][$a].'</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
    }
    function linksOut($link) {
        $sql_news = 'SELECT * FROM planes_links';
        $result = mysqli_query($link, $sql_news);
        $data = mysqli_fetch_all($result);

        echo '<h4 class="table_title">Данные в таблице <b>planes_links</b></h4>';
        echo '<table>
        <tr>
            <th>Номер</th>
            <th style="width:600px">Адрес соц.сети</th>
            <th>Название</th>
        </tr>
        ';

        for ($i = 0; $i < count($data); $i++) {
            echo '<tr>';
            for ($a = 0; $a < count($data[$i]);$a++) {
                echo '<td>'.$data[$i][$a].'</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
    }
    function planesPhotosOut($link) {
        $sql_news = 'SELECT * FROM planes_photos';
        $result = mysqli_query($link, $sql_news);
        $data = mysqli_fetch_all($result);

        echo '<h4 class="table_title">Данные в таблице <b>planes_photos</b></h4>';
        echo '<table>
        <tr>
            <th>Номер (определяется по номеру поста)</th>
            <th>Ссылка на картинку</th>
            <th>Описание</th>
        </tr>
        ';

        for ($i = 0; $i < count($data); $i++) {
            echo '<tr>';
            for ($a = 0; $a < count($data[$i]);$a++) {
                echo '<td>'.$data[$i][$a].'</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
    }
    function newsPhotosOut($link) {
        $sql_news = 'SELECT * FROM planes_news_photos';
        $result = mysqli_query($link, $sql_news);
        $data = mysqli_fetch_all($result);

        echo '<h4 class="table_title">Данные в таблице <b>planes_news_photos</b></h4>';
        echo '<table>
        <tr>
            <th>Номер (определяется по номеру поста)</th>
            <th>Ссылка на картинку</th>
            <th>Описание</th>
        </tr>
        ';

        for ($i = 0; $i < count($data); $i++) {
            echo '<tr>';
            for ($a = 0; $a < count($data[$i]);$a++) {
                echo '<td>'.$data[$i][$a].'</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
    }
    function deleteRow ($link,$tableName,$lineNum) {
        $sql = 'DELETE FROM '.$tableName.' WHERE id = '.$lineNum;
        $result = mysqli_query($link,$sql);
        echo 'Удалена  сторка <b>№'.$lineNum.'</b> из таблицы <b>',$tableName,'</b>';

    }
    function addNewRow($link,$tableName,$id,$firstCol,$secondCol,$thirdCol) {
        $columnsCount = mysqli_num_fields(mysqli_query($link,'SELECT * FROM '.$tableName));
        if ($columnsCount == 4) {
            $query = 'INSERT INTO '.$tableName.' VALUES ('.$id.',"'.$firstCol.'","'.$secondCol.'","'.$thirdCol.'")';
        } else {
            $query = 'INSERT INTO '.$tableName.' VALUES ('.$id.',"'.$firstCol.'","'.$secondCol.'")';
        }
        echo '<h2 title="'.$query.'">Добавлена строка <b>№'.$id.'</b> в таблицу <b>'.$tablename.'</b></h2>';
        mysqli_query($link,$query);
    }
    function updateRow($link,$tableName,$id,$firstCol,$secondCol,$thirdCol) {
        $sql = 'SHOW COLUMNS FROM '.$tableName;
        $query = mysqli_query($link,$sql);
        $data = mysqli_fetch_all($query);
        $columnsCount = mysqli_num_fields(mysqli_query($link,'SELECT * FROM '.$tableName));
        
        $col1 = $data[0][0];
        $col2 = $data[1][0];
        $col3 = $data[2][0];
        if ($columnsCount == 4) {
            $col4 = $data[3][0];
            $main_sql = 'UPDATE '.$tableName.' SET "'.$col1.'" = "'.$id.'", "'.$col2.'" = "'.$firstCol.'", "'.$col3.'" = "'.$secondCOl.'", "'.$col4.'" = "'.$thirdCol.'" WHERE id ='.$id;
        } else {
            $main_sql = 'UPDATE '.$tableName.' SET '.$col1.' = '.$id.', '.$col2.' = "'.$firstCol.'", '.$col3.' = "'.$secondCol.'" WHERE id ='.$id;
        }
        echo $main_sql;

    }
    if($_POST['submit2']) {
        $table1=$_POST['table1'];
        if ($table1){
            foreach ($table1 as $t) {
                $tableName1 = $t;
            }
            deleteRow($connection,$tableName1,$_POST['linenumber']);
            $_POST['linenumber'] = 0;
        }
    }
    if($_POST['submit3']) {
        $table2=$_POST['table2'];
        if ($table2){
            foreach ($table2 as $t) {
                $tableName2 = $t;
            }
            addNewRow($connection,$tableName2,$_POST['id'],$_POST['first_col'],$_POST['second_col'],$_POST['third_col']);
            $id=0;
            $_POST['id'] = 0;
            $_POST['third_col'] = '';
            $_POST['second_col'] = '';
            $_POST['first_col'] = '';
        }
    }
    if($_POST['submit4']) {
        $table3=$_POST['table3'];
            if ($table3){
                foreach ($table3 as $t) {
                    $tableName3 = $t;
                }
            updateRow($connection,$tableName3,$_POST['id2'],$_POST['first_col2'],$_POST['second_col2'],$_POST['third_col2']);
            $_POST['id2'] = 0;
            $_POST['third_col2'] = '';
            $_POST['second_col2'] = '';
            $_POST['first_col2'] = '';
        }
    }
    newsOut($connection);
    newsPhotosOut($connection);
    planesOut($connection);
    planesPhotosOut($connection);
    linksOut($connection);
    
?>
<form method='POST' action= ''>
    <div>
        <h2>Удалить строку из таблицы:</h2><select name='table1[]'>
            <option value="planes_news">planes_news</option>
            <option value="planes_news_photos">planes_news_photos</option>
            <option value="planes">planes</option>
            <option value="planes_photos">planes_photos</option>
            <option value="planes_links">planes_links</option>
        </select>
        <input type='number' min='1' placeholder='Введите номер строки' name='linenumber'>
    </div>
    <div>
        <input type='submit' name='submit2' value='Удалить'>
    </div>
</form>
<form method='POST'>
        <h2>Добавить строку в таблицу:</h2>
        <div class='addNewForm'>
            <select name='table2[]'>
                <option value="planes_news">planes_news</option>
                <option value="planes_news_photos">planes_news_photos</option>
                <option value="planes">planes</option>
                <option value="planes_photos">planes_photos</option>
                <option value="planes_links">planes_links</option>
            </select>
            <label>
                <p>Номер строки:</p>
                <input type='number' min='1' name='id'>
            </label>
            <label>
                <p>Данные в колонке 2:</p>
                <input type='text' name='first_col'>
            </label>
            <label>
                <p>Данные в колонке 3:</p>            
                <input type='text' name='second_col'>
            </label>
            <label>
                <p>Данные в колонке 4: <span style='font-size:22px ; opacity: 80%;'>(Если её нет, оставьте пустой)</span></p>            
                <input type='text' name='third_col'>
            </label>
        </div>
        <input type='submit' name='submit3' value='Добавить'>
</form>
<form method='POST'>
        <h2>Изменить строку в таблице:</h2>
        <div class='addNewForm'>
            <select name='table3[]'>
                <option value="planes_news">planes_news</option>
                <option value="planes_news_photos">planes_news_photos</option>
                <option value="planes">planes</option>
                <option value="planes_photos">planes_photos</option>
                <option value="planes_links">planes_links</option>
            </select>
        </div>
            <label>
                <p>Номер строки:</p>
                <input type='number' min='1' name='id2'>
            </label>
            <label>
                <p>Данные в колонке 2:</p>
                <input type='text' name='first_col2'>
            </label>
            <label>
                <p>Данные в колонке 3:</p>            
                <input type='text' name='second_col2'>
            </label>
            <label>
                <p>Данные в колонке 4: <span style='font-size:22px ; opacity: 80%;'>(Если её нет, оставьте пустой)</span></p>            
                <input type='text' name='third_col2'>
            </label>
        <input type='submit' name='submit4' value='Изменить'>
</form>