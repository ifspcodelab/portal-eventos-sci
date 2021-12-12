// // Validação do formulário 
// const form = document.querySelector('form.needs-validation')
// const fields = document.querySelectorAll('[ ]')

// function ValidateField(field) {
// 	function verifyErrors() {
// 		let foundError = false

// 		for (let error in field.validity) {
// 			if (field.validity[error] && !field.validity.valid) {
// 				foundError = error
// 			}
// 		}

// 		return foundError
// 	}
	

// 	function customMessage(typeError) {
// 		const messages = {
// 			text: {
// 				valueMissing: 'Por favor, preencha esse campo'
// 			},
// 			tel: {
// 				valueMissing: 'Celular é obrigatório',
// 				typeMismatch: 'Por favor, preencha um telefone válido'
// 			},
// 			email: {
// 				valueMissing: 'Email é obrigatório',
// 				typeMismatch: 'Por favor, preencha um email válido'
// 			},
// 			datalist: {
// 				valueMissing: 'Por favor, preencha esse campo'
// 			},
// 			textarea: {
// 				valueMissing: 'Por favor, preencha esse campo'
// 			},
// 			datetimelocal: {
// 				valueMissing: 'Por favor, preencha esse campo',
// 				typeMismatch: 'Por favor, preencha uma data válida'
// 			},
// 			number: {
// 				valueMissing: 'Por favor, preencha esse campo',
// 				typeMismatch: 'Por favor, preencha um valor númerico válido'
// 			}
// 		}

// 		return messages[field.type][typeError]
// 	}

// 	function setCustomMessage(message) {
// 		const spanError = field.parentNode.querySelector('span.error')
// 		if (message) {
// 			spanError.classList.add('invalid-feedback')
// 			spanError.innerHTML = message
// 		} else {
// 			spanError.classList.remove('invalid-feedback')
// 			spanError.innerHTML = ' '
// 		}
// 	}

// 	return function () {
// 		const error = verifyErrors()

// 		if (verifyErrors()) {
// 			form.classList.add('was-validated')

// 			const message = customMessage(error)
// 			setCustomMessage(message)
// 		} else {
// 			setCustomMessage()
// 		}
// 	}
// }

// function customValidation(e) {
// 	const field = e.target
// 	const validation = ValidateField(field)

// 	validation()
// }

// for (let field of fields) {
// 	field.addEventListener('invalid', e => {
// 		e.preventDefault()
// 		customValidation(e)
// 	})
// 	field.addEventListener('blur', customValidation)
// }

// // Validação das mascaras
// const masks = {
// 	phone(value) {
// 		return value
// 			.replace(/\D+/g, '')
// 			.replace(/(\d{2})(\d)/, '($1) $2')
// 			.replace(/(\d{4})(\d)/, '$1-$2')
// 			.replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
// 			.replace(/(-\d{4})\d+?$/, '$1')
// 	}
// }

// let inputs = document.querySelectorAll('input')
// 	inputs.forEach(fields => {
// 	const field = fields.dataset.js

// 	fields.addEventListener(
// 		'input',
// 		e => {
// 			e.target.value = masks[field](e.target.value)
// 		},
// 		false
// 	)
// })


// função exibir/ocultar campo "preço"
function showAmount(show) {
    if (show == 1) {
        document.getElementById('amount').style.display = 'block'
    } else {
        document.getElementById('amount').style.display = 'none'
    }
}

// Funções para arrasta e solta do arquivo
function readFile(e) {
	var files
	if (e.target.files) {
		files = e.target.files
	} else {
		files = e.dataTransfer.files
	}
	if (files.length == 0) {
		alert('What you dropped is not a file.')
		return
	}
	var file = files[0]
	document.getElementById('fileDragName').value = file.name
	document.getElementById('fileDragSize').value = file.size
	document.getElementById('fileDragType').value = file.type
	reader = new FileReader()
	reader.onload = function (e) {
		document.getElementById('fileDragData').value = e.target.result
	}
	document.getElementById('labelFile').innerHTML = 'Arquivo selecionado'
	reader.readAsDataURL(file)
}
function getTheFile(e) {
	e.target.style.borderColor = '#ccc'
	readFile(e)
}

var holder = document.getElementById('inputGroupFile01')
holder.ondragover = function () {
	this.classList.add('hover')
	return false
}

holder.ondragleave = function () {
	this.classList.remove('hover')
	return false
}

// ------------------------------------------------------------------------
// Adicionar mais atividades
const addButton 	= document.getElementById('addActivity');
const removeButton 	= document.getElementById('removeActivity');

var contActivity = 1;
var contInvolved = 1;

const index = {
	numeroAtividade: 1,
	quantidadeEnvolvidos: 1
}

const addActivity = function () {
	var activitiesContainer = document.getElementById('activities');
	var form = document.getElementById('form');
	contActivity++;
	contInvolved++;

	window.history.replaceState(null, null, `/event/create/${contActivity}`);
	form.action = `/event/createEvent/${contActivity}`;

	const activity = document.createElement('fieldset');
	activity.classList.add('activity-group');
	activity.setAttribute('id', `activity${contActivity}`);
	activity.name = 'activities';

	activitiesContainer.appendChild(activity);

	var qtd = document.querySelectorAll(`.envolvidos.atividade-${contActivity}`)
	var auxInvolved = qtd.length + 1;
	
	activity.innerHTML = ` <hr class="mt-4 mb-4 bg-light">
	<div class="row g-2 mb-4">
		<div class="col-md-6 px-3">
			<!-- Nome -->
			<div class="mb-2">
				<label for="inputActivity${contActivity}" class="col-md col-form-label">Nome da Atividade</label>
				<input type="text" class="form-control pt-2 pb-2" name="inputActivity${contActivity}" id="inputActivity${contActivity}" placeholder="Informe o nome da atividade"  >
				<span class="error"></span>
			</div>
			<!-- Descrição -->
			<div class="mb-4">
				<label for="inputDescriptionActivity${contActivity}" class="col-md col-form-label">Descrição</label>
				<textarea type="text" class="form-control pt-2 pb-5" name="descriptionActivity${contActivity}" id="inputDescriptionActivity${contActivity}" placeholder="Descreva a atividade"  ></textarea>
				<span class="error"></span>
			</div>

			<div class="row g-2 mb-2">
				<!-- Gratuidade -->
				<div class="col col-sm-auto">
					<label for="inputCheckbox${contActivity}" class="col-md col-form-label mb-3">Gratuito?</label>
					<div class="row g-2 mx-2">
						<div class="col form-check" id="inputCheckbox${contActivity}">
							<input class="form-check-input" type="radio" name="precoAtividade${contActivity}" id="inputCheckboxYes${contActivity}" onclick="showAmount(0)">
							<label class="form-check-label" for="inputCheckboxYes${contActivity}">
								Sim
							</label>
						</div>
						<div class="col form-check" id="inputCheckbox${contActivity}">
							<input class="form-check-input" type="radio" name="precoAtividade${contActivity}" id="inputCheckboxNo${contActivity}" onclick="showAmount(1)">
							<label class="form-check-label" for="inputCheckboxNo${contActivity}">
								Não
							</label>
						</div>
					</div> 
				</div>
				<div class="col col-lg">
					<!-- Preço -->
					<div class="mb-2" id="amount">
						<label for="inputAmount${contActivity}" class="col-md col-form-label">Preço</label>
						<input type="number" step="0.01" name="inputAmount${contActivity}" id="inputAmount${contActivity}" placeholder="Informe o custo de participação na atividade" class="form-control pt-2 pb-2"
						>
						<span class="error"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 px-3">
			<!-- Data e Hora -->
			<div class="row g-2 mb-2 row-form" style="margin-top: 0">
				<label class="col-form-label" for="autoSizingSelectDate${contActivity}">Data e Hora</label>
				<div class="col form-mb">
					<input type="text" placeholder="Início" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataInicio${contActivity}" id="autoSizingSelectDate${contActivity}" value="Início"
					>
					<span class="error"></span>
				</div>

				<div class="col">
					<input type="text" placeholder="Fim" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataFim${contActivity}" id="autoSizingSelectDate${contActivity}" value="Fim"
					>
					<span class="error"></span>
				</div>
			</div>

			<!-- Observação -->
			<div class="mb-4">
				<label for="inputObservation${contActivity}" class="col-md col-form-label">Observação</label>
				<textarea type="text" class="form-control pt-2 pb-5" name="observationActivity${contActivity}" id="inputObservation${contActivity}" placeholder="Caso a atividade possua alguma observação"></textarea>
			</div>

			<div class="row g-2 mb-2 row-form">
				<!-- Pontuação -->
				<div class="col">
					<label for="PointsDataList${contActivity}" class="form-label col-form-label">Pontuação</label>
					<input class="form-control pt-2 pb-2" list="datalistOptionsPoints" name="PointsDataList${contActivity}" id="PointsDataList${contActivity}" placeholder="Pontos">
					<datalist id="datalistOptionsPoints">
						<option value="10"></option>
						<option value="20"></option>
						<option value="30"></option>
					</datalist>
				</div>

				<!-- Área -->
				<div class="col">
					<label for="AreaDataList${contActivity}" class="form-label col-form-label">Área</label>
					<input class="form-control pt-2 pb-2" list="datalistOptionsArea" name="AreaDataList${contActivity}" id="AreaDataList${contActivity}" placeholder="Área">
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
				<label for="inputLinkActivity${contActivity}" class="col-md col-form-label">Link da atividade</label>
				<input type="url" class="form-control pt-2 pb-2" name="inputLinkActivity${contActivity}" id="inputLinkActivity${contActivity}" placeholder="Informe o link da atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30"  >
				<span class="error"></span>
			</div>

			<div class="mb-2">
				<label for="inputLinkSubscription${contActivity}" class="col-md col-form-label">Link de inscrição</label>
				<input type="url" class="form-control pt-2 pb-2" name="inputLinkSubscription${contActivity}" id="inputLinkSubscription${contActivity}" placeholder="Informe o link para inscrição na atividade"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
			</div>
		</div>
	</div>
	
	<!-- Envolvido -->
	<fieldset id="involvedActivity1">
		<legend class="text-secondary">Envolvidos na atividade</legend>
		<div id="people-${contActivity}">
			<div id="involved-${contActivity}-${auxInvolved}" class="envolvidos atividade-${contActivity}">
				<div class="row g-2">
					<div class="col-md-6 px-3">
						<!-- Nome -->
						<div class="mb-2">
							<label for="inputName-${contActivity}-${auxInvolved}" class="col-md col-form-label">Nome</label>
							<input type="text" class="form-control pt-2 pb-2" id="inputName-${contActivity}-${auxInvolved}" name="inputName-${contActivity}-${auxInvolved}" placeholder="Informe o nome da pessoa envolvida na atividade"  >
							<span class="error"></span>
						</div>
						<div class="row row-form">
							<!-- Telefone -->
							<div class="mb-2 col">
								<label for="inputTel-${contActivity}-${auxInvolved}" class="col-md col-form-label">Telefone</label>
								<input type="tel" class="form-control pt-2 pb-2" id="inputTel-${contActivity}-${auxInvolved}" name="inputTel-${contActivity}-${auxInvolved}" placeholder="(99) 9999-9999" maxlength="14" data-js="phone">
							</div>
							<!-- Celular -->
							<div class="mb-2 col">
								<label for="inputCel-${contActivity}-${auxInvolved}" class="col-md col-form-label">Celular</label>
								<input type="tel" class=" form-control pt-2 pb-2" id="inputCel-${contActivity}-${auxInvolved}" name="inputCel-${contActivity}-${auxInvolved}" placeholder="(99) 99999-9999" autocomplete="off" maxlength="15" data-js="phone">
								<span class="error"></span>
							</div>
						</div>
					</div>
					<div class="col-md-6 px-3">
						<!-- Email do envolvido -->
						<div class="mb-2">
							<label for="inputEmail-${contActivity}-${auxInvolved}" class="col-md col-form-label">E-mail</label>
							<input type="email" class="form-control pt-2 pb-2" name="inputEmail-${contActivity}-${auxInvolved}" id="inputEmail-${contActivity}-${auxInvolved}" placeholder="Informe um e-mail para contato"  ></input>
							<span class="error"></span>
						</div>
						<!-- Externo ou Interno -->
						<div class="mb-2">
							<label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP</label>
							<div class="row g-2 mx-2 pt-2 pb-2">
								<div class="col form-check" id="inputCheckbox">
									<input class="form-check-input" type="radio" onclick="involvedType(${contActivity}, ${auxInvolved})" name="flexRadioDefault-${contActivity}-${auxInvolved}" id="inputCheckboxIn-${contActivity}-${auxInvolved}" value="internal">
									<label class="form-check-label" for="inputCheckboxIn-${contActivity}-${auxInvolved}">Interna</label>
								</div>
								<div class="col form-check" id="inputCheckbox">
									<input class="form-check-input" type="radio" onclick="involvedType(${contActivity}, ${auxInvolved})" name="flexRadioDefault-${contActivity}-${auxInvolved}" id="inputCheckboxEx-${contActivity}-${auxInvolved}" value="external">
									<label class="form-check-label" for="inputCheckboxEx-${contActivity}-${auxInvolved}">Externa</label>
								</div>
							</div> 
						</div>
					</div>
				</div>
				<div class="row g-2 mb-4" id="typeContainer-${contActivity}-${auxInvolved}"></div>
			</div>
			<div>
				<input type="hidden" id="qtdInvolved-${contActivity}" name="qtdInvolved-${contActivity}" value="1">
			</div>
		</div>
		<!-- Add More Button - Envolvido -->
		<div class="row g-2 mb-4 d-flex flex-column">
			<div class="col px-3">
				<label for="inputAddMorePearson" class="col-md col-form-label">Deseja adicionar ou remover uma pessoa envolvida?</label>
			</div>
			<div class="col px-3 input-group">
				<span id="removePerson-${contActivity}" class="input-group-btn px-2">
					<button  type="button" class="btn btn-sm btn-green btn-number" data-type="minus" >
						<span class="fas fa-minus"></span>
					</button>
				</span>
				<span class="input-group-btn">
					<button id="addPerson-${contActivity}" onclick="addInvolved(${contActivity})" type="button" class="btn btn-sm btn-green btn-number" data-type="plus" >
						<span class="fas fa-plus"></span>
					</button>
				</span>
			</div>
		</div>
	</fieldset>`

	minusButton('activity');
}
addButton.addEventListener('click', addActivity);


const removeActivity = function () {	
	const activity = document.querySelector(`#activity${contActivity}`);
	activity.parentNode.removeChild(activity);
	contActivity--;
	
	window.history.replaceState(null, null, `/event/create/${contActivity}`);
	form.action = `/event/createEvent/${contActivity}`;

	minusButton('activity');
}
removeButton.addEventListener('click', removeActivity);


function GetURLParameter() {
	var sPageURL = window.location.href;
	var indexOfLastSlash = sPageURL.lastIndexOf("/");

	if(indexOfLastSlash>0 && sPageURL.length-1!=indexOfLastSlash)
		return sPageURL.substring(indexOfLastSlash+1);
	else 
	   return 0;
}

// ------------------------------------------------------------------------
// Envolvidos
function involvedType(activity, position){
	const personType = document.getElementsByName(`flexRadioDefault-${activity}-${position}`);
	const involved = document.getElementById(`typeContainer-${activity}-${position}`);

	personType.forEach(element => {
		if(element.checked){
			if(element.value == 'external'){
				involved.innerHTML = `
				<div class="col-md-6 px-3">
					<!-- Empresa -->
					<div class="mb-2">
						<label for="BusinessDataList-${contActivity}-${position}" class="form-label col-form-label">Empresa</label>
						<input class="form-control pt-2 pb-2" list="datalistOptionsBusiness" id="BusinessDataList-${contActivity}-${position}" name="BusinessDataList-${contActivity}-${position}" placeholder="Informe o nome da empresa">
						<datalist id="datalistOptionsBusiness-${contActivity}-${position}"  >
                        	<option value="JASP"></option>
                            <option value="SAP"></option>
                        </datalist>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-md-6 px-3">
                	<!-- Email da empresa -->
                    <div class="mb-2">
                    	<label for="inputEmailCompany-${contActivity}-${position}" class="col-md col-form-label">E-mail</label>
                        <input type="email" class="form-control pt-2 pb-2" name="inputEmailCompany-${contActivity}-${position}" id="inputEmailCompany-${contActivity}-${position}" placeholder="Informe um e-mail para contato com a empresa"></input>
                    </div>
                </div>
                <div class="col-md-6 px-3">
                	<!-- Área do contato -->
                    <div class="mb-2">
                    	<label for="inputAreaEmpresa-${contActivity}-${position}" class="col-md col-form-label">Área do contato</label>
                        <input type="text" class="form-control pt-2 pb-2" id="inputAreaEmpresa-${contActivity}-${position}" name="inputAreaEmpresa-${contActivity}-${position}" placeholder="Informe de atuação do contato" >
                    </div>  
                </div>
                <div class="col-md-6 px-3">
                	<!-- Site da empresa -->
                    <div class="mb-2">
                    	<label for="inputLinkBusiness-${contActivity}-${position}" class="col-md col-form-label">Site</label>
                        <input type="url" class="form-control pt-2 pb-2" id="inputLinkBusiness-${contActivity}-${position}" name="inputLinkBusiness-${contActivity}-${position}" placeholder="Informe o link do site da empresa"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                    </div>  
                </div>`
			}
			else if(element.value == 'internal'){
				involved.innerHTML = `
				<div class="col-md-6 px-3">
                    <div class="mb-2">
                        <label for="AreaIfspDataList-${contActivity}-${position}" class="form-label col-form-label">Área</label>
                        <input autocomplete="off" class="form-control pt-2 pb-2" list="datalistAreaIfsp-${contActivity}-${position}" name="AreaIfspDataList-${contActivity}-${position}" id="AreaIfspDataList-${contActivity}-${position}" placeholder="Informe a área de atuação no câmpus">
                        <datalist id="datalistAreaIfsp-${contActivity}-${position}"  >
                            <option value="Subárea de Informática"></option>
                        	<option value="Subárea de Turismo"></option>
                        </datalist>
                    	<span class="error"></span>
                	</div>
            	</div>
			    <div class="col-md-6 px-3">
                    <div class="mb-2">
                    	<label for="inputCategory-${contActivity}-${position}" class="col-md col-form-label">Categoria</label>
                    	<input type="text" class="form-control pt-2 pb-2" name="inputCategory-${contActivity}-${position}" id="inputCategory-${contActivity}-${position}" placeholder="Informe a função do envolvido"></input>
                	</div>
				</div>`
			}
		}
	});
}

function addInvolved(activity) {
	var involvedContainer = document.getElementById(`people-${activity}`);
	
	contInvolved++;

	var qtd = document.querySelectorAll(`.envolvidos.atividade-${activity}`)
	var auxInvolved = qtd.length;
	
	const involved = document.createElement('div');
	involved.setAttribute('id', `involved-${activity}-${auxInvolved + 1}`);
	involved.classList.add('envolvidos');
	involved.classList.add(`atividade-${activity}`);
	
	involvedContainer.appendChild(involved);
	
	qtd = document.querySelectorAll(`.envolvidos.atividade-${activity}`)
	auxInvolved = qtd.length;
	
	involved.innerHTML = `<hr class="m-4 bg-light">
		<div class="row g-2">
			<div class="col-md-6 px-3">
				<!-- Nome -->
				<div class="mb-2">
					<label for="inputName-${activity}-${auxInvolved}" class="col-md col-form-label">Nome</label>
					<input type="text" class="form-control pt-2 pb-2" id="inputName-${activity}-${auxInvolved}" name="inputName-${activity}-${auxInvolved}" placeholder="Informe o nome da pessoa envolvida na atividade"  >
					<span class="error"></span>
				</div>
				<div class="row row-form">
					<!-- Telefone -->
					<div class="mb-2 col">
						<label for="inputTel-${activity}-${auxInvolved}" class="col-md col-form-label">Telefone</label>
						<input type="tel" class="form-control pt-2 pb-2" id="inputTel-${activity}-${auxInvolved}" name="inputTel-${activity}-${auxInvolved}" placeholder="(99) 9999-9999" maxlength="14" data-js="phone">
					</div>
					<!-- Celular -->
					<div class="mb-2 col">
						<label for="inputCel-${activity}-${auxInvolved}" class="col-md col-form-label">Celular</label>
						<input type="tel" class=" form-control pt-2 pb-2" id="inputCel-${activity}-${auxInvolved}" name="inputCel-${activity}-${auxInvolved}" placeholder="(99) 99999-9999" autocomplete="off" maxlength="15" data-js="phone">
						<span class="error"></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 px-3">
				<!-- Email do envolvido -->
				<div class="mb-2">
					<label for="inputEmail-${activity}-${auxInvolved}" class="col-md col-form-label">E-mail</label>
					<input type="email" class="form-control pt-2 pb-2" name="inputEmail-${activity}-${auxInvolved}" id="inputEmail-${activity}-${auxInvolved}" placeholder="Informe um e-mail para contato"  ></input>
					<span class="error"></span>
				</div>
				<!-- Externo ou Interno -->
				<div class="mb-2">
					<label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP</label>
					<div class="row g-2 mx-2 pt-2 pb-2">
						<div class="col form-check" id="inputCheckbox">
							<input class="form-check-input" type="radio" onclick="involvedType(${activity}, ${auxInvolved})" name="flexRadioDefault-${activity}-${auxInvolved}" id="inputCheckboxIn-${activity}-${auxInvolved}" value="internal">
							<label class="form-check-label" for="inputCheckboxIn-${contActivity}-${auxInvolved}">Interna</label>
						</div>
						<div class="col form-check" id="inputCheckbox">
							<input class="form-check-input" type="radio" onclick="involvedType(${activity}, ${auxInvolved})" name="flexRadioDefault-${activity}-${auxInvolved}" id="inputCheckboxEx-${activity}-${auxInvolved}" value="external">
							<label class="form-check-label" for="inputCheckboxEx-${contActivity}-${auxInvolved}">Externa</label>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<div class="row g-2 mb-4" id="typeContainer-${activity}-${auxInvolved}"></div>`

	var qtdInvolved = document.getElementById(`qtdInvolved-${activity}`);
	qtdInvolved.value = auxInvolved;

	var removeInvolvedButton = document.getElementById(`removePerson-${activity}`)
	
	removeInvolvedButton.innerHTML = `
	<button  type="button" onclick="removeInvolved(${activity}, ${auxInvolved})" class="btn btn-sm btn-green btn-number" data-type="minus" >
	<span class="fas fa-minus"></span>
	</button>
	`

	minusButton('involved', auxInvolved);
}


function removeInvolved(activity, auxInvolved) {
	const involved = document.querySelector(`#involved-${activity}-${auxInvolved}`);
	involved.parentNode.removeChild(involved);
	auxInvolved--;

	var qtdInvolved = document.getElementById(`qtdInvolved-${activity}`);
	qtdInvolved.value = auxInvolved;

	var removeInvolvedButton = document.getElementById(`removePerson-${activity}`)

	removeInvolvedButton.innerHTML = `
		<button  type="button" onclick="removeInvolved(${activity}, ${auxInvolved})" class="btn btn-sm btn-green btn-number" data-type="minus" >
			<span class="fas fa-minus"></span>
		</button>
	`

	minusButton('involved', activity, auxInvolved);
}

function minusButton(type, activity, involved){
	if(type == 'activity'){
		if(contActivity <= 1){
			removeButton.classList.add('disabled');
		}
		else{
			removeButton.classList.remove('disabled');
		}
	}
	// else if(type == 'involved'){
	// 	if(involved <= 1){
	// 		var removeInvolvedButton = document.getElementById(`removePerson-${activity}`)
	// 		removeInvolvedButton.innerHTML = `
	// 		<button  type="button" onclick="removeInvolved(${activity}, ${involved})" class="btn btn-sm btn-green btn-number disabled" data-type="minus" >
	// 			<span class="fas fa-minus"></span>
	// 		</button>`
	// 	}
	// 	else{
	// 		var removeInvolvedButton = document.getElementById(`removePerson-${activity}`)
	// 		removeInvolvedButton.innerHTML = `
	// 		<button  type="button" onclick="removeInvolved(${activity}, ${involved})" class="btn btn-sm btn-green btn-number" data-type="minus" >
	// 			<span class="fas fa-minus"></span>
	// 		</button>`
	// 	}
	// }
}

minusButton('activity');
minusButton('involved', 1, 1);
