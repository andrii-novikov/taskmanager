App = {
    init: function () {
        $(document).off('submit','#todolist-form');
        $(document).on('submit', '#todolist-form', App.onSubmitTodolist);

        $('[name=deleteList]').click(App.deleteList);
        $('[data-toggle=modal]').click(App.loadModal);
    },

    loadModal: function (e) {
        e.preventDefault();
        $.get($(this).attr('href')).then(function (resp) {
            $('.modal-content').html(resp);
        });
    },

    onSubmitTodolist: function (e) {
        e.preventDefault();

        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: form.serialize(),
            success: function (result) {
                $('.container.todolists').html(result);
                $('#modal').modal('hide');
                App.init();
            },
            error: function (res) {
                console.log(res);
                $('.modal-body').html(res.responseText);
            }
        });
    },

    deleteList: function (e) {
        e.preventDefault();
        if (confirm('Вы уверены что хотите удалить?')) {
            $.ajax({
                url: $(this).attr('href'),
                type: "POST",
                success: function (result) {
                    $('.container.todolists').html(result);
                    App.init();
                },
                error: function (res) {
                    console.log(res);
                    $('.modal-body').html(res.responseText);
                }
            });
        }
    }
};

$(document).ready(App.init);
