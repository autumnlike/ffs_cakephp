<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TeamMembers Controller
 *
 * @property \App\Model\Table\TeamMembersTable $TeamMembers
 * @method \App\Model\Entity\TeamMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeamMembersController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post']);
        $teamMember = $this->TeamMembers->patchEntity($teamMember, $this->request->getData());
        if ($this->TeamMembers->save($teamMember)) {
            $this->Flash->success(__('The team member has been saved.'));
        } else {
            $this->Flash->error(__('The team member could not be saved. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    /**
     * Delete method
     *
     * @param string|null $id Team Member id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamMember = $this->TeamMembers->get($id);
        if ($this->TeamMembers->delete($teamMember)) {
            $this->Flash->success(__('The team member has been deleted.'));
        } else {
            $this->Flash->error(__('The team member could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
