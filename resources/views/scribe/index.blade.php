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
            <li>Last updated: October 29 2021</li>
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

        <h1 id="autor">Autor</h1>

    

            <h2 id="autor-GETapi-autores">Listar autores</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-autores">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/autores" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores"
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

<span id="example-responses-GETapi-autores">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-autores" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-autores"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-autores"></code></pre>
</span>
<span id="execution-error-GETapi-autores" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-autores"></code></pre>
</span>
<form id="form-GETapi-autores" data-method="GET"
      data-path="api/autores"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-autores', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-autores"
                    onclick="tryItOut('GETapi-autores');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-autores"
                    onclick="cancelTryOut('GETapi-autores');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-autores" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/autores</code></b>
        </p>
                    </form>

            <h2 id="autor-POSTapi-autores">Criar autor</h2>

<p>
</p>

<p>Cria uma novo autor</p>

<span id="example-requests-POSTapi-autores">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/autores" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nome\": \"Gabriel H3rtz Seiscentos e Sessenta e Oito\",
    \"slug\": \"nam\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "slug": "nam"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-autores">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
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
<span id="execution-results-POSTapi-autores" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-autores"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-autores"></code></pre>
</span>
<span id="execution-error-POSTapi-autores" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-autores"></code></pre>
</span>
<form id="form-POSTapi-autores" data-method="POST"
      data-path="api/autores"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-autores', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-autores"
                    onclick="tryItOut('POSTapi-autores');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-autores"
                    onclick="cancelTryOut('POSTapi-autores');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-autores" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/autores</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nome"
               data-endpoint="POSTapi-autores"
               value="Gabriel H3rtz Seiscentos e Sessenta e Oito"
               data-component="body" required  hidden>
    <br>
<p>Nome do autor. Must be at least 2 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="POSTapi-autores"
               value="nam"
               data-component="body" required  hidden>
    <br>

        </p>
        </form>

            <h2 id="autor-GETapi-autores--autor-">Detalhar autor</h2>

<p>
</p>

<p>Retorna os dados do autor</p>

<span id="example-requests-GETapi-autores--autor-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/autores/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores/9"
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

<span id="example-responses-GETapi-autores--autor-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Autor] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-autores--autor-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-autores--autor-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-autores--autor-"></code></pre>
</span>
<span id="execution-error-GETapi-autores--autor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-autores--autor-"></code></pre>
</span>
<form id="form-GETapi-autores--autor-" data-method="GET"
      data-path="api/autores/{autor}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-autores--autor-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-autores--autor-"
                    onclick="tryItOut('GETapi-autores--autor-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-autores--autor-"
                    onclick="cancelTryOut('GETapi-autores--autor-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-autores--autor-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/autores/{autor}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>autor</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="autor"
               data-endpoint="GETapi-autores--autor-"
               value="9"
               data-component="url" required  hidden>
    <br>

            </p>
                    </form>

            <h2 id="autor-PUTapi-autores--autor-">Atualizar autor</h2>

<p>
</p>

<p>Atualiza os dados do autor</p>

<span id="example-requests-PUTapi-autores--autor-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/autores/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nome\": \"Gabriel H3rtz Seiscentos e Sessenta e Oito\",
    \"slug\": \"illo\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "slug": "illo"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-autores--autor-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Autor] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
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
<span id="execution-results-PUTapi-autores--autor-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-autores--autor-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-autores--autor-"></code></pre>
</span>
<span id="execution-error-PUTapi-autores--autor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-autores--autor-"></code></pre>
</span>
<form id="form-PUTapi-autores--autor-" data-method="PUT"
      data-path="api/autores/{autor}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-autores--autor-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-autores--autor-"
                    onclick="tryItOut('PUTapi-autores--autor-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-autores--autor-"
                    onclick="cancelTryOut('PUTapi-autores--autor-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-autores--autor-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/autores/{autor}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/autores/{autor}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>autor</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="autor"
               data-endpoint="PUTapi-autores--autor-"
               value="13"
               data-component="url" required  hidden>
    <br>
<p>O id do autor</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nome"
               data-endpoint="PUTapi-autores--autor-"
               value="Gabriel H3rtz Seiscentos e Sessenta e Oito"
               data-component="body"  hidden>
    <br>
<p>Nome do autor. Must be at least 2 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="PUTapi-autores--autor-"
               value="illo"
               data-component="body"  hidden>
    <br>

        </p>
        </form>

            <h2 id="autor-DELETEapi-autores--autor-">Excluir autor</h2>

<p>
</p>

<p>Exclui um autor</p>

<span id="example-requests-DELETEapi-autores--autor-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/autores/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores/1"
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

<span id="example-responses-DELETEapi-autores--autor-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Autor] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-autores--autor-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-autores--autor-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-autores--autor-"></code></pre>
</span>
<span id="execution-error-DELETEapi-autores--autor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-autores--autor-"></code></pre>
</span>
<form id="form-DELETEapi-autores--autor-" data-method="DELETE"
      data-path="api/autores/{autor}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-autores--autor-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-autores--autor-"
                    onclick="tryItOut('DELETEapi-autores--autor-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-autores--autor-"
                    onclick="cancelTryOut('DELETEapi-autores--autor-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-autores--autor-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/autores/{autor}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>autor</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="autor"
               data-endpoint="DELETEapi-autores--autor-"
               value="1"
               data-component="url" required  hidden>
    <br>
<p>O id da autor</p>
            </p>
                    </form>

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
    \"titulo\": \"romance\",
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
    "titulo": "romance",
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
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
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
               value="romance"
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
    --get "http://localhost/api/categorias/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/15"
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
               value="15"
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
    "http://localhost/api/categorias/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"romance\",
    \"slug\": \"odio\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "romance",
    "slug": "odio",
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
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
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
               value="16"
               data-component="url" required  hidden>
    <br>
<p>The ID of the categoria.</p>
            </p>
                    <p>
                <b><code>categoria</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="categoria"
               data-endpoint="PUTapi-categorias--id-"
               value="7"
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
               value="romance"
               data-component="body"  hidden>
    <br>
<p>Titulo da categoria. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="PUTapi-categorias--id-"
               value="odio"
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
    "http://localhost/api/categorias/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/9"
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
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
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
               value="9"
               data-component="url" required  hidden>
    <br>
<p>The ID of the categoria.</p>
            </p>
                    <p>
                <b><code>categoria</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="categoria"
               data-endpoint="DELETEapi-categorias--id-"
               value="19"
               data-component="url" required  hidden>
    <br>
<p>O id da categoria</p>
            </p>
                    </form>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-series">GET api/series</h2>

<p>
</p>



<span id="example-requests-GETapi-series">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/series" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series"
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

<span id="example-responses-GETapi-series">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-series" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-series"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-series"></code></pre>
</span>
<span id="execution-error-GETapi-series" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-series"></code></pre>
</span>
<form id="form-GETapi-series" data-method="GET"
      data-path="api/series"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-series', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-series"
                    onclick="tryItOut('GETapi-series');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-series"
                    onclick="cancelTryOut('GETapi-series');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-series" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/series</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-series">POST api/series</h2>

<p>
</p>



<span id="example-requests-POSTapi-series">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/series" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"Um ditador\",
    \"slug\": \"ut\",
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.\",
    \"image\": \"https:\\/\\/i.picsum.photos\\/id\\/856\\/300\\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic\",
    \"lancamento_at\": \"2022-10-04\",
    \"status\": \"desabilitada\",
    \"categorias\": [
        17
    ],
    \"autores\": [
        16
    ],
    \"estudios\": [
        13
    ]
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "Um ditador",
    "slug": "ut",
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.",
    "image": "https:\/\/i.picsum.photos\/id\/856\/300\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic",
    "lancamento_at": "2022-10-04",
    "status": "desabilitada",
    "categorias": [
        17
    ],
    "autores": [
        16
    ],
    "estudios": [
        13
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-series">
</span>
<span id="execution-results-POSTapi-series" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-series"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-series"></code></pre>
</span>
<span id="execution-error-POSTapi-series" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-series"></code></pre>
</span>
<form id="form-POSTapi-series" data-method="POST"
      data-path="api/series"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-series', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-series"
                    onclick="tryItOut('POSTapi-series');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-series"
                    onclick="cancelTryOut('POSTapi-series');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-series" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/series</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>titulo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="titulo"
               data-endpoint="POSTapi-series"
               value="Um ditador"
               data-component="body" required  hidden>
    <br>
<p>Titulo da serie. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="POSTapi-series"
               value="ut"
               data-component="body" required  hidden>
    <br>

        </p>
                <p>
            <b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="descricao"
               data-endpoint="POSTapi-series"
               value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem."
               data-component="body" required  hidden>
    <br>
<p>Titulo da serie. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-series"
               value="https://i.picsum.photos/id/856/300/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic"
               data-component="body" required  hidden>
    <br>
<p>Imagem de cover da serie. Must be a valid URL.</p>
        </p>
                <p>
            <b><code>lancamento_at</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="lancamento_at"
               data-endpoint="POSTapi-series"
               value="2022-10-04"
               data-component="body" required  hidden>
    <br>
<p>Data de lançamento da serie. Must be a valid date.</p>
        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="status"
               data-endpoint="POSTapi-series"
               value="desabilitada"
               data-component="body" required  hidden>
    <br>
<p>Status da serie. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
        </p>
                <p>
            <b><code>categorias</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="categorias.0"
               data-endpoint="POSTapi-series"
               data-component="body" required  hidden>
        <input type="number"
               name="categorias.1"
               data-endpoint="POSTapi-series"
               data-component="body" hidden>
    <br>
<p>Codigo das categorias da serie.</p>
        </p>
                <p>
            <b><code>autores</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="autores.0"
               data-endpoint="POSTapi-series"
               data-component="body" required  hidden>
        <input type="number"
               name="autores.1"
               data-endpoint="POSTapi-series"
               data-component="body" hidden>
    <br>
<p>Codigo dos autores da serie.</p>
        </p>
                <p>
            <b><code>estudios</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="estudios.0"
               data-endpoint="POSTapi-series"
               data-component="body" required  hidden>
        <input type="number"
               name="estudios.1"
               data-endpoint="POSTapi-series"
               data-component="body" hidden>
    <br>
<p>Codigo dos estudios da serie.</p>
        </p>
        </form>

            <h2 id="endpoints-GETapi-series--serie-">GET api/series/{serie}</h2>

<p>
</p>



<span id="example-requests-GETapi-series--serie-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/series/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/8"
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

<span id="example-responses-GETapi-series--serie-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 8&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php&quot;,
    &quot;line&quot;: 385,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php&quot;,
            &quot;line&quot;: 332,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 172,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php&quot;,
            &quot;line&quot;: 127,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 697,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 672,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 636,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 625,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 166,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 110,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 118,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 75,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 46,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 136,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 978,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 295,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 94,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\lucas\\Desktop\\Desenvolvimento\\series\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-series--serie-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-series--serie-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-series--serie-"></code></pre>
</span>
<span id="execution-error-GETapi-series--serie-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-series--serie-"></code></pre>
</span>
<form id="form-GETapi-series--serie-" data-method="GET"
      data-path="api/series/{serie}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-series--serie-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-series--serie-"
                    onclick="tryItOut('GETapi-series--serie-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-series--serie-"
                    onclick="cancelTryOut('GETapi-series--serie-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-series--serie-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/series/{serie}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie"
               data-endpoint="GETapi-series--serie-"
               value="8"
               data-component="url" required  hidden>
    <br>

            </p>
                    </form>

            <h2 id="endpoints-PUTapi-series--serie-">PUT api/series/{serie}</h2>

<p>
</p>



<span id="example-requests-PUTapi-series--serie-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/series/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"Um ditador\",
    \"slug\": \"ut\",
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.\",
    \"image\": \"https:\\/\\/i.picsum.photos\\/id\\/856\\/300\\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic\",
    \"lancamento_at\": \"2022-10-04\",
    \"status\": \"oculta\",
    \"categorias\": [
        3
    ],
    \"categorias_remover\": [
        20
    ],
    \"autores\": [
        6
    ],
    \"autores_remover\": [
        14
    ],
    \"estudios\": [
        18
    ],
    \"estudios_remover\": [
        19
    ]
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "Um ditador",
    "slug": "ut",
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.",
    "image": "https:\/\/i.picsum.photos\/id\/856\/300\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic",
    "lancamento_at": "2022-10-04",
    "status": "oculta",
    "categorias": [
        3
    ],
    "categorias_remover": [
        20
    ],
    "autores": [
        6
    ],
    "autores_remover": [
        14
    ],
    "estudios": [
        18
    ],
    "estudios_remover": [
        19
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-series--serie-">
</span>
<span id="execution-results-PUTapi-series--serie-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-series--serie-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-series--serie-"></code></pre>
</span>
<span id="execution-error-PUTapi-series--serie-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-series--serie-"></code></pre>
</span>
<form id="form-PUTapi-series--serie-" data-method="PUT"
      data-path="api/series/{serie}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-series--serie-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-series--serie-"
                    onclick="tryItOut('PUTapi-series--serie-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-series--serie-"
                    onclick="cancelTryOut('PUTapi-series--serie-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-series--serie-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/series/{serie}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/series/{serie}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie"
               data-endpoint="PUTapi-series--serie-"
               value="4"
               data-component="url" required  hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>titulo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="titulo"
               data-endpoint="PUTapi-series--serie-"
               value="Um ditador"
               data-component="body"  hidden>
    <br>
<p>Titulo da serie. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="PUTapi-series--serie-"
               value="ut"
               data-component="body"  hidden>
    <br>

        </p>
                <p>
            <b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="descricao"
               data-endpoint="PUTapi-series--serie-"
               value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem."
               data-component="body"  hidden>
    <br>
<p>Titulo da serie. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="PUTapi-series--serie-"
               value="https://i.picsum.photos/id/856/300/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic"
               data-component="body"  hidden>
    <br>
<p>Imagem de cover da serie. Must be a valid URL.</p>
        </p>
                <p>
            <b><code>lancamento_at</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="lancamento_at"
               data-endpoint="PUTapi-series--serie-"
               value="2022-10-04"
               data-component="body"  hidden>
    <br>
<p>Data de lançamento da serie. Must be a valid date.</p>
        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="status"
               data-endpoint="PUTapi-series--serie-"
               value="oculta"
               data-component="body"  hidden>
    <br>
<p>Status da serie. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
        </p>
                <p>
            <b><code>categorias</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="categorias.0"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" required  hidden>
        <input type="number"
               name="categorias.1"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" hidden>
    <br>
<p>Codigo das categorias da serie.</p>
        </p>
                <p>
            <b><code>categorias_remover</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="categorias_remover.0"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" required  hidden>
        <input type="number"
               name="categorias_remover.1"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>autores</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="autores.0"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" required  hidden>
        <input type="number"
               name="autores.1"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" hidden>
    <br>
<p>Codigo dos autores da serie.</p>
        </p>
                <p>
            <b><code>autores_remover</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="autores_remover.0"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" required  hidden>
        <input type="number"
               name="autores_remover.1"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>estudios</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="estudios.0"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" required  hidden>
        <input type="number"
               name="estudios.1"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" hidden>
    <br>
<p>Codigo dos estudios da serie.</p>
        </p>
                <p>
            <b><code>estudios_remover</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
                <input type="number"
               name="estudios_remover.0"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" required  hidden>
        <input type="number"
               name="estudios_remover.1"
               data-endpoint="PUTapi-series--serie-"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="endpoints-DELETEapi-series--serie-">DELETE api/series/{serie}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-series--serie-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/series/11" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/11"
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

<span id="example-responses-DELETEapi-series--serie-">
</span>
<span id="execution-results-DELETEapi-series--serie-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-series--serie-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-series--serie-"></code></pre>
</span>
<span id="execution-error-DELETEapi-series--serie-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-series--serie-"></code></pre>
</span>
<form id="form-DELETEapi-series--serie-" data-method="DELETE"
      data-path="api/series/{serie}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-series--serie-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-series--serie-"
                    onclick="tryItOut('DELETEapi-series--serie-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-series--serie-"
                    onclick="cancelTryOut('DELETEapi-series--serie-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-series--serie-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/series/{serie}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie"
               data-endpoint="DELETEapi-series--serie-"
               value="11"
               data-component="url" required  hidden>
    <br>

            </p>
                    </form>

        <h1 id="estudio">Estudio</h1>

    

            <h2 id="estudio-GETapi-estudios">Listar estudios</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-estudios">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/estudios" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios"
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

<span id="example-responses-GETapi-estudios">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-estudios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-estudios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-estudios"></code></pre>
</span>
<span id="execution-error-GETapi-estudios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-estudios"></code></pre>
</span>
<form id="form-GETapi-estudios" data-method="GET"
      data-path="api/estudios"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-estudios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-estudios"
                    onclick="tryItOut('GETapi-estudios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-estudios"
                    onclick="cancelTryOut('GETapi-estudios');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-estudios" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/estudios</code></b>
        </p>
                    </form>

            <h2 id="estudio-POSTapi-estudios">Criar estudio</h2>

<p>
</p>

<p>Cria uma novo estudio</p>

<span id="example-requests-POSTapi-estudios">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/estudios" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nome\": \"MAPPe\",
    \"slug\": \"facilis\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "MAPPe",
    "slug": "facilis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-estudios">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
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
<span id="execution-results-POSTapi-estudios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-estudios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-estudios"></code></pre>
</span>
<span id="execution-error-POSTapi-estudios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-estudios"></code></pre>
</span>
<form id="form-POSTapi-estudios" data-method="POST"
      data-path="api/estudios"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-estudios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-estudios"
                    onclick="tryItOut('POSTapi-estudios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-estudios"
                    onclick="cancelTryOut('POSTapi-estudios');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-estudios" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/estudios</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="nome"
               data-endpoint="POSTapi-estudios"
               value="MAPPe"
               data-component="body" required  hidden>
    <br>
<p>Nome do estudio. Must be at least 2 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="POSTapi-estudios"
               value="facilis"
               data-component="body" required  hidden>
    <br>

        </p>
        </form>

            <h2 id="estudio-GETapi-estudios--id-">Detalhar estudio</h2>

<p>
</p>

<p>Retorna os dados do estudio</p>

<span id="example-requests-GETapi-estudios--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/estudios/20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios/20"
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

<span id="example-responses-GETapi-estudios--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Estudio] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-estudios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-estudios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-estudios--id-"></code></pre>
</span>
<span id="execution-error-GETapi-estudios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-estudios--id-"></code></pre>
</span>
<form id="form-GETapi-estudios--id-" data-method="GET"
      data-path="api/estudios/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-estudios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-estudios--id-"
                    onclick="tryItOut('GETapi-estudios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-estudios--id-"
                    onclick="cancelTryOut('GETapi-estudios--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-estudios--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/estudios/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-estudios--id-"
               value="20"
               data-component="url" required  hidden>
    <br>
<p>The ID of the estudio.</p>
            </p>
                    </form>

            <h2 id="estudio-PUTapi-estudios--id-">Atualizar estudio</h2>

<p>
</p>

<p>Atualiza os dados do estudio</p>

<span id="example-requests-PUTapi-estudios--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/estudios/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nome\": \"MAPPe\",
    \"slug\": \"quis\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "MAPPe",
    "slug": "quis"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-estudios--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Estudio] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
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
<span id="execution-results-PUTapi-estudios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-estudios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-estudios--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-estudios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-estudios--id-"></code></pre>
</span>
<form id="form-PUTapi-estudios--id-" data-method="PUT"
      data-path="api/estudios/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-estudios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-estudios--id-"
                    onclick="tryItOut('PUTapi-estudios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-estudios--id-"
                    onclick="cancelTryOut('PUTapi-estudios--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-estudios--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/estudios/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/estudios/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-estudios--id-"
               value="12"
               data-component="url" required  hidden>
    <br>
<p>The ID of the estudio.</p>
            </p>
                    <p>
                <b><code>estudio</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="estudio"
               data-endpoint="PUTapi-estudios--id-"
               value="20"
               data-component="url" required  hidden>
    <br>
<p>O id do estudio</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="nome"
               data-endpoint="PUTapi-estudios--id-"
               value="MAPPe"
               data-component="body"  hidden>
    <br>
<p>Nome do estudio. Must be at least 2 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="PUTapi-estudios--id-"
               value="quis"
               data-component="body"  hidden>
    <br>

        </p>
        </form>

            <h2 id="estudio-DELETEapi-estudios--id-">Excluir estudio</h2>

<p>
</p>

<p>Exclui um estudio</p>

<span id="example-requests-DELETEapi-estudios--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/estudios/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios/4"
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

<span id="example-responses-DELETEapi-estudios--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Estudio] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-estudios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-estudios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-estudios--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-estudios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-estudios--id-"></code></pre>
</span>
<form id="form-DELETEapi-estudios--id-" data-method="DELETE"
      data-path="api/estudios/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-estudios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-estudios--id-"
                    onclick="tryItOut('DELETEapi-estudios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-estudios--id-"
                    onclick="cancelTryOut('DELETEapi-estudios--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-estudios--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/estudios/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-estudios--id-"
               value="4"
               data-component="url" required  hidden>
    <br>
<p>The ID of the estudio.</p>
            </p>
                    <p>
                <b><code>estudio</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="estudio"
               data-endpoint="DELETEapi-estudios--id-"
               value="12"
               data-component="url" required  hidden>
    <br>
<p>O id da estudio</p>
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