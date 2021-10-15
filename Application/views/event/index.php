<!-- Adicionar novo evento -->
<!-- Acesso restrito ao Admnistrador -->
<div class="container mb-4 d-flex justify-content-end">
  <a href="#" role="button" class="btn btn-outline-light d-flex align-items-center shadow-sm border-secondary">
    <span class="text-dark">Novo Evento</span> 
    <i class="icon-Add-New text-success"></i>
  </a>
</div>


<!-- Listagem de eventos -->
<main class="flex-shrink-0">
  <div class="container d-flex justify-content-between">
  <aside class="calendar">

  </aside>
  <section class="event-list mb-5 ">
  <?php foreach ($data['events'] as $event) { ?>
    <div class="events">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-5">
            <figure class="figure mb-0 w-100 d-flex align-items-center">
            <img src="data:image/;base64,<?= base64_encode($event['img_evento']) ?>"  alt="Banner Evento <?= $event['nome_evento'] ?>" class="figure-img img-fluid rounded-3 ">
            </figure>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title"><?= $event['sigla_evento'] ?> - <?= $event['nome_evento'] ?></h5>
              <p class="card-text"><?= $event['descricao_evento'] ?></p>
              <div class="card-details">
                <div>
                  <i class="icon-Calendar"></i>
                  <p><?= $event['periodo_evento'] ?></p>
                </div>
                <a class="btn btn-red" href="../event/show/<?= $event['cod_evento'] ?>">Detalhes</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }?>

  <div class="col-5 mx-auto mb-5 d-flex justify-content-center">
        <button class="btn btn-green" type="button" id="load">Mostrar mais</button>
    </div>
  </section>
</div>
</main>



