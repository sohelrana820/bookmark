<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 */
class BoardsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('boards', $this->paginate($this->Boards));
        $this->set('_serialize', ['boards']);
    }

    /**
     * View method
     *
     * @param string|null $id Board id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('board', $board);
        $this->set('_serialize', ['board']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $board = $this->Boards->newEntity();
        if ($this->request->is('post')) {
            $board = $this->Boards->patchEntity($board, $this->request->data);
            if ($this->Boards->save($board)) {
                $this->Flash->success(__('The board has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The board could not be saved. Please, try again.'));
            }
        }
        $users = $this->Boards->Users->find('list', ['limit' => 200]);
        $this->set(compact('board', 'users'));
        $this->set('_serialize', ['board']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Board id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $board = $this->Boards->patchEntity($board, $this->request->data);
            if ($this->Boards->save($board)) {
                $this->Flash->success(__('The board has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The board could not be saved. Please, try again.'));
            }
        }
        $users = $this->Boards->Users->find('list', ['limit' => 200]);
        $this->set(compact('board', 'users'));
        $this->set('_serialize', ['board']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Board id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $board = $this->Boards->get($id);
        if ($this->Boards->delete($board)) {
            $this->Flash->success(__('The board has been deleted.'));
        } else {
            $this->Flash->error(__('The board could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
