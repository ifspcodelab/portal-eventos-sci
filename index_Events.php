<?php
include 'head.php';
?>
<!-- testpage1 -->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<header>
			<img src="imagens/LogoIF.png" alt="logo">
			<h1>Eventos - IFSP </h1>
			<div id="contato">
		
					<img src="imagens/logoinstagram.png" alt="Instagramlogo">
					<a href="#instagram">Instagram</a>
			</div>
			<hr>
			
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
                <article id='article-info'>
                    <?php
                    $sql="SELECT periodo_evento,eventos.cod_evento, eventos.nome_evento, eventos.descricao_evento, eventos.img_evento, eventos_atividades.cod_evento, eventos_atividades.data_inicio from eventos inner join eventos_atividades on eventos.cod_evento=eventos_atividades.cod_evento group by eventos.cod_evento order by eventos_atividades.data_inicio desc limit 2";
					$result=$conn->query($sql);
					$nome=null;
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
                            </div>";
             		   }
            		}
					?>
						
				</article>
				<button class="button" id="carregar">Mostrar Mais</button>
			</section>
        <main>
		<script>
    $(document).ready(function(){
		var cont=2;
        $("#carregar").click(()=>{
			cont+=1;
			$("#article-info").load("carregar.php",{
				newc:cont
			});
		});		
		})  
</script>

