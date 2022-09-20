<?php 
    
if(isset($_GET['content_adm'])) {
    
    switch($_GET['content_adm']) { 
        //Crud perfil (ADM)
                case 'perfil':
                    include "base/crud/admin/perfil/view_adm.php";
                    break;
                
                case 'edit':
                    include "base/crud/admin/fedita_adm.php";
                    break;
                
                case 'atualiza':
                    include "base/crud/admin/atualiza_adm.php";
                    break;
        
        //Crud CURSOS (ADM)
                case 'lista_cur':
                    include "base/crud/admin/cursos/lista_cur.php";
                    break;

                case 'add_cur':
                    include "base/crud/admin/cursos/fadd_cur.php";
                    break;

                case 'insere_cur':
                    include "base/crud/admin/cursos/insere_cur.php";
                    break;

                case 'view_cur':
                    include "base/crud/admin/cursos/view_cur.php";
                    break;

                case 'edit_cur':
                    include "base/crud/admin/cursos/fedita_cur.php";
                    break;

                case 'atualiza_cur':
                    include "base/crud/admin/cursos/atualiza_cur.php";
                    break;

                case 'delete_cur':
                    include "base/crud/admin/cursos/excluir_cur.php";
                    break;

        //Crud Módulo (ADM)
                case 'lista_mod':
                    include "base/crud/admin/modulo/lista_mod.php";
                    break;

                case 'add_mod':
                    include "base/crud/admin/modulo/fadd_mod.php";
                    break;

                case 'insere_mod':
                    include "base/crud/admin/modulo/insere_mod.php";
                    break;

                case 'view_mod':
                    include "base/crud/admin/modulo/view_mod.php";
                    break;

                case 'edit_mod':
                    include "base/crud/admin/modulo/fedita_mod.php";
                    break;

                case 'atualiza_mod':
                    include "base/crud/admin/modulo/atualiza_mod.php";
                    break;

                case 'delete_mod':
                    include "base/crud/admin/modulo/excluir_mod.php";
                    break;

        //Crud Aulas (ADM)
                case 'lista_aula':
                    include "base/crud/admin/aulas/lista_aula.php";
                    break;

                case 'add_aula':
                    include "base/crud/admin/aulas/fadd_aula.php";
                    break;

                case 'insere_aula':
                    include "base/crud/admin/aulas/insere_aula.php";
                    break;

                case 'view_aula':
                    include "base/crud/admin/aulas/view_aula.php";
                    break;

                case 'edit_aula':
                    include "base/crud/admin/aulas/fedita_aula.php";
                    break;

                case 'atualiza_aula':
                    include "base/crud/admin/aulas/atualiza_aula.php";
                    break;

                case 'delete_aula':
                    include "base/crud/admin/aulas/excluir_aula.php";
                    break;


        //Crud Consulta 
                    //Aluno
                case 'consulta_alu':
                    include "base/crud/admin/consulta/cons_alu.php";
                    break;
                    //Adm
                case 'consulta_adm':
                    include "base/crud/admin/consulta/cons_adm.php";
                    break;

        //Crud Avaliação 
                
                case 'lista_av':
                    include "base/crud/admin/avaliacoes/lista_av.php";
                    break;
}       
}  
else {
    include "base/dashboard/usu_content/adm/default_adm.php"; 
}
 
?>