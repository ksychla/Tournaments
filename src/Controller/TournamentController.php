<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

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

    public function win(){
        $identity = $this->Authentication->getIdentity();
        $id = $this->request->getQuery('id');
        if(!$id)
            $this->redirect('/');
        $tourPlace = TableRegistry::getTableLocator()->get('PlayerPlace');
        $tourPlayer = TableRegistry::getTableLocator()->get('TournamentPlayer');

        $player = $tourPlayer->find('all')->where(['player'=>$identity->id, 'tournament'=>$id])->first();
        $round = $tourPlace->find('all')->where(['tourPlay'=>$player->id])->order(['round'=>'DESC'])->first();

        $new_place = $tourPlace->newEmptyEntity();
        $new_place->tourPlay = $round->tourPlay;
        $new_place->place = $round->place;
        $new_place->round = $round->round+1;
        if($tourPlace->save($new_place))
            $this->redirect('/');
    }

    public function search(){
        $identity = $this->Authentication->getIdentity();
        if($this->Authentication->getResult()->isValid()){
            $this->set('identity', $identity);
        }
        $query = $this->request->getQuery('q');
        if(!$query){
            $this->redirect('/');
        }
        $this->set('q', $query);
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
        $identity = $this->Authentication->getIdentity();
        if($this->Authentication->getResult()->isValid()){
            $this->set('identity', $identity);
        }
        $tournament = $this->Tournament->newEmptyEntity();
        $sponsors = TableRegistry::getTableLocator()->get('TournamentSponsor');
        if ($this->request->is('post')) {
            $tournament = $this->Tournament->patchEntity($tournament, $this->request->getData());

            $tournament->pearson = $this->Authentication->getIdentity()->id;
            $tournament->players = 0;
            if ($this->Tournament->save($tournament)) {
                foreach (array_keys($this->request->getData()) as $key){
                    if(!preg_match("/sponsors/", $key, $match))
                        continue;
                    $sponsor = $sponsors->newEmptyEntity();
                    $sponsor->tournament = $tournament->id;
                    $sponsor->sponsor = $this->request->getData()[$key];
                    $sponsors->save($sponsor);
                }
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
    public function edit()
    {
        $identity = $this->Authentication->getIdentity();
        if($this->Authentication->getResult()->isValid()){
            $this->set('identity', $identity);
        }
        if($this->request->is('get')){
            if($this->request->getQuery('id'))
                $id = $this->request->getQuery('id');
            else
                return $this->redirect('/');
        }

        $tournament = $this->Tournament->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournament = $this->Tournament->patchEntity($tournament, $this->request->getData());
            if ($this->Tournament->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect('/');
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

        return $this->redirect('/');
    }
}
