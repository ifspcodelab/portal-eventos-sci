<link rel="stylesheet" type="text/css" href="/assets/css/event/create.css">

<!-- Criar novo evento -->
<main class="flex-shrink-0">
    <div class="container my-5 card p-5 formNew">
        <h2 class="text-green"> <strong> Novo Evento </strong> </h2>
        <hr class="mt-0 mb-4 bg-light">        
        <?php
            // $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            // if ($url != ''){
            //     $urls  = explode('/', $url);
            //     foreach($urls as $activities){
            //     $activities = $activities;
            //     }
            // }
            
            // if(is_numeric($activities)){
            //     $contActivities = $activities;
            // }
            // else{
            //     $contActivities = 1;
            // }
        ?>
        <form id="form" class="needs-validation " action="/event/createEvent" method="POST">
            <!-- Novo evento -->
            <div class="row g-2 mb-1">
                <div class="col-md-6 px-3">
                    <div class="mb-2">
                        <div class="row g-2 mb-4 row-form">
                            <!-- Nome -->
                            <div class="col col-lg">
                                <label for="inputEvent" class="col-md col-form-label">Nome do Evento</label>
                                <input type="text" class="form-control pt-2 pb-2" name="inputEvent" id="inputEvent" placeholder="Informe o nome do evento"  >
                                <span class="error"></span>
                            </div>
                            <!-- Sigla -->
                            <div class="col col-sm-4">
                                <label for="inputEventSigla" class="col-md col-form-label">Sigla</label>
                                <input type="text" class="form-control pt-2 pb-2" name="inputEventSigla" id="inputEventSigla" placeholder="Sigla do Evento">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <!-- Descrição -->
                        <label for="inputDescription" class="col-md col-form-label">Descrição</label>
                        <textarea type="text" class="form-control pt-2 pb-5" name="inputDescription" id="inputDescription" placeholder="Descreva o evento resumidamente"  ></textarea>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-md-6 px-3">
                    <!-- Período -->
                    <div class="row g-2 mb-4 row-form">
                        <label class="col-form-label" for="autoSizingSelect">Período</label>

                        <div class="col form-mb">
                            <!-- Mês -->
                            <select class="form-select pt-2 pb-2" name="selectPeriodoMes" id="autoSizingSelect"  >
                                <option selected>Mês</option>
                                <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                            <span class="error"></span>
                        </div>

                        <div class="col">
                            <!-- Ano -->
                            <input class="form-control pt-2 pb-2" list="datalistOptions" name="inputPeriodoAno" id="numberDataList" placeholder="Ano" type="number" placeholder="YYYY" min="2021" max="2100"  >
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
                            <input id="fileDragData" name="fileDragData">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Atividade -->
            <div>
                <div id="activities">
                    <h2 class="text-secondary"> <strong> Atividade </strong> </h2>
                    <hr class="mt-0 mb-4 bg-light">                   
                    <fieldset id="activity" name="activities">
                        <div class="row g-2 mb-4">
                            <div class="col-md-6 px-3">
                                <!-- Nome -->
                                <div class="mb-2">
                                    <label for="inputActivity1" class="col-md col-form-label">Nome da Atividade</label>
                                    <input type="text" class="form-control pt-2 pb-2" name="inputActivity1" id="inputActivity1" placeholder="Informe o nome da atividade"  >
                                    <span class="error"></span>
                                </div>
                                <!-- Descrição -->
                                <div class="mb-4">
                                    <label for="inputDescriptionActivity1" class="col-md col-form-label">Descrição</label>
                                    <textarea type="text" class="form-control pt-2 pb-5" name="descriptionActivity1" id="inputDescriptionActivity1" placeholder="Descreva a atividade"  ></textarea>
                                    <span class="error"></span>
                                </div>
            
                                <div class="row g-2 mb-2">
                                    <!-- Gratuidade -->
                                    <div class="col col-sm-auto">
                                        <label for="inputCheckbox1" class="col-md col-form-label mb-3">Gratuito?</label>
                                        <div class="row g-2 mx-2">
                                            <div class="col form-check" id="inputCheckbox1">
                                                <input class="form-check-input" type="radio" name="precoAtividade1" id="inputCheckboxYes1" onclick="showAmount(0)">
                                                <label class="form-check-label" for="inputCheckboxYes1">
                                                    Sim
                                                </label>
                                            </div>
                                            <div class="col form-check" id="inputCheckbox1">
                                                <input class="form-check-input" type="radio" name="precoAtividade1" id="inputCheckboxNo1" onclick="showAmount(1)">
                                                <label class="form-check-label" for="inputCheckboxNo1">
                                                    Não
                                                </label>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col col-lg">
                                        <!-- Preço -->
                                        <div class="mb-2" id="amount">
                                            <label for="inputAmount1" class="col-md col-form-label">Preço</label>
                                            <input type="number" step="0.01" name="inputAmount1" id="inputAmount1" placeholder="Informe o custo de participação na atividade" class="form-control pt-2 pb-2"
                                            >
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-6 px-3">
                                <!-- Data e Hora -->
                                <div class="row g-2 mb-2 row-form" style="margin-top: 0">
                                    <label class="col-form-label" for="autoSizingSelectDate1">Data e Hora</label>
                                    <div class="col form-mb">
                                        <input type="text" placeholder="Início" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataInicio1" id="autoSizingSelectDate1" value="Início"
                                         >
                                        <span class="error"></span>
                                    </div>
            
                                    <div class="col">
                                        <input type="text" placeholder="Fim" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataFim1" id="autoSizingSelectDate1" value="Fim"
                                         >
                                        <span class="error"></span>
                                    </div>
                                </div>
            
                                <!-- Observação -->
                                <div class="mb-4">
                                    <label for="inputObservation1" class="col-md col-form-label">Observação</label>
                                    <textarea type="text" class="form-control pt-2 pb-5" name="observationActivity1" id="inputObservation1" placeholder="Caso a atividade possua alguma observação"></textarea>
                                </div>
            
                                <div class="row g-2 mb-2 row-form">
                                    <!-- Pontuação -->
                                    <div class="col">
                                        <label for="PointsDataList1" class="form-label col-form-label">Pontuação</label>
                                        <input class="form-control pt-2 pb-2" list="datalistOptionsPoints" name="PointsDataList1" id="PointsDataList1" placeholder="Pontos">
                                        <datalist id="datalistOptionsPoints">
                                            <option value="10"></option>
                                            <option value="20"></option>
                                            <option value="30"></option>
                                        </datalist>
                                    </div>
            
                                    <!-- Área -->
                                    <div class="col">
                                        <label for="AreaDataList1" class="form-label col-form-label">Área</label>
                                        <input class="form-control pt-2 pb-2" list="datalistOptionsArea" name="AreaDataList1" id="AreaDataList1" placeholder="Área">
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
                                    <label for="inputLinkActivity1" class="col-md col-form-label">Link da atividade</label>
                                    <input type="url" class="form-control pt-2 pb-2" name="inputLinkActivity1" id="inputLinkActivity1" placeholder="Informe o link da atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30"  >
                                    <span class="error"></span>
                                </div>
            
                                <div class="mb-2">
                                    <label for="inputLinkSubscription1" class="col-md col-form-label">Link de inscrição</label>
                                    <input type="url" class="form-control pt-2 pb-2" name="inputLinkSubscription1" id="inputLinkSubscription1" placeholder="Informe o link para inscrição na atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- Add More Button - Atividade -->
                <div class="row g-2 mb-4 d-flex flex-column">
                    <div class="col px-3">
                        <label for="inputAddMoreActivity" class="col-md col-form-label">Deseja adicionar mais uma atividade?</label>
                    </div>
                    <div class="col px-3 input-group">
                        <span class="input-group-btn px-2">
                            <button id="removeActivity" type="button" class="btn btn-sm btn-green btn-number" data-type="minus">
                                <span class="fas fa-minus"></span>
                            </button>
                        </span>
                        <span class="input-group-btn">
                            <button id="addActivity" type="button" class="btn btn-sm btn-green btn-number addActivity" data-type="plus">
                                <span class="fas fa-plus"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Envolvido -->
            <h2 class="text-secondary"> <strong> Envolvido </strong> </h2>
            <hr class="mt-0 mb-4 bg-light">
            <div class="row g-2">
                <div class="col-md-6 px-3">
                    <!-- Nome -->
                    <div class="mb-2">
                        <label for="inputName" class="col-md col-form-label">Nome</label>
                        <input type="text" class="form-control pt-2 pb-2" id="inputName" name="inputName" placeholder="Informe o nome da pessoa envolvida na atividade"  >
                        <span class="error"></span>
                    </div>
                    <div class="row row-form">
                        <!-- Telefone -->
                        <div class="mb-2 col">
                            <label for="inputTel" class="col-md col-form-label">Telefone</label>
                            <input type="tel" class="form-control pt-2 pb-2" id="inputTel" name="inputTel" placeholder="(99) 9999-9999" maxlength="14" data-js="phone">
                        </div>
                        <!-- Celular -->
                        <div class="mb-2 col">
                            <label for="inputCel" class="col-md col-form-label">Celular</label>
                            <input type="tel" class=" form-control pt-2 pb-2" id="inputCel" name="inputCel" placeholder="(99) 99999-9999" autocomplete="off" maxlength="15"
                            data-js="phone">
                            <span class="error"></span>
                        </div>
                    </div>

                    <!-- Empresa -->
                    <div class="mb-2">
                        <label for="BusinessDataList" class="form-label col-form-label">Empresa</label>
                        <input class="form-control pt-2 pb-2" list="datalistOptionsBusiness" id="BusinessDataList" placeholder="Informe o nome da empresa">
                        <datalist id="datalistOptionsBusiness"  >
                            <option value="JASP"></option>
                            <option value="SAP"></option>
                        </datalist>
                        <span class="error"></span>
                    </div>
                </div>

                <div class="col-md-6 px-3">
                    <!-- Email do envolvido -->
                    <div class="mb-2">
                        <label for="inputEmail" class="col-md col-form-label">E-mail</label>
                        <input type="email" class="form-control pt-2 pb-2" name="inputEmail" id="inputEmail" placeholder="Informe um e-mail para contato"  ></input>
                        <span class="error"></span>
                    </div>

                    <!-- Externo ou Interno -->
                    <div class="mb-2">
                        <label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP</label>
                        <div class="row g-2 mx-2 pt-2 pb-2">
                            <div class="col form-check" id="inputCheckbox">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="inputCheckboxIn" value="internal">
                                <label class="form-check-label" for="inputCheckboxIn">
                                    Interna
                                </label>
                            </div>
                            <div class="col form-check" id="inputCheckbox">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="inputCheckboxEx" value="external">
                                <label class="form-check-label" for="inputCheckboxEx">
                                    Externa
                                </label>
                            </div>
                        </div> 
                    </div>
                    <!-- Email da empresa -->
                    <div class="mb-2">
                        <label for="inputEmailCompany" class="col-md col-form-label">E-mail</label>
                        <input type="email" class="form-control pt-2 pb-2" name="inputEmailCompany" id="inputEmailCompany" placeholder="Informe um e-mail para contato com a empresa"></input>
                    </div>

                </div>
            </div>

            <div class="row g-2 mb-4">
                <div class="col px-3">
                    <!-- Site da empresa -->
                    <div class="mb-2">
                        <label for="inputLinkBusiness" class="col-md col-form-label">Site</label>
                        <input type="url" class="form-control pt-2 pb-2" id="inputLinkBusiness" placeholder="Informe o link do site da empresa"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                    </div>  

                </div>      
            </div>

            <!-- Add More Button - Envolvido -->
            <div class="row g-2 mb-4 d-flex flex-column">
                <div class="col px-3">
                    <label for="inputAddMorePearson" class="col-md col-form-label">Deseja adicionar mais uma pessoa envolvida?</label>
                </div>
                <div class="col px-3 input-group">
                <span class="input-group-btn px-2">
                    <button type="button" class="btn btn-sm btn-green btn-number" data-type="minus" >
                        <span class="fas fa-minus"></span>
                    </button>
                </span>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-green btn-number" data-type="plus" >
                        <span class="fas fa-plus"></span>
                    </button>
                </span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center py-3">
                <button type="submit" class="btn btn-green px-4">Cadastrar</button>
            </div>

        </form>
    </div>
</main>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript" language="javascript" src="/assets/js/event/create.js"></script>
