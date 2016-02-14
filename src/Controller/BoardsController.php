<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

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
     *
     */
    public function add()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $data = (array)json_decode(file_get_contents("php://input"));
            $data['uuid'] = Text::uuid();
            $data['user_id'] = $this->userID;
            $board = $this->Boards->newEntity($data);

            if ($this->Boards->save($board)) {
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    public function lists()
    {
        $this->viewBuilder()->layout('ajax');
        $this->render(false);
        $order = 'DESC';
        $sortBy = 'Boards.id';
        $limit = 5;
        $page = 1;
        $conditions = array();

        /*if(isset($this->request->query['size']) && $this->request->query['size'])
        {
            $limit = $this->request->query['size'];
        }
        if(isset($this->request->query['page']) && $this->request->query['page'])
        {
            $page = $this->request->query['page'];
        }
        if(isset($this->request->query['search']) && $this->request->query['search'])
        {
            $conditions = array_merge($conditions, array('Vehicles.name LIKE' => '%'. $this->request->query['search'] .'%'));
        }
        if(isset($this->request->query['search']) && $this->request->query['search'])
        {
            $conditions = array_merge($conditions, array('Vehicles.name LIKE' => '%'. $this->request->query['search'] .'%'));
        }
        if(isset($this->request->query['type']) && $this->request->query['type'])
        {
            $conditions = array_merge($conditions, array('Vehicles.type' =>$this->request->query['type'] ));
        }
        if(isset($this->request->query['category']) && $this->request->query['category'])
        {
            $conditions = array_merge($conditions, array('Vehicles.category' =>$this->request->query['category'] ));
        }
        if(isset($this->request->query['minAmount']) && $this->request->query['minAmount'])
        {
            $conditions = array_merge($conditions, array('Vehicles.price >=' => $this->request->query['minAmount'] ));
        }
        if(isset($this->request->query['maxAmount']) && $this->request->query['maxAmount'])
        {
            $conditions = array_merge($conditions, array('Vehicles.price <=' => $this->request->query['maxAmount'] ));
        }
        if(isset($this->request->query['year']) && $this->request->query['year'])
        {
            $year = $this->request->query['year'];
            if($year == 'Vintage')
            {
                $conditions = array_merge(
                    $conditions,
                    array(
                        'Vehicles.fabrication_year <' => 1979
                    )
                );
            }
            else{
                $year = explode('-', $year);
                $conditions = array_merge(
                    $conditions,
                    array(
                        'Vehicles.fabrication_year >=' => date('Y', strtotime($year[0])) ,
                        'Vehicles.fabrication_year <=' => date('Y', strtotime($year[1]))
                    )
                );
            }
        }
        if(isset($this->request->query['order']) && $this->request->query['order'])
        {
            $order = $this->request->query['order'];
        }
        if(isset($this->request->query['sort']) && $this->request->query['sort'])
        {
            $sort = $this->request->query['sort'];
            if($sort == 'Price')
            {
                $sortBy = 'Vehicles.price';
            }
            elseif($sort == 'Rating')
            {
                $sortBy = 'Vehicles.rating';
            }
            elseif($sort == 'Year')
            {
                $sortBy = 'Vehicles.fabrication_year';
            }
            elseif($sort == 'Gear')
            {
                $sortBy = 'Vehicles.no_of_gears';
            }
        }*/

        $vehicles = $this->Boards->find('all',
            [
                'conditions' => $conditions,
                'order' => $sortBy. ' '.$order,
                'limit' => $limit,
                'page' => $page
            ]
        );
        $count = $this->Boards->find('all',
            [
                'conditions' => $conditions,
            ]
        )->count();
        $result['count'] = $count;
        $result['boards'] = $vehicles;
        echo json_encode($result);
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

    public function removeBoard()
    {
        $this->autoRender = false;
        $data = json_decode(file_get_contents("php://input"));
        $board = $this->Boards->get((int) $data->id);
        if ($this->Boards->delete($board)) {
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
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
