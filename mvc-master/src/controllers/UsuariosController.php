<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller {

    public function add() {
        $this->render('add');
    }
    public function addAction() {
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');

        if($name && $email) {
            $data = Usuario::select()->where('email', $email)->execute();

            if(count($data) === 0) {
                // Inserindo usuário
                Usuario::insert([
                    'nome' => $name,
                    'email' => $email
                ])->execute();
                // Redirect para /
                $this->redirect('/');
             
            }
            // Redirect para /novo
            $this->redirect('/novo');
        }
    }

    public function edit($args) {
        $usuario = Usuario::select()->find($args['id']);

        $this->render('edit',[
            'usuario'=> $usuario
        ]);
    }
    public function editAction($args) {
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');

        if($name && $email) {
            Usuario::update()
            ->set('nome',$name)
            ->set('email',$email)
            ->where('id', $args['id'])
        ->execute();

        $this->redirect('/');
    
        } 

      $this->redirect('/usuario/'.$args['id'].'/editar');
       

    } 

    public function del($args) {
        
    }

}