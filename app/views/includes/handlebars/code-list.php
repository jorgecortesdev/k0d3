<script id="code-list-template" type="text/x-handlebars-template">
<ul class="list-group">
    {{#each code}}
    <li class="list-group-item"><a href="/code/{{id}}">{{name}}</a></li>
    {{/each}}
</ul>
</script>