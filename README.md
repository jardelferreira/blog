<h1>API Básica de um Blog</h1>
<br>
<h3>Rotas</h3>

<table class="table">
    <thead>
        <tr>
            <th>AÇÃO</th>
            <th>VERBO</th>
            <th>URI</th>
            <th>PARAMETROS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">LISTA TODOS OS AUTHORES</td>
            <td>GET</td>
            <td>api/authors</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">BUSCAR AUTOR POR id</td>
            <td>GET</td>
            <td>api/authors/{author}</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">CADASTAR AUTOR</td>
            <td>POST</td>
            <td>api/authors</td>
            <td>{"name": (string,55), "email":(string,30)}</td>
        </tr>
        <tr>
            <td scope="row">ATUALIZAR AUTOR</td>
            <td>PUT</td>
            <td>api/authors/{author}</td>
            <td>{"name": (string,55), "email":(string,30)}</td>
        </tr>
        <tr>
            <td scope="row">ARTIGOS DE UM AUTOR</td>
            <td>GET</td>
            <td>api/authors/{author}/articles</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">CADASTRO DE ARTIGO</td>
            <td>POST</td>
            <td>api/articles</td>
            <td>{"title": (string,75),"content": longtext,"author_id": foreign id author}</td>
        </tr>
        <tr>
            <td scope="row">LISTAR ARTIGOS</td>
            <td>GET</td>
            <td>api/articles</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">LISTAR UM ARTIGO</td>
            <td>GET</td>
            <td>api/articles/{article}</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">LISTAR COMENTÁRIOS DE UM ARTIGO</td>
            <td>GET</td>
            <td>api/articles/{article}/comments</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">REMOÇÃO DE ARTIGO</td>
            <td>DELETE</td>
            <td>{article}/author/{author}</td>
            <td>{ARTICLE.AUTHOR_ID === AUTHOR.ID}</td>
        </tr>
        <tr>
            <td scope="row">ATUALIZAÇÃO DE ARTIGO</td>
            <td>PUT</td>
            <td>api/articles/{article}</td>
            <td>{"title": (string,75),"content": longtext,"author_id": foreign id author, (this id has to be the same as the author_id)}</td>
        </tr>
        <tr>
            <td scope="row">LISTAR UM COMENTÁRIO</td>
            <td>GET</td>
            <td>api/comment/{comment}</td>
            <td>null</td>
        </tr>
        <tr>
            <td scope="row">CADASTRO DE COMENTÁRIO</td>
            <td>POST</td>
            <td>api/articles/{article}/comment</td>
            <td>{"grade": (integer,nullable),"comment": (string,255),"article_id": foreign id article}</td>
        </tr>
        <tr>
            <td scope="row">ATUALIZAR DE COMENTÁRIO</td>
            <td>PUT</td>
            <td>api/comment/{comment}</td>
            <td>{"grade": (integer,nullable),"comment": (string,255),"article_id": foreign id article}</td>
        </tr>
    </tbody>
</table>