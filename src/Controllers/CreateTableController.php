<?php


namespace Source\Controllers;


use Source\Models\PerguntaDAO;
use Source\Models\RespostaDAO;

class CreateTableController
{
    public function createTable($idTable, $questionario_id, $colunas, $datas = [], $botoes = [])
    {
        echo '<div class=" table-responsive"><table id="order-listing" class="table table-striped table-bordered nowrap"><thead><tr>';

        foreach ($colunas as $col) {
            echo "<th class='text-center'>" . $col . "</th>";
        }
                echo '</tr></thead><tbody>';
        foreach ($datas as $data) {
            echo "<tr>";
            foreach ($data->data() as $key => $value) {
                echo "<td class='text-center'>";
                echo $value;
                echo "</td>";
            }
            echo "<td class='text-center'>";
            foreach ($botoes as $tipo) {
                if ($tipo == "editar") {
                    echo "<a class='btn btn-sm btn-primary mx-1 p-2 text-center text-decoration-none text-white' onclick='editItem(" . $data->data()->aplicacao_questionario_id . ")'>
                    <i class='far fa-edit mr-0'></i></a>";
                }
                if ($tipo == "excluir") {
                    echo "<a class='btn btn-sm btn-danger mx-1 p-2 text-center  text-decoration-none text-white'  onclick='deleteItem(" . $data->data()->aplicacao_questionario_id . ")'
                     id='" . $data->data()->aplicacao_questionario_id . "'><i class='far fa-trash-alt mr-0'></i></a>";
                }
                if ($tipo == "view") {
                    echo "<a class='btn btn-sm btn-primary mx-1 p-2 text-center  text-decoration-none text-white' href='#' onclick='viewAplicacao(" . $data->data()->aplicacao_questionario_id . ")'
                     id='" . $data->data()->aplicacao_questionario_id . "'><i class='fas fa-eye mr-0'></i></a>";
                }
            }
            echo "</td>";
            echo "</tr>";
        }
        echo '</tbody></table>';
    }

    public function createTableMonitoramentoHumor($idTable, $questionario_id, $colunas, $datas = [], $botoes = [])
    {
        echo '<div class=" table-responsive"><table id="order-listing" class="table table-striped table-bordered nowrap"><thead><tr>';
        foreach ($colunas as $col) {
            echo "<th class='text-center '>" . $col . "</th>";
        }
        echo '</tr></thead><tbody>';
        foreach ($datas as $data) {
            $Respostas = new RespostaDAO();
            $Respostas = $Respostas->getRespostaByAplicacaoId($data->data()->aplicacao_questionario_id);
            echo "<tr>";
            echo "<td class='text-center'>";
            echo $data->data()->apq_data_cadastro;
            echo "</td>";
            foreach ($Respostas as $res) {
                $perguntadao = new PerguntaDAO();
                $pergunta = $perguntadao->findById($res->data()->pergunta_id);
                if ($pergunta->data()->per_name_id != "txtOqueEstaSentindo") {
                    if ($pergunta->data()->per_name_id == "selectHumor") {
                        echo "<td class='text-center'><i class='menu-icons mdi " . self::returnClassEmojiByLevel($res->data()->res_descricao)."' style='font-size: 30px; margin-bottom: 0 !important; margin-left: -5px !important;'></i></td>";
                    } else {
                        echo "<td class='text-center'>" . $res->data()->res_descricao . "</td>";
                    }
                }
            }
            echo "<td class='text-center'>";
            foreach ($botoes as $tipo) {
                if ($tipo == "editar") {
                    echo "<a class='btn btn-sm btn-primary mx-1 p-2 text-center text-decoration-none text-white' onclick='editItem(" . $data->data()->aplicacao_questionario_id . ")'>
                    <i class='far fa-edit mr-0'></i></a>";
                }
                if ($tipo == "excluir") {
                    echo "<a class='btn btn-sm btn-danger mx-1 p-2 text-center  text-decoration-none text-white'  href='#' onclick='deleteItem(" . $data->data()->aplicacao_questionario_id . ")'
                     id='" . $data->data()->aplicacao_questionario_id . "'><i class='far fa-trash-alt mr-0'></i></a>";
                }
                if ($tipo == "view") {
                    echo "<a class='btn btn-sm btn-primary mx-1 p-2 text-center  text-decoration-none text-white' href='#' onclick='viewAplicacao(" . $data->data()->aplicacao_questionario_id . ")'
                     id='" . $data->data()->aplicacao_questionario_id . "'><i class='fas fa-eye mr-0'></i></a>";
                }
            }
            echo "</td>";
            echo "</tr>";
        }
        echo '</tbody></table></div></div>';
    }

    public function returnClassEmojiByLevel($level)
    {
        if ($level == 1) {
            return "mdi-emoticon-outline text-success";
        } elseif ($level == 2) {
            return "mdi-emoticon-happy-outline text-warning";
        } elseif ($level == 3) {
            return "mdi-emoticon-neutral-outline text-muted";
        } elseif ($level == 4) {
            return "mdi-emoticon-sad-outline text-primary";
        } elseif ($level == 5) {
            return "mdi-emoticon-cry-outline text-info";
        }
    }
}