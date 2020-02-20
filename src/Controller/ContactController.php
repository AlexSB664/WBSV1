<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
/**
 * Contact Controller
 *
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function contact(){
        if ($this->request->is('post')) {
            $info = $this->request->getData();
            $email = new Email('default');
            $subject=$info['affair'];
            $message = 'Name: '.$info['name'].'<br>'.'Email: '.$info['email'].'<br>'.'Mensaje: '.$info['message'];
            $email->emailFormat('html')->from('coliseumwbs@c4-technologies.com')
                ->to('coliseumwbs@c4-technologies.com')->subject($subject)
                ->send($message);
            }
        $this->viewBuilder()->layout('contactame');
    }
    public function index()
    {
        $contact = $this->paginate($this->Contact);

        $this->set(compact('contact'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contact->get($id, [
            'contain' => []
        ]);

        $this->set('contact', $contact);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contact->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contact->patchEntity($contact, $this->request->getData());
            if ($this->Contact->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contact->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contact->patchEntity($contact, $this->request->getData());
            if ($this->Contact->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contact->get($id);
        if ($this->Contact->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function icons(){
        
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['contact']);
    }
}
