<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Knowledge $knowledge
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Knowledge'), ['action' => 'edit', $knowledge->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Knowledge'), ['action' => 'delete', $knowledge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $knowledge->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Knowledges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Knowledge'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="knowledges view content">
            <h3><?= h($knowledge->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $knowledge->has('user') ? $this->Html->link($knowledge->user->name, ['controller' => 'Users', 'action' => 'view', $knowledge->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($knowledge->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($knowledge->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($knowledge->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Detail') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($knowledge->detail)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Examples') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($knowledge->examples)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Tag Ids') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($knowledge->tag_ids)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
