<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Turnieje</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<nav>
    <div id="nav-flex">
        <?php
            if($this->get('auth')){
                echo "
                    <div>
                        <a class=\"log-button\" href=\"logout\">Wyloguj się</a>
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
<main>
    <section>
        <div id="page-title">
            Turnieje
        </div>
        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-green">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-yellow">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo"></div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div class="date date-red">
                        10.06.2020
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div id="nav-bar">
            <div><</div>
            <div class="active">1</div>
            <div class="inactive">2</div>
            <div class="inactive">3</div>
            <div>></div>
        </div>
    </section>
</main>
</body>
</html>
