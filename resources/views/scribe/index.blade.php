<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-3.36.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-3.36.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-responses--id-">
                        <a href="#endpoints-DELETEapi-v1-responses--id-">Remove the specified resource from storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-responses--id--quizzes">
                        <a href="#endpoints-GETapi-v1-responses--id--quizzes">Get all the answers to the current question</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-responses--id--employees">
                        <a href="#endpoints-GETapi-v1-responses--id--employees">Get all responses from the current user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-documentation">
                        <a href="#endpoints-GETapi-documentation">Display Swagger API page.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-oauth2-callback">
                        <a href="#endpoints-GETapi-oauth2-callback">Display Oauth2 callback pages.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-login">
                        <a href="#endpoints-POSTapi-v1-login">POST api/v1/login</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-categories">
                        <a href="#endpoints-GETapi-v1-categories">GET api/v1/categories</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-categories--id-">
                        <a href="#endpoints-GETapi-v1-categories--id-">GET api/v1/categories/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-categories--id--rules">
                        <a href="#endpoints-GETapi-v1-categories--id--rules">GET api/v1/categories/{id}/rules</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-rules">
                        <a href="#endpoints-GETapi-v1-rules">GET api/v1/rules</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-rules--id-">
                        <a href="#endpoints-GETapi-v1-rules--id-">GET api/v1/rules/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-quizzes">
                        <a href="#endpoints-GETapi-v1-quizzes">Display a listing of the resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-quizzes--id-">
                        <a href="#endpoints-GETapi-v1-quizzes--id-">Display the specified resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-quizzes--category_id--category">
                        <a href="#endpoints-GETapi-v1-quizzes--category_id--category">Show question by rule&#039;s category.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-responses">
                        <a href="#endpoints-GETapi-v1-responses">Display a listing of the resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-responses">
                        <a href="#endpoints-POSTapi-v1-responses">Store a newly created resource in storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-responses--id-">
                        <a href="#endpoints-GETapi-v1-responses--id-">Display the specified resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-responses--id-">
                        <a href="#endpoints-PUTapi-v1-responses--id-">Update the specified resource in storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-quizzes--employee_id--notanswered">
                        <a href="#endpoints-GETapi-v1-quizzes--employee_id--notanswered">GET api/v1/quizzes/{employee_id}/notanswered</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: August 26 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-DELETEapi-v1-responses--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-responses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/v1/responses/asperiores" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses/asperiores"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-responses--id-">
</span>
<span id="execution-results-DELETEapi-v1-responses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-responses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-responses--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-responses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-responses--id-"></code></pre>
</span>
<form id="form-DELETEapi-v1-responses--id-" data-method="DELETE"
      data-path="api/v1/responses/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-responses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-responses--id-"
                    onclick="tryItOut('DELETEapi-v1-responses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-responses--id-"
                    onclick="cancelTryOut('DELETEapi-v1-responses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-responses--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/responses/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="DELETEapi-v1-responses--id-"
               value="asperiores"
               data-component="url" hidden>
    <br>
<p>The ID of the response.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-responses--id--quizzes">Get all the answers to the current question</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-responses--id--quizzes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/responses/ut/quizzes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses/ut/quizzes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-responses--id--quizzes">
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
x-ratelimit-remaining: 48
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-responses--id--quizzes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-responses--id--quizzes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-responses--id--quizzes"></code></pre>
</span>
<span id="execution-error-GETapi-v1-responses--id--quizzes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-responses--id--quizzes"></code></pre>
</span>
<form id="form-GETapi-v1-responses--id--quizzes" data-method="GET"
      data-path="api/v1/responses/{id}/quizzes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-responses--id--quizzes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-responses--id--quizzes"
                    onclick="tryItOut('GETapi-v1-responses--id--quizzes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-responses--id--quizzes"
                    onclick="cancelTryOut('GETapi-v1-responses--id--quizzes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-responses--id--quizzes" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/responses/{id}/quizzes</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-v1-responses--id--quizzes"
               value="ut"
               data-component="url" hidden>
    <br>
<p>The ID of the response.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-responses--id--employees">Get all responses from the current user.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-responses--id--employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/responses/et/employees" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses/et/employees"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-responses--id--employees">
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
x-ratelimit-remaining: 47
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-responses--id--employees" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-responses--id--employees"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-responses--id--employees"></code></pre>
</span>
<span id="execution-error-GETapi-v1-responses--id--employees" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-responses--id--employees"></code></pre>
</span>
<form id="form-GETapi-v1-responses--id--employees" data-method="GET"
      data-path="api/v1/responses/{id}/employees"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-responses--id--employees', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-responses--id--employees"
                    onclick="tryItOut('GETapi-v1-responses--id--employees');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-responses--id--employees"
                    onclick="cancelTryOut('GETapi-v1-responses--id--employees');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-responses--id--employees" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/responses/{id}/employees</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-v1-responses--id--employees"
               value="et"
               data-component="url" hidden>
    <br>
<p>The ID of the response.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-documentation">Display Swagger API page.</h2>

<p>
</p>



<span id="example-requests-GETapi-documentation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/documentation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/documentation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-documentation">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;title&gt;Total Safety API&lt;/title&gt;
    &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;https://localhost/docs/asset/swagger-ui.css?v=d6de32fafed0ea75ef760baa8ebe2bda&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://localhost/docs/asset/favicon-32x32.png?v=40d4f2c38d1cd854ad463f16373cbcb6&quot; sizes=&quot;32x32&quot;/&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://localhost/docs/asset/favicon-16x16.png?v=f0ae831196d55d8f4115b6c5e8ec5384&quot; sizes=&quot;16x16&quot;/&gt;
    &lt;style&gt;
    html
    {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
    }
    *,
    *:before,
    *:after
    {
        box-sizing: inherit;
    }

    body {
      margin:0;
      background: #fafafa;
    }
    &lt;/style&gt;
&lt;/head&gt;

&lt;body&gt;
&lt;div id=&quot;swagger-ui&quot;&gt;&lt;/div&gt;

&lt;script src=&quot;https://localhost/docs/asset/swagger-ui-bundle.js?v=e0ae76d9795806abae1f7781d89d4f4b&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://localhost/docs/asset/swagger-ui-standalone-preset.js?v=8e0e2470d0530680f6f16c7817337891&quot;&gt;&lt;/script&gt;
&lt;script&gt;
    window.onload = function() {
        // Build a system
        const ui = SwaggerUIBundle({
            dom_id: '#swagger-ui',
            url: &quot;https://localhost/docs/api-docs.json&quot;,
            operationsSorter: null,
            configUrl: null,
            validatorUrl: null,
            oauth2RedirectUrl: &quot;https://localhost/api/oauth2-callback&quot;,

            requestInterceptor: function(request) {
                request.headers['X-CSRF-TOKEN'] = '';
                return request;
            },

            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],

            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],

            layout: &quot;StandaloneLayout&quot;,
            docExpansion : &quot;none&quot;,
            deepLinking: true,
            filter: true,
            persistAuthorization: &quot;false&quot;,

        })

        window.ui = ui

            }
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-documentation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-documentation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-documentation"></code></pre>
</span>
<span id="execution-error-GETapi-documentation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-documentation"></code></pre>
</span>
<form id="form-GETapi-documentation" data-method="GET"
      data-path="api/documentation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-documentation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-documentation"
                    onclick="tryItOut('GETapi-documentation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-documentation"
                    onclick="cancelTryOut('GETapi-documentation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-documentation" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/documentation</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-oauth2-callback">Display Oauth2 callback pages.</h2>

<p>
</p>



<span id="example-requests-GETapi-oauth2-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/oauth2-callback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/oauth2-callback"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-oauth2-callback">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">&lt;!doctype html&gt;
&lt;html lang=&quot;en-US&quot;&gt;
&lt;head&gt;
    &lt;title&gt;Swagger UI: OAuth2 Redirect&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;script&gt;
    'use strict';
    function run () {
        var oauth2 = window.opener.swaggerUIRedirectOauth2;
        var sentState = oauth2.state;
        var redirectUrl = oauth2.redirectUrl;
        var isValid, qp, arr;

        if (/code|token|error/.test(window.location.hash)) {
            qp = window.location.hash.substring(1).replace('?', '&amp;');
        } else {
            qp = location.search.substring(1);
        }

        arr = qp.split(&quot;&amp;&quot;);
        arr.forEach(function (v,i,_arr) { _arr[i] = '&quot;' + v.replace('=', '&quot;:&quot;') + '&quot;';});
        qp = qp ? JSON.parse('{' + arr.join() + '}',
                function (key, value) {
                    return key === &quot;&quot; ? value : decodeURIComponent(value);
                }
        ) : {};

        isValid = qp.state === sentState;

        if ((
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;accessCode&quot; ||
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;authorizationCode&quot; ||
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;authorization_code&quot;
        ) &amp;&amp; !oauth2.auth.code) {
            if (!isValid) {
                oauth2.errCb({
                    authId: oauth2.auth.name,
                    source: &quot;auth&quot;,
                    level: &quot;warning&quot;,
                    message: &quot;Authorization may be unsafe, passed state was changed in server. The passed state wasn't returned from auth server.&quot;
                });
            }

            if (qp.code) {
                delete oauth2.state;
                oauth2.auth.code = qp.code;
                oauth2.callback({auth: oauth2.auth, redirectUrl: redirectUrl});
            } else {
                let oauthErrorMsg;
                if (qp.error) {
                    oauthErrorMsg = &quot;[&quot;+qp.error+&quot;]: &quot; +
                        (qp.error_description ? qp.error_description+ &quot;. &quot; : &quot;no accessCode received from the server. &quot;) +
                        (qp.error_uri ? &quot;More info: &quot;+qp.error_uri : &quot;&quot;);
                }

                oauth2.errCb({
                    authId: oauth2.auth.name,
                    source: &quot;auth&quot;,
                    level: &quot;error&quot;,
                    message: oauthErrorMsg || &quot;[Authorization failed]: no accessCode received from the server.&quot;
                });
            }
        } else {
            oauth2.callback({auth: oauth2.auth, token: qp, isValid: isValid, redirectUrl: redirectUrl});
        }
        window.close();
    }

    if (document.readyState !== 'loading') {
        run();
    } else {
        document.addEventListener('DOMContentLoaded', function () {
            run();
        });
    }
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-oauth2-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-oauth2-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-oauth2-callback"></code></pre>
</span>
<span id="execution-error-GETapi-oauth2-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-oauth2-callback"></code></pre>
</span>
<form id="form-GETapi-oauth2-callback" data-method="GET"
      data-path="api/oauth2-callback"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-oauth2-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-oauth2-callback"
                    onclick="tryItOut('GETapi-oauth2-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-oauth2-callback"
                    onclick="cancelTryOut('GETapi-oauth2-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-oauth2-callback" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/oauth2-callback</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-v1-login">POST api/v1/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-login">
</span>
<span id="execution-results-POSTapi-v1-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-login"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-login"></code></pre>
</span>
<form id="form-POSTapi-v1-login" data-method="POST"
      data-path="api/v1/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-login"
                    onclick="tryItOut('POSTapi-v1-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-login"
                    onclick="cancelTryOut('POSTapi-v1-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/login</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-categories">GET api/v1/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories">
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

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;FRV&quot;,
        &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
        &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories"></code></pre>
</span>
<form id="form-GETapi-v1-categories" data-method="GET"
      data-path="api/v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories"
                    onclick="tryItOut('GETapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories"
                    onclick="cancelTryOut('GETapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-categories--id-">GET api/v1/categories/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories--id-">
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
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;FRV&quot;,
    &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
    &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories--id-"></code></pre>
</span>
<form id="form-GETapi-v1-categories--id-" data-method="GET"
      data-path="api/v1/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories--id-"
                    onclick="tryItOut('GETapi-v1-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories--id-"
                    onclick="cancelTryOut('GETapi-v1-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-categories--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the category.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-categories--id--rules">GET api/v1/categories/{id}/rules</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories--id--rules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/categories/1/rules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/categories/1/rules"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories--id--rules">
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
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Regle 1&quot;,
        &quot;image&quot;: &quot;uploads/20220818130310_rule_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818130310_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818130310_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818130310_rule_ng.mp3&quot;,
        &quot;created_at&quot;: &quot;2022-08-18T13:03:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:03:10.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Regle 2&quot;,
        &quot;image&quot;: &quot;uploads/20220818130404_rule_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818130404_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818130404_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818130404_rule_ng.mp3&quot;,
        &quot;created_at&quot;: &quot;2022-08-18T13:04:04.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:04:04.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories--id--rules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories--id--rules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories--id--rules"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories--id--rules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories--id--rules"></code></pre>
</span>
<form id="form-GETapi-v1-categories--id--rules" data-method="GET"
      data-path="api/v1/categories/{id}/rules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories--id--rules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories--id--rules"
                    onclick="tryItOut('GETapi-v1-categories--id--rules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories--id--rules"
                    onclick="cancelTryOut('GETapi-v1-categories--id--rules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories--id--rules" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories/{id}/rules</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-categories--id--rules"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the category.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-rules">GET api/v1/rules</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-rules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/rules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/rules"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-rules">
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
x-ratelimit-remaining: 56
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Regle 1&quot;,
        &quot;image&quot;: &quot;uploads/20220818130310_rule_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818130310_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818130310_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818130310_rule_ng.mp3&quot;,
        &quot;created_at&quot;: &quot;2022-08-18T13:03:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:03:10.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Regle 2&quot;,
        &quot;image&quot;: &quot;uploads/20220818130404_rule_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818130404_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818130404_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818130404_rule_ng.mp3&quot;,
        &quot;created_at&quot;: &quot;2022-08-18T13:04:04.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:04:04.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-rules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-rules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-rules"></code></pre>
</span>
<span id="execution-error-GETapi-v1-rules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-rules"></code></pre>
</span>
<form id="form-GETapi-v1-rules" data-method="GET"
      data-path="api/v1/rules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-rules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-rules"
                    onclick="tryItOut('GETapi-v1-rules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-rules"
                    onclick="cancelTryOut('GETapi-v1-rules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-rules" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/rules</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-rules--id-">GET api/v1/rules/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-rules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/rules/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/rules/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-rules--id-">
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
x-ratelimit-remaining: 55
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;id&quot;: 1,
    &quot;category_id&quot;: 1,
    &quot;description&quot;: &quot;Regle 1&quot;,
    &quot;image&quot;: &quot;uploads/20220818130310_rule_image.png&quot;,
    &quot;fr&quot;: &quot;uploads/20220818130310_rule_fr.mp3&quot;,
    &quot;ar&quot;: &quot;uploads/20220818130310_rule_ar.mp3&quot;,
    &quot;ng&quot;: &quot;uploads/20220818130310_rule_ng.mp3&quot;,
    &quot;created_at&quot;: &quot;2022-08-18T13:03:10.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-08-18T13:03:10.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-rules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-rules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-rules--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-rules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-rules--id-"></code></pre>
</span>
<form id="form-GETapi-v1-rules--id-" data-method="GET"
      data-path="api/v1/rules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-rules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-rules--id-"
                    onclick="tryItOut('GETapi-v1-rules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-rules--id-"
                    onclick="cancelTryOut('GETapi-v1-rules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-rules--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/rules/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-rules--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the rule.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-quizzes">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-quizzes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/quizzes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/quizzes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-quizzes">
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
x-ratelimit-remaining: 54
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;kjfjd&quot;,
        &quot;image&quot;: &quot;uploads/20220818130554_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818130554_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818130554_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818130554_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T13:05:54.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T17:26:32.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Quiz 1&quot;,
        &quot;image&quot;: &quot;uploads/20220818131027_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818131027_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818131027_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818131027_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 0,
        &quot;created_at&quot;: &quot;2022-08-18T13:10:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T17:18:33.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Quiz 1&quot;,
        &quot;image&quot;: &quot;uploads/20220818131259_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818131259_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818131259_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818131259_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 0,
        &quot;created_at&quot;: &quot;2022-08-18T13:12:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:12:59.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Quiz 1&quot;,
        &quot;image&quot;: &quot;uploads/20220818131439_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818131439_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818131439_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818131439_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 0,
        &quot;created_at&quot;: &quot;2022-08-18T13:14:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:14:39.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 5,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Quiz 1&quot;,
        &quot;image&quot;: &quot;uploads/20220818131546_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818131546_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818131546_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818131546_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 0,
        &quot;created_at&quot;: &quot;2022-08-18T13:15:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:15:46.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 6,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;description&quot;,
        &quot;image&quot;: &quot;uploads/20220818181229_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818181230_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818181230_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818181230_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T18:12:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T18:12:30.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 7,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;rete&quot;,
        &quot;image&quot;: &quot;uploads/20220818202217_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818202217_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818202217_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818202217_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T20:22:17.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T20:22:17.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 8,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;quiz&quot;,
        &quot;image&quot;: &quot;uploads/20220818234855_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818234855_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818234855_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818234855_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T23:48:55.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T23:48:55.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 9,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;essaie&quot;,
        &quot;image&quot;: &quot;uploads/20220822081924_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220822081924_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220822081924_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220822081924_rule_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-22T08:19:24.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-22T08:19:24.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 10,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;essaie&quot;,
        &quot;image&quot;: &quot;uploads/20220822081927_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220822081927_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220822081927_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220822081927_rule_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-22T08:19:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-22T08:19:27.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 11,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;essaie&quot;,
        &quot;image&quot;: &quot;uploads/20220822084549_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220822084549_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220822084549_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220822084549_rule_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-22T08:45:49.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-22T08:45:49.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 12,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;essaytgghh&quot;,
        &quot;image&quot;: &quot;uploads/20220822084706_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220822084706_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220822084706_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220822084706_rule_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-22T08:47:06.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-22T08:47:06.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 13,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;Essayons encore&quot;,
        &quot;image&quot;: &quot;uploads/20220822094238_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220822094238_rule_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220822094238_rule_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220822094238_rule_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-22T09:42:38.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-22T09:42:38.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FRV&quot;,
            &quot;image&quot;: &quot;uploads/20220818130207_.png&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:02:07.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-quizzes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-quizzes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-quizzes"></code></pre>
</span>
<span id="execution-error-GETapi-v1-quizzes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-quizzes"></code></pre>
</span>
<form id="form-GETapi-v1-quizzes" data-method="GET"
      data-path="api/v1/quizzes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-quizzes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-quizzes"
                    onclick="tryItOut('GETapi-v1-quizzes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-quizzes"
                    onclick="cancelTryOut('GETapi-v1-quizzes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-quizzes" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/quizzes</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-quizzes--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-quizzes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/quizzes/fugiat" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/quizzes/fugiat"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-quizzes--id-">
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
x-ratelimit-remaining: 53
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-quizzes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-quizzes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-quizzes--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-quizzes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-quizzes--id-"></code></pre>
</span>
<form id="form-GETapi-v1-quizzes--id-" data-method="GET"
      data-path="api/v1/quizzes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-quizzes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-quizzes--id-"
                    onclick="tryItOut('GETapi-v1-quizzes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-quizzes--id-"
                    onclick="cancelTryOut('GETapi-v1-quizzes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-quizzes--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/quizzes/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-v1-quizzes--id-"
               value="fugiat"
               data-component="url" hidden>
    <br>
<p>The ID of the quiz.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-quizzes--category_id--category">Show question by rule&#039;s category.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-quizzes--category_id--category">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/quizzes/ducimus/category" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/quizzes/ducimus/category"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-quizzes--category_id--category">
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
x-ratelimit-remaining: 51
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-quizzes--category_id--category" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-quizzes--category_id--category"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-quizzes--category_id--category"></code></pre>
</span>
<span id="execution-error-GETapi-v1-quizzes--category_id--category" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-quizzes--category_id--category"></code></pre>
</span>
<form id="form-GETapi-v1-quizzes--category_id--category" data-method="GET"
      data-path="api/v1/quizzes/{category_id}/category"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-quizzes--category_id--category', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-quizzes--category_id--category"
                    onclick="tryItOut('GETapi-v1-quizzes--category_id--category');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-quizzes--category_id--category"
                    onclick="cancelTryOut('GETapi-v1-quizzes--category_id--category');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-quizzes--category_id--category" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/quizzes/{category_id}/category</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="category_id"
               data-endpoint="GETapi-v1-quizzes--category_id--category"
               value="ducimus"
               data-component="url" hidden>
    <br>
<p>The ID of the category.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-responses">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-responses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/responses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-responses">
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
x-ratelimit-remaining: 50
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 1,
        &quot;employee_id&quot;: 1,
        &quot;quiz_question_id&quot;: 1,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T13:16:51.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:16:51.000000Z&quot;,
        &quot;employee&quot;: {
            &quot;id&quot;: 1,
            &quot;contractor_id&quot;: 1,
            &quot;name&quot;: &quot;Gnandal&quot;,
            &quot;phone&quot;: &quot;5866662&quot;,
            &quot;uid&quot;: &quot;6655&quot;,
            &quot;password&quot;: &quot;7548&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;
        },
        &quot;quiz_question&quot;: {
            &quot;id&quot;: 1,
            &quot;category_id&quot;: 1,
            &quot;description&quot;: &quot;kjfjd&quot;,
            &quot;image&quot;: &quot;uploads/20220818130554_qz_question_image.png&quot;,
            &quot;fr&quot;: &quot;uploads/20220818130554_qz_question_fr.mp3&quot;,
            &quot;ar&quot;: &quot;uploads/20220818130554_qz_question_ar.mp3&quot;,
            &quot;ng&quot;: &quot;uploads/20220818130554_qz_question_ng.mp3&quot;,
            &quot;correct&quot;: 1,
            &quot;created_at&quot;: &quot;2022-08-18T13:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T17:26:32.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;employee_id&quot;: 1,
        &quot;quiz_question_id&quot;: 2,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T13:17:03.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:17:03.000000Z&quot;,
        &quot;employee&quot;: {
            &quot;id&quot;: 1,
            &quot;contractor_id&quot;: 1,
            &quot;name&quot;: &quot;Gnandal&quot;,
            &quot;phone&quot;: &quot;5866662&quot;,
            &quot;uid&quot;: &quot;6655&quot;,
            &quot;password&quot;: &quot;7548&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;
        },
        &quot;quiz_question&quot;: {
            &quot;id&quot;: 2,
            &quot;category_id&quot;: 1,
            &quot;description&quot;: &quot;Quiz 1&quot;,
            &quot;image&quot;: &quot;uploads/20220818131027_qz_question_image.png&quot;,
            &quot;fr&quot;: &quot;uploads/20220818131027_qz_question_fr.mp3&quot;,
            &quot;ar&quot;: &quot;uploads/20220818131027_qz_question_ar.mp3&quot;,
            &quot;ng&quot;: &quot;uploads/20220818131027_qz_question_ng.mp3&quot;,
            &quot;correct&quot;: 0,
            &quot;created_at&quot;: &quot;2022-08-18T13:10:27.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T17:18:33.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;employee_id&quot;: 2,
        &quot;quiz_question_id&quot;: 1,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T13:17:16.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:17:16.000000Z&quot;,
        &quot;employee&quot;: {
            &quot;id&quot;: 2,
            &quot;contractor_id&quot;: 1,
            &quot;name&quot;: &quot;Ismael&quot;,
            &quot;phone&quot;: &quot;5866662&quot;,
            &quot;uid&quot;: &quot;1808&quot;,
            &quot;password&quot;: &quot;9816&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:04:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:04:54.000000Z&quot;
        },
        &quot;quiz_question&quot;: {
            &quot;id&quot;: 1,
            &quot;category_id&quot;: 1,
            &quot;description&quot;: &quot;kjfjd&quot;,
            &quot;image&quot;: &quot;uploads/20220818130554_qz_question_image.png&quot;,
            &quot;fr&quot;: &quot;uploads/20220818130554_qz_question_fr.mp3&quot;,
            &quot;ar&quot;: &quot;uploads/20220818130554_qz_question_ar.mp3&quot;,
            &quot;ng&quot;: &quot;uploads/20220818130554_qz_question_ng.mp3&quot;,
            &quot;correct&quot;: 1,
            &quot;created_at&quot;: &quot;2022-08-18T13:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T17:26:32.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;employee_id&quot;: 1,
        &quot;quiz_question_id&quot;: 4,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T13:17:36.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:17:36.000000Z&quot;,
        &quot;employee&quot;: {
            &quot;id&quot;: 1,
            &quot;contractor_id&quot;: 1,
            &quot;name&quot;: &quot;Gnandal&quot;,
            &quot;phone&quot;: &quot;5866662&quot;,
            &quot;uid&quot;: &quot;6655&quot;,
            &quot;password&quot;: &quot;7548&quot;,
            &quot;created_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;
        },
        &quot;quiz_question&quot;: {
            &quot;id&quot;: 4,
            &quot;category_id&quot;: 1,
            &quot;description&quot;: &quot;Quiz 1&quot;,
            &quot;image&quot;: &quot;uploads/20220818131439_qz_question_image.png&quot;,
            &quot;fr&quot;: &quot;uploads/20220818131439_qz_question_fr.mp3&quot;,
            &quot;ar&quot;: &quot;uploads/20220818131439_qz_question_ar.mp3&quot;,
            &quot;ng&quot;: &quot;uploads/20220818131439_qz_question_ng.mp3&quot;,
            &quot;correct&quot;: 0,
            &quot;created_at&quot;: &quot;2022-08-18T13:14:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-08-18T13:14:39.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-responses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-responses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-responses"></code></pre>
</span>
<span id="execution-error-GETapi-v1-responses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-responses"></code></pre>
</span>
<form id="form-GETapi-v1-responses" data-method="GET"
      data-path="api/v1/responses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-responses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-responses"
                    onclick="tryItOut('GETapi-v1-responses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-responses"
                    onclick="cancelTryOut('GETapi-v1-responses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-responses" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/responses</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-v1-responses">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-responses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/responses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-responses">
</span>
<span id="execution-results-POSTapi-v1-responses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-responses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-responses"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-responses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-responses"></code></pre>
</span>
<form id="form-POSTapi-v1-responses" data-method="POST"
      data-path="api/v1/responses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-responses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-responses"
                    onclick="tryItOut('POSTapi-v1-responses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-responses"
                    onclick="cancelTryOut('POSTapi-v1-responses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-responses" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/responses</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-responses--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-responses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/responses/eaque" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses/eaque"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-responses--id-">
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
x-ratelimit-remaining: 49
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;id&quot;: 1,
    &quot;employee_id&quot;: 1,
    &quot;quiz_question_id&quot;: 1,
    &quot;correct&quot;: 1,
    &quot;created_at&quot;: &quot;2022-08-18T13:16:51.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-08-18T13:16:51.000000Z&quot;,
    &quot;employee&quot;: {
        &quot;id&quot;: 1,
        &quot;contractor_id&quot;: 1,
        &quot;name&quot;: &quot;Gnandal&quot;,
        &quot;phone&quot;: &quot;5866662&quot;,
        &quot;uid&quot;: &quot;6655&quot;,
        &quot;password&quot;: &quot;7548&quot;,
        &quot;created_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T13:04:36.000000Z&quot;
    },
    &quot;quiz_question&quot;: {
        &quot;id&quot;: 1,
        &quot;category_id&quot;: 1,
        &quot;description&quot;: &quot;kjfjd&quot;,
        &quot;image&quot;: &quot;uploads/20220818130554_qz_question_image.png&quot;,
        &quot;fr&quot;: &quot;uploads/20220818130554_qz_question_fr.mp3&quot;,
        &quot;ar&quot;: &quot;uploads/20220818130554_qz_question_ar.mp3&quot;,
        &quot;ng&quot;: &quot;uploads/20220818130554_qz_question_ng.mp3&quot;,
        &quot;correct&quot;: 1,
        &quot;created_at&quot;: &quot;2022-08-18T13:05:54.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-08-18T17:26:32.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-responses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-responses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-responses--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-responses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-responses--id-"></code></pre>
</span>
<form id="form-GETapi-v1-responses--id-" data-method="GET"
      data-path="api/v1/responses/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-responses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-responses--id-"
                    onclick="tryItOut('GETapi-v1-responses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-responses--id-"
                    onclick="cancelTryOut('GETapi-v1-responses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-responses--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/responses/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-v1-responses--id-"
               value="eaque"
               data-component="url" hidden>
    <br>
<p>The ID of the response.</p>
            </p>
                    </form>

            <h2 id="endpoints-PUTapi-v1-responses--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-responses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/responses/voluptatem" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/responses/voluptatem"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-responses--id-">
</span>
<span id="execution-results-PUTapi-v1-responses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-responses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-responses--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-responses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-responses--id-"></code></pre>
</span>
<form id="form-PUTapi-v1-responses--id-" data-method="PUT"
      data-path="api/v1/responses/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-responses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-responses--id-"
                    onclick="tryItOut('PUTapi-v1-responses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-responses--id-"
                    onclick="cancelTryOut('PUTapi-v1-responses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-responses--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/responses/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/responses/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="PUTapi-v1-responses--id-"
               value="voluptatem"
               data-component="url" hidden>
    <br>
<p>The ID of the response.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v1-quizzes--employee_id--notanswered">GET api/v1/quizzes/{employee_id}/notanswered</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-quizzes--employee_id--notanswered">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/quizzes/natus/notanswered" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/quizzes/natus/notanswered"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-quizzes--employee_id--notanswered">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Undefined variable $q&quot;,
    &quot;exception&quot;: &quot;ErrorException&quot;,
    &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\app\\Http\\Controllers\\Api\\QuizQuestionController.php&quot;,
    &quot;line&quot;: 164,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php&quot;,
            &quot;line&quot;: 259,
            &quot;function&quot;: &quot;handleError&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Bootstrap\\HandleExceptions&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\app\\Http\\Controllers\\Api\\QuizQuestionController.php&quot;,
            &quot;line&quot;: 164,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Bootstrap\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Bootstrap\\HandleExceptions&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php&quot;,
            &quot;line&quot;: 1301,
            &quot;function&quot;: &quot;App\\Http\\Controllers\\Api\\{closure}&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\Api\\QuizQuestionController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships.php&quot;,
            &quot;line&quot;: 61,
            &quot;function&quot;: &quot;callScope&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships.php&quot;,
            &quot;line&quot;: 127,
            &quot;function&quot;: &quot;has&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships.php&quot;,
            &quot;line&quot;: 195,
            &quot;function&quot;: &quot;doesntHave&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php&quot;,
            &quot;line&quot;: 23,
            &quot;function&quot;: &quot;whereDoesntHave&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php&quot;,
            &quot;line&quot;: 2191,
            &quot;function&quot;: &quot;forwardCallTo&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php&quot;,
            &quot;line&quot;: 2203,
            &quot;function&quot;: &quot;__call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\app\\Http\\Controllers\\Api\\QuizQuestionController.php&quot;,
            &quot;line&quot;: 165,
            &quot;function&quot;: &quot;__callStatic&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;notanswered&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\Api\\QuizQuestionController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 261,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php&quot;,
            &quot;line&quot;: 204,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 725,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\sanctum\\src\\Http\\Middleware\\EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 33,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\{closure}&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\sanctum\\src\\Http\\Middleware\\EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 726,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 703,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 667,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php&quot;,
            &quot;line&quot;: 656,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 123,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 80,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\GroupedEndpoints\\GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php&quot;,
            &quot;line&quot;: 651,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 139,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\symfony\\console\\Command\\Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php&quot;,
            &quot;line&quot;: 124,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 998,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\symfony\\console\\Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;C:\\Users\\Ismae\\Downloads\\safetyapp_web\\artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-quizzes--employee_id--notanswered" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-quizzes--employee_id--notanswered"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-quizzes--employee_id--notanswered"></code></pre>
</span>
<span id="execution-error-GETapi-v1-quizzes--employee_id--notanswered" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-quizzes--employee_id--notanswered"></code></pre>
</span>
<form id="form-GETapi-v1-quizzes--employee_id--notanswered" data-method="GET"
      data-path="api/v1/quizzes/{employee_id}/notanswered"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-quizzes--employee_id--notanswered', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-quizzes--employee_id--notanswered"
                    onclick="tryItOut('GETapi-v1-quizzes--employee_id--notanswered');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-quizzes--employee_id--notanswered"
                    onclick="cancelTryOut('GETapi-v1-quizzes--employee_id--notanswered');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-quizzes--employee_id--notanswered" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/quizzes/{employee_id}/notanswered</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="employee_id"
               data-endpoint="GETapi-v1-quizzes--employee_id--notanswered"
               value="natus"
               data-component="url" hidden>
    <br>
<p>The ID of the employee.</p>
            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
