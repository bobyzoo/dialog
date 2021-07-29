<form class="forms-sample" id="frmPaciente" method="post">
    <div class="form-group row">
        <div class="col-12">
            <label for="input-nome">O que está acontecendo? (Situação)</label>
            <textarea required type="text" rows="5" class="form-control" id=""
                      placeholder="Diga o que esta acontecendo com você ..." name="nome"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label for="input-nome">O quanto esse pensamento é verdade para você?
            </label>
            <textarea required type="text" rows="5" class="form-control" id=""
                      placeholder="Diga o que esta acontecendo com você ..." name="nome"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label for=""> Quais pensamentos vêm a sua cabeça?</label>
            <div class="br-wrapper br-theme-bars-square">
                <select id="barra-1" name="rating" autocomplete="off" style="display: none;">
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
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label for="">Qual a intensidade dessa emoção?</label>
            <div class="br-wrapper br-theme-bars-square">
                <select id="barra-emocao" name="rating" autocomplete="off" style="display: none;">
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
    </div>


    <div class="form-group row">
        <div class="col-12">
            <label for="input-nome">O que você fez nesse situação? (Comportamento)
            </label>
            <textarea required type="text" rows="5" class="form-control" id=""
                      placeholder="Diga o que esta acontecendo com você ..." name="nome"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    $('#barra-emocao').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: false
    });
    $('#barra-1').barrating('show', {
        theme: 'bars-square',
        showValues: true,
        showSelectedRating: false
    });
</script>