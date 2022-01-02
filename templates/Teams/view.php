<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h3 class="mb-5"><?= h($team->name) ?></h3>
<div class="members view row mb-2">
    <h4>メンバーの追加</h4>
    <div class="column-responsive column-80">
        <div class="teamMembers form content">
            <?= $this->Form->create($teamMember, [
                'url' => [
                    'controller' => 'team_members',
                    'action' => 'add',
                ],
                'class' => 'row row-cols-lg-auto g-3 align-items-center'],
            ) ?>
            <fieldset>
                <div class="form-group mr-2 col-3">
                    <?php
                        echo $this->Form->control('team_id', ['type' => 'hidden', 'value' => $team->id]);
                        echo $this->Form->control('member_id', [
                            'type' => 'text',
                            'list'=>'allergens',
                            'onkeyup'=>'getallergen(this.value)',
                            'label' => false,
                        ]);

                    ?>
                    <datalist id="allergens">
                        <?php foreach ($members as $member) { ?>
                            <option label="<?= $member->name . '/' . $member->email ?>" value="<?= $member->id ?>"></option>
                        <?php } ?>
                    </datalist>
            </div>
            </fieldset>
            <?= $this->Form->button('追加', ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="members view row">
    <h4 class="mt-5"><?= __('メンバー一覧') ?></h4>
    <canvas id="diagnosisChart"></canvas>
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>A: 凝縮姓</th>
                    <th>B: 受容性</th>
                    <th>C: 弁別姓</th>
                    <th>D: 拡散性</th>
                    <th>E: 保全姓</th>
                    <th>4type</th>
                    <th>91type</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team->team_members as $teamMember) { ?>
                <?php $member = $teamMember->member ?>
                <tr class="align-middle">
                    <td>
                        <?= $this->Html->link($member->name, ['controller' => 'members', 'action' => 'view', $member->id]) ?>
                        <br/>
                        <span class="fw-lighter small"><?= h($member->email) ?></span>
                    </td>
                    <td class="<?php if (strstr($member->member_ffs_diagnosis->ninety_one_type, 'A')) echo 'fw-bold' ?><?php if (strpos($member->member_ffs_diagnosis->ninety_one_type, 'A') === 0) echo ' text-primary' ?>"><?= h($member->member_ffs_diagnosis->a) ?></td>
                    <td class="<?php if (strstr($member->member_ffs_diagnosis->ninety_one_type, 'B')) echo 'fw-bold' ?><?php if (strpos($member->member_ffs_diagnosis->ninety_one_type, 'B') === 0) echo ' text-primary' ?>"><?= h($member->member_ffs_diagnosis->b) ?></td>
                    <td class="<?php if (strstr($member->member_ffs_diagnosis->ninety_one_type, 'C')) echo 'fw-bold' ?><?php if (strpos($member->member_ffs_diagnosis->ninety_one_type, 'C') === 0) echo ' text-primary' ?>"><?= h($member->member_ffs_diagnosis->c) ?></td>
                    <td class="<?php if (strstr($member->member_ffs_diagnosis->ninety_one_type, 'D')) echo 'fw-bold' ?><?php if (strpos($member->member_ffs_diagnosis->ninety_one_type, 'D') === 0) echo ' text-primary' ?>"><?= h($member->member_ffs_diagnosis->d) ?></td>
                    <td class="<?php if (strstr($member->member_ffs_diagnosis->ninety_one_type, 'E')) echo 'fw-bold' ?><?php if (strpos($member->member_ffs_diagnosis->ninety_one_type, 'E') === 0) echo ' text-primary' ?>"><?= h($member->member_ffs_diagnosis->e) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->four_type) ?></td>
                    <td><?= h($member->member_ffs_diagnosis->ninety_one_type) ?></td>
                    <td>
                        <?= $this->Form->postLink(
                            '<i class="bi bi-trash"></i>',
                            [
                                'controller' => 'team_members',
                                'action' => 'delete',
                                $teamMember->id,
                            ],
                            [
                                'confirm' => '削除して良いですか?',
                                'escape' => false,
                            ]
                        ) ?>
                    </td>
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
