<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TournamentPlayer $tournamentPlayer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tournamentPlayer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentPlayer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tournament Player'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournamentPlayer form content">
            <?= $this->Form->create($tournamentPlayer) ?>
            <fieldset>
                <legend><?= __('Edit Tournament Player') ?></legend>
                <?php
                    echo $this->Form->control('player');
                    echo $this->Form->control('tournament');
                    echo $this->Form->control('licence');
                    echo $this->Form->control('rank');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
