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
            <?= $this->Html->link(__('Edit Tournament Player'), ['action' => 'edit', $tournamentPlayer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tournament Player'), ['action' => 'delete', $tournamentPlayer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentPlayer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tournament Player'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tournament Player'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournamentPlayer view content">
            <h3><?= h($tournamentPlayer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tournamentPlayer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Player') ?></th>
                    <td><?= $this->Number->format($tournamentPlayer->player) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tournament') ?></th>
                    <td><?= $this->Number->format($tournamentPlayer->tournament) ?></td>
                </tr>
                <tr>
                    <th><?= __('Licence') ?></th>
                    <td><?= $this->Number->format($tournamentPlayer->licence) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rank') ?></th>
                    <td><?= $this->Number->format($tournamentPlayer->rank) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
