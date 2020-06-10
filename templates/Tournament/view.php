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
            <?= $this->Html->link(__('Edit Tournament'), ['action' => 'edit', $tournament->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tournament'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tournament'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tournament view content">
            <h3><?= h($tournament->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tournament->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tournament->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dyscypline') ?></th>
                    <td><?= $this->Number->format($tournament->dyscypline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pearson') ?></th>
                    <td><?= $this->Number->format($tournament->pearson) ?></td>
                </tr>
                <tr>
                    <th><?= __('Players Limit') ?></th>
                    <td><?= $this->Number->format($tournament->players_limit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Players') ?></th>
                    <td><?= $this->Number->format($tournament->players) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time') ?></th>
                    <td><?= h($tournament->time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deadline') ?></th>
                    <td><?= h($tournament->deadline) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Location') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tournament->location)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
