
    /*+----------------------------------------------------------------------
    ||  [ breakpointDefinition ]
    ||  => Largura utilizada em diferentes dispositivos
    |+-----------------------------------------------------------------------*/
    var breakpointDefinition = {
    tablet: 1024,
    phone: 425,
    desktop: 1400,
    all: 4096
};

    /*+----------------------------------------------------------------------
    ||  [ configureDataTable ] => destinado a inicializar o datatables
    ||
    ||  (String elementSelector) => id da tabela, Ex: ("#tabela_exemplo")
    ||
    ||  (Object additionalConfig) => Objeto com configuraçõe adicionais, Ex: ({"bFilter": true, "bInfo": true ...})
    ||
    ||  (Array buttons) => Array com botões especificos, desconsiderando os default, Ex: ( [{ extend: 'copy' ...}, { extend: 'excel' ...}] )
    ||
    ||  (bool filtroPorColuna) => Utilizada para adicionar filtro por coluna, Ex: (true/false)
    ||
    ||  @return => DataTable
    |+-----------------------------------------------------------------------*/
    function configureDataTable(elementSelector, additionalConfig = null) {
    var clearSelector = elementSelector.replace(/[^A-z0-9\-_]+/g, "");
    let defaultConfig = {
    "ordering": true,
    "pageLength": 5,
    "lengthChange": false,
            "oLanguage": {
                "sSearch": "<i class='fa fa-search input-group-addon'></i>",
                "aLengthMenu": "Exibir _MENU_ resultados por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "mostrando_zero_ate_zero_de_zero_registros",
                "sInfoFiltered": "filtrado_do_total_de_max_registros",
                "emptyTable": "Nenhum registro encontrado",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                }
            },
    "sDom": "<'dt-toolbar'<'col-xs-4 col-sm-4'f><'col-sm-8 col-xs-8 hidden-xs text-right'B>r>" +
    "t" +
    "<'dt-toolbar-footer'<'col-sm- col-xs-12 hidden-xs'i><'col-sm-12 col-xs-12'p>>",
};


    if (additionalConfig != null) {
    //Adiciona as configurações ao default
    Object.getOwnPropertyNames(additionalConfig).forEach(function (val, idx, array) {
    defaultConfig[val] = additionalConfig[val];
});
}

    return $(elementSelector).dataTable(defaultConfig);
}

