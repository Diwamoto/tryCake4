<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Knowledge[]|\Cake\Collection\CollectionInterface $knowledges
 */
?>
<div class="knowledges index content">
    <?= $this->Html->link(__('New Knowledge'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Knowledges') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($knowledges as $knowledge): ?>
                <tr>
                    <td><?= $this->Number->format($knowledge->id) ?></td>
                    <td><?= $knowledge->has('user') ? $this->Html->link($knowledge->user->name, ['controller' => 'Users', 'action' => 'view', $knowledge->user->id]) : '' ?></td>
                    <td><?= h($knowledge->created) ?></td>
                    <td><?= h($knowledge->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $knowledge->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $knowledge->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $knowledge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $knowledge->id)]) ?>
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
