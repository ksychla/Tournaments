<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Stwórz turniej</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<main>
    <section>
        <div id="login-container" style="margin-top: 50px;">
            <div id="header">
                Stwórz turniej
            </div>
            <?= $this->Form->create($tournament) ?>
            <?php
            echo $this->Form->control('name', array('label'=>false, 'placeholder'=>'Nazwa'));
//            echo $this->Form->control('dyscypline', array('label'=>false, 'placeholder'=>'Dyscyplina'));
            ?>

            <select name="dyscypline">
                <option value="1">Tenis</option>
                <option value="2">Piłka nożna</option>
                <option value="3">League of Legends</option>
                <option value="4">Koszykówka</option>
                <option value="5">Siatkówka</option>
                <option value="6">Counter strike</option>
            </select>

            <?php
            echo $this->Form->control('time', array('label'=>'Data turnieju:'));
            echo $this->Form->control('location', array('label'=>false, 'placeholder'=>'Lokalizacja', 'wrap'=>'off'));
            echo $this->Form->control('players_limit', array('label'=>false, 'placeholder'=>'Limit graczy'));
            echo $this->Form->control('deadline', array('label'=>'Deadline rejestracji'));
            ?>
            <?= $this->Form->button(__('Zapisz')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
</body>
</html>
