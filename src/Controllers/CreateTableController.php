<?php


namespace Source\Controllers;


class CreateTableController
{
    public function createTable($idTable, $questionario_id, $colunas, $datas, $botoes = [])
    {
        echo ' <div class="table-responsive"><table id="order-listing" class="table"><thead><tr>';
        foreach ($colunas as $col) {
            echo "<th class='text-center '>" . $col . "</th>";
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
                    echo "<a class='btn btn-sm btn-primary mx-1 p-2 text-center text-decoration-none text-white' 
                    href='" . url_pesquisa("rpd/edit/" . $data->data()->aplicacao_questionario_id) . "' id='" .  $data->data()->aplicacao_questionario_id . "'>
                    <i class='far fa-edit mr-0'></i></div>";
                }
                if ($tipo == "excluir") {
                    echo "<a class='btn btn-sm btn-danger mx-1 p-2 text-center  text-decoration-none text-white' href='#'
                     id='" . $data->data()->aplicacao_questionario_id . "'><i class='far fa-trash-alt mr-0'></i></div>";
                }
                if ($tipo == "view") {
                    echo "<a class='btn btn-sm btn-primary mx-1 p-2 text-center  text-decoration-none text-white' href='#'
                     id='" . $data->data()->aplicacao_questionario_id . "'><i class='fas fa-eye mr-0'></i></div>";
                }
            }
            echo "</td>";
            echo "</tr>";
        }
        echo '</tbody></table></div>';
    }
}