<div class="movies-list">
    <ul>
        {foreach from=$movies item=movie}
            <li>
                <div class="card" style="width: 18rem">
                    <img src="{$movie["imagen"]}" class="card-img" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{$movie["nombre"]}</h5>
                      <a href="/WEB/TPE-Movies/movies/{$movie["id_peliculas"]}" class="btn btn-primary">See Comments</a>
                    </div>
                </div>
            </li>
        {/foreach}
    </ul>
</div>
<form action="add" method="post">
    <input type="text " name="nombre" value="Nombre">
    <input type="text " name="imagen" value="Imagen">
    <input type="text " name="descripcion" value="Descripcion">
    <input type="text " name="puntaje" value="Puntaje">
    <input type="submit" value="Subir">
</form>

