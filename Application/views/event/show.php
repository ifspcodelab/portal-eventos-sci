<!-- Descrição dos Eventos -->
<main>
  <div class="container mt-5 mb-5 event-show">
    <div>
      <?php foreach ($data['events'] as $event) : ?>
      <div class="event-info">
        <div class="col-sm text">
          <div class="row">
            <h2><?= $event['sigla_evento'] ?> - <?= $event['nome_evento'] ?></h2>
          </div>
          <div class="row">
            <p><?= $event['descricao_evento'] ?></p>
          </div>
        </div>
        <div class="col-sm event-show banner">
          <div class="card">
            <img src="data:image/;base64,<?= base64_encode($event['img_evento']) ?>"  alt="Banner Evento <?= $event['nome_evento'] ?>" class="rounded-3">
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
                <th class="col-1 th-icons"><i class="icon-Event-Accepted"></i></th>
                <th class="col-1 th-icons"><i class="icon-Clock"></i></th>
                <th class="col-3"><span><i class="icon-Search"></i> Atividade</span></th>
                <th class="col-3"><span><i class="icon-New-Document"></i> Descrição</span></th>
                <th class="col-3"><span><i class="icon-Note"></i> Observação</span></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['events'] as $event) { ?>
              <tr>
                <td class="th-icons"><?= date("d/m/Y", strtotime($event['data_inicio'])) ?></td>
                <td class="th-icons"><?= date("H:i", strtotime($event['hora_inicio'])) ?> - <?= date("H:i", strtotime($event['hora_fim'])) ?></td>
                <td><?= $event['nome_atividade'] ?> - <span><?= $event['preco_inscricao'] == 0.00 ? 'Gratuito' : 'R$ ' . number_format($event['preco_inscricao'], 2, ',', '.') ?></span></td>
                <td><?= $event['descricao_atividade'] ?></td>
                <td><?= $event['observacao_atividade'] ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td class="th-icons">13/10/2021</td>
                <td class="th-icons">14:00</td>
                <td>Apresentação</td>
                <td>Teste teste</td>
                <td>Análise</td>
              </tr>
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
                    <h5>João</h5>
                  </div>
                  <div class="row">
                    <p>Gerente de atividades externas</p>
                  </div>
                  <div class="row">
                    <p>JA - Junior Achivement</p>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <img src="../../assets/img/circle green.png" alt="">
                <div>
                  <div class="row">
                    <h5>Antonio</h5>
                  </div>
                  <div class="row">
                    <p>Organizador</p>
                  </div>
                  <div class="row">
                    <p>IFSP - Câmpus São Paulo</p>
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
                  <p>Evento Pago: R$ 10,00</p>
                </div>
              </div>
              <div class="col-sm">
                <i class="icon-Calendar"></i>
                <div class="row d-flex align-items-center">
                  <p>25/03/2021 a 26/03/2021</p>
                </div>
              </div>
              <div class="col-sm">
                <i class="icon-Clock"></i>
                <div class="row d-flex align-items-center">
                  <p>Das 14:15 às 15:15</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5">
          <div class="row">
            <div class="buttons">
              <a href="<?= $event['link_atividade'] ?>" target="_blank" class="btn btn-red mt-2 mb-2">Saiba mais aqui</a>
              <div>
                <span> &nbsp;&nbsp; ou &nbsp;&nbsp; </span>
              </div>
              <a href="<?= $event['link_inscricao_atividade'] ?>" target="_blank" class="btn btn-green mt-2 mb-2">Inscreva-se</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>