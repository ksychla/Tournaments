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
    <?php echo $this->Html->css("fontello") ?>
</head>
<body>
<?php echo $this->element('navbar') ?>
<main>
    <section>
        <div id="login-container" style="margin-top: 50px;">
            <div id="header">
                Edytuj turniej
            </div>
            <?= $this->Form->create($tournament) ?>
            <?php
            echo $this->Form->control('name');
            echo $this->Form->control('dyscypline');
            echo $this->Form->control('pearson');
            echo $this->Form->control('time');
            echo $this->Form->control('location');
            echo $this->Form->control('players_limit');
            echo $this->Form->control('deadline');
            echo $this->Form->control('players');
            ?>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            <div class="side-nav-item delete_button">
                <?php
                $today = new DateTime();
                $deadline = new DateTime($tournament->deadline);
                if($today->diff($deadline)->d > 0)
                    echo $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $tournament->id],
                        ['confirm' => __('Czy na pewno chcesz usunąć: {0}?', $tournament->name), 'class' => 'side-nav-item']);
                ?>
            </div>
        </div>
    </section>
</main>
<?php echo $this->Html->script('add_tournament') ?>
</body>
</html>
