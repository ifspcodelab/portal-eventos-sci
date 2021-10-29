<link href="/assets/css/event/index.css" rel="stylesheet" type="text/css" >

<?php
  $currentPage = 1;
  $maxPages = 0;

  if(isset($data["current_page"]) && $data["current_page"] > 0){
    $currentPage = $data["current_page"];
  }

  if(isset($data["max_pages"]) && $data["max_pages"] > 0){
    $maxPages = $data["max_pages"];
  }
?>


<!-- Adicionar novo evento -->
<!-- Acesso restrito ao Admnistrador -->
<div class="container my-4 d-flex justify-content-end">
  <a href="../../event/create" role="button" class="btn btn-outline-light d-flex align-items-center shadow-sm bg-white">
    <span class="text-dark">Novo Evento</span> 
    <i class="icon-Add-New text-success"></i>
  </a>
</div>


<!-- Listagem de eventos -->
<main class="flex-shrink-0">
  <div class="container d-flex justify-content-between">
  <aside class="calendar">

  </aside>
  <section class="event-list mb-5">
  <?php foreach ($data['events'] as $event): ?>
    <div class="events">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-5">
            <figure class="figure mb-0 w-100 d-flex align-items-center justify-content-center">
            <img src="<?= $event['img_evento'] ?>"  alt="Banner Evento <?= $event['nome_evento'] ?>" class="figure-img img-fluid rounded-3 ">
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
                <a class="btn btn-red" href="../../event/show/<?= $event['cod_evento'] ?>">Detalhes</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Pagination Button -->
  <nav>
    <ul class="pagination justify-content-center">
      <?php if($currentPage > 1): ?>
      <li class="page-item">
        <a class="page-link" href="../../event/index/<?=($currentPage - 1)?>" aria-label="Previous" id="prev">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php endif; ?>

      <?php for($i = 1; $i <= $maxPages; $i++): ?>
      <li class="page-item">
        <a class="page-link" href="../../event/index/<?=$i?>"> 
          <?=$i?>
        </a>
      </li>
      <?php endfor; ?>

      <?php if($currentPage < $maxPages): ?>
      <li class="page-item">
        <a class="page-link" href="../../event/index/<?=($currentPage + 1)?> " aria-label="Next" id="next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
      <?php endif; ?>

    </ul>
  </nav>
  </section>
</div>
</main>
