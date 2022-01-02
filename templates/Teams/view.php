<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="members view row">
    <h3 class="mb-5"><?= h($team->name) ?></h3>
    <canvas id="diagnosisChart"></canvas>
    <h2 class="mt-5"><?= __('メンバー一覧') ?></h2>
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
                <?php foreach ($team->team_members as $teamMember) { ?>
                <?php $member = $teamMember->member ?>
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
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
  const diagnosisLabels = [
    'A: 凝縮性',
    'B: 受容性',
    'C: 弁別性',
    'D: 拡散性',
    'E: 保全性'
  ];
<?php $colors = ['#a6cee3', '#b2df8a', '#e31a1c', '#fdbf6f', '#1f78b4', '#ff7f00', '#fb9a99', '#33a02c', '#cab2d6', '#6a3d9a', '#dbc500', '#b15928'] ?>
  const diagnosisData = {
    labels: diagnosisLabels,
    datasets: [
        <?php foreach ($team->team_members as $teamMember) { ?>
            <?php $member = $teamMember->member ?>
            <?php $color = array_shift($colors) ?>
            {
                label: '<?= h($member->name) ?> <?= $member->member_ffs_diagnosis->ninety_one_type ?>',
                data: [
                  <?= $member->member_ffs_diagnosis->a ?>,
                  <?= $member->member_ffs_diagnosis->b ?>,
                  <?= $member->member_ffs_diagnosis->c ?>,
                  <?= $member->member_ffs_diagnosis->d ?>,
                  <?= $member->member_ffs_diagnosis->e ?>
                ],
                borderColor: '<?= $color ?>',
                backgroundColor: '<?= $color ?>',
            },
        <?php } ?>
    ]
  };

  const diagnosisConfig = {
    type: 'line',
    data: diagnosisData,
    options: {
      y: {
        max: 20,
        min: 0
      },
    }
  };

  const myChart = new Chart(
    document.getElementById('diagnosisChart'),
    diagnosisConfig
  );
</script>
