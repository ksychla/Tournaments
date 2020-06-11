<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tournament Controller
 *
 * @property \App\Model\Table\TournamentTable $Tournament
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TournamentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tournament = $this->paginate($this->Tournament);

        $this->set(compact('tournament'));
    }

    public function display(){
        $identity = $this->Authentication->getIdentity();
        if($this->Authentication->getResult()->isValid()){
            $this->set('identity', $identity);
        }
        $id = $this->request->getQuery('id');
        if($this->Tournament->exists(array('id'=>$id))){
            $tournament = $this->Tournament->get($id);
            $this->set('tournament', $tournament);
        }else{
            return $this->redirect('/');
        }
    }

    /**
     * View method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tournament = $this->Tournament->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tournament'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tournament = $this->Tournament->newEmptyEntity();
        if ($this->request->is('post')) {
            $tournament = $this->Tournament->patchEntity($tournament, $this->request->getData());
            $tournament->pearson = $this->Authentication->getIdentity()->id;
            $tournament->players = 0;
            if ($this->Tournament->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tournament = $this->Tournament->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournament = $this->Tournament->patchEntity($tournament, $this->request->getData());
            if ($this->Tournament->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tournament = $this->Tournament->get($id);
        if ($this->Tournament->delete($tournament)) {
            $this->Flash->success(__('The tournament has been deleted.'));
        } else {
            $this->Flash->error(__('The tournament could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
