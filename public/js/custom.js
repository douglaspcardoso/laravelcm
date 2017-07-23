$(document).ready( function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
        height: 50,
        toolbar: []
    });

    $('#sobre-summernote-description').summernote({
        height: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']]
        ]
    });

    /*
    $("#gallery_images").fileinput({
        language: "pt-BR",
        showCaption: false,
        showUpload: false,
        uploadUrl: '/admin/page/uniformes-produtos'
    });
    */

    $.get("/admin/page/uniformes-produtos/load", function (data) {
        var images = [];
        var configs = [];

        for (var i in data.images) {
            images.push('http://localhost:8000' + data.images[i].image);
            configs.push({
                caption: data.images[i].image,
                width: "120px",
                url: "/admin/page/uniformes-produtos/delete/" + data.images[i].id,
                key: data.images[i].id
            });
        }

        $("#uniformes_gallery_images").fileinput({
            uploadUrl: "/admin/page/uniformes-produtos", // server upload action
            uploadAsync: true,
            minFileCount: 1,
            maxFileCount: 5,
            overwriteInitial: false,
            initialPreview: images,
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            initialPreviewConfig: configs
        });
    });

    $('#uniformes_gallery_images').on('filesorted', function(event, params) {
        $.post("/admin/page/uniformes-produtos/reorder", {data: params.stack}, function(result){

        });
    });

    $.get("/admin/page/camisaria-produtos/load", function (data) {
        var images = [];
        var configs = [];

        for (var i in data.images) {
            images.push('http://localhost:8000' + data.images[i].image);
            configs.push({
                caption: data.images[i].image,
                width: "120px",
                url: "/admin/page/camisaria-produtos/delete/" + data.images[i].id,
                key: data.images[i].id
            });
        }

        $("#camisaria_gallery_images").fileinput({
            uploadUrl: "/admin/page/camisaria-produtos", // server upload action
            uploadAsync: true,
            minFileCount: 1,
            maxFileCount: 5,
            overwriteInitial: false,
            initialPreview: images,
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            initialPreviewConfig: configs
        });
    });

    $('#camisaria_gallery_images').on('filesorted', function(event, params) {
        $.post("/admin/page/camisaria-produtos/reorder", {data: params.stack}, function(result){

        });
    });

    $.get("/admin/page/uniformes-clientes/load", function (data) {
        var details = [];
        var configs = [];

        for (var i in data.details) {
            details.push('http://localhost:8000' + data.details[i].image);
            configs.push({
                caption: data.details[i].image,
                width: "120px",
                url: "/admin/page/uniformes-clientes/delete/" + data.details[i].id,
                key: data.details[i].id
            });
        }

        $("#clientes_gallery_images").fileinput({
            uploadUrl: "/admin/page/uniformes-clientes", // server upload action
            uploadAsync: true,
            minFileCount: 1,
            maxFileCount: 5,
            overwriteInitial: false,
            initialPreview: details,
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            initialPreviewConfig: configs
        });
    });

    $('#clientes_gallery_images').on('filesorted', function(event, params) {
        $.post("/admin/page/uniformes-clientes/reorder", {data: params.stack}, function(result){

        });
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