
    
<?

    $dbconnection = mysqli_connect('std-mysql','std_962','12345678','std_962');

    function planesOut($link) {
        $sql_planes = 'SELECT * FROM planes AS pl JOIN planes_photos AS pp ON pp.plane_id = pl.id';
        $result = mysqli_query($link, $sql_planes);

        $_monthsList = array(
            "01"=>"Января","02"=>"Февраля","03"=>"Марта",
            "04"=>"Апреля","05"=>"Мая", "06"=>"Июня",
            "07"=>"Июля","08"=>"Августа","09"=>"Сентября",
            "10"=>"Октября","11"=>"Ноября","12"=>"Декабря");

        $data = mysqli_fetch_all($result);

        for ($i = 0; $i < count($data);$i++) {

            $date = date_create($data[$i][2]);

            $date_month = date_format($date, 'm');
            $date_month =  $_monthsList[$date_month];
            $date_full = date_format($date, 'd '.$date_month.' Y');

            echo '<article class="planes__card">';
            echo '<h3 class="planes__title animate__animated animate__fadeInRight">'.$data[$i][0].'. '.$data[$i][1].' - '.$date_full.'</h3>';
            echo '<img class="planes__image animate__animated animate__fadeInUpBig" src="'.$data[$i][5].'" alt="'.$data[$i][6].'" title="'.$data[$i][6].'">';
            echo '<p class="planes__paragraph animate__animated animate__fadeInBottomLeft">'.$data[$i][3].'</p>';
            echo '</article>';
        }
    }
    echo '<section class="planes__section">
            <h2>Наши самолёты</h2>';
    planesOut($dbconnection);
    echo '</section>';

?>