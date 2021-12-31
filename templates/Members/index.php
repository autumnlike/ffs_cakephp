<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member[]|\Cake\Collection\CollectionInterface $members
 */
?>
<div class="members index row">
    <h2><?= __('メンバー一覧') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Members.email', '名前') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.a', 'A: 凝縮姓') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.b', 'B: 受容性') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.c', 'C: 弁別姓') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.d', 'D: 拡散性') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.e', 'E: 保全姓') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.four_type', '4type') ?></th>
                    <th><?= $this->Paginator->sort('MemberFfsDiagnoses.ninety_one_type', '91type') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member): ?>
                <tr>
                    <td>
                        <?= $this->Html->link($member->name, ['action' => 'view', $member->id]) ?>
                        <br/>
                        <span class="fw-lighter small"><?= h($member->email) ?></span>
                    </td>
                    <td><?= h($member->member_ffs_diagnosis->a) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->b) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->c) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->d) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->e) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->four_type) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->ninety_one_type) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>
    </nav>
</div>
