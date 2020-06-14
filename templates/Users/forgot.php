<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zapomniałem hasła</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<main>
    <section>
        <div id="login-container">
            <div id="header">
                Zapomniałem hasła
            </div>
            <?= $this->Form->create($user) ?>
            <?php
            echo $this->Form->control('email', array('label'=>false, 'placeholder'=>'Email'));
            ?>
            <?= $this->Form->button(__('Wyślij')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
</body>
</html>
