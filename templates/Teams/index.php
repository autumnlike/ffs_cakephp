<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team[]|\Cake\Collection\CollectionInterface $teams
 */
?>
<div class="teams index row">
    <?= $this->Html->link(__('New Team'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3>チーム一覧</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Teams.name', 'チーム名') ?></th>
                    <th>メンバー</th>
                    <th class="actions">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team): ?>
                <tr>
                    <td><?= h($team->name) ?></td>
                    <td>
                        <?php foreach ($team->team_members as $key => $teamMember) {
                            if ($key !== 0) {
                                echo ' / ';
                            }
                            echo h($teamMember->member->name);
                        } ?>
                    </td>
                    <td class="actions">
                        <?= $this->Form->postLink(
                            '<i class="bi bi-trash"></i>',
                            [
                                'action' => 'delete',
                                $team->id,
                            ],
                            [
                                'confirm' => '削除して良いですか?',
                                'escape' => false,
                            ]
                        ) ?>
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
