<?php
$search = $this->get('q');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Turnieje</title>
    <?php echo $this->Html->css("style") ?>
    <?php echo $this->Html->css("fontello") ?>
</head>
<body>
<?php echo $this->element('navbar') ?>
<main>
    <section>
        You're searching: <?php echo $search; ?>
    </section>
</main>
</body>
</html>
