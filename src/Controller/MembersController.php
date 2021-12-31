<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'sortableFields' => [
                'Members.email',
                'MemberFfsDiagnoses.a',
                'MemberFfsDiagnoses.b',
                'MemberFfsDiagnoses.c',
                'MemberFfsDiagnoses.d',
                'MemberFfsDiagnoses.e',
                'MemberFfsDiagnoses.four_type',
                'MemberFfsDiagnoses.ninety_one_type',
            ],
            'contain' => ['MemberFfsDiagnoses'],
            'limit' => 500,
            'maxLimit' => 500,
        ];
        $members = $this->paginate($this->Members);

        $this->set(compact('members'));
        $this->viewBuilder()->setOption('serialize', ['members']);
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['MemberFfsDiagnoses', 'MemberStresses'],
        ]);

        $this->set(compact('member'));
        $this->viewBuilder()->setOption('serialize', ['member']);
    }
}
