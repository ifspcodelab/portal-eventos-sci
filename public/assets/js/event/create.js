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

	// function customMessage(typeError) {
	// 	const messages = {
	// 		text: {
	// 			valueMissing: 'Por favor, preencha esse campo'
	// 		},
	// 		email: {
	// 			valueMissing: 'Email é obrigatório',
	// 			typeMismatch: 'Por favor, preencha um email válido'
	// 		}
	// 	}

	// 	return messages[field.type][typeError]
	// }

	return function () {
		if (verifyErrors()) {
			form.classList.add('was-validated')
		} 
	}
}

function customValidation(event) {
	const field = event.target
	const validation = ValidateField(field)

	validation()
}

for (let field of fields) {
	field.addEventListener('invalid', event => {
		event.preventDefault()
		customValidation(event)
	})
	field.addEventListener('blur', customValidation)
}




// Funções para arrasta e solta do arquivo
function showAmount(show) {
	if (show == 1) {
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
