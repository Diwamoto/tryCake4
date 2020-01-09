<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Keyword $keyword
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Keyword'), ['action' => 'edit', $keyword->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Keyword'), ['action' => 'delete', $keyword->id], ['confirm' => __('Are you sure you want to delete # {0}?', $keyword->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Keywords'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Keyword'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="keywords view content">
            <h3><?= h($keyword->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Knowledge') ?></th>
                    <td><?= $keyword->has('knowledge') ? $this->Html->link($keyword->knowledge->id, ['controller' => 'Knowledges', 'action' => 'view', $keyword->knowledge->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($keyword->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($keyword->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($keyword->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($keyword->value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
