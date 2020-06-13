<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TournamentPlayer $tournamentPlayer
 */
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dołącz</title>
    <?php echo $this->Html->css("style") ?>
    <?php echo $this->Html->css("fontello") ?>
</head>
<body>
<?php echo $this->element('navbar') ?>
<main>
    <section>
        <div id="login-container" style="margin-top: 50px;">
            <div id="header">
                Dołącz do turnieju
            </div>
            <?= $this->Form->create($tournamentPlayer) ?>
                <?php
                echo $this->Form->control('licence', ['label'=>false, 'placeholder'=>'Licencja']);
                echo $this->Form->control('rank',['label'=>false, 'placeholder'=>'Miejsce w rankingu']);
                ?>
            <?= $this->Form->button(__('Dołącz')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
</body>
</html>
