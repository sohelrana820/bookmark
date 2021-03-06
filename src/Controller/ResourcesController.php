<?php
namespace App\Controller;

use App\Controller\AppController;
use Symfony\Component\DomCrawler\Crawler;
use Cake\Utility\Text;

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
            'contain' => ['Users']
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

        if ($this->request->is('post')) {
            $data = (array)json_decode(file_get_contents("php://input"));
            $data['uuid'] = Text::uuid();
            $data['user_id'] = $this->userID;
            $resource = $this->Resources->newEntity($data);

            if ($this->Resources->save($resource)) {
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }

        }
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
            'contain' => []
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
        $this->set(compact('resource', 'users'));
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
            $html = file_get_contents($url);
            $crawler = new Crawler($html);

            $title = 'Untitled';
            $description = 'No Description found';
            $img = 'http://store.loadedcommerce.com/images/content/noImageAvailable330.gif';
            if ($crawler->filter('title')->text() && $crawler->filter('title')->text() != '') {
                $title = $crawler->filter('title')->text();
            }
            if ($crawler->filter('body p')->first()->text() && $crawler->filter('body p')->first()->text() != '') {
                $description = $crawler->filter('body p')->first()->text();
            }
            if ($crawler->filter('body img')->first()->attr('src') && $crawler->filter('body img')->first()->attr(
                    'src'
                ) != ''
            ) {
                $img = $crawler->filter('body img')->first()->attr('src');
                if( strpos($img, 'htt') !== false ){
                    $img = $img;
                }
                else{
                    $img = $domain . $img;
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

}
