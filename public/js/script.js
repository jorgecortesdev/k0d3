var timer;

$(document).ready(function() {
    var $tags = $('#tags');
    $tags.selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField: ['name'],
        maxOptions: 5,
        persist: false,
        create: false,
        load: function (query, callback) {
            if (!query.length) return callback();
            clearInterval(timer);
            timer = setTimeout(function () {
                $.ajax({
                    url: '/tags',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        q: query
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        callback(res.data);
                    }
                });
            }, 300);
        }
    });

    var selectize_tags = $tags[0].selectize;
    var tagsArray = $tags.data('value');
    if (tagsArray) {
        $.each(tagsArray, function(idx, obj) {
            selectize_tags.addOption({
                name: obj.name,
                id: obj.id
            });
            selectize_tags.addItem(obj.id);
        });
    }

    $('.selectpicker').selectpicker();

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/php");
    editor.getSession().setValue($('#script').val());

    $('#selectMode').on('change', function(e) {
        editor.getSession().setMode("ace/mode/" + this.value);
    });

    $('#form').on('submit', function() {
        $('#script').val(editor.getSession().getValue());
    });
});