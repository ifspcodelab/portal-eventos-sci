<?php
include 'conect.php';
// carregar da noticia

    $newc=$_POST['newc'];
                    $sql="select * from eventos_atividades_noticias order by data_noticia desc limit $newc";
					$result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $datatime=strtotime($row['data_noticia']);
                            $dataformatada=date('d/m/y',$datatime);
                            echo"<div id='artigoloading'>
                            <a href='artigo2.php?tittle=".$row['titulo']."'>
                            <img src=data:image/jpeg;base64,".base64_encode($row['img'])."  alt='Logo'> 
                            <div class='texto'>
                            <h2>".$row['titulo']."</h2>
                            <p>".$row['descricao_noticia']."</p>
                            <h5>".$row["periodo_noticia"]."</h5>
                            <h5>".$dataformatada."</h5>
                            </div>
                            </a>
                            </div>
                            ";
                        }
                    }
?>