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

const addActivity = function () {
	var activitiesContainer = document.getElementById('activities');
	var form = document.getElementById('form');
	contActivity++;

	window.history.replaceState(null, null, `/event/create/${contActivity}`);
	form.action = `/event/createEvent/${contActivity}`;

	const activity = document.createElement('fieldset');
	activity.setAttribute('id', `activity${contActivity}`);
	activity.name = 'activities';
	
	activity.innerHTML = `<div class="row g-2 mb-4">
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
	</div>`

	activitiesContainer.appendChild(activity);

	minusButton();
}
addButton.addEventListener('click', addActivity);


const removeActivity = function () {	
	const activity = document.querySelector(`#activity${contActivity}`);
	activity.parentNode.removeChild(activity);
	contActivity--;
	
	window.history.replaceState(null, null, `/event/create/${contActivity}`);
	form.action = `/event/createEvent/${contActivity}`;

	minusButton();
}
removeButton.addEventListener('click', removeActivity);

function minusButton(){
	if(contActivity <= 1){
		removeButton.classList.add('disabled');
	}
	else{
		removeButton.classList.remove('disabled');
	}
}
minusButton();

function GetURLParameter() {
	var sPageURL = window.location.href;
	var indexOfLastSlash = sPageURL.lastIndexOf("/");

	if(indexOfLastSlash>0 && sPageURL.length-1!=indexOfLastSlash)
		return sPageURL.substring(indexOfLastSlash+1);
	else 
	   return 0;
}
