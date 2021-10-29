<link rel="stylesheet" type="text/css" href="/assets/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/event/show.css">


<!-- Descrição dos Eventos -->
<main>
  <?php
    $cod_evento = 0;
    $price      = 0;
    $startDate  = null;
    $endDate    = null;
    $startTime  = null;
    $endTime    = null;
    $activityPosition = array();
    
  ?>
  <div class="container mt-5 mb-5 event-show">
    <div>
      <?php
        foreach ($data['events'] as $event) :
          $cod_evento = $event['cod_evento'];
      ?>
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
                <th class="col-1 th-icons plus"><span><i>&#x2b;</i></span></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['activities'] as $activity) { ?>
              <?php 
                $price += $activity['preco_inscricao'] ;

                // start date
                if($startDate == null){
                  $startDate = $activity['data_inicio'];
                }
                else if($startDate > $activity['data_inicio']){
                  $startDate = $activity['data_inicio'];
                }

                // end date
                if($endDate == null){
                  $endDate = $activity['data_fim'];
                }
                else if($endDate < $activity['data_fim']){
                  $endDate = $activity['data_fim'];
                }

                // start time
                if($startTime == null){
                  $startTime = $activity['hora_inicio'];
                }
                else if($startTime < $activity['hora_inicio']){
                  $startTime = $activity['hora_inicio'];
                }

                // end time
                if($endTime == null){
                  $endTime = $activity['hora_fim'];
                }
                else if($endTime < $activity['hora_fim']){
                  $endTime = $activity['hora_fim'];
                }
              ?>
              <tr>
                <td><?= $activity['cod_atividade'] ?></td>
                <td class="th-icons"><?= date("d/m/Y", strtotime($activity['data_inicio'])) ?></td>
                <td class="th-icons"><?= date("H:i", strtotime($activity['hora_inicio'])) ?> - <?= date("H:i", strtotime($activity['hora_fim'])) ?></td>
                <td><?= $activity['nome_atividade'] ?> - <span><?= $activity['preco_inscricao'] == 0.00 ? 'Gratuito' : 'R$ ' . number_format($activity['preco_inscricao'], 2, ',', '.') ?></span></td>
                <td><?= $activity['descricao_atividade'] ?></td>
                <td><?= $activity['observacao_atividade'] ?></td>
                <td><a href="/event/show/<?= $cod_evento ?>/<?= $activity['cod_atividade'] ?>">Ver detalhes</a></td>
                <?php
                  array_push($activityPosition, $activity['cod_atividade']);
                ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div id="activities_detail">
        <?php if(isset($data['involved'])){ ?>
        <?php foreach($data['involved'] as $involved) : ?>
        <?php if(trim($data['involved'][0]['nome_contato']) != "" && trim($data['involved'][1]['nome_contato']) != ""){ ?>
        <div class="mt-5">
          <h4>Organizadores</h4>
          <div class="card mt-3">
            <div class="card-body">
              <div class="col-sm">
                <img src="/assets/img/circle red.png" alt="">
                <div>
                  <div class="row">
                    <h5 id="externalName"><?= $data['involved'][1]['nome_contato'] ?></h5>
                  </div>
                  <div class="row">
                    <p id="externalOffice"><?= trim($data['involved'][1]['area_contato_empresa']) == "" ? "" : $data['involved'][1]['area_contato_empresa'] ?></p>
                  </div>
                  <div class="row">
                    <p id="externalAssociation"><?= trim($data['involved'][1]['nome_empresa']) == "" ? "" : $data['involved'][1]['nome_empresa'] ?></p>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <img src="/assets/img/circle green.png" alt="">
                <div>
                  <div class="row">
                    <h5 id="internalName"><?= $data['involved'][0]['nome_contato'] ?></h5>
                  </div>
                  <div class="row">
                    <p id="internalOffice"><?= trim($data['involved'][0]['papel_envolvido_ifsp']) == "" ? "" : $data['involved'][0]['papel_envolvido_ifsp'] ?></p>
                  </div>
                  <div class="row">
                    <p id="internalAssociation"><?= trim($data['involved'][0]['nome_departamento']) == "" ? "" : $data['involved'][0]['nome_departamento'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }
          break;
          endforeach;
        } ?>
        <?php foreach ($data['events'] as $event) : ?>
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

        <?php

          $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
          if ($url != ''){
              $urls  = explode('/', $url);
              foreach($urls as $position){
                $position = $position;
              }
          }

          $key = array_search($position, $activityPosition);

          $atividadeAtual = null;
          $linkAtividade = "#";
          $linkInscricaoAtividade = "#";

          if(isset($data['activities']) && isset($data['activities'][$key]))
          {
            $atividadeAtual = $data['activities'][$key];
          }

          if(isset($atividadeAtual['link_atividade']) && trim($atividadeAtual['link_atividade']) != "")
          {
            $linkAtividade = $atividadeAtual['link_atividade'];
          }
          else if(isset($event['link_evento']) && trim($event['link_evento']) != "")
          {
            $linkAtividade = $event['link_evento'];
          }

          if(isset($atividadeAtual['link_inscricao_atividade']) && trim($atividadeAtual['link_inscricao_atividade']) != "")
          {
            $linkInscricaoAtividade = $atividadeAtual['link_inscricao_atividade'];
          }
          else if(isset($event['link_inscricao_evento']) && trim($event['link_inscricao_evento']) != "")
          {
            $linkInscricaoAtividade = $event['link_inscricao_evento'];
          }

        ?>
        
        <div class="mt-5">
          <div class="row">
            <div class="buttons">
              <a id="activityLink" href="<?= $linkAtividade ?>" target="_blank" class="btn btn-red mt-2 mb-2">Saiba mais aqui</a>
              <div>
                <span> &nbsp;&nbsp; ou &nbsp;&nbsp; </span>
              </div>
              <a id="subscribeLink" href="<?= $linkInscricaoAtividade ?>" target="_blank" class="btn btn-green mt-2 mb-2">Inscreva-se</a>
            </div>
          </div>
        </div>
        <?php break; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>


<!-- DataTables script -->
<script type="text/javascript" language="javascript" src="/assets/js/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="/assets/js/event/show.js"></script>