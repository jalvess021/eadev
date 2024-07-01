TCC 2022 (Trabalho de conclusão de curso) - E.M Técnico (FAETEC/ETEOT)

<h1> Sistema <strong>EADev<strong></h1>
<h3> Sobre o projeto:</h3>
<p> Desenvolvi uma plataforma Ead completa com <strong>PHP</strong> puro (S/ Frameworks), onde conta com dois tipos de acesso: </p>
- <strong> Alunos: </strong> Conseguem acessar e assistir as vídeo-aulas, realizar avaliações, fazer o pagamento (PIX - QrCode), adquirir certificado e acompanhar seu progresso (gráficos e estatísticas);
- <strong> Administradores: </strong> Fazem o controle (Atividades de LOG, Relatório em PDF, Análise de gráficos) e gerenciam/manipulam (Avaliações, conteúdos, etc) da plataforma.

------------------------------------------------

- Nome: EADEV

- Uma Plataforma Ead (Ensino à distância) voltado para área de desenvolvimento web.

- Tecnologias utilizadas: PHP,
Javascript, MySQL, AJAX, APIs (Ex: PIX p/ realização de pagamentos, Charts
para exibição e controle com gráficos), Bibliotecas (Ex: Bootstrap, JQuery,
DomPdf para relatórios e Mpdf para gerar QrCodes), gerenciador de
dependências para PHP (Ex: Composer), entre outras tecnologias.

          
     
<h1> Membros da equipe/funções:</h1>
  
- João Alves (Líder) -> <a href='https://github.com/jalvess021'> @jalvess021 </a> | 🛠 Full-Stack
          
- Mateus de Azevedo -> <a href='https://github.com/Teuzin02'> @Teuzin02 </a> | 👨‍💻 Front-End

- Ingrid Rangel -> <a href='https://github.com/#'> @ingrid </a> | 💻 Content Management System (Wordpress) 
  
- Allanis Castilho -> <a href='https://github.com/allaniscr'> @allaniscr </a> | 📝 Documentação

- Matheus Ferreira -> <a href='https://github.com/teagaF'> @teagaF </a> | 🖇 Modelagem de Dados 


## Como rodar o projeto:

### Passo a passo:

```bash
# Clonar o repositório
git clone https://github.com/jalvess021/eadev.git

# Entrar no diretório do projeto
cd eadev

# Instalar as dependências com Composer (Os pacotes necessários já estão na pasta `vendor` do projeto e não precisam ser instalados novamente)
composer install

# Iniciar os containers Docker
docker-compose up -d

# Copiar o arquivo SQL para o container MySQL e importar o banco de dados
docker cp eadev-app:/var/www/html/eadev/docs/eadev.sql /tmp/eadev.sql
# Caso necessário troque o user(-uSeuUsuario) e o password(-pSuaSenha) do seu Banco de Dados.
docker exec -i mysql-container mysql -uroot -pSenha@1234  < /tmp/eadev.sql
```

### Abra seu navegador e digite o seguinte endereço:

```bash
http://localhost:8080/eadev
```