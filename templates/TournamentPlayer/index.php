<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TournamentPlayer[]|\Cake\Collection\CollectionInterface $tournamentPlayer
 */
?>
<div class="tournamentPlayer index content">
    <?= $this->Html->link(__('New Tournament Player'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tournament Player') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('player') ?></th>
                    <th><?= $this->Paginator->sort('tournament') ?></th>
                    <th><?= $this->Paginator->sort('licence') ?></th>
                    <th><?= $this->Paginator->sort('rank') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tournamentPlayer as $tournamentPlayer): ?>
                <tr>
                    <td><?= $this->Number->format($tournamentPlayer->id) ?></td>
                    <td><?= $this->Number->format($tournamentPlayer->player) ?></td>
                    <td><?= $this->Number->format($tournamentPlayer->tournament) ?></td>
                    <td><?= $this->Number->format($tournamentPlayer->licence) ?></td>
                    <td><?= $this->Number->format($tournamentPlayer->rank) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tournamentPlayer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tournamentPlayer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tournamentPlayer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournamentPlayer->id)]) ?>
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
