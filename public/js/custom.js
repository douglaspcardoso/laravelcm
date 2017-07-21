$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    /*
    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    $('#sobre-summernote-title').summernote({
        height: 150
    });

    $('#sobre-summernote-description').summernote({
        height: 300
    });

    $("#gallery_images").fileinput({
        language: "pt-BR",
        showCaption: false,
        showUpload: false
    });

    var menuActive = $('a[href="' + this.location.pathname + '"]').parent('li').get(0);
    $(menuActive).addClass('active');

    var menuActiveParents = $(menuActive).parents('li');

    for (var i = 0; i < menuActiveParents.length; i++) {
        var collapse = $(menuActiveParents).get(i);
        $(collapse).children('ul').addClass('in');
        $(collapse).children('ul').attr('aria-expanded', 'true');
        $(collapse).children('a').removeClass('collapsed');
        $(collapse).children('a').attr('aria-expanded', 'true');
    }
});