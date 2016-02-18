<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Resources Controller
 *
 * @property \App\Model\Table\ResourcesTable $Resources
 */
class ResourcesController extends AppController
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
        $this->set('resources', $this->paginate($this->Resources));
        $this->set('_serialize', ['resources']);
    }

    /**
     * View method
     *
     * @param string|null $id Resource id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resource = $this->Resources->get($id, [
            'contain' => ['Users', 'Boards', 'Categories']
        ]);
        $this->set('resource', $resource);
        $this->set('_serialize', ['resource']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resource = $this->Resources->newEntity();
        if ($this->request->is('post')) {


            var_dump($resource);
            var_dump($this->request->data);
            die();

            $resource = $this->Resources->patchEntity($resource, $this->request->data);
            if ($this->Resources->save($resource)) {
                $this->Flash->success(__('The resource has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resource could not be saved. Please, try again.'));
            }
        }
        $users = $this->Resources->Users->find('list', ['limit' => 200]);
        $boards = $this->Resources->Boards->find('list', ['limit' => 200]);
        $categories = $this->Resources->Categories->find('list', ['limit' => 200]);
        $this->set(compact('resource', 'users', 'boards', 'categories'));
        $this->set('_serialize', ['resource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resource id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resource = $this->Resources->get($id, [
            'contain' => ['Boards', 'Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resource = $this->Resources->patchEntity($resource, $this->request->data);
            if ($this->Resources->save($resource)) {
                $this->Flash->success(__('The resource has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resource could not be saved. Please, try again.'));
            }
        }
        $users = $this->Resources->Users->find('list', ['limit' => 200]);
        $boards = $this->Resources->Boards->find('list', ['limit' => 200]);
        $categories = $this->Resources->Categories->find('list', ['limit' => 200]);
        $this->set(compact('resource', 'users', 'boards', 'categories'));
        $this->set('_serialize', ['resource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resource id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resource = $this->Resources->get($id);
        if ($this->Resources->delete($resource)) {
            $this->Flash->success(__('The resource has been deleted.'));
        } else {
            $this->Flash->error(__('The resource could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
