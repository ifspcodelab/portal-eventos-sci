<!-- Listagem de eventos -->
<main class="flex-shrink-0">
  <div class="container">
  <aside class="calendar">

  </aside>
  <section class="event-list mb-5">
  <?php foreach ($data['events'] as $event) { ?>
    <div class="events">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-5">
          <img src="data:image/;base64,<?= base64_encode($event['img_evento']) ?>"  alt="Banner Evento <?= $event['nome_evento'] ?>" class="rounded-3">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title"><?= $event['nome_evento'] ?> - <?= $event['sigla_evento'] ?></h5>
              <p class="card-text"><?= $event['descricao_evento'] ?></p>
              <div class="card-details">
                <div>
                  <i class="icon-Calendar"></i>
                  <p><?= $event['periodo_evento'] ?></p>
                </div>
                <a class="btn btn-red" href="#">Detalhes</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
  </section>
</div>
</main>