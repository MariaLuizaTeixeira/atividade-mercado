<?php

use Util\Conexao;

include_once __DIR__ . '/../../components/header.php';
include_once __DIR__ . '/../../layouts/header.php';
require_once "../../../controller/ProdutoController.php";
require_once "../../../model/Produto.php";
require_once "../../../model/enums/Setor.php";
require_once "../../../model/enums/StatusEstoque.php";

use Controller\ProdutoController;
use Model\Produto;
use Enums\Setor;
use Enums\StatusEstoque;

$conexao = Conexao::getConexao();

$nome = "";
$descricao = "";
$setor = "";
$preco = "";
$validade = "";
$imagem = "";
$peso = "";
$marca = "";
$quantidadeEstoque = "";
$statusEstoque = "";
$msgErro = "";

if(isset($_POST['nome'])) {

    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $setor = trim($_POST['setor']);
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $imagem = trim($_POST['imagem']);
    $peso = trim($_POST['peso']);
    $marca = trim($_POST['marca']);
    $quantidadeEstoque = $_POST['quantidade_estoque'];
    $statusEstoque = trim($_POST['status_estoque']);

    $msgs = [];

    if(!$nome)
        $msgs[] = "Informe o nome!";

    if(!$descricao)
        $msgs[] = "Informe a descrição!";

    if(!$setor)
        $msgs[] = "Informe o setor!";

    if(!$preco || $preco <= 0)
        $msgs[] = "Informe um preço válido!";

    if(!$validade)
        $msgs[] = "Informe a validade!";

    if(!$imagem)
        $msgs[] = "Informe a imagem!";

    if(!$peso)
        $msgs[] = "Informe o peso!";

    if(!$marca)
        $msgs[] = "Informe a marca!";

    if($quantidadeEstoque === "")
        $msgs[] = "Informe a quantidade em estoque!";

    if(!$statusEstoque)
        $msgs[] = "Informe o status do estoque!";

    if(empty($msgs)) {
        $produto = new Produto();

        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setSetor(Setor::from($setor));
        $produto->setPreco((float)$preco);
        $produto->setValidade($validade);
        $produto->setImagem($imagem);
        $produto->setPeso($peso);
        $produto->setMarca($marca);
        $produto->setQuantidadeEstoque($quantidadeEstoque);
        $produto->setStatus(StatusEstoque::from($statusEstoque));

        $controller = new ProdutoController();
        $controller->criar($produto);

        header("location: ./view/home/home.php");
        exit;
    } else {
        $msgErro = implode("<br>", $msgs);
    }
}
?>

<body class="bg-light">

<form action="" method="POST">

    <div class="mb-3">
        <label class="form-label">Nome do Produto</label>
        <input
                type="text"
                class="form-control"
                name="nome"
                value="<?= $nome ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea
                class="form-control"
                name="descricao"
                rows="4"><?= $descricao ?></textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Setor</label>
            <select class="form-select" name="setor">
                <option value="">Selecione</option>

                <option value="Higiene e Limpeza"
                    <?= $setor == "Higiene e Limpeza" ? "selected" : "" ?>>
                    Higiene e Limpeza
                </option>

                <option value="Hortifruti"
                    <?= $setor == "Hortifruti" ? "selected" : "" ?>>
                    Hortifruti
                </option>

                <option value="Açougue E Peixaria"
                    <?= $setor == "Açougue E Peixaria" ? "selected" : "" ?>>
                    Açougue e Peixaria
                </option>

                <option value="Padaria e Confeitaria"
                    <?= $setor == "Padaria e Confeitaria" ? "selected" : "" ?>>
                    Padaria e Confeitaria
                </option>

                <option value="Frios e Laticínios"
                    <?= $setor == "Frios e Laticínios" ? "selected" : "" ?>>
                    Frios e Laticínios
                </option>

                <option value="Congelados"
                    <?= $setor == "Congelados" ? "selected" : "" ?>>
                    Congelados
                </option>

                <option value="Bebidas"
                    <?= $setor == "Bebidas" ? "selected" : "" ?>>
                    Bebidas
                </option>

                <option value="Mercearia"
                    <?= $setor == "Mercearia" ? "selected" : "" ?>>
                    Mercearia
                </option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Preço (R$)</label>
            <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="preco"
                    value="<?= $preco ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Validade</label>
            <input
                    type="date"
                    class="form-control"
                    name="validade"
                    value="<?= $validade ?>">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Peso</label>
            <input
                    type="text"
                    class="form-control"
                    name="peso"
                    placeholder="Ex: 500g, 1kg, 2L"
                    value="<?= $peso ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Marca</label>
            <input
                    type="text"
                    class="form-control"
                    name="marca"
                    value="<?= $marca ?>">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Quantidade em Estoque</label>
            <input
                    type="number"
                    class="form-control"
                    name="quantidade_estoque"
                    value="<?= $quantidadeEstoque ?>">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">URL da Imagem</label>
        <input
                type="text"
                class="form-control"
                name="imagem"
                placeholder="https://..."
                value="<?= $imagem ?>">
    </div>

    <div class="mb-4">
        <label class="form-label">Status do Estoque</label>
        <select class="form-select" name="status_estoque">
            <option value="">Selecione</option>

            <option value="Disponível"
                <?= $statusEstoque == "Disponível" ? "selected" : "" ?>>
                Disponível
            </option>

            <option value="Poucas unidades"
                <?= $statusEstoque == "Poucas unidades" ? "selected" : "" ?>>
                Poucas unidades
            </option>

            <option value="Esgotado"
                <?= $statusEstoque == "Esgotado" ? "selected" : "" ?>>
                Esgotado
            </option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        Cadastrar Produto
    </button>

</form>

<?php if(!empty($msgErro)): ?>
    <div class="text-danger mt-3">
        <?= $msgErro ?>
    </div>
<?php endif; ?>
</body>
