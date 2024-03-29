<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\I18n\FrozenTime;

/**
 * Initial seed.
 */
class InitialSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('ffs_types');

        $data = [
            [
                'id' => 1,
                'label' => 'A',
                'name' => '凝縮性',
                'overview' => '自らの考え（価値観）を明確に示す力。',
                'long_description' => '自らの価値観を明確に示すことができます。物事の価値基準が明確です。先が見えないような状況下でも方向を指し示すことができます。',
                'short_description' => '自らの価値観を明確に示すことができます。物事の価値基準が明確です。先が見えないような状況下でも方向を指し示すことができます。',
                'stresser' => '["頭ごなしに否定されること。", "⾃⼰の価値観が通⽤しないこと。"]',
                'created' => FrozenTime::now()->format('Y-m-d H:i:s'),
                'modified' => FrozenTime::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'label' => 'B',
                'name' => '受容性',
                'overview' => '柔軟に物事や意見を受け入れていく力。',
                'long_description' => '周囲の喜びが自分の喜びになるため、まずは周りを良く観て、元気がなさそうな人を見つけると、お世話して元気にしていこうとします。観察力があり、積極的に人と関与しようとします。柔軟な対応が得意で、新しい情報や周囲の動向にも敏感です。',
                'short_description' => '柔軟に物事を受け入れていきます。周囲の喜びを自分の喜びと考えることができます。そのため、人を育成しようとする気持ちが強いです。',
                'stresser' => '["存在を蔑ろにされること。", "貢献実感が無いこと"]',
                'created' => FrozenTime::now()->format('Y-m-d H:i:s'),
                'modified' => FrozenTime::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'label' => 'C',
                'name' => '弁別性',
                'overview' => '合理的に状況や物事を判断する力。',
                'long_description' => '情報をもとに黑か白か、合理的に二つに分けていくことが得意です。優先順序を淡々と切り分けていくことができる判断力があります。状況を理解するために理由や根拠を求める気校があり、自分が説明をする際は、明確にその理由を述べてくれます。',
                'short_description' => '合理的に物事を判断していくことができます。物事や状態を明確に切り分けていくことが得意です。物事の説明や理解をするときは理由や根拠が明確です。',
                'stresser' => '["義理、⼈情などの割り切れない状態に置かれること。", "曖昧な状態、目的、背景が不明確なこと。"]',
                'created' => FrozenTime::now()->format('Y-m-d H:i:s'),
                'modified' => FrozenTime::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'label' => 'D',
                'name' => '拡散性',
                'overview' => '創造性が高くアイデア的に、積極的に行動する力。',
                'long_description' => '興味があることに対して、周りを気にすることもなく積極的に動いていきます。前例や人と同じことを嫌い、違うことをしようとするため創造性は高くアイデア的になります。ただ、周囲に対して無頓着なところがあり、興味を持たないことには、全く動こうとしない場合があります。寡黙でテンションが低く、別人のような面もあります。',
                'short_description' => '積極的にアイデアを出しながら動いていくことができます。人と違うことを思いついたら自ら行動していくことでそれを実現しようとします。興 味のあることを実現するのに積極的です。',
                'stresser' => '["自分の思いで、自由で動けないこと。", "拘束されること。"]',
                'created' => FrozenTime::now()->format('Y-m-d H:i:s'),
                'modified' => FrozenTime::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'label' => 'E',
                'name' => '保全性',
                'overview' => '現状を維持し、継続的に改善していく力。',
                'long_description' => '現状を継続しながら改善を積み上げて、より安定した状態を作り上げていきます。工夫改善をしながら組織化、仕組み化することを得意とします。興味のあることを極めていくことに積極的です。ただ、新しいことに取り組む場合は慎重になります。少しずつ情報を得て、自分なりの形にしていくので、時間がかかることがあります。',
                'short_description' => '現状を継続しつつ、改善を積み上げていくことができます。良いものを残しつつ、悪いものを改善しながら目標を達成していきます。興味のあることを極めることに積極的です。',
                'stresser' => '["明確な指針がないまま放置されること。", "少数派になること。"]',
                'created' => FrozenTime::now()->format('Y-m-d H:i:s'),
                'modified' => FrozenTime::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $table->insert($data)->save();
    }
}
