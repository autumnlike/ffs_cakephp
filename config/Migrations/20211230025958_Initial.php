<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('ffs_types', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('label', 'string', [
                'comment' => '記号',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'comment' => '名前',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('overview', 'string', [
                'comment' => '詳細',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('long_description', 'string', [
                'comment' => '91タイプ分類が1因子だけの場合の長めの説明',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('short_description', 'string', [
                'comment' => '91タイプ分類が2因子以上の場合の短めの説明',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('stresser', 'string', [
                'comment' => 'ストレス要因',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('managers', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('member_ffs_diagnoses', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('member_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('a', 'integer', [
                'comment' => '凝縮性',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('b', 'integer', [
                'comment' => '受容性',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('c', 'integer', [
                'comment' => '弁別性',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('d', 'integer', [
                'comment' => '拡散性',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('e', 'integer', [
                'comment' => '保全性',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('four_type', 'string', [
                'comment' => '4タイプ分類, Ex: TG, AN等',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('ninety-one_type', 'string', [
                'comment' => '91タイプ分類, Ex: ACB, BC, D等',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('member_stresses', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('member_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('point', 'integer', [
                'comment' => 'ストレス値',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('diagnostic_at', 'date', [
                'comment' => '診断日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('members', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('key', 'string', [
                'comment' => '社員番号等のキー値',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'comment' => '名前',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('name_en', 'string', [
                'comment' => '英語名',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'comment' => 'メールアドレス',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('team_members', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('team_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('member_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'team_id',
                    'member_id',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'team_id',
                ]
            )
            ->addIndex(
                [
                    'member_id',
                ]
            )
            ->create();

        $this->table('teams', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'comment' => 'チーム名',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('ffs_types')->drop()->save();
        $this->table('managers')->drop()->save();
        $this->table('member_ffs_diagnoses')->drop()->save();
        $this->table('member_stresses')->drop()->save();
        $this->table('members')->drop()->save();
        $this->table('team_members')->drop()->save();
        $this->table('teams')->drop()->save();
    }
}
