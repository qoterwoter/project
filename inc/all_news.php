<?


    function newsOut() {
        $link = mysqli_connect('std-mysql','std_962','12345678','std_962');
        $sql_news = 'SELECT * FROM planes_news AS pn JOIN planes_news_photos AS pnp ON pnp.id = pn.id';
        $result = mysqli_query($link, $sql_news);

        $_monthsList = array(
            "01"=>"Января","02"=>"Февраля","03"=>"Марта",
            "04"=>"Апреля","05"=>"Мая", "06"=>"Июня",
            "07"=>"Июля","08"=>"Августа","09"=>"Сентября",
            "10"=>"Октября","11"=>"Ноября","12"=>"Декабря");


        $data = mysqli_fetch_all($result);

        for ($i = count($data); $i > 0;$i--) {
            $date = date_create($data[$i][2]);

            $date_month = date_format($date, 'm');
            $date_month =  $_monthsList[$date_month];
            $date_full = date_format($date, 'd '.$date_month.' Y');

            echo '<article class="news__card">';
            echo '<h3 class="news__title animate__animated animate__rotateInDownLeft">'.$data[$i][1].'</h3>';
            echo '<p class="news__date animate__animated animate__jackInTheBox ">'.$date_full.'</p>';
            echo '<img class="news__image animate__animated animate__zoomInDown" src="'.$data[$i][5].'" alt="'.$data[$i][6].'" title="'.$data[$i][6].'">';
            echo '<p class="news__description animate__animated animate__slideInUp">'.$data[$i][3].'</p>';
            echo '</article>';

        }
    }

    echo '
    <h2>Новости</h2>
    <section class="news__section">';
    newsOut();
    echo '</section>';

?>