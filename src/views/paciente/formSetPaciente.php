<div class="modal fade" id="modalRemote" tabindex="-1" role="dialog"
     aria-labelledby="modalRemoteLabel" style="display: none;" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="loader-demo-box position-absolute loading hide" id="loadingFrmCadastroPaciente">
                <div class="dot-opacity-loader">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="modalRemoteLabel">Adicionar paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="ajax/setPaciente" class="forms-sample"  id="frmPaciente" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-9">
                            <label for="input-nome">Nome completo</label>
                            <input required type="text" class="form-control" id="input-nome" placeholder="Nome completo" name="nome">
                        </div>
                        <div class="col-3">
                            <label for="input-data-nasc">Data de nascimento</label>
                            <input  type="date" class="form-control" id="input-data-nasc" placeholder="Enter email" name="data_nasc">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-sm-3 col-form-label">Sexo</label>
                            <div class="col-sm-4">
                                <div class="form-radio">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="genero"
                                               id="radio-sexo-1" value="m" checked="checked"> Maculino <i
                                            class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-radio">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="genero"
                                               id="radio-sexo-2" value="f"> Femenino <i
                                            class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="input-nome">Telefone</label>
                            <input type="text" class="form-control" id="input-nome" placeholder="Telefone" name="telefone">
                        </div>
<!--                        <div class="col-6">-->
<!--                            <label for="input-data-nasc">Celular</label>-->
<!--                            <input type="text" class="form-control" id="input-data-nasc" placeholder="Celular" name="celular">-->
<!--                        </div>-->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnSetPaciente" onclick="setPaciente()" class="btn btn-sm btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
