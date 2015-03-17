<?php
namespace StaticContentManager\Controller;

use StaticContentManager\Controller\AppController;

/**
 * StaticContents Controller
 *
 * @property \StaticContentManager\Model\Table\StaticContentsTable $StaticContents
 */
class StaticContentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('staticContents', $this->paginate($this->StaticContents));
        $this->set('_serialize', ['staticContents']);
    }

    /**
     * View method
     *
     * @param string|null $id Static Content id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staticContent = $this->StaticContents->get($id, [
            'contain' => []
        ]);
        $this->set('staticContent', $staticContent);
        $this->set('_serialize', ['staticContent']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staticContent = $this->StaticContents->newEntity();
        if ($this->request->is('post')) {
            $staticContent = $this->StaticContents->patchEntity($staticContent, $this->request->data);
            if ($this->StaticContents->save($staticContent)) {
                $this->Flash->success('The static content has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The static content could not be saved. Please, try again.');
            }
        }
        $this->set(compact('staticContent'));
        $this->set('_serialize', ['staticContent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Static Content id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staticContent = $this->StaticContents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staticContent = $this->StaticContents->patchEntity($staticContent, $this->request->data);
            if ($this->StaticContents->save($staticContent)) {
                $this->Flash->success('The static content has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The static content could not be saved. Please, try again.');
            }
        }
        $this->set(compact('staticContent'));
        $this->set('_serialize', ['staticContent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Static Content id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staticContent = $this->StaticContents->get($id);
        if ($this->StaticContents->delete($staticContent)) {
            $this->Flash->success('The static content has been deleted.');
        } else {
            $this->Flash->error('The static content could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function preview()
    {
        $slug = $this->request->params['slug'];
        // debug($this->request->params['slug']);
        // $query = $this->StaticContents
        //         ->find()
        //         ->select(['*'])
        //         ->where(['slug LIKE' => $slug]);
        if($slug) {
                // debug($query);
            $pageData = $this->StaticContents->find('slug', ['slug' => $slug])->first();
            $this->set(compact('pageData'));

        }
    }
}
