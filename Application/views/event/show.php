<!-- Descrição dos Eventos -->
<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

        <table class="table">
          <thead>
            <tr>
            <th scope="col">Código</th>
              <th scope="col">Nome</th>
              <th scope="col">Período</th>
              <th scope="col">Descrição</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($data['events'] as $event) { ?>
            <tr>
              <td><?= $event['cod_evento'] ?></td>
              <td><?= $event['nome_evento'] ?></td>
              <td><?= $event['periodo_evento'] ?></td>
              <td><?= $event['descricao_evento'] ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
</main>