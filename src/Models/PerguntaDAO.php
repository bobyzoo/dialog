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

    public static function getFormatPergunta($pergunta)
    {
        if ($pergunta->per_tipo == "text") {
            echo ' <div class="form-group row">
                        <div class="col-12">
                            <label for="input-nome">' . $pergunta->per_descricao . '</label>
                                <textarea  type="text" rows="5" class="form-control" id="' . $pergunta->per_name_id . '"
                                    placeholder="' . $pergunta->placeholder . '" name="' . $pergunta->per_name_id . '"></textarea>
                        </div>
                      </div>';
        }
        if ($pergunta->per_tipo == "bars-square") {
            echo '    <div class="form-group row">
                        <div class="col-12">
                            <label for="">' . $pergunta->per_descricao . '</label>
                            <div class="br-wrapper br-theme-bars-square">
                                <select id="' . $pergunta->per_name_id . '" name="' . $pergunta->per_name_id . '" autocomplete="off" style="display: none;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
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