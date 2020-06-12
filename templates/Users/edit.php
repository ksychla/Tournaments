<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$profile = $this->get('identity');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $profile->first_name." ".$profile->last_name;?></title>
    <?php echo $this->Html->css("style") ?>
    <?php echo $this->Html->css("fontello") ?>
</head>
<body>
<?php echo $this->element('navbar') ?>
<main>
    <section>
        <div>
            <?= $this->Form->create($user) ?>
            <?php
            echo $this->Form->control('email', ['label'=>'Email']);
            echo $this->Form->control('first_name', ['label'=>'Imię']);
            echo $this->Form->control('last_name', ['label'=>'Nazwisko']);
            ?>
            <?= $this->Form->button(__('Zapisz')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
</body>
</html>
