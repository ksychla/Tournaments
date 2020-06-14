<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use DateTime;

/**
 * TournamentPlayer Controller
 *
 * @property \App\Model\Table\TournamentPlayerTable $TournamentPlayer
 * @method \App\Model\Entity\TournamentPlayer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TournamentPlayerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tournamentPlayer = $this->paginate($this->TournamentPlayer);

        $this->set(compact('tournamentPlayer'));
    }

    /**
     * View method
     *
     * @param string|null $id Tournament Player id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tournamentPlayer = $this->TournamentPlayer->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tournamentPlayer'));
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

        if($this->request->getQuery('id')){
            $tournament = $this->request->getQuery('id');
            $this->set('tournament', $tournament);
        }else{
            return $this->redirect('/');
        }
        $tournamentPlayer = $this->TournamentPlayer->newEmptyEntity();
        if ($this->request->is('post')) {
            $tour = TableRegistry::getTableLocator()->get('Tournament')->get($tournament);
            $today = new DateTime();
//            echo (string)$tour->deadline;

            $deadline = new DateTime((string)$tour->deadline);
            if ($tour->players >= $tour->players_limit || $today > $deadline) {   // TODO Synchronize this
                return $this->redirect('/');
            }
            $tour->players += 1;
            if (TableRegistry::getTableLocator()->get('Tournament')->save($tour)) {
                $tournamentPlayer = $this->TournamentPlayer->patchEntity($tournamentPlayer, $this->request->getData());
                $tournamentPlayer->tournament = $tour->id;
                $tournamentPlayer->player = $identity->id;
                if ($this->TournamentPlayer->save($tournamentPlayer)) {
                    $this->Flash->success(__('The tournament player has been saved.'));

                    return $this->redirect('/tournament?id=' . $tour->id);
                }
                $this->Flash->error(__('The tournament player could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tournamentPlayer'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Tournament Player id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tournamentPlayer = $this->TournamentPlayer->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournamentPlayer = $this->TournamentPlayer->patchEntity($tournamentPlayer, $this->request->getData());
            if ($this->TournamentPlayer->save($tournamentPlayer)) {
                $this->Flash->success(__('The tournament player has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament player could not be saved. Please, try again.'));
        }
        $this->set(compact('tournamentPlayer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tournament Player id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tournamentPlayer = $this->TournamentPlayer->get($id);
        if ($this->TournamentPlayer->delete($tournamentPlayer)) {
            $this->Flash->success(__('The tournament player has been deleted.'));
        } else {
            $this->Flash->error(__('The tournament player could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
