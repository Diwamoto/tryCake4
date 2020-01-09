<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Knowledges Controller
 *
 * @property \App\Model\Table\KnowledgesTable $Knowledges
 *
 * @method \App\Model\Entity\Knowledge[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KnowledgesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $knowledges = $this->paginate($this->Knowledges);

        $this->set(compact('knowledges'));
    }

    /**
     * View method
     *
     * @param string|null $id Knowledge id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $knowledge = $this->Knowledges->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('knowledge', $knowledge);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $knowledge = $this->Knowledges->newEmptyEntity();
        if ($this->request->is('post')) {
            $knowledge = $this->Knowledges->patchEntity($knowledge, $this->request->getData());
            if ($this->Knowledges->save($knowledge)) {
                $this->Flash->success(__('The knowledge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The knowledge could not be saved. Please, try again.'));
        }
        $users = $this->Knowledges->Users->find('list', ['limit' => 200]);
        $this->set(compact('knowledge', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Knowledge id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $knowledge = $this->Knowledges->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $knowledge = $this->Knowledges->patchEntity($knowledge, $this->request->getData());
            if ($this->Knowledges->save($knowledge)) {
                $this->Flash->success(__('The knowledge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The knowledge could not be saved. Please, try again.'));
        }
        $users = $this->Knowledges->Users->find('list', ['limit' => 200]);
        $this->set(compact('knowledge', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Knowledge id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $knowledge = $this->Knowledges->get($id);
        if ($this->Knowledges->delete($knowledge)) {
            $this->Flash->success(__('The knowledge has been deleted.'));
        } else {
            $this->Flash->error(__('The knowledge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
