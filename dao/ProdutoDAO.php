<?php 

namespace DAO;
use Model\Produto;
use Util\Conexao;
use PDO;

require_once __DIR__ . '/../util/Conexao.php';

class ProdutoDAO {
    private ?PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function listarAleatoriamente(): array {
        $sql = "SELECT * FROM produtos ORDER BY RANDOM() LIMIT 15";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function criar(Produto $produto): void {

        $sql = "INSERT INTO produtos
            (nome, descricao, setor, preco, validade,
             imagem, peso, marca, quantidade_estoque,
             status_estoque)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stm = $this->conexao->prepare($sql);

        $stm->execute([
            $produto->getNome(),
            $produto->getDescricao(),
            $produto->getSetor()->value,
            $produto->getPreco(),
            $produto->getValidade(),
            $produto->getImagem(),
            $produto->getPeso(),
            $produto->getMarca(),
            $produto->getQuantidadeEstoque(),
            $produto->getStatus()->value
        ]);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM produtos WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }

    public function acharPorId(int $id): array {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetch();
    }
}
