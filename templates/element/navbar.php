<?php
?>
<nav>
    <div id="nav-flex">
        <?php
        if($this->get('identity')){
            echo "
                    <div class=\"identifier\">";
            echo "<div id='name-nav'>";
            echo $this->get('identity')->first_name;
            echo " ";
            echo $this->get('identity')->last_name;
            echo "</div>";

            echo "<div id='arrow-nav'>";
            echo "<i class='icon-down-open'></i>";
            echo "</div>";
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
                        <a class=\"log-button\" href=\"register\" id='register'>
                            Zarejestruj się
                        </a>
                    </div>";
        }
        ?>

        <div>
            <div id="search-text">
                <input placeholder="Szukaj" id="search" onfocusout="searchOnUnFocus()" onkeypress=" searchTournament(event)">
            </div>
            <div id="search-glass">
                <button onclick="glassOnClick()">
                    <i class="icon-search"></i>
                </button>

            </div>
        </div>
    </div>
    <?php echo $this->Html->script("nav-bar") ?>
</nav>
