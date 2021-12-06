<link rel="stylesheet" type="text/css" href="/assets/css/event/create.css">

<?php foreach($data['events'] as $event) 

    // var_dump($event);

    // if(isset($event)){
    //     echo 'setado';
    // }
    // else{
    //     echo 'nao setado';
    // }

?>

<!-- Criar novo evento -->
<main class="flex-shrink-0">
    <div class="container my-5 card p-5 formNew">
        <h2 class="text-green"> <strong> Novo Evento </strong> </h2>
        <hr class="mt-0 mb-4 bg-light"> 
        <?php foreach($data['events'] as $event) : ?>
        <form id="form" class="needs-validation " action="/event/alterEvent/<?= $event['cod_evento'] ?>" method="POST">
            <!-- Novo evento -->
            <div class="row g-2 mb-1">
                <div class="col-md-6 px-3">
                    <div class="mb-2">
                        <div class="row g-2 mb-4 row-form">
                            <!-- Nome -->
                            <div class="col col-lg">
                                <label for="inputEvent" class="col-md col-form-label">Nome do Evento</label>
                                <input type="text" class="form-control pt-2 pb-2" name="inputEvent" id="inputEvent" placeholder="Informe o nome do evento" value="<?= $event['nome_evento'] ?>" >
                                <span class="error"></span>
                            </div>
                            <!-- Sigla -->
                            <div class="col col-sm-4">
                                <label for="inputEventSigla" class="col-md col-form-label">Sigla</label>
                                <input type="text" class="form-control pt-2 pb-2" name="inputEventSigla" id="inputEventSigla" placeholder="Sigla do Evento" value="<?= $event['sigla_evento'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <!-- Descrição -->
                        <label for="inputDescription" class="col-md col-form-label">Descrição</label>
                        <textarea type="text" class="form-control pt-2 pb-5" name="inputDescription" id="inputDescription" placeholder="Descreva o evento resumidamente" ><?= $event['descricao_evento'] ?></textarea>
                        <span class="error"></span>
                    </div>
                    <div class="mb-2">
                        <label for="inputLinkEvent" class="col-md col-form-label">Link do evento</label>
                        <input type="url" class="form-control pt-2 pb-2" name="inputLinkEvent" id="inputLinkEvent" placeholder="Informe o link do evento"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" value="<?= $event['link_evento'] ?>" >
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-md-6 px-3">
                    <!-- Período -->
                    <div class="row g-2 mb-4 row-form">
                        <label class="col-form-label" for="autoSizingSelect">Período</label>
                        <?php 
                            $periodo = explode('/', $event['periodo_evento']);
                        ?>
                        <div class="col form-mb">
                            <!-- Mês -->
                            <select class="form-select pt-2 pb-2" name="selectPeriodoMes" id="autoSizingSelect"  >
                                <option selected>Mês</option>
                                <option value="Janeiro" <?= $periodo[0] == 'Janeiro' ? 'selected' : '' ?>>Janeiro</option>
                                <option value="Fevereiro" <?= $periodo[0] == 'Fevereiro' ? 'selected' : '' ?>>Fevereiro</option>
                                <option value="Março" <?= $periodo[0] == 'Março' ? 'selected' : '' ?>>Março</option>
                                <option value="Abril" <?= $periodo[0] == 'Abril' ? 'selected' : '' ?>>Abril</option>
                                <option value="Maio" <?= $periodo[0] == 'Maio' ? 'selected' : '' ?>>Maio</option>
                                <option value="Junho" <?= $periodo[0] == 'Junho' ? 'selected' : '' ?>>Junho</option>
                                <option value="Julho" <?= $periodo[0] == 'Julho' ? 'selected' : '' ?>>Julho</option>
                                <option value="Agosto" <?= $periodo[0] == 'Agosto' ? 'selected' : '' ?>>Agosto</option>
                                <option value="Setembro" <?= $periodo[0] == 'Setembro' ? 'selected' : '' ?>>Setembro</option>
                                <option value="Outubro" <?= $periodo[0] == 'Outubro' ? 'selected' : '' ?>>Outubro</option>
                                <option value="Novembro" <?= $periodo[0] == 'Novembro' ? 'selected' : '' ?>>Novembro</option>
                                <option value="Dezembro" <?= $periodo[0] == 'Dezembro' ? 'selected' : '' ?>>Dezembro</option>
                            </select>
                            <span class="error"></span>
                        </div>

                        <div class="col">
                            <!-- Ano -->
                            <input class="form-control pt-2 pb-2" list="datalistOptions" name="inputPeriodoAno" id="numberDataList" placeholder="Ano" type="number" placeholder="YYYY" min="2021" max="2100" value="<?= $periodo[1] ?>" >
                            <span class="error"></span>
                        </div>
                    </div>

                    <!-- Banner -->
                    <div class="mb-3">
                        <label class="col-md col-form-label" for="inputGroupFile01">Banner</label>
                        <div class="input-group mb-3 dropzone dz-clickable form-control d-flex justify-content-center" id="inputGroupFile01" onchange="readFile(event)">
                            <div class="dz-default dz-message d-flex flex-column justify-content-center align-items-center" data-dz-message="">
                                <label for="inputBanner" id="labelFile">Selecione o arquivo</label>                                
                                <input type="file" id="inputBanner" name="inputBanner" onchange="readFile(event)">
                                <small>Ou arraste e solte o arquivo aqui</small>
                            </div>
                        </div>
                        <div class="dragData">
                            <input id="fileDragName" name="fileDragName">
                            <input id="fileDragSize" name="fileDragSize">
                            <input id="fileDragType" name="fileDragType">
                            <input id="fileDragData" name="fileDragData" value="<?= $event['img_evento'] ?>" >
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="inputLinkSubscriptionEvent" class="col-md col-form-label">Link de inscrição</label>
                        <input type="url" class="form-control pt-2 pb-2" name="inputLinkSubscriptionEvent" id="inputLinkSubscriptionEvent" placeholder="Informe o link para inscrição no evento"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30"value="<?= $event['link_inscricao_evento'] ?>" >
                    </div>
                </div>
            </div>
            <?php 
                break;
                endforeach; 
                ?>

            <!-- Atividade -->
            <div>
                <div id="activities" class="row">
                    <h2 class="text-secondary"><strong>Atividade</strong></h2>
                    <hr class="mt-0 mb-4 bg-light">
                    <?php $contActivity = 0; ?>           
                    <?php foreach ($data['activities'] as $activity) { ?>
                    <fieldset id="activity" name="activities" class="activity-group col-md-11">
                        <div class="row g-2 mb-4">
                            <div class="col-md-6 px-3">
                                <!-- Nome -->
                                <div class="mb-2">
                                    <label for="inputActivity<?= $activity['cod_atividade'] ?>" class="col-md col-form-label">Nome da Atividade</label>
                                    <input type="text" class="form-control pt-2 pb-2" name="inputActivity<?= $activity['cod_atividade'] ?>" id="inputActivity<?= $activity['cod_atividade'] ?>" placeholder="Informe o nome da atividade" value="<?= $activity['nome_atividade'] ?>" >
                                    <span class="error"></span>
                                </div>
                                <!-- Descrição -->
                                <div class="mb-4">
                                    <label for="inputDescriptionActivity<?= $activity['cod_atividade'] ?>" class="col-md col-form-label">Descrição</label>
                                    <textarea type="text" class="form-control pt-2 pb-5" name="descriptionActivity<?= $activity['cod_atividade'] ?>" id="inputDescriptionActivity<?= $activity['cod_atividade'] ?>" placeholder="Descreva a atividade" ><?= $activity['descricao_atividade'] ?></textarea>
                                    <span class="error"></span>
                                </div>
            
                                <div class="row g-2 mb-2">
                                    <!-- Gratuidade -->
                                    <div class="col col-sm-auto">
                                        <label for="inputCheckbox1" class="col-md col-form-label mb-3">Gratuito?</label>
                                        <div class="row g-2 mx-2">
                                            <div class="col form-check" id="inputCheckbox1">
                                                <input class="form-check-input" type="radio" name="precoAtividade<?= $activity['cod_atividade'] ?>" id="inputCheckboxYes<?= $activity['cod_atividade'] ?>" onclick="showAmount(0)" <?= $activity['preco_inscricao'] == 0 ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="inputCheckboxYes<?= $activity['cod_atividade'] ?>">
                                                    Sim
                                                </label>
                                            </div>
                                            <div class="col form-check" id="inputCheckbox1">
                                                <input class="form-check-input" type="radio" name="precoAtividade<?= $activity['cod_atividade'] ?>" id="inputCheckboxNo<?= $activity['cod_atividade'] ?>" onclick="showAmount(1)" <?= $activity['preco_inscricao'] > 0 ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="inputCheckboxNo<?= $activity['cod_atividade'] ?>">
                                                    Não
                                                </label>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col col-lg">
                                        <!-- Preço -->
                                        <div id="amount" class="mb-2 <?= $activity['preco_inscricao'] > 0 ? 'd-block' : 'd-none' ?>">
                                            <label for="inputAmount<?= $activity['cod_atividade'] ?>" class="col-md col-form-label">Preço</label>
                                            <input type="number" step="0.01" name="inputAmount<?= $activity['cod_atividade'] ?>" id="inputAmount<?= $activity['cod_atividade'] ?>" placeholder="Informe o custo de participação na atividade" class="form-control pt-2 pb-2" value="<?= $activity['preco_inscricao'] ?>">
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-6 px-3">
                                <!-- Data e Hora -->
                                <?php
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $ano = date("Y", strtotime($activity['data_inicio']));
                                    $mes = date("m", strtotime($activity['data_inicio']));
                                    $dia = date("d", strtotime($activity['data_inicio']));
                                    $hora = date("H", strtotime($activity['hora_inicio']));
                                    $min = date("i", strtotime($activity['hora_inicio']));
                                    $date = new DateTime();
                                    $date->setDate($ano,$mes,$dia);
                                    $date->setTime($hora,$min, 0);
                                    $dataInicio = $date->format("d/m/Y H:i:s");
                                    // echo $dataInicio;
                                ?>
                                <div class="row g-2 mb-2 row-form" style="margin-top: 0">
                                    <label class="col-form-label" for="autoSizingSelectDate<?= $activity['cod_atividade'] ?>">Data e Hora</label>
                                    <div class="col form-mb">
                                        <input type="text" placeholder="Início" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataInicio<?= $activity['cod_atividade'] ?>" id="autoSizingSelectDate<?= $activity['cod_atividade'] ?>" value="<?= $dataInicio ?><?= $activity['hora_inicio'] ?>" >
                                        <span class="error"></span>
                                    </div>
            
                                    <div class="col">
                                        <input type="text" placeholder="Fim" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataFim<?= $activity['cod_atividade'] ?>" id="autoSizingSelectDate<?= $activity['cod_atividade'] ?>" value="Fim" >
                                        <span class="error"></span>
                                    </div>
                                </div>
            
                                <!-- Observação -->
                                <div class="mb-4">
                                    <label for="inputObservation<?= $activity['cod_atividade'] ?>" class="col-md col-form-label">Observação</label>
                                    <textarea type="text" class="form-control pt-2 pb-5" name="observationActivity<?= $activity['cod_atividade'] ?>" id="inputObservation<?= $activity['cod_atividade'] ?>" placeholder="Caso a atividade possua alguma observação"><?= $activity['observacao_atividade'] ?></textarea>
                                </div>
            
                                <div class="row g-2 mb-2 row-form">
                                    <!-- Pontuação -->
                                    <div class="col">
                                        <label for="PointsDataList<?= $activity['cod_atividade'] ?>" class="form-label col-form-label">Pontuação</label>
                                        <input class="form-control pt-2 pb-2" list="datalistOptionsPoints" name="PointsDataList<?= $activity['cod_atividade'] ?>" id="PointsDataList<?= $activity['cod_atividade'] ?>" placeholder="Pontos"  value="<?= $activity['pontuacao_atividade'] ?>" >
                                        <datalist id="datalistOptionsPoints">
                                            <option value="10"></option>
                                            <option value="20"></option>
                                            <option value="30"></option>
                                        </datalist>
                                    </div>
            
                                    <!-- Área -->
                                    <div class="col">
                                        <label for="AreaDataList<?= $activity['cod_atividade'] ?>" class="form-label col-form-label">Área</label>
                                        <input class="form-control pt-2 pb-2" list="datalistOptionsArea" name="AreaDataList<?= $activity['cod_atividade'] ?>" id="AreaDataList<?= $activity['cod_atividade'] ?>" placeholder="Área">
                                        <datalist id="datalistOptionsArea"  >
                                            <option value="Programação"></option>
                                            <option value="Redes"></option>
                                            <option value="Jogos Digitais"></option>
                                            <option value="Inovação"></option>
                                        </datalist>
                                        <span class="error"></span>
                                    </div>
            
                                </div>
                            </div>
                        </div>
            
                        <!-- Links -->
                        <div class="row g-2 mb-4">
                            <div class="col px-3">
                                <div class="mb-2">
                                    <label for="inputLinkActivity<?= $activity['cod_atividade'] ?>" class="col-md col-form-label">Link da atividade</label>
                                    <input type="url" class="form-control pt-2 pb-2" name="inputLinkActivity<?= $activity['cod_atividade'] ?>" id="inputLinkActivity<?= $activity['cod_atividade'] ?>" placeholder="Informe o link da atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" value="<?= $activity['link_atividade'] ?>" >
                                    <span class="error"></span>
                                </div>
            
                                <div class="mb-2">
                                    <label for="inputLinkSubscription<?= $activity['cod_atividade'] ?>" class="col-md col-form-label">Link de inscrição</label>
                                    <input type="url" class="form-control pt-2 pb-2" name="inputLinkSubscription<?= $activity['cod_atividade'] ?>" id="inputLinkSubscription<?= $activity['cod_atividade'] ?>" placeholder="Informe o link para inscrição na atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" value="<?= $activity['link_inscricao_atividade'] ?>" >
                                </div>
                            </div>
                        </div>

                        <!-- Envolvido -->
                        <fieldset id="involvedActivity<?= $activity['cod_atividade'] ?>">
                            <legend class="text-secondary">Envolvidos na atividade</legend>
                            <?php foreach ($data['involved'] as $involved) { ?>
                                <?php 
                                    if($involved['fk_atividade_cod_atividade'] == $activity['cod_atividade']){
                                ?>
                            <div id="people-1">
                                <div id="involved-1-<?= $involved['cod_pessoa'] ?>" class="envolvidos atividade-<?= $activity['cod_atividade'] ?>">
                                    <div class="row g-2">
                                        <div class="col-md-6 px-3">
                                            <!-- Nome -->
                                            <div class="mb-2">
                                                <label for="inputName-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">Nome</label>
                                                <input type="text" class="form-control pt-2 pb-2" id="inputName-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="inputName-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe o nome da pessoa envolvida na atividade" value="<?= $involved['nome_contato'] ?>" >
                                                <span class="error"></span>
                                            </div>
                                            <div class="row row-form">
                                                <!-- Telefone -->
                                                <div class="mb-2 col">
                                                    <label for="inputTel-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">Telefone</label>
                                                    <input type="tel" class="form-control pt-2 pb-2" id="inputTel-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="inputTel-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="(99) 9999-9999" maxlength="14" data-js="phone" value="<?= $involved['telefone'] ?>" >
                                                </div>
                                                <!-- Celular -->
                                                <div class="mb-2 col">
                                                    <label for="inputCel-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">Celular</label>
                                                    <input type="tel" class=" form-control pt-2 pb-2" id="inputCel-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="inputCel-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="(99) 99999-9999" autocomplete="off" maxlength="15" data-js="phone" value="<?= $involved['celular'] ?>" >
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 px-3">
                                            <!-- Email do envolvido -->
                                            <div class="mb-2">
                                                <label for="inputEmail-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">E-mail</label>
                                                <input type="email" class="form-control pt-2 pb-2" name="inputEmail-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" id="inputEmail-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe um e-mail para contato" value="<?= $involved['email_pessoa'] ?>" ></input>
                                                <span class="error"></span>
                                            </div>
                                            <!-- Externo ou Interno -->
                                            <div class="mb-2">
                                                <label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP</label>
                                                <div class="row g-2 mx-2 pt-2 pb-2">
                                                    <div class="col form-check" id="inputCheckbox">
                                                        <input class="form-check-input" type="radio" onclick="involvedType(1, 1)" name="flexRadioDefault-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" id="inputCheckboxIn-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" value="internal" <?= trim($involved['nome_departamento']) != null || '' ? 'checked' : 'disabled' ?>>
                                                        <label class="form-check-label" for="inputCheckboxIn-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>">Interna</label>
                                                    </div>
                                                    <div class="col form-check" id="inputCheckbox">
                                                        <input class="form-check-input" type="radio" onclick="involvedType(1, 1)" name="flexRadioDefault-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" id="inputCheckboxEx-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" value="external"  <?= trim($involved['nome_departamento']) != null || '' ? 'disabled' : 'checked' ?>>
                                                        <label class="form-check-label" for="inputCheckboxEx-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>">Externa</label>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-1 border-start d-flex justify-content-center align-items-center">
                                            <span id="removePerson-1" class="input-group-btn px-2">                                                
                                                <button type="button" class="btn btn-sm btn-green btn-number position-relative" data-bs-toggle="modal" data-bs-target="#confirmInvolved<?= $involved['cod_pessoa'] ?>">
                                                    <span class="fas fa-minus"></span>
                                                </button>
                                            </span>

                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmInvolved<?= $involved['cod_pessoa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir a pessoa envolvida?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Essa ação não poderá ser desfeita.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-red" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-green position-relative" data-type="minus" >
                                                                <input type="submit" id="deleteInvolved" value="<?= $involved['cod_pessoa'] ?>" name="deleteInvolved-<?= $involved['cod_pessoa'] ?>" class="invisible position-absolute top-0 start-0 w-100 h-100">
                                                                Excluir
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2 mb-4" id="typeContainer-1-<?= $involved['cod_pessoa'] ?>">
                                        <?php if($involved['nome_departamento']) {?>
                                            <div class="col-md-6 px-3">
                                                <div class="mb-2">
                                                    <label for="AreaIfspDataList-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="form-label col-form-label">Área</label>
                                                    <input autocomplete="off" class="form-control pt-2 pb-2" list="datalistAreaIfsp-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="AreaIfspDataList-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" id="AreaIfspDataList-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe a área de atuação no câmpus"  value="<?= $involved['nome_departamento'] ?>">
                                                    <datalist id="datalistAreaIfsp-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>"  >
                                                        <option value="Subárea de Informática"></option>
                                                        <option value="Subárea de Turismo"></option>
                                                    </datalist>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-3">
                                                <div class="mb-2">
                                                    <label for="inputCategory-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">Categoria</label>
                                                    <input type="text" class="form-control pt-2 pb-2" name="inputCategory-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" id="inputCategory-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe a função do envolvido"  value="<?= $involved['papel_envolvido_ifsp'] ?>"></input>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-6 px-3">
                                                <!-- Empresa -->
                                                <div class="mb-2">
                                                    <label for="BusinessDataList-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="form-label col-form-label">Empresa</label>
                                                    <input class="form-control pt-2 pb-2" list="datalistOptionsBusiness" id="BusinessDataList-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="BusinessDataList-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe o nome da empresa" value="<?= $involved['nome_empresa'] ?>">
                                                    <datalist id="datalistOptionsBusiness-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>"  >
                                                        <option value="JASP"></option>
                                                        <option value="SAP"></option>
                                                    </datalist>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-3">
                                                <!-- Email da empresa -->
                                                <div class="mb-2">
                                                    <label for="inputEmailCompany-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">E-mail</label>
                                                    <input type="email" class="form-control pt-2 pb-2" name="inputEmailCompany-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" id="inputEmailCompany-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe um e-mail para contato com a empresa"  value="<?= $involved['email'] ?>"></input>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-3">
                                                <!-- Área do contato -->
                                                <div class="mb-2">
                                                    <label for="inputAreaEmpresa-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">Área do contato</label>
                                                    <input type="text" class="form-control pt-2 pb-2" id="inputAreaEmpresa-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="inputAreaEmpresa-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe de atuação do contato" value="<?= $involved['area_contato_empresa'] ?>" >
                                                </div>  
                                            </div>
                                            <div class="col-md-6 px-3">
                                                <!-- Site da empresa -->
                                                <div class="mb-2">
                                                    <label for="inputLinkBusiness-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" class="col-md col-form-label">Site</label>
                                                    <input type="url" class="form-control pt-2 pb-2" id="inputLinkBusiness-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" name="inputLinkBusiness-<?= $activity['cod_atividade'] ?>-<?= $involved['cod_pessoa'] ?>" placeholder="Informe o link do site da empresa"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" value="<?= $involved['site_empresa'] ?>" >
                                                </div>  
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" id="qtdInvolved-1" name="qtdInvolved-<?= $activity['cod_atividade'] ?>" value="1">
                                </div>
                                <?php
                                    if(count($data['involved']) > 1){ 
                                ?>
                                    <hr class="mt-4 mb-4 bg-light">
                                <?php } ?>
                            </div>
                            <?php }} ?>
                            <!-- Add More Button - Envolvido -->
                            <div class="row g-2 mb-4 d-flex flex-column">
                                <div class="col px-3">
                                    <label for="inputAddMorePearson" class="col-md col-form-label">Deseja adicionar uma pessoa envolvida?</label>
                                </div>
                                <div class="col px-3 input-group">
                                    <span class="input-group-btn">
                                        <button id="addPerson-1" onclick="addInvolved(1)" type="button" class="btn btn-sm btn-green btn-number" data-type="plus" >
                                            <span class="fas fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                    </fieldset>
                    <div class="col-md-1 border-start d-flex justify-content-center align-items-center">
                        <span class="input-group-btn px-2">                                                
                            <button type="button" class="btn btn-sm btn-green btn-number position-relative" data-bs-toggle="modal" data-bs-target="#confirmActivity<?= $activity['cod_atividade'] ?>">
                                <span class="fas fa-minus"></span>
                            </button>
                        </span>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="confirmActivity<?= $activity['cod_atividade'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir a atividade?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Essa ação não poderá ser desfeita.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-red" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-green position-relative" data-type="minus" >
                                            <input type="submit" id="deleteActivity" value="<?= $activity['cod_atividade'] ?>" name="deleteActivity-<?= $activity['cod_atividade'] ?>" class="invisible position-absolute top-0 start-0 w-100 h-100">
                                            Excluir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <?php
                        $contActivity += 1;
                        if($contActivity != count($data['activities'])){ 
                    ?>
                        <hr class="mt-4 mb-4 bg-light">
                    <?php }} ?>
                </div>
                <!-- Add More Button - Atividade -->
                <div class="row g-2 mb-4 mt-2 d-flex flex-column">
                    <div class="col px-3">
                        <label for="inputAddMoreActivity" class="col-md col-form-label">Deseja adicionar uma atividade?</label>
                    </div>
                    <div class="col px-3 input-group">
                        <span class="input-group-btn">
                            <button id="addActivity" type="button" class="btn btn-sm btn-green btn-number addActivity" data-type="plus">
                                <span class="fas fa-plus"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-evenly">
                <div class="d-flex justify-content-center py-3">
                    <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#confirmEvent">Excluir</button>
                </div>
                <div class="d-flex justify-content-center py-3">
                    <button type="button" class="btn btn-green px-4" data-bs-toggle="modal" data-bs-target="#confirmEdit">Editar</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir o evento?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Essa ação não poderá ser desfeita.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-red" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Excluir" name="delete" class="btn btn-green px-4" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja salvar as alterações realizadas?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Você poderá alterá-las novamente mais tarde.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-red" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Salvar" name="edit" class="btn btn-green px-4" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript" language="javascript" src="/assets/js/event/create.js"></script>
