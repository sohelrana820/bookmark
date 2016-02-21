<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Event\Event;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Resources Controller
 *
 * @property \App\Model\Table\ResourcesTable $Resources
 */
class ResourcesController extends AppController
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
        $this->set('resources', $this->paginate($this->Resources));
        $this->set('_serialize', ['resources']);



        $boards = $this->Resources->Boards->find('list', ['limit' => 200]);
        $categoriesList = $this->Resources->Categories->find('list', ['limit' => 200]);
        $this->set(compact('boards', 'categoriesList'));
    }

    /**
     * View method
     *
     * @param string|null $id Resource id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($uuid)
    {
        $id = $this->Resources->getIDbyUUID($uuid);

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
        $this->autoRender = false;
        $resource = $this->Resources->newEntity();

        if ($this->request->is('post')) {
            $data = (array)json_decode(file_get_contents("php://input"));
            $data['user_id'] = $this->userID;
            $data['uuid'] = Text::uuid();

            $boardsIDs = array();
            $categoriesIDs = array();

            if(isset($data['boards']))
            {
                $boardsIDs = $data['boards'];
                unset($data['boards']);
            }

            if(isset($data['categories']))
            {
                $categoriesIDs = $data['categories'];
                unset($data['categories']);
            }

            $data['boards']['_ids'] = $boardsIDs;
            $data['categories']['_ids'] = $categoriesIDs;

            $resource = $this->Resources->patchEntity($resource, $data);
            if ($this->Resources->save($resource)) {
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }

       /* $resource = $this->Resources->newEntity();
        if ($this->request->is('post')) {

            $this->request->data['user_id'] = $this->userID;
            $this->request->data['uuid'] = Text::uuid();

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
        $this->set('_serialize', ['resource']);*/
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

    public function getRerouces()
    {


        $this->autoRender = false;
        $url = $_GET['url'];
        $parse = parse_url(str_replace('www.', '', $url));
        $domain = $parse['host'];
        if(isset($parse['scheme'])){
            $domain = $parse['scheme'] . '://' . $parse['host'];
        }
        if ($url) {

            $client = new Client();
            $res = $client->request('GET', $url, [
                'auth' => []
            ]);

            $html = $res->getBody()->getContents();
            $crawler = new Crawler($html);


            $title = 'Untitled';
            $description = 'No Description found';
            $img = 'https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150';

            if ($crawler->filter('title')->text() && $crawler->filter('title')->text() != '') {
                $title = $crawler->filter('title')->text();
            }
            if ($crawler->filter('body p')->first()->text() && $crawler->filter('body p')->first()->text() != '') {
                $description = $crawler->filter('body p')->first()->text();
            }

            $imageDom = $crawler->filter('body img');
            if (count($imageDom) > 0)
            {
                $urlImg = $imageDom->first()->attr('src');
                if (!filter_var($urlImg, FILTER_VALIDATE_URL) === false) {
                    $img = $urlImg;
                }
            }
            $response = array(
                'url' => $url,
                'title' => $title,
                'content' => $description,
                'img' => $img,
            );

            echo json_encode($response);
        }
    }

    public function lists()
    {
        $this->viewBuilder()->layout('ajax');
        $this->render(false);
        $order = 'DESC';
        $sortBy = 'Resources.id';
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
            $conditions = array_merge($conditions, array('Resources.title LIKE' => '%'. $this->request->query['search'] .'%'));
        }

        $resources = $this->Resources->find('all',
            [
                'conditions' => $conditions,
                'order' => $sortBy. ' '.$order,
                'limit' => $limit,
                'page' => $page,
                'contain' => [
                    'Categories',
                    'Boards'
                ]
            ]
        );
        $count = $this->Resources->find('all',
            [
                'conditions' => $conditions,
            ]
        )->count();
        $result['count'] = $count;
        $result['resources'] = $resources;
        echo json_encode($result);
    }

    public function removeBoard()
    {
        $this->autoRender = false;
        $data = json_decode(file_get_contents("php://input"));
        $resource = $this->Resources->get((int) $data->id);
        if ($this->Resources->delete($resource)) {
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }
}
