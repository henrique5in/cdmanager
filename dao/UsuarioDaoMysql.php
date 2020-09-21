<?php
    require_once 'models/Usuario.php';

    class UsuarioDAOMysql implements UsuarioDAO {
        private $pdo;

        public function __construct(PDO $driver){
            $this->pdo = $driver;
        }

        public function add(Usuario $usuario){
            $sql = $this->pdo->prepare("INSERT INTO login (username, password, nome) values (?, ?, ?)");
            $sql->bindValue(1, $usuario->getUsername());
            $sql->bindValue(2, $usuario->getPassword());
            $sql->bindValue(3, $usuario->getNome());

            $sql->execute();

            $usuario->setId($this->pdo->lastInsertId());

            return $usuario;
        }
        public function findById($id){
            $sql = $this->pdo->prepare("SELECT * FROM login WHERE id_user = ?");
            $sql->bindValue(1, $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $data = $sql->fetch();
                $usuario = new Usuario();

                $usuario->setId($data['id_user']);
                $usuario->setUsername($data['username']);
                $usuario->setPassword($data['password']);
                $usuario->setNome($data['nome']);

                return $usuario;
            }else{
                return false;
            }

        }
        public function findAll(){
            $array = [];

            $sql = $this->pdo->query('SELECT * FROM login');
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll();
                foreach ($data as $item) {
                    $usuario = new Usuario();
                    $usuario->setId($item['id_user']);
                    $usuario->setUsername($item['username']);
                    $usuario->setNome($item['nome']);

                    $array[] = $usuario;

                }
            }

            return $array;
        }

        public function delete($id){
            $sql = $this->pdo->prepare("DELETE FROM login where id_user = ?");
            $sql->bindValue(1, $id);
            $sql->execute();
        }

        public function update(Usuario $usuario){
            $sql = $this->pdo->prepare("UPDATE login SET username = ?, password = ?, nome = ? WHERE id_user = ?");
            $sql->bindValue(1, $usuario->getUsername());
            $sql->bindValue(2, $usuario->getPassword());
            $sql->bindValue(3, $usuario->getNome());
            $sql->bindValue(4, $usuario->getId());

            $sql->execute();

            return true;

        }

    }
?>
