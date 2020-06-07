<?php
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<main>
    <section>
        <div id="login-container">
            <div id="header">
                Logowanie
            </div>
            <?= $this->Form->create() ?>
            <?php
            echo $this->Form->control('email', array('label'=>false, 'placeholder'=>'Email'));
            echo $this->Form->control('password', array('label'=>false, 'placeholder'=>'Hasło'));
            ?>
            <?= $this->Form->button(__('Zaloguj')) ?>
            <?= $this->Form->end() ?>

            <div class="link-div">
                <a href="/turnieje/register" class="links">
                    Zarejestruj
                </a>
            </div>
            <div class="link-div">
                <a href="#" class="links">
                    Nie pamiętasz hasła?
                </a>
            </div>

        </div>
    </section>
</main>
</body>
</html>
