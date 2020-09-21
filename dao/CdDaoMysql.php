<?php
    require_once 'models/Cd.php';

    class CdDaoMysql implements CdDao {
        private $pdo;

        public function __construct(PDO $driver){
            $this->pdo = $driver;
        }

        public function add(Cd $cd){
            $sql = $this->pdo->prepare("INSERT INTO cd (nome, artista, ano_lancamento, genero, duracao) values (?, ?, ?, ?, ?)");
            $sql->bindValue(1, $cd->getNome());
            $sql->bindValue(2, $cd->getArtista());
            $sql->bindValue(3, $cd->getAnoLancamento());
            $sql->bindValue(4, $cd->getGenero());
            $sql->bindValue(5, $cd->getDuracao());

            $sql->execute();

            $cd->setId($this->pdo->lastInsertId());

            return $cd;

        }

        public function findById($id){
            $sql = $this->pdo->prepare("SELECT * FROM cd WHERE id_cd = ?");
            $sql->bindValue(1, $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $data = $sql->fetch();
                $cd = new Cd();

                $cd->setId($data['id_cd']);
                $cd->setNome($data['nome']);
                $cd->setArtista($data['artista']);
                $cd->setAnoLancamento($data['ano_lancamento']);
                $cd->setGenero($data['genero']);
                $cd->setDuracao($data['duracao']);

                return $cd;
            }else{
                return false;
            }
        }
        public function findAll(){
            $array = [];

            $sql = $this->pdo->query('SELECT * FROM cd');
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll();
                foreach ($data as $item) {
                    $cd = new Cd();
                    $cd->setId($item['id_cd']);
                    $cd->setNome($item['nome']);
                    $cd->setArtista($item['artista']);
                    $cd->setAnoLancamento($item['ano_lancamento']);
                    $cd->setGenero($item['genero']);
                    $cd->setDuracao($item['duracao']);

                    $array[] = $cd;

                }
            }

            return $array;
        }
        public function delete($id){
            $sql = $this->pdo->prepare("DELETE FROM cd where id_cd = ?");
            $sql->bindValue(1, $id);
            $sql->execute();
        }

        public function update(Cd $cd){
            $sql = $this->pdo->prepare("UPDATE cd SET nome = ?, artista = ?, ano_lancamento = ?, genero = ?, duracao = ? WHERE id_cd = ?");
            $sql->bindValue(1, $cd->getNome());
            $sql->bindValue(2, $cd->getArtista());
            $sql->bindValue(3, $cd->getAnoLancamento());
            $sql->bindValue(4, $cd->getGenero());
            $sql->bindValue(5, $cd->getDuracao());
            $sql->bindValue(6, $cd->getId());

            $sql->execute();

            return true;

        }

    }
?>
