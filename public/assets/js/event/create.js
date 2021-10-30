// Validação do formulário 
const form = document.querySelector('form.needs-validation')
const fields = document.querySelectorAll('[required]')

function ValidateField(field) {
	function verifyErrors() {
		let foundError = false

		for (let error in field.validity) {
			if (field.validity[error] && !field.validity.valid) {
				foundError = error
			}
		}

		return foundError
	}
	

	function customMessage(typeError) {
		const messages = {
			text: {
				valueMissing: 'Por favor, preencha esse campo'
			},
			tel: {
				valueMissing: 'Celular é obrigatório',
				typeMismatch: 'Por favor, preencha um telefone válido'
			},
			email: {
				valueMissing: 'Email é obrigatório',
				typeMismatch: 'Por favor, preencha um email válido'
			},
			datalist: {
				valueMissing: 'Por favor, preencha esse campo'
			},
			textarea: {
				valueMissing: 'Por favor, preencha esse campo'
			},
			datetimelocal: {
				valueMissing: 'Por favor, preencha esse campo',
				typeMismatch: 'Por favor, preencha uma data válida'
			},
			number: {
				valueMissing: 'Por favor, preencha esse campo',
				typeMismatch: 'Por favor, preencha um valor númerico válido'
			}
		}

		return messages[field.type][typeError]
	}

	function setCustomMessage(message) {
		const spanError = field.parentNode.querySelector('span.error')
		if (message) {
			spanError.classList.add('invalid-feedback')
			spanError.innerHTML = message
		} else {
			spanError.classList.remove('invalid-feedback')
			spanError.innerHTML = ' '
		}
	}

	return function () {
		const error = verifyErrors()

		if (verifyErrors()) {
			form.classList.add('was-validated')

			const message = customMessage(error)
			setCustomMessage(message)
		} else {
			setCustomMessage()
		}
	}
}

function customValidation(e) {
	const field = e.target
	const validation = ValidateField(field)

	validation()
}

for (let field of fields) {
	field.addEventListener('invalid', e => {
		e.preventDefault()
		customValidation(e)
	})
	field.addEventListener('blur', customValidation)
}

// Validação das mascaras
const masks = {
	phone(value) {
		return value
			.replace(/\D+/g, '')
			.replace(/(\d{2})(\d)/, '($1) $2')
			.replace(/(\d{4})(\d)/, '$1-$2')
			.replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
			.replace(/(-\d{4})\d+?$/, '$1')
	}
}

let inputs = document.querySelectorAll('input')
	inputs.forEach(fields => {
	const field = fields.dataset.js

	fields.addEventListener(
		'input',
		e => {
			e.target.value = masks[field](e.target.value)
		},
		false
	)
})


// Funções para arrasta e solta do arquivo
function showAmount(show) {
	if (show == 0) {
		console.log('checkado')
		document.getElementById('amount').style.display = 'block'
	} else {
		console.log('descheckado')
		document.getElementById('amount').style.display = 'none'
	}
}

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
