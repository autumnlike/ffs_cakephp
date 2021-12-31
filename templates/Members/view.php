<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="members view row">
    <h3><?= h($member->name) ?></h3>
    <canvas id="diagnosisChart"></canvas>

    <div class="row mt-3">
        <h4>因子概要</h4>
        <p class="mt-3"><?= h($member->member_ffs_diagnosis->description()) ?></p>
    </div>

    <div class="row mt-2">
        <h4>ストレス要因</h4>
        <canvas id="stressesChart"></canvas>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>因子</th>
                        <th>ストレス要因</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($member->member_ffs_diagnosis->getTypes() as $type) { ?>
                    <tr>
                        <td><?= h($type->label) ?>: <?= h($type->name) ?></td>
                        <td>
                            <?php foreach (json_decode($type->stresser) as $stress) { ?>
                                ・<?= h($stress) ?><br />
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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

  const diagnosisData = {
    labels: diagnosisLabels,
    datasets: [{
      label: '<?= h($member->name) ?> <?= $member->member_ffs_diagnosis->ninety_one_type ?>',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [
        <?= $member->member_ffs_diagnosis->a ?>,
        <?= $member->member_ffs_diagnosis->b ?>,
        <?= $member->member_ffs_diagnosis->c ?>,
        <?= $member->member_ffs_diagnosis->d ?>,
        <?= $member->member_ffs_diagnosis->e ?>
      ],
      backgroundColor: [
          'rgba(201, 203, 207, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(255, 159, 64, 0.2)',
      ],
      borderColor: [
          'rgb(201, 203, 207)',
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)',
          'rgb(255, 159, 64)',
      ],
      borderWidth: 1
    }]
  };

  const diagnosisConfig = {
    type: 'line',
    data: diagnosisData,
    options: {
      y: {
        max: 20,
        min: 0
      }
    }
  };

  const myChart = new Chart(
    document.getElementById('diagnosisChart'),
    diagnosisConfig
  );

  const stressesLabels = [
    <?php foreach ($member->member_stresses as $stress) { ?>
        '<?= $stress->diagnostic_at->toDateString() ?>',
    <?php } ?>
  ];

  const stressesData = {
    labels: stressesLabels,
    datasets: [{
      label: 'ストレス',
      data: [
        <?php foreach ($member->member_stresses as $stress) { ?>
            <?= $stress->point ?>,
        <?php } ?>
      ],
    }]
  };

  const stressesConfig = {
    type: 'line',
    data: stressesData,
    options: {
      y: {
        max: 20,
        min: 0
      }
    }
  };

  const stressesChart = new Chart(
    document.getElementById('stressesChart'),
    stressesConfig
  );
</script>
