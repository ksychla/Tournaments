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
    <title>Rejestracja</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<main>
    <section>
        <div id="login-container">
            <div id="header">
                Rejestracja
            </div>
            <?= $this->Form->create($user) ?>
            <?php
            echo $this->Form->control('email', array('label'=>false, 'placeholder'=>'Email'));
            echo $this->Form->control('first_name', array('label'=>false, 'placeholder'=>'Imie'));
            echo $this->Form->control('last_name', array('label'=>false, 'placeholder'=>'Nazwisko'));
            echo $this->Form->control('password', array('label'=>false, 'placeholder'=>'Hasło'));
            ?>
            <?= $this->Form->button(__('Zarejestruj')) ?>
            <?= $this->Form->end() ?>
        </div>
    </section>
</main>
</body>
</html>
