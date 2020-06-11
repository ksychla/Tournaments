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

use Cake\I18n\Time;
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
    <?php echo $this->Html->css("fontello") ?>
</head>
<body>
    <?php echo $this->element('navbar') ?>
<main>
    <section>
        <div id="page-title">
            Turnieje
        </div>

        <?php
            foreach ($tournaments as $rows){
                echo "<div class=\"tile\">
            <a href=\"tournament?id=".$rows->id."\" class=\"link-a\"></a>
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
                    <div class='date ";
            $today = new DateTime();
            $deadline = new DateTime($rows->deadline);
            if($today->diff($deadline)->d > 5)
                echo "date-green'>";
            else if($today->diff($deadline)->d > 0)
                echo "date-yellow'>";
            else
                echo "date-red'>";
                        echo $deadline->format('d-m-Y')
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
