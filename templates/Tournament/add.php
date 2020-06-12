<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */

use Cake\ORM\TableRegistry;

$dyscyplines = TableRegistry::getTableLocator()->get('Dyscipline')->find('all');
$sponsor_table = TableRegistry::getTableLocator()->get('Sponsor')->find('all');

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Stwórz turniej</title>
    <?php echo $this->Html->css("style") ?>
    <?php echo $this->Html->css("fontello") ?>
</head>
<body>
<?php echo $this->element('navbar') ?>
<main>
    <section>
        <div id="login-container" style="margin-top: 50px;">
            <div id="header">
                Stwórz turniej
            </div>
            <?= $this->Form->create($tournament) ?>
            <?php echo $this->Form->control('name', array('label'=>false, 'placeholder'=>'Nazwa')); ?>

            <select name="dyscypline">
                <?php
                    foreach ($dyscyplines as $row) {
                        echo "<option value=\"".$row->id."\">".$row->name."</option>";
                    }
                ?>
            </select>

            <?php
            echo $this->Form->control('time', array('label'=>'Data turnieju:'));
            echo $this->Form->control('location', array('label'=>false, 'placeholder'=>'Lokalizacja', 'wrap'=>'off'));
            echo $this->Form->control('players_limit', array('label'=>false, 'placeholder'=>'Limit graczy'));
            echo $this->Form->control('deadline', array('label'=>'Deadline rejestracji'));
            ?>

            <select onchange="add_sponsor()" id="select_sponsor">
                <?php
                    foreach ($sponsor_table as $row){
                        echo "<option value='".$row->id.";".$row->name."'>".$row->name."</option>";
                    }
                ?>
            </select>
            <div id="sponsors_list">
            </div>

            <?= $this->Form->button(__('Zapisz')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
<?php echo $this->Html->script('add_tournament') ?>
</body>
</html>
