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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $knowledge->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $knowledge->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Knowledges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="knowledges form content">
            <?= $this->Form->create($knowledge) ?>
            <fieldset>
                <legend><?= __('Edit Knowledge') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('detail');
                    echo $this->Form->control('examples');
                    echo $this->Form->control('tag_ids');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
