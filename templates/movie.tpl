<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="./../{$movie["imagen"]}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{$movie["nombre"]}</h5>
        <p class="card-text">Description: {$movie["descripcion"]}</p>
        <p class="card-text">Valoration: {$movie["id_puntaje"]}</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      </div>
    </div>
  </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Puntaje</th>
        <th scope="col">Comentario</th>
      </tr>
    </thead>
    <tbody id="comments-container" data-id={$movie["id_peliculas"]}>
    </tbody>
</table> 
<div>
  <form action="comentar" method="post" class="formulario">
    <h3>Comentario
      <input type="text " name="comentario" value="">
    </h3>
    <h3>Puntajes
      <input type="text " name="puntaje" value="">
    </h3>
    <h3>Usuario
      <input type="text " name="usuario" value="">
    </h3>
    <input type="submit" value="Comentar">
  </form>
</div>
</div>
 
{literal}
 
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.3/handlebars.js"></script>
  <script>
    var templateComentarios;
    window.onload = function() {
    LoadComments() 
}

function LoadComments(){
    console.log(window.location);
    console.log(document.getElementById("templatex").innerHTML)
      let templa = document.getElementById("templatex").innerHTML
      
      templateComentarios = Handlebars.compile(templa);
      GetComments();
      }
    
    

function ShowComments(jsonComments) {
      let context = {comentarios:jsonComments}
      console.log(context)
      let html = templateComentarios(context);
      
      document.getElementById("comments-container").innerHTML = html;
      console.log(document.getElementById("comments-container"))
          
  }
function GetComments(){
    let id = document.getElementById("comments-container").getAttribute("data-id")

    fetch("http://localhost/WEB/TPE-Movies/api/comments/"+id)
    .then(response => {     
        return response.json()
    })
    .then(jsonComentarios => {
        let newjson = [];
        let ids
        let jn
        for (var i = 0; i < jsonComentarios.length; i++){
          
          ids = jsonComentarios[i].id_usuario
          console.log(ids);
          jn = jsonComentarios[i]; 
          fetch("http://localhost/WEB/TPE-Movies/api/user/"+ids)
        .then(response => {     
            return response.json()            
        }).then(json => {    
           return json[0]             
        }).then(jsonsito => {    
           return jsonsito.nombreUsuario             
        }).then(na => {
          let newa = {...jn,"nombre":na}   
           newjson.push(newa);
           
         
        })
        }
        console.log(newjson);
        ShowComments(newjson);  
        })
      }

      </script>
      <script type="text/x-handlebars-template" id="templatex">
      <p>{{comentarios.puntaje}}</p>
    {{#each comentarios}}
      <tr>
        <td>{{id_usuario}}</td>
        <td>{{puntaje}}</td>
        <td>{{comentario}}</td>
      </tr>
    {{/each}}
  </script>
  
{/literal}    