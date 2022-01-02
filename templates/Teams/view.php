<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Teams'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Team'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="teams view content">
            <h3><?= h($team->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($team->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($team->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($team->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($team->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Team Members') ?></h4>
                <?php if (!empty($team->team_members)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Team Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($team->team_members as $teamMembers) : ?>
                        <tr>
                            <td><?= h($teamMembers->id) ?></td>
                            <td><?= h($teamMembers->team_id) ?></td>
                            <td><?= h($teamMembers->member_id) ?></td>
                            <td><?= h($teamMembers->created) ?></td>
                            <td><?= h($teamMembers->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TeamMembers', 'action' => 'view', $teamMembers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TeamMembers', 'action' => 'edit', $teamMembers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeamMembers', 'action' => 'delete', $teamMembers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamMembers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
