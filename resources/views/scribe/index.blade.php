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
            <li>Last updated: November 15 2021</li>
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

        <h1 id="auth">Auth</h1>

    

            <h2 id="auth-POSTapi-auth-login">Login</h2>

<p>
</p>

<p>Gera um token de acesso ao sistema</p>

<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"teste@example.com\",
    \"password\": \"senha123\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "teste@example.com",
    "password": "senha123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
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
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-login"
               value="teste@example.com"
               data-component="body" required  hidden>
    <br>
<p>O email do usuário. Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="senha123"
               data-component="body" required  hidden>
    <br>
<p>A senha do usuário.</p>
        </p>
        </form>

            <h2 id="auth-POSTapi-auth-logout">Logout</h2>

<p>
</p>

<p>Invalida o token do usuário autenticado</p>

<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-auth-logout">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout"></code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                    </form>

            <h2 id="auth-POSTapi-auth-refresh">Refresh</h2>

<p>
</p>

<p>Gera um novo token de acesso ao usuário autenticado</p>

<span id="example-requests-POSTapi-auth-refresh">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/refresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/refresh"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-auth-refresh">
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
    </span>
<span id="execution-results-POSTapi-auth-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-refresh"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-refresh"></code></pre>
</span>
<form id="form-POSTapi-auth-refresh" data-method="POST"
      data-path="api/auth/refresh"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-refresh"
                    onclick="tryItOut('POSTapi-auth-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-refresh"
                    onclick="cancelTryOut('POSTapi-auth-refresh');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-refresh" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/refresh</code></b>
        </p>
                    </form>

            <h2 id="auth-POSTapi-auth-me">Meu perfil</h2>

<p>
</p>

<p>Gera um token de acesso ao sistema</p>

<span id="example-requests-POSTapi-auth-me">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-auth-me">
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
    </span>
<span id="execution-results-POSTapi-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-me"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-me"></code></pre>
</span>
<form id="form-POSTapi-auth-me" data-method="POST"
      data-path="api/auth/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-me"
                    onclick="tryItOut('POSTapi-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-me"
                    onclick="cancelTryOut('POSTapi-auth-me');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/me</code></b>
        </p>
                    </form>

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
    \"slug\": \"ducimus\"
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
    "slug": "ducimus"
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
               value="ducimus"
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
    --get "http://localhost/api/autores/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores/14"
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
               value="14"
               data-component="url" required  hidden>
    <br>
<p>O ID do autor.</p>
            </p>
                    </form>

            <h2 id="autor-PUTapi-autores--autor-">Atualizar autor</h2>

<p>
</p>

<p>Atualiza os dados do autor</p>

<span id="example-requests-PUTapi-autores--autor-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/autores/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nome\": \"Gabriel H3rtz Seiscentos e Sessenta e Oito\",
    \"slug\": \"harum\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "slug": "harum"
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
               value="2"
               data-component="url" required  hidden>
    <br>
<p>O ID do autor.</p>
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
               value="harum"
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
    "http://localhost/api/autores/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/autores/7"
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
               value="7"
               data-component="url" required  hidden>
    <br>
<p>O ID do autor.</p>
            </p>
                    </form>

        <h1 id="capitulo">Capitulo</h1>

    

            <h2 id="capitulo-GETapi-temporada--temporada_id--capitulos">Listar os capitulos da temporada</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-temporada--temporada_id--capitulos">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/temporada/4/capitulos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/temporada/4/capitulos"
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

<span id="example-responses-GETapi-temporada--temporada_id--capitulos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-temporada--temporada_id--capitulos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-temporada--temporada_id--capitulos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-temporada--temporada_id--capitulos"></code></pre>
</span>
<span id="execution-error-GETapi-temporada--temporada_id--capitulos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-temporada--temporada_id--capitulos"></code></pre>
</span>
<form id="form-GETapi-temporada--temporada_id--capitulos" data-method="GET"
      data-path="api/temporada/{temporada_id}/capitulos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-temporada--temporada_id--capitulos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-temporada--temporada_id--capitulos"
                    onclick="tryItOut('GETapi-temporada--temporada_id--capitulos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-temporada--temporada_id--capitulos"
                    onclick="cancelTryOut('GETapi-temporada--temporada_id--capitulos');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-temporada--temporada_id--capitulos" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/temporada/{temporada_id}/capitulos</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>temporada_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada_id"
               data-endpoint="GETapi-temporada--temporada_id--capitulos"
               value="4"
               data-component="url" required  hidden>
    <br>
<p>O ID da temporada.</p>
            </p>
                    </form>

            <h2 id="capitulo-GETapi-temporada--temporada_id--capitulos--id-">Detalhar capitulo</h2>

<p>
</p>

<p>Retorna os dados do capitulo</p>

<span id="example-requests-GETapi-temporada--temporada_id--capitulos--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/temporada/14/capitulos/6" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/temporada/14/capitulos/6"
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

<span id="example-responses-GETapi-temporada--temporada_id--capitulos--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Temporada] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Capitulo] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-temporada--temporada_id--capitulos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-temporada--temporada_id--capitulos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-temporada--temporada_id--capitulos--id-"></code></pre>
</span>
<span id="execution-error-GETapi-temporada--temporada_id--capitulos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-temporada--temporada_id--capitulos--id-"></code></pre>
</span>
<form id="form-GETapi-temporada--temporada_id--capitulos--id-" data-method="GET"
      data-path="api/temporada/{temporada_id}/capitulos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-temporada--temporada_id--capitulos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-temporada--temporada_id--capitulos--id-"
                    onclick="tryItOut('GETapi-temporada--temporada_id--capitulos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-temporada--temporada_id--capitulos--id-"
                    onclick="cancelTryOut('GETapi-temporada--temporada_id--capitulos--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-temporada--temporada_id--capitulos--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/temporada/{temporada_id}/capitulos/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>temporada_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada_id"
               data-endpoint="GETapi-temporada--temporada_id--capitulos--id-"
               value="14"
               data-component="url" required  hidden>
    <br>
<p>O ID da temporada.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-temporada--temporada_id--capitulos--id-"
               value="6"
               data-component="url" required  hidden>
    <br>
<p>O ID do capitulo.</p>
            </p>
                    </form>

            <h2 id="capitulo-PUTapi-temporada--temporada_id--capitulos--id-">Atualizar capitulo</h2>

<p>
</p>

<p>Atualiza os dados do capitulo</p>

<span id="example-requests-PUTapi-temporada--temporada_id--capitulos--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/temporada/13/capitulos/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"capitulo\": 10,
    \"titulo\": \"O bom luar\",
    \"slug\": \"voluptatibus\",
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.\",
    \"link\": \"https:\\/\\/www.examplo.com\\/capitulo-01\",
    \"lancamento_at\": \"2022-10-13\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/temporada/13/capitulos/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "capitulo": 10,
    "titulo": "O bom luar",
    "slug": "voluptatibus",
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.",
    "link": "https:\/\/www.examplo.com\/capitulo-01",
    "lancamento_at": "2022-10-13",
    "status": "disponivel"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-temporada--temporada_id--capitulos--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Temporada] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Capitulo] 3&quot;
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
<span id="execution-results-PUTapi-temporada--temporada_id--capitulos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-temporada--temporada_id--capitulos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-temporada--temporada_id--capitulos--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-temporada--temporada_id--capitulos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-temporada--temporada_id--capitulos--id-"></code></pre>
</span>
<form id="form-PUTapi-temporada--temporada_id--capitulos--id-" data-method="PUT"
      data-path="api/temporada/{temporada_id}/capitulos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-temporada--temporada_id--capitulos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-temporada--temporada_id--capitulos--id-"
                    onclick="tryItOut('PUTapi-temporada--temporada_id--capitulos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-temporada--temporada_id--capitulos--id-"
                    onclick="cancelTryOut('PUTapi-temporada--temporada_id--capitulos--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-temporada--temporada_id--capitulos--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/temporada/{temporada_id}/capitulos/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/temporada/{temporada_id}/capitulos/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>temporada_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada_id"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="13"
               data-component="url" required  hidden>
    <br>
<p>O ID da temporada.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="12"
               data-component="url" required  hidden>
    <br>
<p>O ID do capitulo.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>capitulo</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="capitulo"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="10"
               data-component="body"  hidden>
    <br>
<p>Número do capitulo. Must be at least 1.</p>
        </p>
                <p>
            <b><code>titulo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="titulo"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="O bom luar"
               data-component="body"  hidden>
    <br>
<p>Titulo do capitulo. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="voluptatibus"
               data-component="body"  hidden>
    <br>

        </p>
                <p>
            <b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="descricao"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime."
               data-component="body"  hidden>
    <br>
<p>Descrição do capitulo. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>link</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="link"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="https://www.examplo.com/capitulo-01"
               data-component="body"  hidden>
    <br>
<p>Link do capitulo. Must be a valid URL.</p>
        </p>
                <p>
            <b><code>lancamento_at</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="lancamento_at"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="2022-10-13"
               data-component="body"  hidden>
    <br>
<p>Data de lançamento do capitulo. Must be a valid date.</p>
        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="status"
               data-endpoint="PUTapi-temporada--temporada_id--capitulos--id-"
               value="disponivel"
               data-component="body"  hidden>
    <br>
<p>Status do capitulo. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
        </p>
        </form>

            <h2 id="capitulo-DELETEapi-temporada--temporada_id--capitulos--id-">Excluir capitulo</h2>

<p>
</p>

<p>Exclui um capitulo</p>

<span id="example-requests-DELETEapi-temporada--temporada_id--capitulos--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/temporada/20/capitulos/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/temporada/20/capitulos/9"
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

<span id="example-responses-DELETEapi-temporada--temporada_id--capitulos--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Temporada] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Capitulo] 3&quot;
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
<span id="execution-results-DELETEapi-temporada--temporada_id--capitulos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-temporada--temporada_id--capitulos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-temporada--temporada_id--capitulos--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-temporada--temporada_id--capitulos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-temporada--temporada_id--capitulos--id-"></code></pre>
</span>
<form id="form-DELETEapi-temporada--temporada_id--capitulos--id-" data-method="DELETE"
      data-path="api/temporada/{temporada_id}/capitulos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-temporada--temporada_id--capitulos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-temporada--temporada_id--capitulos--id-"
                    onclick="tryItOut('DELETEapi-temporada--temporada_id--capitulos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-temporada--temporada_id--capitulos--id-"
                    onclick="cancelTryOut('DELETEapi-temporada--temporada_id--capitulos--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-temporada--temporada_id--capitulos--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/temporada/{temporada_id}/capitulos/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>temporada_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada_id"
               data-endpoint="DELETEapi-temporada--temporada_id--capitulos--id-"
               value="20"
               data-component="url" required  hidden>
    <br>
<p>O ID da temporada.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-temporada--temporada_id--capitulos--id-"
               value="9"
               data-component="url" required  hidden>
    <br>
<p>O ID do capitulo.</p>
            </p>
                    </form>

            <h2 id="capitulo-POSTapi-temporada--temporada--capitulos">Criar capitulo</h2>

<p>
</p>

<p>Cria uma novo capitulo</p>

<span id="example-requests-POSTapi-temporada--temporada--capitulos">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/temporada/13/capitulos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"capitulo\": 10,
    \"titulo\": \"O bom luar\",
    \"slug\": \"mollitia\",
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.\",
    \"link\": \"https:\\/\\/www.examplo.com\\/capitulo-01\",
    \"lancamento_at\": \"2022-10-13\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/temporada/13/capitulos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "capitulo": 10,
    "titulo": "O bom luar",
    "slug": "mollitia",
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.",
    "link": "https:\/\/www.examplo.com\/capitulo-01",
    "lancamento_at": "2022-10-13",
    "status": "disponivel"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-temporada--temporada--capitulos">
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
<span id="execution-results-POSTapi-temporada--temporada--capitulos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-temporada--temporada--capitulos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-temporada--temporada--capitulos"></code></pre>
</span>
<span id="execution-error-POSTapi-temporada--temporada--capitulos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-temporada--temporada--capitulos"></code></pre>
</span>
<form id="form-POSTapi-temporada--temporada--capitulos" data-method="POST"
      data-path="api/temporada/{temporada}/capitulos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-temporada--temporada--capitulos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-temporada--temporada--capitulos"
                    onclick="tryItOut('POSTapi-temporada--temporada--capitulos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-temporada--temporada--capitulos"
                    onclick="cancelTryOut('POSTapi-temporada--temporada--capitulos');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-temporada--temporada--capitulos" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/temporada/{temporada}/capitulos</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>temporada</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="13"
               data-component="url" required  hidden>
    <br>

            </p>
                    <p>
                <b><code>temporada_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada_id"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="1"
               data-component="url" required  hidden>
    <br>
<p>O ID da temporada.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>capitulo</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="capitulo"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="10"
               data-component="body" required  hidden>
    <br>
<p>Número do capitulo. Must be at least 1.</p>
        </p>
                <p>
            <b><code>titulo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="titulo"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="O bom luar"
               data-component="body" required  hidden>
    <br>
<p>Titulo do capitulo. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="mollitia"
               data-component="body" required  hidden>
    <br>

        </p>
                <p>
            <b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="descricao"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime."
               data-component="body" required  hidden>
    <br>
<p>Descrição do capitulo. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>link</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="link"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="https://www.examplo.com/capitulo-01"
               data-component="body" required  hidden>
    <br>
<p>Link do capitulo. Must be a valid URL.</p>
        </p>
                <p>
            <b><code>lancamento_at</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="lancamento_at"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="2022-10-13"
               data-component="body" required  hidden>
    <br>
<p>Data de lançamento do capitulo. Must be a valid date.</p>
        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="status"
               data-endpoint="POSTapi-temporada--temporada--capitulos"
               value="disponivel"
               data-component="body" required  hidden>
    <br>
<p>Status do capitulo. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
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
    \"slug\": \"ipsum\",
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
    "slug": "ipsum",
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
               value="ipsum"
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
    --get "http://localhost/api/categorias/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/12"
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
               value="12"
               data-component="url" required  hidden>
    <br>
<p>O ID da categoria.</p>
            </p>
                    </form>

            <h2 id="categoria-PUTapi-categorias--id-">Atualizar categoria</h2>

<p>
</p>

<p>Atualiza os dados da categoria</p>

<span id="example-requests-PUTapi-categorias--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/categorias/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"romance\",
    \"slug\": \"sed\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/15"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "romance",
    "slug": "sed",
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
               value="15"
               data-component="url" required  hidden>
    <br>
<p>O ID da categoria.</p>
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
               value="sed"
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
    "http://localhost/api/categorias/11" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categorias/11"
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
               value="11"
               data-component="url" required  hidden>
    <br>
<p>O ID da categoria.</p>
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
    \"slug\": \"aut\"
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
    "slug": "aut"
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
               value="aut"
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
    --get "http://localhost/api/estudios/18" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios/18"
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
               value="18"
               data-component="url" required  hidden>
    <br>
<p>O ID do estudio.</p>
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
    \"slug\": \"doloremque\"
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
    "slug": "doloremque"
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
<p>O ID do estudio.</p>
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
               value="doloremque"
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
    "http://localhost/api/estudios/5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/estudios/5"
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
               value="5"
               data-component="url" required  hidden>
    <br>
<p>O ID do estudio.</p>
            </p>
                    </form>

        <h1 id="serie">Serie</h1>

    

            <h2 id="serie-GETapi-series">Listar series</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

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
                <pre>

<code class="language-json"></code>
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

            <h2 id="serie-POSTapi-series">Criar serie</h2>

<p>
</p>

<p>Cria uma nova serie</p>

<span id="example-requests-POSTapi-series">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/series" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"Um ditador\",
    \"slug\": \"blanditiis\",
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.\",
    \"image\": \"https:\\/\\/i.picsum.photos\\/id\\/856\\/300\\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic\",
    \"lancamento_at\": \"2022-10-04\",
    \"status\": \"disponivel\",
    \"categorias\": [
        9
    ],
    \"autores\": [
        20
    ],
    \"estudios\": [
        3
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
    "slug": "blanditiis",
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.",
    "image": "https:\/\/i.picsum.photos\/id\/856\/300\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic",
    "lancamento_at": "2022-10-04",
    "status": "disponivel",
    "categorias": [
        9
    ],
    "autores": [
        20
    ],
    "estudios": [
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-series">
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
               value="blanditiis"
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
               value="disponivel"
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

            <h2 id="serie-GETapi-series--serie-">Detalhar serie</h2>

<p>
</p>

<p>Retorna os dados da serie</p>

<span id="example-requests-GETapi-series--serie-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/series/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/14"
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
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
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
               value="14"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                    </form>

            <h2 id="serie-PUTapi-series--serie-">Atualizar serie</h2>

<p>
</p>

<p>Atualiza os dados da serie</p>

<span id="example-requests-PUTapi-series--serie-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/series/6" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"titulo\": \"Um ditador\",
    \"slug\": \"porro\",
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.\",
    \"image\": \"https:\\/\\/i.picsum.photos\\/id\\/856\\/300\\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic\",
    \"lancamento_at\": \"2022-10-04\",
    \"status\": \"oculta\",
    \"categorias\": [
        18
    ],
    \"categorias_remover\": [
        4
    ],
    \"autores\": [
        1
    ],
    \"autores_remover\": [
        11
    ],
    \"estudios\": [
        19
    ],
    \"estudios_remover\": [
        16
    ]
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/6"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "titulo": "Um ditador",
    "slug": "porro",
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.",
    "image": "https:\/\/i.picsum.photos\/id\/856\/300\/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic",
    "lancamento_at": "2022-10-04",
    "status": "oculta",
    "categorias": [
        18
    ],
    "categorias_remover": [
        4
    ],
    "autores": [
        1
    ],
    "autores_remover": [
        11
    ],
    "estudios": [
        19
    ],
    "estudios_remover": [
        16
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-series--serie-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 3&quot;
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
               value="6"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
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
               value="porro"
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
<p>Codigo das categorias da serie a serem removidas.</p>
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
<p>Codigo dos autores da serie a serem removidos.</p>
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
<p>Codigo dos estudios da serie a serem removidos.</p>
        </p>
        </form>

            <h2 id="serie-DELETEapi-series--serie-">Excluir serie</h2>

<p>
</p>

<p>Exclui uma serie</p>

<span id="example-requests-DELETEapi-series--serie-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/series/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/3"
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
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 3&quot;
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
               value="3"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                    </form>

        <h1 id="temporada">Temporada</h1>

    

            <h2 id="temporada-GETapi-serie--serie_id--temporadas">Listar as temporadas da serie</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-serie--serie_id--temporadas">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/serie/15/temporadas" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/serie/15/temporadas"
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

<span id="example-responses-GETapi-serie--serie_id--temporadas">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-serie--serie_id--temporadas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-serie--serie_id--temporadas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-serie--serie_id--temporadas"></code></pre>
</span>
<span id="execution-error-GETapi-serie--serie_id--temporadas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-serie--serie_id--temporadas"></code></pre>
</span>
<form id="form-GETapi-serie--serie_id--temporadas" data-method="GET"
      data-path="api/serie/{serie_id}/temporadas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-serie--serie_id--temporadas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-serie--serie_id--temporadas"
                    onclick="tryItOut('GETapi-serie--serie_id--temporadas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-serie--serie_id--temporadas"
                    onclick="cancelTryOut('GETapi-serie--serie_id--temporadas');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-serie--serie_id--temporadas" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/serie/{serie_id}/temporadas</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie_id"
               data-endpoint="GETapi-serie--serie_id--temporadas"
               value="15"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                    </form>

            <h2 id="temporada-GETapi-serie--serie_id--temporadas--id-">Detalhar temporada</h2>

<p>
</p>

<p>Retorna os dados da temporada</p>

<span id="example-requests-GETapi-serie--serie_id--temporadas--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/serie/6/temporadas/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/serie/6/temporadas/8"
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

<span id="example-responses-GETapi-serie--serie_id--temporadas--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Temporada] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-serie--serie_id--temporadas--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-serie--serie_id--temporadas--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-serie--serie_id--temporadas--id-"></code></pre>
</span>
<span id="execution-error-GETapi-serie--serie_id--temporadas--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-serie--serie_id--temporadas--id-"></code></pre>
</span>
<form id="form-GETapi-serie--serie_id--temporadas--id-" data-method="GET"
      data-path="api/serie/{serie_id}/temporadas/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-serie--serie_id--temporadas--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-serie--serie_id--temporadas--id-"
                    onclick="tryItOut('GETapi-serie--serie_id--temporadas--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-serie--serie_id--temporadas--id-"
                    onclick="cancelTryOut('GETapi-serie--serie_id--temporadas--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-serie--serie_id--temporadas--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/serie/{serie_id}/temporadas/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie_id"
               data-endpoint="GETapi-serie--serie_id--temporadas--id-"
               value="6"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-serie--serie_id--temporadas--id-"
               value="8"
               data-component="url" required  hidden>
    <br>
<p>O ID do capitulo.</p>
            </p>
                    </form>

            <h2 id="temporada-DELETEapi-serie--serie_id--temporadas--id-">Excluir temporada</h2>

<p>
</p>

<p>Exclui uma temporada</p>

<span id="example-requests-DELETEapi-serie--serie_id--temporadas--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/serie/7/temporadas/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/serie/7/temporadas/15"
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

<span id="example-responses-DELETEapi-serie--serie_id--temporadas--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Temporada] 3&quot;
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
<span id="execution-results-DELETEapi-serie--serie_id--temporadas--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-serie--serie_id--temporadas--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-serie--serie_id--temporadas--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-serie--serie_id--temporadas--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-serie--serie_id--temporadas--id-"></code></pre>
</span>
<form id="form-DELETEapi-serie--serie_id--temporadas--id-" data-method="DELETE"
      data-path="api/serie/{serie_id}/temporadas/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-serie--serie_id--temporadas--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-serie--serie_id--temporadas--id-"
                    onclick="tryItOut('DELETEapi-serie--serie_id--temporadas--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-serie--serie_id--temporadas--id-"
                    onclick="cancelTryOut('DELETEapi-serie--serie_id--temporadas--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-serie--serie_id--temporadas--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/serie/{serie_id}/temporadas/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie_id"
               data-endpoint="DELETEapi-serie--serie_id--temporadas--id-"
               value="7"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-serie--serie_id--temporadas--id-"
               value="15"
               data-component="url" required  hidden>
    <br>
<p>O ID do capitulo.</p>
            </p>
                    </form>

            <h2 id="temporada-POSTapi-serie--serie--temporadas">Criar temporada</h2>

<p>
</p>

<p>Cria uma nova temporada</p>

<span id="example-requests-POSTapi-serie--serie--temporadas">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost/api/serie/8/temporadas" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"temporada\": 10,
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.\",
    \"lancamento_at\": \"2022-10-13\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/serie/8/temporadas"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "temporada": 10,
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.",
    "lancamento_at": "2022-10-13",
    "status": "disponivel"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-serie--serie--temporadas">
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
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json"></code>
 </pre>
    </span>
<span id="execution-results-POSTapi-serie--serie--temporadas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-serie--serie--temporadas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-serie--serie--temporadas"></code></pre>
</span>
<span id="execution-error-POSTapi-serie--serie--temporadas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-serie--serie--temporadas"></code></pre>
</span>
<form id="form-POSTapi-serie--serie--temporadas" data-method="POST"
      data-path="api/serie/{serie}/temporadas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-serie--serie--temporadas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-serie--serie--temporadas"
                    onclick="tryItOut('POSTapi-serie--serie--temporadas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-serie--serie--temporadas"
                    onclick="cancelTryOut('POSTapi-serie--serie--temporadas');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-serie--serie--temporadas" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/serie/{serie}/temporadas</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie"
               data-endpoint="POSTapi-serie--serie--temporadas"
               value="8"
               data-component="url" required  hidden>
    <br>

            </p>
                    <p>
                <b><code>serie_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie_id"
               data-endpoint="POSTapi-serie--serie--temporadas"
               value="9"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>temporada</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="temporada"
               data-endpoint="POSTapi-serie--serie--temporadas"
               value="10"
               data-component="body" required  hidden>
    <br>
<p>Número da temporada. Must be at least 1.</p>
        </p>
                <p>
            <b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="descricao"
               data-endpoint="POSTapi-serie--serie--temporadas"
               value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime."
               data-component="body" required  hidden>
    <br>
<p>Descrição da temporada. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>lancamento_at</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="lancamento_at"
               data-endpoint="POSTapi-serie--serie--temporadas"
               value="2022-10-13"
               data-component="body" required  hidden>
    <br>
<p>Data de lançamento da temporada. Must be a valid date.</p>
        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="status"
               data-endpoint="POSTapi-serie--serie--temporadas"
               value="disponivel"
               data-component="body" required  hidden>
    <br>
<p>Status da temporada. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
        </p>
        </form>

            <h2 id="temporada-PUTapi-serie--serie_id--temporadas--id-">Atualizar temporada</h2>

<p>
</p>

<p>Atualiza os dados da temporada</p>

<span id="example-requests-PUTapi-serie--serie_id--temporadas--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/serie/2/temporadas/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"temporada\": 10,
    \"descricao\": \"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.\",
    \"lancamento_at\": \"2022-10-13\",
    \"status\": \"disponivel\"
}"
</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/serie/2/temporadas/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "temporada": 10,
    "descricao": "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.",
    "lancamento_at": "2022-10-13",
    "status": "disponivel"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-serie--serie_id--temporadas--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Serie] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Temporada] 3&quot;
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
<span id="execution-results-PUTapi-serie--serie_id--temporadas--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-serie--serie_id--temporadas--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-serie--serie_id--temporadas--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-serie--serie_id--temporadas--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-serie--serie_id--temporadas--id-"></code></pre>
</span>
<form id="form-PUTapi-serie--serie_id--temporadas--id-" data-method="PUT"
      data-path="api/serie/{serie_id}/temporadas/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-serie--serie_id--temporadas--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-serie--serie_id--temporadas--id-"
                    onclick="tryItOut('PUTapi-serie--serie_id--temporadas--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-serie--serie_id--temporadas--id-"
                    onclick="cancelTryOut('PUTapi-serie--serie_id--temporadas--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-serie--serie_id--temporadas--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/serie/{serie_id}/temporadas/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/serie/{serie_id}/temporadas/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>serie_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="serie_id"
               data-endpoint="PUTapi-serie--serie_id--temporadas--id-"
               value="2"
               data-component="url" required  hidden>
    <br>
<p>O ID da serie.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-serie--serie_id--temporadas--id-"
               value="1"
               data-component="url" required  hidden>
    <br>
<p>O ID do capitulo.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>temporada</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="temporada"
               data-endpoint="PUTapi-serie--serie_id--temporadas--id-"
               value="10"
               data-component="body"  hidden>
    <br>
<p>Número da temporada. Must be at least 1.</p>
        </p>
                <p>
            <b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="descricao"
               data-endpoint="PUTapi-serie--serie_id--temporadas--id-"
               value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime."
               data-component="body"  hidden>
    <br>
<p>Descrição da temporada. Must be at least 5 characters.</p>
        </p>
                <p>
            <b><code>lancamento_at</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="lancamento_at"
               data-endpoint="PUTapi-serie--serie_id--temporadas--id-"
               value="2022-10-13"
               data-component="body"  hidden>
    <br>
<p>Data de lançamento da temporada. Must be a valid date.</p>
        </p>
                <p>
            <b><code>status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="status"
               data-endpoint="PUTapi-serie--serie_id--temporadas--id-"
               value="disponivel"
               data-component="body"  hidden>
    <br>
<p>Status da temporada. Must be one of <code>disponivel</code>, <code>oculta</code>, or <code>desabilitada</code>.</p>
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