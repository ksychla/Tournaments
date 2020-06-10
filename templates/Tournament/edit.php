<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tournament->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tournament'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournament form content">
            <?= $this->Form->create($tournament) ?>
            <fieldset>
                <legend><?= __('Edit Tournament') ?></legend>
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
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
