<?php
include 'head.php';
?>
<!-- show.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Retrospect by TEMPLATED</title>
    </head>

    <body style="background-color: #195128">
    <header>
        <a href="testpage1.php">
			<img src="imagens/LogoIF.png" alt="logo">
        </a>
			<h1>Eventos - IFSP </h1>
			<div id="contato">
		
					<img src="imagens/logoinstagram.png" alt="Instagramlogo">
					<a href="#instagram">Instagram</a>
			</div>
			<hr>
			
		</header>

        <section id="artigo">
        <?php
                    $tittle=$_GET['tittle'];
                    $sql="SELECT texto_noticia,titulo,data_noticia,link_noticia,img,descricao_noticia, nome_atividade FROM `eventos_atividades_noticias` inner join eventos_atividades on eventos_atividades.cod_atividade=eventos_atividades_noticias.cod_atividade WHERE titulo='$tittle'";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $datatime=strtotime($row['data_noticia']);
                            $dataformatada=date('d/m/y',$datatime);
                            echo"<div class='informacoes-artigo'>
                            <h2>".$row['titulo']."</h2>
                            <p>".$row['descricao_noticia']."</p>
                            <img src=data:image/jpeg;base64,".base64_encode($row['img'])."  alt='Logo'> 
                            <p>".$row['texto_noticia']."</p>
                            <h5>".$dataformatada."</h5>
                            <h3>Atividade correspondente:".$row['nome_atividade']."</h3>
                            <button id='botaosite'><a href=".$row['link_noticia']." class='aab'>Site da Notícia</a></button>
                            </div>
                            ";
                        }
                    }
    
                    ?>
                    
        </section>

    </body>
</html>
