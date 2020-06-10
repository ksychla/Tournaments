<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament[]|\Cake\Collection\CollectionInterface $tournament
 */
?>
<div class="tournament index content">
    <?= $this->Html->link(__('New Tournament'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tournament') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('dyscypline') ?></th>
                    <th><?= $this->Paginator->sort('pearson') ?></th>
                    <th><?= $this->Paginator->sort('time') ?></th>
                    <th><?= $this->Paginator->sort('players_limit') ?></th>
                    <th><?= $this->Paginator->sort('deadline') ?></th>
                    <th><?= $this->Paginator->sort('players') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tournament as $tournament): ?>
                <tr>
                    <td><?= $this->Number->format($tournament->id) ?></td>
                    <td><?= h($tournament->name) ?></td>
                    <td><?= $this->Number->format($tournament->dyscypline) ?></td>
                    <td><?= $this->Number->format($tournament->pearson) ?></td>
                    <td><?= h($tournament->time) ?></td>
                    <td><?= $this->Number->format($tournament->players_limit) ?></td>
                    <td><?= h($tournament->deadline) ?></td>
                    <td><?= $this->Number->format($tournament->players) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tournament->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tournament->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
