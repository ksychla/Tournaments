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

use Cake\ORM\TableRegistry;

$dyscyplines = TableRegistry::getTableLocator()->get('Dyscipline');
$tournaments = TableRegistry::getTableLocator()->get('Tournament')->find('all');
$users = TableRegistry::getTableLocator()->get('Users');


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
                    <div class=\"identifier\">";
                echo $this->get('identity')->first_name;
                echo " ";
                echo $this->get('identity')->last_name;
                echo   "<ol>
                            <li><a href=\"create/tournament\">Dodaj turniej</a></li>
                            <li><a href=\"profile/\">Profil</a></li>
                            <li><a href=\"logout\">Wyloguj</a></li>
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
<main>
    <section>
        <div id="page-title">
            Turnieje
        </div>

        <?php
            foreach ($tournaments as $rows){
                echo "<div class=\"tile\">
            <a href=\"#\" class=\"link-a\"></a>
            <div class=\"wrapper\">
                <div class=\"logo\">";
                    $dys = $dyscyplines->get($rows->dyscypline);
                    $org = $users->get($rows->pearson);
                    echo $this->Html->image('dysciplines/'.$dys->logo, ['alt' => 'tenis.png']);
            echo "</div>
            <div class=\"wrap-content\">
                <div>
                    <div class=\"name\">".$rows->name."</div>
                    <div class=\"discipline\">".$org->first_name." ".$org->last_name."</div>
                    <div class=\"discipline\">".$dys->name."</div>
                </div>
                <div>
                    <div class=\"date date-red\">".
                        $rows->deadline
                    ."</div>
                    <div class=\"players_num\">
                        Liczba graczy: ".$rows->players."/".$rows->players_limit."
                    </div>
                </div>

            </div>

            </div>
            </div>";
            }
        ?>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo">
                    <?php echo $this->Html->image('dysciplines/tenis.png', ['alt' => 'tenis.png']); ?>
                </div>
                <div class="wrap-content">
                    <div>
                        <div class="name">Coroczny turniej mistrzów</div>
                        <div class="discipline">Magda Gessler</div>
                        <div class="discipline">Tenis</div>
                    </div>
                    <div>
                        <div class="date date-red">
                            10.06.2020
                        </div>
                        <div class="players_num">
                            Liczba graczy: 3/7
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="tile">
            <a href="#" class="link-a"></a>
            <div class="wrapper">
                <div class="logo">
                    <?php echo $this->Html->image('dysciplines/bilard.png', ['alt' => 'bilard.png']); ?>
                </div>
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
                <div class="logo">
                    <?php echo $this->Html->image('dysciplines/koszykowka.png', ['alt' => 'koszykowka.png']); ?>
                </div>
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
                <div class="logo">
                    <?php echo $this->Html->image('dysciplines/noga.png', ['alt' => 'noga.png']); ?>
                </div>
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
                <div class="logo">
                    <?php echo $this->Html->image('dysciplines/siatkowka.png', ['alt' => 'siatkowka.png']); ?>
                </div>
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
