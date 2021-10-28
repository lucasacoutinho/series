<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">
    <script src="{{ asset("vendor/scribe/js/theme-default-3.12.1.js") }}"></script>

    <link rel="stylesheet"
          href="//unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="//unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <script src="//cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.12.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: October 28 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://series.test</code></pre>

        <h1>Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="categoria">Categoria</h1>

    

            <h2 id="categoria-GETapi-categorias">Listar categorias</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-categorias">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categorias" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-GETapi-categorias">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-categorias" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categorias"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categorias"></code></pre>
</span>
<span id="execution-error-GETapi-categorias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categorias"></code></pre>
</span>
<form id="form-GETapi-categorias" data-method="GET"
      data-path="api/categorias"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categorias', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categorias"
                    onclick="tryItOut('GETapi-categorias');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categorias"
                    onclick="cancelTryOut('GETapi-categorias');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categorias" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categorias</code></b>
        </p>
                    </form>

            <h2 id="categoria-POSTapi-categorias">Criar categoria</h2>

<p>
</p>

<p>Cria uma nova categoria</p>

<span id="example-requests-POSTapi-categorias">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/categorias" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"hentai\",
    \"slug\": \"aliquid\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "hentai",
    "slug": "aliquid",
    "status": "disponivel"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-categorias">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-POSTapi-categorias" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-categorias"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categorias"></code></pre>
</span>
<span id="execution-error-POSTapi-categorias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categorias"></code></pre>
</span>
<form id="form-POSTapi-categorias" data-method="POST"
      data-path="api/categorias"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categorias', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-categorias"
                    onclick="tryItOut('POSTapi-categorias');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-categorias"
                    onclick="cancelTryOut('POSTapi-categorias');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-categorias" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categorias</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>titulo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="titulo"
               data-endpoint="POSTapi-categorias"
               value="hentai"
               data-component="body" required  hidden>
    <br>
<p>Titulo da categoria. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="POSTapi-categorias"
               value="aliquid"
               data-component="body" required  hidden>
    <br>

        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="status"
               data-endpoint="POSTapi-categorias"
               value="disponivel"
               data-component="body" required  hidden>
    <br>
<p>Status da categoria. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
        </p>
        </form>

            <h2 id="categoria-GETapi-categorias--id-">Detalhar categoria</h2>

<p>
</p>

<p>Retorna os dados da categoria</p>

<span id="example-requests-GETapi-categorias--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categorias/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-GETapi-categorias--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Categoria] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-categorias--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categorias--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categorias--id-"></code></pre>
</span>
<span id="execution-error-GETapi-categorias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categorias--id-"></code></pre>
</span>
<form id="form-GETapi-categorias--id-" data-method="GET"
      data-path="api/categorias/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categorias--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categorias--id-"
                    onclick="tryItOut('GETapi-categorias--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categorias--id-"
                    onclick="cancelTryOut('GETapi-categorias--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categorias--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categorias/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-categorias--id-"
               value="13"
               data-component="url" required  hidden>
    <br>
<p>The ID of the categoria.</p>
            </p>
                    </form>

            <h2 id="categoria-PUTapi-categorias--id-">Atualizar categoria</h2>

<p>
</p>

<p>Atualiza os dados da categoria</p>

<span id="example-requests-PUTapi-categorias--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/categorias/20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"hentai\",
    \"slug\": \"ut\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/20"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "hentai",
    "slug": "ut",
    "status": "disponivel"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-categorias--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Categoria] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-PUTapi-categorias--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-categorias--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-categorias--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-categorias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-categorias--id-"></code></pre>
</span>
<form id="form-PUTapi-categorias--id-" data-method="PUT"
      data-path="api/categorias/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-categorias--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-categorias--id-"
                    onclick="tryItOut('PUTapi-categorias--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-categorias--id-"
                    onclick="cancelTryOut('PUTapi-categorias--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-categorias--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/categorias/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/categorias/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-categorias--id-"
               value="20"
               data-component="url" required  hidden>
    <br>
<p>The ID of the categoria.</p>
            </p>
                    <p>
                <b><code>categoria</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="categoria"
               data-endpoint="PUTapi-categorias--id-"
               value="9"
               data-component="url" required  hidden>
    <br>
<p>O id da categoria</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>titulo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="titulo"
               data-endpoint="PUTapi-categorias--id-"
               value="hentai"
               data-component="body"  hidden>
    <br>
<p>Titulo da categoria. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="PUTapi-categorias--id-"
               value="ut"
               data-component="body"  hidden>
    <br>

        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="status"
               data-endpoint="PUTapi-categorias--id-"
               value="disponivel"
               data-component="body"  hidden>
    <br>
<p>Status da categoria. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
        </p>
        </form>

            <h2 id="categoria-DELETEapi-categorias--id-">Excluir categoria</h2>

<p>
</p>

<p>Exclui uma categoria</p>

<span id="example-requests-DELETEapi-categorias--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/categorias/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-DELETEapi-categorias--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Categoria] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-categorias--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-categorias--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categorias--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-categorias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categorias--id-"></code></pre>
</span>
<form id="form-DELETEapi-categorias--id-" data-method="DELETE"
      data-path="api/categorias/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categorias--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-categorias--id-"
                    onclick="tryItOut('DELETEapi-categorias--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-categorias--id-"
                    onclick="cancelTryOut('DELETEapi-categorias--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-categorias--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/categorias/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-categorias--id-"
               value="2"
               data-component="url" required  hidden>
    <br>
<p>The ID of the categoria.</p>
            </p>
                    <p>
                <b><code>categoria</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="categoria"
               data-endpoint="DELETEapi-categorias--id-"
               value="16"
               data-component="url" required  hidden>
    <br>
<p>O id da categoria</p>
            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var exampleLanguages = ["bash","javascript"];
        setupLanguages(exampleLanguages);
    });
</script>
</body>
</html>