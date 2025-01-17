<?php

require './DB/Database.php';

class Cliente{

    public int $id;
    public string $nome;
    public string $cpf;
    public string $email;

    // public function __construct(string $nome, string $cpf, string $email){
    //     $this->nome = $nome;
    //     $this->cpf = $cpf;
    //     $this->email = $email;
    // }

    public function cadastrar(){
        $db = new Database('cliente');
        $result =  $db->insert(
                            [
                            'nome' => $this->nome,
                            'cpf' => $this->cpf,
                            'email' => $this->email
                            ]
                        );
        
        if($result) {
            return true;
        }
        else{
            return false;
        }
    }

    // 17/01/2025
    public function atualizar(){
        return (new Database('cliente'))->update('id = '. $this->id, [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
        ]);
    }

    // _____________________________________________

    public static function buscar($where=null,$order=null,$limit=null){
        //FETCHALL
        return (new Database('cliente'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        //FETCHALL
        return (new Database('cliente'))->select('id = ' .$id)->fetchObject(self::class);
    }

    public function excluir($id){
        return (new Database('cliente'))->delete('id = '.$id);
    }

}