$(document).ready(function() {
    $('#activities').DataTable();
});

var eventFired = function ( type ) {
    var detail = document.querySelector('#activities_detail');
    detail.innerHTML = '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
    var btnSection = `<div class="mt-5">
        <div class="row">
            <div class="buttons">
                <a href="<?= $event['link_atividade'] ?>" target="_blank" class="btn btn-red mt-2 mb-2">Saiba mais aqui</a>
                <div>
                    <span> &nbsp;&nbsp; ou &nbsp;&nbsp; </span>
                </div>
                <a href="<?= $event['link_inscricao_atividade'] ?>" target="_blank" class="btn btn-green mt-2 mb-2">Inscreva-se</a>
            </div>
        </div>
    </div>`
}
  
document.addEventListener('DOMContentLoaded', function () {
    let table = new DataTable('#activities');
  
    document
      .querySelector('#activities tbody')
      .addEventListener('click', function (e) {
        var data = table.row( e.target ).data();
          
        eventFired( 'You clicked on ' + data[0] + '\'s row' );
      });
});