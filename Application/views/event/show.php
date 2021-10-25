<!-- Descrição dos Eventos -->
<main>
  <?php 
    $price      = 0;
    $startDate  = null;
    $endDate    = null;
    $startTime  = null;
    $endTime    = null;
  ?>
  <div class="container mt-5 mb-5 event-show">
    <div>
      <?php foreach ($data['events'] as $event) : ?>
      <div class="event-info">
        <div class="col-sm text">
          <div class="row">
            <h2><?= $event['sigla_evento'] == "" ? "" : $event['sigla_evento'] . " - " ?><?= $event['nome_evento'] ?></h2>
          </div>
          <div class="row">
            <p><?= $event['descricao_evento'] ?></p>
          </div>
        </div>
        <div class="col-sm event-show banner">
          <div class="card">
            <img src="<?= $event['img_evento'] ?>"  alt="Banner Evento <?= $event['nome_evento'] ?>" class="rounded-3">
          </div>
        </div>
      </div>
      <?php 
        break;
        endforeach; 
      ?>
      <div class="mt-5">
        <div class="row">
          <h4>Principais atividades do evento</h4>
        </div>
        <div class="table-activities mt-3 mb-3">
          <table id="activities">
            <thead>
              <tr>
                <th>Array</th>
                <th class="col-1 th-icons"><i class="icon-Event-Accepted"></i></th>
                <th class="col-1 th-icons"><i class="icon-Clock"></i></th>
                <th class="col-3"><span><i class="icon-Search"></i> Atividade</span></th>
                <th class="col-3"><span><i class="icon-New-Document"></i> Descrição</span></th>
                <th class="col-3"><span><i class="icon-Note"></i> Observação</span></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['events'] as $event) { ?>
              <?php 
                $price += $event['preco_inscricao'] ;

                // start date
                if($startDate == null){
                  $startDate = $event['data_inicio'];
                }
                else if($startDate > $event['data_inicio']){
                  $startDate = $event['data_inicio'];
                }

                // end date
                if($endDate == null){
                  $endDate = $event['data_fim'];
                }
                else if($endDate < $event['data_fim']){
                  $endDate = $event['data_fim'];
                }

                // start time
                if($startTime == null){
                  $startTime = $event['hora_inicio'];
                }
                else if($startTime < $event['hora_inicio']){
                  $startTime = $event['hora_inicio'];
                }

                // end time
                if($endTime == null){
                  $endTime = $event['hora_fim'];
                }
                else if($endTime < $event['hora_fim']){
                  $endTime = $event['hora_fim'];
                }
              ?>
              <tr>
                <td><?= $event['cod_atividade'] ?></td>
                <td class="th-icons"><?= date("d/m/Y", strtotime($event['data_inicio'])) ?></td>
                <td class="th-icons"><?= date("H:i", strtotime($event['hora_inicio'])) ?> - <?= date("H:i", strtotime($event['hora_fim'])) ?></td>
                <td><?= $event['nome_atividade'] ?> - <span><?= $event['preco_inscricao'] == 0.00 ? 'Gratuito' : 'R$ ' . number_format($event['preco_inscricao'], 2, ',', '.') ?></span></td>
                <td><?= $event['descricao_atividade'] ?></td>
                <td><?= $event['observacao_atividade'] ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div id="activities_detail">
        <div class="mt-5">
          <h4>Organizadores do evento</h4>
          <div class="card mt-3">
            <div class="card-body">
              <div class="col-sm">
                <img src="../../assets/img/circle red.png" alt="">
                <div>
                  <div class="row">
                    <h5 id="externalName">João</h5>
                  </div>
                  <div class="row">
                    <p id="externalOffice">Gerente de atividades externas</p>
                  </div>
                  <div class="row">
                    <p id="externalAssociation">JA - Junior Achivement</p>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <img src="../../assets/img/circle green.png" alt="">
                <div>
                  <div class="row">
                    <h5 id="internalName">Antonio</h5>
                  </div>
                  <div class="row">
                    <p id="internalOffice">Organizador</p>
                  </div>
                  <div class="row">
                    <p id="internalAssociation">IFSP - Câmpus São Paulo</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5">
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
        </div>
        <?php if(!(($event['link_atividade'] = "" && $event['link_inscricao_atividade'] == "") || ($event['link_evento'] == "" && $event['link_inscricao_evento'] == ""))) : ?>
        <div class="mt-5">
          <div class="row">
            <div class="buttons">
              <a id="activityLink" href="<?= $event['link_atividade'] == "" ? $event['link_evento'] : $event['link_atividade'] ?>" target="_blank" class="btn btn-red mt-2 mb-2">Saiba mais aqui</a>
              <div>
                <span> &nbsp;&nbsp; ou &nbsp;&nbsp; </span>
              </div>
              <a id="subscribeLink" href="<?= $event['link_inscricao_atividade'] == "" ? $event['link_inscricao_evento'] : $event['link_inscricao_atividade'] ?>" target="_blank" class="btn btn-green mt-2 mb-2">Inscreva-se</a>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>


<!-- DataTables script -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#activities').DataTable()
});

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
</script>