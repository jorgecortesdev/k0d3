$(document).ready(function() {
    var code_list_template = Handlebars.compile($('#code-list-template').html());
    $.get('/code', function(data, status, xhr) {
        var html = code_list_template({code:data});
        $('#code-list').append(html);
    });
});