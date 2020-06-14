<?php

use Cake\ORM\TableRegistry;

$tournament = $this->get('tournament');
$dysc = TableRegistry::getTableLocator()->get('Dyscipline')->get($tournament->dyscypline);
$user = TableRegistry::getTableLocator()->get('Users')->get($tournament->pearson);
$sponsorTour = TableRegistry::getTableLocator()->get('TournamentSponsor')->find('all', ['conditions'=>['tournament'=>$tournament->id]]);
$sponsors = TableRegistry::getTableLocator()->get('Sponsor');
$identity = $this->get('identity');
$player = TableRegistry::getTableLocator()->get('TournamentPlayer')->find('all')->where(['player'=>$identity->id, 'tournament'=>$tournament->id])->first();
$tourPlayers = TableRegistry::getTableLocator()->get('TournamentPlayer')->find('all', ['conditions'=>['tournament'=>$tournament->id]]);
$tourPlayersPlaces = TableRegistry::getTableLocator()->get('PlayerPlace');

$users_table = TableRegistry::getTableLocator()->get('Users');

$bracket = [];

foreach ($tourPlayers as $row){
    $tourPlace = $tourPlayersPlaces->find('all', ['conditions'=>['tourPlay'=>$row->id]]);
    foreach ($tourPlace as $col){
        if(!array_key_exists($col->round, $bracket)){
            $bracket[$col->round] = [];
        }
        $bracket[$col->round][$col->place] = [$row->player, $col->id];
    }
}

function prepareForGoogleMaps($location){
    $regexp = "/\\s*,\\s*/";
    $loc = preg_replace($regexp, ",", $location);
    $regexp = "/\\s+/";
    return preg_replace($regexp, "+", $loc);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>
        <?php echo $tournament->name; ?>
    </title>
    <?php echo $this->Html->css("style") ?>
    <?php echo $this->Html->css("fontello") ?>
    <?php echo $this->Html->css("gracket") ?>
    <?php echo $this->Html->script("jquery-3.5.1") ?>
    <?php echo $this->Html->script("jquery.gracket") ?>
</head>
<body>
    <?php echo $this->element('navbar') ?>
    <main>
        <section style="width: 100%;">
            <div class="tournament_header">
                <div class="header_link">
                    <button onclick="showOnClick()"></button>
                </div>
                <div class="flex-tournament-header">
                    <div>
                        <i class="icon-down-open" style="opacity: 0;"></i>
                    </div>
                    <div class="tournament_name">
                        <div class="name">
                            <?php echo $tournament->name; ?>
                        </div>
                        <div class="discipline">
                            <?php echo $dysc->name; ?>
                        </div>
                    </div>
                    <div style="z-index: 20;">
                        <i class="icon-down-open"></i>
                    </div>
                </div>


            </div>
            <div class="tournament_info hidden_info" id="tournament_info">
                <div class="t_desc" id="t_desc">
                    <div>
                        Data: <?php echo (new DateTime($tournament->time))->format("d-m-Y"); ?>
                    </div>
                    <div>
                        Deadline: <?php echo (new DateTime($tournament->deadline))->format("d-m-Y"); ?>
                    </div>
                    <div>
                        Liczba uczestników: <?php echo $tournament->players."/".$tournament->players_limit; ?>
                    </div>
                    <div class="join_button">
                        <?php
                            if($tournament->pearson == $identity->id)
                                echo "<a href='/turnieje/tournament/edit?id=".$tournament->id."'>Edytuj</a>";
                            else if(!$player)
                                echo "<a href='/turnieje/tournament/join?id=".$tournament->id."'>Dołącz</a>";
                            else
                                echo "<a href='/turnieje/tournament/win?id=".$tournament->id."'>Wygrałem</a>";
                        ?>
                    </div>
                </div>
                <div class="location" id="location">
                    <div>
                        Lokalizacja
                    </div>
                    <iframe
                        id="googleMap"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCR1vziUo8-2PhOfYM079eSFzcN_jz_ozc&q=<?php echo prepareForGoogleMaps($tournament->location) ?>"  allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div>

                <div>
                    <div class="my_gracket"></div>
                </div>
                <?php
                $today = new DateTime();
                $deadline = new DateTime($tournament->deadline);
                if($today > $deadline){
                    echo "<script>
                    (function(win, doc, $){
                        // Data
                        win.BracketData = [";
                        foreach ($bracket as $row){
                            $f = array_keys($row);
                            echo '[';
                            for($i=0; $i<count($f); $i+=2){
                                $p1 = $users_table->get($row[$f[$i]][0]);
                                $p1_id = $row[$f[$i]][1];
                                if($i+1 < count($f)){
                                    $p2 = $users_table->get($row[$f[$i+1]][0]);
                                    $p2_id = $row[$f[$i+1]][1];
                                    echo '[{name: \''.$p1->first_name.' '.$p1->last_name.'\', id: '.$p1->id.'},{name: \''.$p2->first_name.' '.$p2->last_name.'\', id: '.$p2->id.'}],';
                                } else {
                                    echo '[{name: \''.$p1->first_name.' '.$p1->last_name.'\', id: '.$p1->id.'}]';
                                }
                            }
                            echo '],';
                        }

                        echo"];

                        // initializer
                        $(\".my_gracket\").gracket({ src : win.BracketData });

                    })(window, document, jQuery);
                </script>";
                }
                ?>


            </div>
            <div class="discipline sub-cat">
                Sponsorzy
            </div>
            <div class="sponsors">
                <?php
                    foreach ($sponsorTour as $row){
                        echo "<div>";
                        echo "<a href='".$sponsors->get($row->sponsor)->link."' target='_blank'>";
                        echo $this->Html->image('sponsors/'.$sponsors->get($row->sponsor)->logo, ['alt' => $sponsors->get($row->sponsor)->name]);
                        echo "</a></div>";
                    }
                ?>

            </div>
            <div class="discipline sub-cat">
                Organizator
            </div>
            <div style="display: flex; align-items: center; flex-direction: column; margin: 10px 0;">
                <div class="discipline">
                    <?php echo $user->first_name." ".$user->last_name; ?>
                </div>
                <div class="discipline">
                    <?php echo $user->email; ?>
                </div>
            </div>
        </section>
    </main>

    <?php echo $this->Html->script("tournament") ?>
</body>
</html>
