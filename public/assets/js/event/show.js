$(document).ready(function() {
    $('#activities').DataTable(
        {
            paging: true,
            searching: true,
            ordering:  true,
        }
    );
});


/*
const activitiesData = {
    externalName:           document.getElementById('externalName').innerHTML,
    externalOffice:         document.getElementById('externalOffice').innerHTML,
    externalAssociation:    document.getElementById('externalAssociation').innerHTML,
    internalName:           document.getElementById('internalName').innerHTML,
    internalOffice:         document.getElementById('internalOffice').innerHTML,
    internalAssociation:    document.getElementById('internalAssociation').innerHTML,
    activityLink:           document.getElementById('activityLink').href,
    subscribeLink:          document.getElementById('subscribeLink').href
}

var eventFired = function (activityLink, subscribeLink, externalName, externalOffice, externalAssociation, internalName, internalOffice, internalAssociation) {
    var detail = document.querySelector('#activities_detail');
    var contactSection = 
    `<div class="mt-5">
      <h4>Organizadores do evento</h4>
      <div class="card mt-3">
        <div class="card-body">
          <div class="col-sm">
            <img src="../../assets/img/circle red.png" alt="">
            <div>
              <div class="row">
                <h5 id="externalName">${externalName}</h5>
              </div>
              <div class="row">
                <p id="externalOffice">${externalOffice}</p>
              </div>
              <div class="row">
                <p id="externalAssociation">${externalAssociation}</p>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <img src="../../assets/img/circle green.png" alt="">
            <div>
                <div class="row">
                  <h5 id="internalName">${internalName}</h5>
                </div>
                <div class="row">
                  <p id="internalOffice">${internalOffice}</p>
                </div>
                <div class="row">
                  <p id="internalAssociation">${internalAssociation}</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>`
    var infos =  
    `<div class="mt-5">
      <h4>Venha participar!</h4>
      <div class="card mt-3 bg-green">
        <div class="card-body">
          <div class="col-sm">
            <i class="icon-Train-Ticket"></i>
            <div class="row d-flex align-items-center">
              <p><?= $price == (0) ? "Evento gratuito" : "Evento Pago: " . $price ; ?></p>
            </div>
          </div>
          <div class="col-sm">
            <i class="icon-Calendar"></i>
            <div class="row d-flex align-items-center">
              <p><?= $startDate == ($endDate) ? date("d/m/Y", strtotime($startDate)) : date("d/m/Y", strtotime($startDate)) . " - ". date("d/m/Y", strtotime($endDate)) ; ?></p>
            </div>
          </div>
          <div class="col-sm">
            <i class="icon-Clock"></i>
            <div class="row d-flex align-items-center">
              <p><?= "Das " . date("H:i", strtotime($startTime)) . " às " . date("H:i", strtotime($endTime)) ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>`
    var btnSection = 
    `<div class="mt-5">
        <div class="row">
            <div class="buttons">
                <a href="${activityLink}" target="_blank" class="btn btn-red mt-2 mb-2">Saiba mais aqui</a>
                <div>
                    <span> &nbsp;&nbsp; ou &nbsp;&nbsp; </span>
                </div>
                <a href="${subscribeLink}" target="_blank" class="btn btn-green mt-2 mb-2">Inscreva-se</a>
            </div>
        </div>
    </div>`
    detail.innerHTML = contactSection + infos + btnSection
}
  
document.addEventListener('DOMContentLoaded', function () {
    let table = new DataTable('#activities');
  
    document
      .querySelector('#activities tbody')
      .addEventListener('click', function (e) {
        var data = table.row( e.target ).data();

        <?php foreach($data['events'] as $event) { ?>
          if(data[0] == '<?= $event['cod_atividade'] ?>'){
            activitiesData.externalName        = '<?= $event['nome_pessoa_externa'] ?>';
            activitiesData.externalOffice      = '<?= $event['area_contato_empresa'] ?>';
            activitiesData.externalAssociation = '<?= $event['nome_empresa'] ?>';
            activitiesData.internalName        = '<?= $event['nome_pessoa_ifsp'] ?>';
            activitiesData.internalOffice      = '<?= $event['papel_envolvido_ifsp'] ?>';
            activitiesData.internalAssociation = '<?= $event['nome_departamento'] ?>';
            activitiesData.activityLink        = '<?= $event['link_atividade'] == "" ? $event['link_evento'] : $event['link_atividade'] ?>';
            activitiesData.subscribeLink       = '<?= $event['link_inscricao_atividade'] == "" ? $event['link_inscricao_evento'] : $event['link_inscricao_atividade'] ?>';
          }
        <?php } ?>

        console.log(activitiesData.activityLink)
        console.log(activitiesData.subscribeLink)

        eventFired(activitiesData.activityLink, activitiesData.subscribeLink, activitiesData.externalName, activitiesData.externalOffice, activitiesData.externalAssociation, activitiesData.internalName, activitiesData.internalOffice, activitiesData.internalAssociation);
      });
});

*/