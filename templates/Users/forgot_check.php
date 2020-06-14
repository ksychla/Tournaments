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
    <title>Reset hasła</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<main>
    <section>
        <div id="login-container">
            <div id="header">
                Resetuj hasło
            </div>
            <?= $this->Form->create($user) ?>
            <?php
            echo $this->Form->control('password', array('label'=>false, 'placeholder'=>'Nowe hasło'));
            ?>
            <?= $this->Form->button(__('Zresetuj hasło')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
</body>
</html>
