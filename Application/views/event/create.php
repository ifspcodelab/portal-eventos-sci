<!-- Criar novo evento -->
<main class="flex-shrink-0">
    <div class="container my-5 card formNew">
        <h2 class="text-green"> <strong> Novo Evento </strong> </h2>
        <hr class="mt-0 mb-4 bg-light">

        <form class="" action="/event/createevent" method="POST">
            <!-- Novo evento -->
            <div class="row g-2 mb-1">
                <div class="col-md-6 px-3">
                    <div class="mb-2">
                        <div class="row g-2 mb-4 row-form">
                            <div class="col col-lg">
                                <label for="inputEvent" class="col-md col-form-label">Nome do Evento</label>
                                <input type="text" class="form-control pt-2 pb-2" name="inputEvent" id="inputEvent" placeholder="Informe o nome do evento">
                            </div>
                            <div class="col col-sm-4">
                                <label for="inputEventSigla" class="col-md col-form-label">Sigla</label>
                                <input type="text" class="form-control pt-2 pb-2" name="inputEventSigla" id="inputEventSigla" placeholder="Sigla do Evento">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="inputDescription" class="col-md col-form-label">Descrição</label>
                        <textarea type="text" class="form-control pt-2 pb-5" name="inputDescription" id="inputDescription" placeholder="Descreva o evento resumidamente"></textarea>
                    </div>
                </div>
                <div class="col-md-6 px-3">
                    <div class="row g-2 mb-4 row-form">
                        <label class="col-form-label" for="autoSizingSelect">Período</label>

                        <div class="col form-mb">
                            <select class="form-select pt-2 pb-2" name="selectPeriodoMes" id="autoSizingSelect">
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
                        </div>

                        <div class="col">
                            <input class="form-control pt-2 pb-2" list="datalistOptions" name="inputPeriodoAno" id="numberDataList" placeholder="Ano" type="number" placeholder="YYYY" min="2021" max="2100">
                        </div>
                    </div>

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
            <h2 class="text-secondary"> <strong> Atividade </strong> </h2>
            <hr class="mt-0 mb-4 bg-light">
            <div class="row g-2 mb-3">
                <div class="col-md-6 px-3">
                    <div class="mb-2">
                        <label for="inputActivity" class="col-md col-form-label">Nome da Atividade</label>
                        <input type="text" class="form-control pt-2 pb-2" name="inputActivity" id="inputActivity" placeholder="Informe o nome da atividade">
                    </div>
                    <div class="mb-4">
                        <label for="inputDescriptionActivity" class="col-md col-form-label">Descrição</label>
                        <textarea type="text" class="form-control pt-2 pb-5" name="descriptionActivity" id="inputDescriptionActivity" placeholder="Descreva a atividade"></textarea>
                    </div>

                    <div class="row g-2 mb-2">
                        <div class="col col-sm-auto">
                            <label for="inputCheckbox" class="col-md col-form-label mb-3">Gratuito?</label>
                            <div class="row g-2 mx-2">
                                <div class="col form-check" id="inputCheckbox">
                                    <input class="form-check-input" type="radio" name="precoAtividade" id="inputCheckboxYes" onclick="showAmount(1)">
                                    <label class="form-check-label" for="inputCheckboxYes">
                                        Sim
                                    </label>
                                </div>
                                <div class="col form-check" id="inputCheckbox">
                                    <input class="form-check-input" type="radio" name="precoAtividade" id="inputCheckboxNo" onclick="showAmount(0)">
                                    <label class="form-check-label" for="inputCheckboxNo">
                                        Não
                                    </label>
                                </div>
                            </div> 
                        </div>
                        <div class="col col-lg">
                            <div class="mb-2" id="amount">
                                <label for="inputAmount" class="col-md col-form-label">Preço</label>
                                <input type="number" step="0.01" name="inputAmount" id="inputAmount" placeholder="Informe o custo de participação na atividade" class="form-control pt-2 pb-2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 px-3">
                    <div class="row g-2 mb-2 row-form" style="margin-top: 0">
                        <label class="col-form-label" for="autoSizingSelectDate">Data</label>
                        <div class="col form-mb">
                            <input type="text" placeholder="Início" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataInicio" id="autoSizingSelectDate" value="Início">
                        </div>

                        <div class="col">
                            <input type="text" placeholder="Fim" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataFim" id="autoSizingSelectDate" value="Fim">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="inputObservation" class="col-md col-form-label">Observação</label>
                        <textarea type="text" class="form-control pt-2 pb-5" name="observationActivity" id="inputObservation" placeholder="Caso a atividade possua alguma observação"></textarea>
                    </div>

                    <div class="row g-2 mb-2 row-form">
                        <div class="col">
                            <label for="PointsDataList" class="form-label col-form-label">Pontuação</label>
                            <input class="form-control pt-2 pb-2" list="datalistOptionsPoints" name="PointsDataList" id="PointsDataList" placeholder="Pontos">
                            <datalist id="datalistOptionsPoints">
                                <option value="10"></option>
                                <option value="20"></option>
                                <option value="30"></option>
                            </datalist>
                        </div>

                        <div class="col">
                            <label for="AreaDataList" class="form-label col-form-label">Área</label>
                            <input class="form-control pt-2 pb-2" list="datalistOptionsArea" name="AreaDataList" id="AreaDataList" placeholder="Área">
                            <datalist id="datalistOptionsArea">
                                <option value="Programação"></option>
                                <option value="Redes"></option>
                                <option value="Jogos Digitais"></option>
                                <option value="Inovação"></option>
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-4">
                <div class="col px-3">
                    <div class="mb-2">
                        <label for="inputLinkActivity" class="col-md col-form-label">Link da atividade</label>
                        <input type="url" class="form-control pt-2 pb-2" name="inputLinkActivity" id="inputLinkActivity" placeholder="Informe o link da atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                    </div>

                    <div class="mb-2">
                        <label for="inputLinkSubscription" class="col-md col-form-label">Link de inscrição</label>
                        <input type="url" class="form-control pt-2 pb-2" name="inputLinkSubscription" id="inputLinkSubscription" placeholder="Informe o link para inscrição na atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                    </div>
                </div>
            </div>

            <!-- Add More Button -->
            <div class="row g-2 mb-4 d-flex flex-column">
                <div class="col px-3">
                    <label for="inputAddMoreActivity" class="col-md col-form-label">Deseja adicionar mais uma atividade?</label>
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

            <!-- Envolvido -->
            <h2 class="text-secondary"> <strong> Envolvido </strong> </h2>
            <hr class="mt-0 mb-4 bg-light">
            <div class="row g-2">
                <div class="col-md-6 px-3">
                    <div class="mb-2">
                        <label for="inputName" class="col-md col-form-label">Nome</label>
                        <input type="text" class="form-control pt-2 pb-2" id="inputName" name="name" placeholder="Informe o nome da pessoa envolvida na atividade">
                    </div>
                    <div class="row row-form">
                        <div class="mb-2 col">
                            <label for="inputTel" class="col-md col-form-label">Telefone</label>
                            <input type="tel" class="form-control pt-2 pb-2" id="inputName" name="inputTel" placeholder="(99) 9999-9999">
                        </div>
                        <div class="mb-2 col">
                            <label for="inputCel" class="col-md col-form-label">Celular</label>
                            <input type="tel" class="form-control pt-2 pb-2" id="inputCel" name="inputCel" placeholder="(99) 99999-9999">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="BusinessDataList" class="form-label col-form-label">Empresa</label>
                        <input class="form-control pt-2 pb-2" list="datalistOptionsBusiness" id="BusinessDataList" placeholder="Informe o nome da empresa">
                        <datalist id="datalistOptionsBusiness">
                            <option value="JASP"></option>
                            <option value="SAP"></option>
                        </datalist>
                    </div>
                </div>

                <div class="col-md-6 px-3">
                    <div class="mb-2">
                        <label for="inputEmail" class="col-md col-form-label">E-mail</label>
                        <input type="email" class="form-control pt-2 pb-2" name="email" id="inputEmail" placeholder="Informe um e-mail para contato"></input>
                    </div>
                    <div class="mb-2">
                        <label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP</label>
                        <div class="row g-2 mx-2 pt-2 pb-2">
                            <div class="col form-check" id="inputCheckbox">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="inputCheckboxIn">
                                <label class="form-check-label" for="inputCheckboxIn">
                                    Interna
                                </label>
                            </div>
                            <div class="col form-check" id="inputCheckbox">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="inputCheckboxEx">
                                <label class="form-check-label" for="inputCheckboxEx">
                                    Externa
                                </label>
                            </div>
                        </div> 
                    </div>
                    <div class="mb-2">
                        <label for="inputEmailCompany" class="col-md col-form-label">E-mail</label>
                        <input type="email" class="form-control pt-2 pb-2" name="inputEmailCompany" id="inputEmailCompany" placeholder="Informe um e-mail para contato com a empresa"></input>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-4">     
            </div>
            <div class="row g-2 mb-4">
                <div class="col px-3">
                    <div class="mb-2">
                        <label for="inputLinkBusiness" class="col-md col-form-label">Site</label>
                        <input type="url" class="form-control pt-2 pb-2" id="inputLinkBusiness" placeholder="Informe o link do site da empresa"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                    </div>    
                </div>      
            </div>

            <!-- Add More Button -->
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

<script type="text/javascript">

function showAmount(show){
    if(show == 1){
        console.log('checkado')
        document.getElementById('amount').style.display = "block"
    }
    else{
        console.log('descheckado')
        document.getElementById('amount').style.display = "none"
    }
}



function readFile(e) {
  var files;
  if (e.target.files) {
    files=e.target.files
  } else {
    files=e.dataTransfer.files
  }
  if (files.length==0) {
    alert('What you dropped is not a file.');
    return;
  }
  var file=files[0];
  document.getElementById('fileDragName').value = file.name
  document.getElementById('fileDragSize').value = file.size
  document.getElementById('fileDragType').value = file.type
  reader = new FileReader();
  reader.onload = function(e) {
    document.getElementById('fileDragData').value = e.target.result;
  }
  document.getElementById('labelFile').innerHTML = "Arquivo selecionado";
  reader.readAsDataURL(file);
}
function getTheFile(e) {
  e.target.style.borderColor='#ccc';
  readFile(e);
}

var holder = document.getElementById('inputGroupFile01');
holder.ondragover = function () { 
    this.classList.add('hover'); 
    return false; 
};

holder.ondragleave = function () { 
    this.classList.remove('hover'); 
    return false; 
};

</script>