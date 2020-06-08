<?php
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Weryfikacja</title>
    <?php echo $this->Html->css("style") ?>
</head>
<body>
<main>
    <div class="flex-div-verification">
        <div class="verification">
            <?php
                if($this->get('already')){
                    echo '<div><h2>Konto było już zweryfikowane</h2></div>';
                }else {
                    echo '<div><h2>Weryfikacja konta ';
                    if (!$this->get('succ'))
                        echo "nie ";
                    echo 'powiodła się</h2></div>';
                }
            ?>
            <a class="verify-button" href="/turnieje">Strona główna</a>
        </div>
    </div>
</main>
</body>
</html>
