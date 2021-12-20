const addButton 	= document.getElementById('addActivity');
const removeButton 	= document.getElementById('removeActivity');

var contActivity = 0;
var contInvolved = 0;

const addActivity = function () {
	var activitiesContainer = document.getElementById('activities');
	var form = document.getElementById('form');
	contActivity++;
	contInvolved++;

    const url = window.location;
    const segments = url.pathname.split('/');

	window.history.replaceState(null, null, `/event/edit/${segments[3]}/${contActivity}`);
	form.action = `/event/alterEvent/${segments[3]}/${contActivity}`;

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
				<label for="inputActivity${contActivity}" class="col-md col-form-label">Nome da Atividade <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
				<input type="text" class="form-control pt-2 pb-2" name="inputActivity${contActivity}" id="inputActivity${contActivity}" placeholder="Informe o nome da atividade" required >
				<span class="error"></span>
			</div>
			<!-- Descrição -->
			<div class="mb-4">
				<label for="inputDescriptionActivity${contActivity}" class="col-md col-form-label">Descrição <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
				<textarea type="text" class="form-control pt-2 pb-5" name="descriptionActivity${contActivity}" id="inputDescriptionActivity${contActivity}" placeholder="Descreva a atividade" required ></textarea>
				<span class="error"></span>
			</div>

			<div class="row g-2 mb-2">
				<!-- Gratuidade -->
				<div class="col col-sm-auto">
					<label for="inputCheckbox${contActivity}" class="col-md col-form-label mb-3">Gratuito? <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
					<div class="row g-2 mx-2">
						<div class="col form-check" id="inputCheckbox${contActivity}">
							<input class="form-check-input" type="radio" name="precoAtividade${contActivity}" id="inputCheckboxYes${contActivity}" onclick="showAmount(0)" required >
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
						<input type="number" step="0.01" name="inputAmount${contActivity}" id="inputAmount${contActivity}" placeholder="Informe o custo de participação na atividade" class="form-control pt-2 pb-2" >
						<span class="error"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 px-3">
			<!-- Data e Hora -->
			<div class="row g-2 mb-2 row-form" style="margin-top: 0">
				<label class="col-form-label" for="autoSizingSelectDate${contActivity}">Data e Hora <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
				<div class="col form-mb">
					<input type="text" placeholder="Início" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataInicio${contActivity}" id="autoSizingSelectDate${contActivity}" value="Início" required >
					<span class="error"></span>
				</div>

				<div class="col">
					<input type="text" placeholder="Fim" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" class="form-control pt-2 pb-2" name="dataFim${contActivity}" id="autoSizingSelectDate${contActivity}" value="Fim" required >
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
							<label for="inputName-${contActivity}-${auxInvolved}" class="col-md col-form-label">Nome <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
							<input type="text" class="form-control pt-2 pb-2" id="inputName-${contActivity}-${auxInvolved}" name="inputName-${contActivity}-${auxInvolved}" placeholder="Informe o nome da pessoa envolvida na atividade" required >
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
							<label for="inputEmail-${contActivity}-${auxInvolved}" class="col-md col-form-label">E-mail <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
							<input type="email" class="form-control pt-2 pb-2" name="inputEmail-${contActivity}-${auxInvolved}" id="inputEmail-${contActivity}-${auxInvolved}" placeholder="Informe um e-mail para contato" required >
							<span class="error"></span>
						</div>
						<!-- Externo ou Interno -->
						<div class="mb-2">
							<label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
							<div class="row g-2 mx-2 pt-2 pb-2">
								<div class="col form-check" id="inputCheckbox">
									<input class="form-check-input" type="radio" onclick="involvedType(${contActivity}, ${auxInvolved})" name="flexRadioDefault-${contActivity}-${auxInvolved}" id="inputCheckboxIn-${contActivity}-${auxInvolved}" value="internal" required >
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

	minusButton('activity', contActivity, null);
	minusButton('involved', 1, 1);
}
addButton.addEventListener('click', addActivity);


const removeActivity = function () {	
	const activity = document.querySelector(`#activity${contActivity}`);
	activity.parentNode.removeChild(activity);
	contActivity--;

    const url = window.location;
    const segments = url.pathname.split('/');

	window.history.replaceState(null, null, `/event/edit/${segments[3]}/${contActivity}`);
	form.action = `/event/alterEvent/${segments[3]}/${contActivity}`;

	minusButton('activity', contActivity, null);
}
removeButton.addEventListener('click', removeActivity);


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
						<label for="BusinessDataList-${activity}-${position}" class="form-label col-form-label">Empresa</label>
						<input class="form-control pt-2 pb-2" list="datalistOptionsBusiness" id="BusinessDataList-${activity}-${position}" name="BusinessDataList-${activity}-${position}" placeholder="Informe o nome da empresa">
						<datalist id="datalistOptionsBusiness-${activity}-${position}"  >
                        	<option value="JASP"></option>
                            <option value="SAP"></option>
                        </datalist>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-md-6 px-3">
                	<!-- Email da empresa -->
                    <div class="mb-2">
                    	<label for="inputEmailCompany-${activity}-${position}" class="col-md col-form-label">E-mail</label>
                        <input type="email" class="form-control pt-2 pb-2" name="inputEmailCompany-${activity}-${position}" id="inputEmailCompany-${activity}-${position}" placeholder="Informe um e-mail para contato com a empresa">
                    </div>
                </div>
                <div class="col-md-6 px-3">
                	<!-- Área do contato -->
                    <div class="mb-2">
                    	<label for="inputAreaEmpresa-${activity}-${position}" class="col-md col-form-label">Área do contato</label>
                        <input type="text" class="form-control pt-2 pb-2" id="inputAreaEmpresa-${activity}-${position}" name="inputAreaEmpresa-${activity}-${position}" placeholder="Informe de atuação do contato" >
                    </div>  
                </div>
                <div class="col-md-6 px-3">
                	<!-- Site da empresa -->
                    <div class="mb-2">
                    	<label for="inputLinkBusiness-${activity}-${position}" class="col-md col-form-label">Site</label>
                        <input type="url" class="form-control pt-2 pb-2" id="inputLinkBusiness-${activity}-${position}" name="inputLinkBusiness-${activity}-${position}" placeholder="Informe o link do site da empresa"  onfocus="(this.type='url')" onblur="(this.type='text')" pattern="https://.*" size="30" >
                    </div>  
                </div>`
			}
			else if(element.value == 'internal'){
				involved.innerHTML = `
				<div class="col-md-6 px-3">
                    <div class="mb-2">
                        <label for="AreaIfspDataList-${activity}-${position}" class="form-label col-form-label">Área <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
                        <input autocomplete="off" class="form-control pt-2 pb-2" list="datalistAreaIfsp-${activity}-${position}" name="AreaIfspDataList-${activity}-${position}" id="AreaIfspDataList-${activity}-${position}" placeholder="Informe a área de atuação no câmpus" required >
                        <datalist id="datalistAreaIfsp-${activity}-${position}"  >
                            <option value="Subárea de Informática"></option>
                        	<option value="Subárea de Turismo"></option>
                        </datalist>
                    	<span class="error"></span>
                	</div>
            	</div>
			    <div class="col-md-6 px-3">
                    <div class="mb-2">
                    	<label for="inputCategory-${activity}-${position}" class="col-md col-form-label">Categoria <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
                    	<input type="text" class="form-control pt-2 pb-2" name="inputCategory-${activity}-${position}" id="inputCategory-${activity}-${position}" placeholder="Informe a função do envolvido" required>
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
					<label for="inputName-${activity}-${auxInvolved}" class="col-md col-form-label">Nome <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
					<input type="text" class="form-control pt-2 pb-2" id="inputName-${activity}-${auxInvolved}" name="inputName-${activity}-${auxInvolved}" placeholder="Informe o nome da pessoa envolvida na atividade" required >
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
					<label for="inputEmail-${activity}-${auxInvolved}" class="col-md col-form-label">E-mail <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
					<input type="email" class="form-control pt-2 pb-2" name="inputEmail-${activity}-${auxInvolved}" id="inputEmail-${activity}-${auxInvolved}" placeholder="Informe um e-mail para contato" required >
					<span class="error"></span>
				</div>
				<!-- Externo ou Interno -->
				<div class="mb-2">
					<label for="inputCheckbox" class="col-md col-form-label mb-2">Relação com o IFSP <span type="button" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Esse campo é obrigatório">*</span></label>
					<div class="row g-2 mx-2 pt-2 pb-2">
						<div class="col form-check" id="inputCheckbox">
							<input class="form-check-input" type="radio" onclick="involvedType(${activity}, ${auxInvolved})" name="flexRadioDefault-${activity}-${auxInvolved}" id="inputCheckboxIn-${activity}-${auxInvolved}" value="internal" required >
							<label class="form-check-label" for="inputCheckboxIn-${activity}-${auxInvolved}">Interna</label>
						</div>
						<div class="col form-check" id="inputCheckbox">
							<input class="form-check-input" type="radio" onclick="involvedType(${activity}, ${auxInvolved})" name="flexRadioDefault-${activity}-${auxInvolved}" id="inputCheckboxEx-${activity}-${auxInvolved}" value="external">
							<label class="form-check-label" for="inputCheckboxEx-${activity}-${auxInvolved}">Externa</label>
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
    
	minusButton('involved', activity, auxInvolved);
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
		if(contActivity < 1){
			removeButton.classList.add('disabled');
		}
		else{
			removeButton.classList.remove('disabled');
		}
	}
	else if(type == 'involved'){
		if(involved <= 1){
			var removeInvolvedButton = document.getElementById(`removePerson-${activity}`)
			removeInvolvedButton.innerHTML = `
			<button  type="button" class="btn btn-sm btn-green btn-number disabled" data-type="minus" >
				<span class="fas fa-minus"></span>
			</button>`
		}
		else{
			var removeInvolvedButton = document.getElementById(`removePerson-${activity}`)
			removeInvolvedButton.innerHTML = `
			<button  type="button" onclick="removeInvolved(${activity}, ${involved})" class="btn btn-sm btn-green btn-number" data-type="minus" >
				<span class="fas fa-minus"></span>
			</button>`
		}
	}
}

minusButton('activity', contActivity, null);
minusButton('involved', 1, 1);