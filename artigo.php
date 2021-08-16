<?php
include 'head.php';
?>
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
                    $sql="SELECT e.cod_evento,e.nome_evento,e.descricao_evento,e.img_evento, eventos_atividades.nome_atividade,eventos_atividades.descricao_atividade, eventos_atividades.data_inicio, eventos_atividades.data_fim, eventos_atividades.link_atividade, eventos_atividades.link_inscricao_atividade, eventos_atividades.observacao_atividade, eventos_atividades.hora_inicio, eventos_atividades.hora_fim, eventos_atividades.preco_inscricao, nome_contato_ifsp,nome_empresa FROM `eventos`as e inner join eventos_atividades on e.cod_evento=eventos_atividades.cod_evento inner join eventos_atividades_contatos_ifsp on eventos_atividades_contatos_ifsp.cod_evento=e.cod_evento inner join contatos_ifsp on eventos_atividades_contatos_ifsp.cod_contato_ifsp=contatos_ifsp.cod_contato_ifsp inner join eventos_empresas on eventos_empresas.cod_evento=e.cod_evento inner join empresas on empresas.cod_empresa= eventos_empresas.cod_empresa inner join contatos_empresa on contatos_empresa.cod_empresa=empresas.cod_empresa group by e.cod_evento having e.nome_evento='$tittle'";
                    $result=$conn->query($sql);
                    
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                           
                            echo"<div class='informacoes-artigo'>
                            <h2>".$row['nome_evento']."</h2> 
                            <p>".$row['descricao_evento']."</p>
                            <img src=data:image/jpeg;base64,".base64_encode($row['img_evento'])."  alt='Logo'> 
                            <div class='atividades'>";
                        }}
                            ?>
                            <?php
                            
                             $sql2="SELECT papel_representante,area_contato_empresa,nome_contato_empresa,e.nome_evento,e.descricao_evento,e.img_evento, eventos_atividades.nome_atividade,eventos_atividades.descricao_atividade, eventos_atividades.data_inicio, eventos_atividades.data_fim, eventos_atividades.link_atividade, eventos_atividades.link_inscricao_atividade, eventos_atividades.observacao_atividade, eventos_atividades.hora_inicio, eventos_atividades.hora_fim, eventos_atividades.preco_inscricao, nome_contato_ifsp,nome_empresa FROM `eventos`as e inner join eventos_atividades on e.cod_evento=eventos_atividades.cod_evento inner join eventos_atividades_contatos_ifsp on eventos_atividades_contatos_ifsp.cod_evento=e.cod_evento inner join contatos_ifsp on eventos_atividades_contatos_ifsp.cod_contato_ifsp=contatos_ifsp.cod_contato_ifsp inner join eventos_empresas on eventos_empresas.cod_evento=e.cod_evento inner join empresas on empresas.cod_empresa= eventos_empresas.cod_empresa inner join contatos_empresa on contatos_empresa.cod_empresa=empresas.cod_empresa WHERE e.nome_evento='$tittle'";
                             $result=$conn->query($sql2);
                             
                             if($result->num_rows>0){
                                 while($row=$result->fetch_assoc()){
                                    $datatime=strtotime($row['data_inicio']);
                                    $dataformatada=date('d/m/y',$datatime);
                                    $datatime2=strtotime($row['data_fim']);
                                    $dataformatada2=date('d/m/y',$datatime2);
                                    $horatime=strtotime($row['hora_inicio']);
                                    $horaformatada=date('h:m',$horatime);
                                    $horatime2=strtotime($row['hora_fim']);
                                    $horaformatada2=date('h:m',$horatime2);
                                     echo
                            "<div class='atividades'>
                            <h3> ".$row['nome_atividade']." </h3>
                            <p>" .$row['descricao']."</p>
                            <p> " .$row['observacao_atividade']." </p>
                           
                            <p>Data: ".$dataformatada." as ".$dataformatada2."</p>
                            <p>horário: ".$horaformatada." as ".$horaformatada2."</p>

                            
                            ";
                            if($row['preco_inscricao']==0){
                            echo
                            "
                            <h4>Gratuito? Sim</h4>
                            <hr>
                            <h3>Dados da Empresa Organizadora</h3>
                            <p>Empresa: ".$row['nome_empresa']."<p>
                            <p>Representande da Empresa: ".$row['nome_contato_empresa']."</p>
                            <p>Papel do Representande da Empresa: ".$row['area_contato_empresa']."</p>
                            <p>Dados do Representante do IFSP</p>
                            <p>Nome do Representande: ".$row['nome_contato_ifsp']."</p>
                            <p>Papel do Representande: ".$row['Papel_representante']."</p>
                            <br>
                            <button id='botaosite'><a href='".$row['link_atividade']."' class='aab'>Site do Evento</a></button>
                            <button id='botaosite'><a href='".$row['link_inscricao_atividade']."' class='aab'>Site para Inscrição</a></button>
                            </div>
                            ";}
                            if($row['preco_inscricao']>0){
                                echo
                                "
                                <h4>Gratuito? Não</h4>
                                <h4>Preço de Inscrição: R$ ".$row['preco_inscricao']."</h4>
                                <hr>
                                <h3>Dados da Empresa Organizadora</h3>
                                <p>Empresa: ".$row['nome_empresa']."<p>
                                <p>Representande da Empresa: ".$row['nome_contato_empresa']."</p>
                                <p>Papel do Representande da Empresa: ".$row['area_contato_empresa']."</p>
                                <p>Dados do Representante do IFSP</p>
                                <p>Nome do Representande: ".$row['nome_contato_ifsp']."</p>
                                <p>Papel do Representande: ".$row['papel_representante']."</p>
                                <br>
                                <button id='botaosite'><a href='".$row['link_atividade']."' class='aab'>Site do Evento</a></button>
                                <button id='botaosite'><a href='".$row['link_inscricao_atividade']."' class='aab'>Site para Inscrição</a></button>
                                </div>
                                ";}
                        }
                    }
    
                        ?>
        </section>

    </body>
</html>