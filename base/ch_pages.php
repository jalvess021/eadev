<?php 
    if(isset($_GET['page'] )){
        switch($_GET['page']){

            // Dashboard //
            case 'plataforma':
                include "plataforma.php";           
                break;
                
            //LOGIN
            case 'login':
                include "base/login.php";
                break;

            //CADASTRO
            case 'cadastro':
                include "base/cad.php";
                break;
                
            //Validação 
            case 'validacao':
                include "validacao.php";  
                break;  

            //Config (Conexao Com o Banco de Dados)
            case 'config':
                include "base/crud/config.php";  
                break;  

            //Config (Conexao Com o Banco de Dados)
            case 'nav':
                include "base/crud/nav.php";  
                break;       
            
            case 'logout':
                include "logout.php";
                break;

            //Insere os dados do Aluno no banco de dados (CADASTRO)
            case 'insere_alu':
                include "base/crud/aluno/insere_alu.php";
                break;

                case 'validacao_certificado':
                    include "validacao_cert.php";
                    break;
    }
} 

    //Se não houver valor no page, ele inclui a tela inicial.
    else {
        //include "inicial.php";
        include "base/login.php";
}

?>

