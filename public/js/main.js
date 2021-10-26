$('#myform').submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: $(this).attr('method'),
        url: 'add.php',
        data: $(this).serialize(),
        async: false,
        dataType: "html",
        success: function (data) {
            $('#text').val('');
            $('#short_url').val(data);
        }
    });
});

$('#text').keyup(function() {
    $('#short_url').val('');
});