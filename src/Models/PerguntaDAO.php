<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class PerguntaDAO extends DataLayer
{

    public function __construct()
    {
        parent::__construct("pergunta", ["questionario_id", "per_Descricao", "per_tipo", "per_name_id", "placeholder", "per_required"], "pergunta_id", false);
    }

    /**
     * @param $questionario_id
     * @return array|mixed|null
     */
    public function getPerguntasByIdQuestionario($questionario_id)
    {
        return $this->find("questionario_id = :questionario_id", "questionario_id={$questionario_id}")->fetch(true);
    }

    public static function getFormatPergunta($pergunta, $aplicacao_questionario = false)
    {
        $resposta = false;
        if ($aplicacao_questionario) {
            $RespostaDAO = new RespostaDAO();
            $resposta = $RespostaDAO->find("pergunta_id = :pergunta_id AND aplicacao_questionario_id = :aplicacao_questionario_id", "pergunta_id={$pergunta->pergunta_id}&aplicacao_questionario_id={$aplicacao_questionario->aplicacao_questionario_id}")->fetch(true)[0];
            if ($resposta == null){
                $resposta = "";
            }
        }

        if ($pergunta->per_tipo == "text") {
            $value = "";

            if ($resposta) {
                $value = $resposta->res_descricao;
            }
            echo ' <div class="form-group row">
                        <div class="col-12">
                            <label for="input-nome">' . $pergunta->per_descricao . '</label>
                                <textarea  type="text" rows="5" class="form-control"  id="' . $pergunta->per_name_id . '"
                                    placeholder="' . $pergunta->placeholder . '" name="' . $pergunta->per_name_id . '_' . $pergunta->pergunta_id . '">' . $value . '</textarea>
                        </div>
                      </div>';
        }
        if ($pergunta->per_tipo == "bars-square") {
            $selected = false;
            if ($resposta){
                $selected = $resposta->res_descricao;
            }
            echo '    <div class="form-group row">
                        <div class="col-12">
                            <label for="">' . $pergunta->per_descricao . '!!!!</label>
                            <div class="br-wrapper br-theme-bars-square">
                               ' . self::selectQuestionNumbers($pergunta, $selected) . '
                            </div>
                        </div>
                       </div>';

            echo " <script>$('#" . $pergunta->per_name_id . "').barrating('show', {
                        theme: 'bars-square',
                        showValues: true,
                        showSelectedRating: false
                            });</script>";
        }
    }

    public static function getFormatPerguntaDocumento($pergunta, $aplicacao_questionario)
    {


        $respostaDAO = new RespostaDAO();
        $resposta = $respostaDAO->getRespostaByPerguntaIdAplicacaoQuestionarioId($pergunta->pergunta_id,$aplicacao_questionario->aplicacao_questionario_id);
        if ($pergunta->per_tipo == "text") {
            if (!$resposta) {
                self::perguntaNaoRespondida($pergunta->per_descricao);
            } else {

                echo ' <div class="form-group row  border-bottom">
                        <div class="col-12">
                            <label for="input-nome font-size-17 font-weight-bold"><strong>' . $pergunta->per_descricao . '</strong></label><br>
                            <label for="input-nome">' . $resposta->res_descricao . '</label>     
                        </div>
                      </div>';
            }
        }
        if ($pergunta->per_tipo == "bars-square") {
            if (!$resposta) {
                self::perguntaNaoRespondida($pergunta->per_descricao);
            } else {
                echo '    <div class="form-group row border-bottom pb-3">
                        <div class="col-12">
                            <label for=""><strong>' . $pergunta->per_descricao . '</strong></label>
                            <div class="br-wrapper br-theme-bars-square">
                                <select disabled id="' . $pergunta->per_name_id . '" name="' . $pergunta->per_name_id . '_' . $pergunta->pergunta_id . '" autocomplete="off" style="display: none;">
                                ';
                echo '<option value="' . $resposta->res_descricao . '">' . $resposta->res_descricao . '</option>';
                echo '
                                </select>
                            </div>
                        </div>
                       </div>';

                echo " <script>$('#" . $pergunta->per_name_id . "').barrating('show', {
                        theme: 'bars-square',
                        showValues: true,
                        showSelectedRating: false
                            });</script>";
            }
        }
    }

    public static function perguntaNaoRespondida($pergunta)
    {
        echo ' <div class="form-group row  border-bottom">
                        <div class="col-12">
                            <label for="input-nome font-size-17 font-weight-bold"><strong>' . $pergunta . '</strong></label><br>
                            <label for="input-nome">Não respondido</label>
                                
                        </div>
                      </div>';
    }

    public static function selectQuestionNumbers($pergunta, $selected = false, $range = [1, 10])
    {
        $selectedText = ' <select id="' . $pergunta->per_name_id . '" name="' . $pergunta->per_name_id . '_' . $pergunta->pergunta_id . '" autocomplete="off" style="display: none;">';
        for ($c = $range[0]; $c <= $range[1]; $c++) {
            if ($selected and $selected == $c) {
                $selectedText .= '<option selected value="' . $c . '">' . $c . '</option>';
            } else {
                $selectedText .= '<option value="' . $c . '">' . $c . '</option>';
            }
        }
        $selectedText .= ' </select>';
        return $selectedText;
    }

}