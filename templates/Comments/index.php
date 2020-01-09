<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment[]|\Cake\Collection\CollectionInterface $comments
 */
?>
<div class="comments index content">
    <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Comments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('knowledges_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $this->Number->format($comment->id) ?></td>
                    <td><?= $comment->has('user') ? $this->Html->link($comment->user->name, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
                    <td><?= $comment->has('knowledge') ? $this->Html->link($comment->knowledge->id, ['controller' => 'Knowledges', 'action' => 'view', $comment->knowledge->id]) : '' ?></td>
                    <td><?= h($comment->created) ?></td>
                    <td><?= h($comment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $comment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
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
