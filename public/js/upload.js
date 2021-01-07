$(document).ready(function() {
    $('input[type=file]').change(function() {
        //console.log(this.files);
        var f = this.files;
        var el = $(this).parent();
        var result = document.getElementById("profile_picture");
        result.style.backgroundColor = "#90EE90";
        // if (f.length > 1) {
        //     console.log(this.files, 1);
        //     el.text('Sorry, multiple files are not allowed');
        //     return;
        // }
        // el.removeClass('focus');
        // el.css(f[0].name + '<br>' +
        //     '<span class="sml">' +
        //     'type: ' + f[0].type + ', ' +
        //     Math.round(f[0].size / 1024) + ' KB</span>');

    });

    $('input[type=file]').on('focus', function() {
        $(this).parent().addClass('focus');
    });

    $('input[type=file]').on('blur', function() {
        $(this).parent().removeClass('focus');
    });

});
