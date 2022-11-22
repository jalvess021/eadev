<?php 
    
if(isset($_GET['content_alu'])) {
    
    switch($_GET['content_alu']) { 

        //Crud Perfil (ALUNO)
                case 'perfil':
                    include "base/crud/aluno/view_alu.php";
                    break; 
            
                case 'edit':
                    include "base/crud/aluno/fedita_alu.php";
                    break;
                
                case 'atualiza':
                    include "base/crud/aluno/atualiza_alu.php";
                    break; 

                case 'conteudo':
                    include "base/dashboard/usu_content/alu/conteudo/conteudo.php";
                    break; 

                case 'curso':
                    include "view_cur_alu/view_curso.php";
                    break; 

                case 'avaliacoes':
                    include "base/dashboard/usu_content/alu/avaliacao/default.php";
                    break; 

                case 'emissao_certificado':
                    include "base/dashboard/usu_content/alu/emissao/emissao.php";
                    break;
}       
}  
else {
    include "base/dashboard/usu_content/alu/default_alu.php"; 
}
 
?>