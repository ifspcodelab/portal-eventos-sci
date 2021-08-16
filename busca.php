<?php
include 'head.php';
?>
<header>
            <a href="testpage1.php">
                <img src="imagens/LogoIF.png" alt="logo">
            </a>
			<h1>Eventos - IFSP </h1>
			<div id="contato">
				<ul>
					<li><img src="imagens/logoinstagram.png" alt="Instagramlogo"></li>	
					<li><a href="#instagram">Instagram</a></li>
				</ul>
			</div>
			<hr>
			<!-- <a href="#nav">Menu</a> -->
			
		</header>

		<nav id="funcoes">
         	<ul>
                <li><button class="button">Eventos</button></li>
				<li><a href="testpage2.php"><button class="button">Noticias</button></a></li>
				<li><a href="testpage3.php"><button class="button">Sobre eventos SCI</button></a></li>
				<!-- <li><a href="#contato">Contato</a></li> -->
         	</ul>
	  	</nav>
	  
	 
		<main>
			<nav id="barra-de-pesquisa">
				<form action="busca.php" method="POST">
				<button id="Psqbutton" name="botao">Buscar</button>
				<input type="text" id="barrapesq" name="pesquisa" placeholder="digite aqui o evento que deseja pesquisar">
				</form>
            </nav>
            <section>
                <article>
                <?php
                $search=$_POST['pesquisa'];
                $sql="SELECT  eventos.cod_evento, nome_evento, descricao_evento, img_evento, periodo_evento,data_inicio from eventos inner join eventos_atividades on eventos.cod_evento=eventos_atividades.cod_evento group by eventos.cod_evento,eventos_atividades.cod_evento having nome_evento like '%$search%' or descricao_evento like '%$search%' or eventos_atividades.data_inicio like '%$search%' or periodo_evento like '%$search%' order by eventos_atividades.data_inicio desc";
                    $result=$conn->query($sql);

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
                    else{
                        echo"Sem Resultados encontrados";
                    }
    
                    ?>
                </article>
            </section>
        <main>