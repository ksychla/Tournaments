<?php
?>
<nav>
    <div id="nav-flex">
        <?php
        if($this->get('identity')){
            echo "
                    <div class=\"identifier\">";
            echo $this->get('identity')->first_name;
            echo " ";
            echo $this->get('identity')->last_name;
            echo   "<ol>
                            <li><a href='/turnieje'>Strona Główna</a></li>
                            <li><a href='/turnieje/create/tournament'>Dodaj turniej</a></li>
                            <li><a href='/turnieje/profile/'>Profil</a></li>
                            <li><a href='/turnieje/logout'>Wyloguj</a></li>
                        </ol>
                    </div>";
        }else{
            echo "
                    <div>
                        <a class=\"log-button\" href=\"login\">
                            Zaloguj się
                        </a>
                        <a class=\"log-button\" href=\"register\">
                            Zarejestruj się
                        </a>
                    </div>";
        }
        ?>

        <div>
            <input placeholder="Szukaj" id="search">
        </div>
    </div>
</nav>
