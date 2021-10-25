// $(document).ready(function() {
//     $('#activities').DataTable();
// });

// const acitivitiesData = {
//     externalName:           document.getElementById('externalName').innerHTML,
//     externalOffice:         document.getElementById('externalOffice').innerHTML,
//     externalAssociation:    document.getElementById('externalAssociation').innerHTML,
//     internalName:           document.getElementById('internalName').innerHTML,
//     internalOffice:         document.getElementById('internalOffice').innerHTML,
//     internalAssociation:    document.getElementById('internalAssociation').innerHTML,
//     activityLink:           document.getElementById('activityLink').href,
//     subscribeLink:          document.getElementById('subscribeLink').href
// }

// console.log(acitivitiesData.externalName)
// console.log(acitivitiesData.externalOffice)
// console.log(acitivitiesData.externalAssociation)
// console.log(acitivitiesData.internalName)
// console.log(acitivitiesData.internalOffice)
// console.log(acitivitiesData.internalAssociation)
// console.log(acitivitiesData.activityLink)
// console.log(acitivitiesData.subscribeLink)

// var eventFired = function ( type ) {
//     var detail = document.querySelector('#activities_detail');
//     acitivitiesData.externalName = '<?=' + "$event['nome_atividade']" + '?>'
//     detail.innerHTML = '<div>' + type + ' event - ' + acitivitiesData.externalName + '</div>';
//     var btnSection = `<div class="mt-5">
//         <div class="row">
//             <div class="buttons">
//                 <a href="<?= $event['link_atividade'] ?>" target="_blank" class="btn btn-red mt-2 mb-2">Saiba mais aqui</a>
//                 <div>
//                     <span> &nbsp;&nbsp; ou &nbsp;&nbsp; </span>
//                 </div>
//                 <a href="<?= $event['link_inscricao_atividade'] ?>" target="_blank" class="btn btn-green mt-2 mb-2">Inscreva-se</a>
//             </div>
//         </div>
//     </div>`
// }
  
// document.addEventListener('DOMContentLoaded', function () {
//     let table = new DataTable('#activities');
  
//     document
//       .querySelector('#activities tbody')
//       .addEventListener('click', function (e) {
//         var data = table.row( e.target ).data();
          
//         eventFired( 'You clicked on ' + data[0] + '\'s row' );
//       });
// });