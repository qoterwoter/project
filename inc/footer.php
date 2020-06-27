<footer>
    <?
        function linksOut() {
            $link = mysqli_connect('std-mysql','std_962','12345678','std_962');
            $sql = 'SELECT * FROM planes_links';
            $result = mysqli_query($link,$sql);
            $data = mysqli_fetch_all ($result);

            echo '<ul class="footer__list">';
            
            for ($i = 0; $i < count($data); $i++) {
                
                echo '<li class="footer__link"><a href="'.$data[$i][1].'">'.$data[$i][2].'</a></li>';

            }

            echo '</ul>';

        }
        
        echo '<h3 class="footer__title">Наши контакты</h3>';
        linksOut();
    ?>
</footer>