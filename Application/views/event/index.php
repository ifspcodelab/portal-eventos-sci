<section class="bg-green mb-5">
  <div class="container text-light ">
  <div class="row mb-0">
    <div class="col-sm d-flex align-items-center">
      <div class="row">
        <h1 class="fw-bold mt-3"> Seja bem vindo ao 
              Portal de Eventos da SCI!
        </h1>
        <p class="my-4"> Acompanhe as novidades sobre os próximos eventos por aqui!</p>
      </div> 
    </div>

    <div class="col-sm">
      <figure class="figure mb-0">
        <img src="https://blush.design/api/download?shareUri=91VgbBNkK2S0wONH&c=Skin_0%7E583318-0.1%7Ef7d3bb-0.2%7Ef7d3bb-0.3%7E8d574d-0.4%7E583318&w=800&h=800&fm=png" alt="Cool Kids by Irene Falgueras on Blush" class="figure-img img-fluid mb-0">
        </figure>
    </div>

  </div>  
  </div>
</section>

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