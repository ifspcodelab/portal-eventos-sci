<?php
include 'conect.php';
// carregar do evento
    $newc=$_POST['newc'];
                    $sql="SELECT eventos.cod_evento, nome_evento, descricao_evento, img_evento, periodo_evento, data_inicio from eventos inner join eventos_atividades on eventos.cod_evento=eventos_atividades.cod_evento group by eventos.cod_evento order by eventos_atividades.data_inicio desc limit  $newc";
					$result=$conn->query($sql);
                    $id=0;
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
							$datatime=strtotime($row['data_inicio']);
                            $dataformatada=date('d/m/y',$datatime);
                            echo"<div id='artigoloading'>
                            <a href='artigo.php?tittle=".$row['nome_evento']."'>
                            <img src=data:image/jpeg;base64,".base64_encode($row['img_evento'])."  alt='Logo'> 
                            <div class='texto'>
                            <h2>".$row['nome_evento']."</h2>
                            <p>".$row['descricao_evento']."</p>
                            <h5>".$row["periodo_evento"]."</h5>
							<h5>".$dataformatada."</h5>
                            </div>
                            </a>
                            </div>
                            ";
                      
                        }      
                    }
?>