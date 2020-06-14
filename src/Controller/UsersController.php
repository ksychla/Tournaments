<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;
use Cake\Mailer\Mailer;
use http\Client\Curl\User;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'verify', 'forgot', 'forgotCheck']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function profile(){
        $identity = $this->Authentication->getIdentity();
        if($this->Authentication->getResult()->isValid()){
            $this->set('identity', $identity);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->token = (new DefaultPasswordHasher())->hash($user->email);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->newMail($user->email, $user->token);
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function login(){
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if($result->isValid()){
            if($this->Authentication->getIdentity()->active){
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }else{
                $this->Authentication->logout();
            }

        }else{
//            echo "NIE ZALOGOWANY";
        }
    }

    private function verifyViaEmail(){

        TransportFactory::setConfig('gmail', [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => 'turnieje.reg.verify@gmail.com',
            'password' => 'testowehaslo',
            'className' => 'Smtp',
            'tls' => true
        ]);



    }

    private function newMail($email, $token){
        $this->verifyViaEmail();
        $mailer = new Mailer(['from' => 'turnieje.reg.verify@gmail.com', 'transport' => 'gmail']);
        $mailer->setTo($email)
            ->setSubject('Potwierdzenie konta')
            ->deliver('Dziękujemy za założenie konta w naszym serwisie. Aktywuj swoje konto klikając w poniższy link

http://localhost/turnieje/verify?token='.$token);
    }

    private function forgotMail($email, $token){
        $this->verifyViaEmail();
        $mailer = new Mailer(['from' => 'turnieje.reg.verify@gmail.com', 'transport' => 'gmail']);
        $mailer->setTo($email)
            ->setSubject('Potwierdzenie konta')
            ->deliver('Zapomniałeś hasła, oto twój link:

http://localhost/turnieje/forgot/check?token='.$token);
    }


    public function verify(){
        if($this->request->is('get')){
            $token = $this->request->getQuery('token');
            $user = $this->Users->find('all')
                ->where(['Users.token = '=>$token]);
            $this->set('succ', false);
            if(!$user->isEmpty()){
                $user = $user->first();
                $this->set('already', false);
                if($user->active)
                    $this->set('already', true);
                $user->active = true;
                if ($this->Users->save($user))
                    $this->set('succ', true);
            }

        }
    }

    public function logout(){
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $identity = $this->Authentication->getIdentity();
        if($this->Authentication->getResult()->isValid()){
            $this->set('identity', $identity);
        }
        $user = $this->Users->get($identity->id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect('/');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function forgot(){
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->find('all')->where(['email'=>$this->request->getData()['email']])->first();
            if($user)
                $this->forgotMail($user->email, $user->token);
            return $this->redirect('/');

//            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function forgotCheck(){
        $token = $this->request->getQuery('token');
        if(!$token)
            return $this->redirect('/');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->find('all')->where(['token'=>$token])->first();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect('/login');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
