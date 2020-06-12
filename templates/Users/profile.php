<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$user = $this->Users->get($id, [
    'contain' => [],
]);
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
                        echo $this->Form->control('email');
                        echo $this->Form->control('first_name');
                        echo $this->Form->control('last_name');
                        echo $this->Form->control('active');
                        echo $this->Form->control('password');
                        echo $this->Form->control('token');
                        ?>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </section>
        </main>
    </body>
</html>
