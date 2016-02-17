<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Event\Event;

/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 */
class BoardsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()
            ->layout('application')
            ->theme('Public');
    }

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
    public function view($uuid)
    {
        $id = $this->Boards->getIDbyUUID($uuid);
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

        if(isset($this->request->query['size']) && $this->request->query['size'])
        {
            $limit = $this->request->query['size'];
        }

        if(isset($this->request->query['page']) && $this->request->query['page'])
        {
            $page = $this->request->query['page'];
        }

        if(isset($this->request->query['search']) && $this->request->query['search'])
        {
            $conditions = array_merge($conditions, array('Boards.name LIKE' => '%'. $this->request->query['search'] .'%'));
        }

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
    public function edit()
    {

        $this->autoRender = false;

        if ($this->request->is('post')) {
            $data = (array)json_decode(file_get_contents("php://input"));
            $borderInfo = array(
                'name' => $data['name'],
                'description' => $data['description']
            );


            $board = $this->Boards->get($data['id'], [
                'contain' => []
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $board = $this->Boards->patchEntity($board, $borderInfo);
                if ($this->Boards->save($board)) {
                    echo json_encode(1);
                } else {
                    echo json_encode(0);
                }
            }
        }
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

    public function getBoardByID()
    {
        $this->autoRender = false;
        $data = json_decode(file_get_contents("php://input"));
        $board = $this->Boards->get((int) $data->id);

        if($board)
        {
            echo json_encode($board);
        }
        else{
            echo json_encode(false);
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
