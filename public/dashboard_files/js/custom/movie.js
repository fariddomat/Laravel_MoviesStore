$(document).ready(function () {
    $('#movie__file-input').on('change', function () {
        $('#movie__input-wrapper').css('display', 'none');
        $('#movie__input-wrapper').removeClass('d-flex justify-content-center align-items-center flex-column');
        $('#movie_properties').css('display', 'block');

        var url=$(this).data('url');


        var movie = this.files[0];

        var movieName = movie.name.split('.').slice(0, -1).join('.');
        $('#movie__name').val(movieName);
        var movieId = $(this).data('movie-id');


        var formData = new FormData();
        formData.append('movie_id', movieId);
        formData.append('name', movieName);
        formData.append('movie', movie);
        // console.log(formData);



        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            success: function (movieBeforeProcessing) {

                var interval = setInterval(function () {

                    $.ajax({
                        url: `/dashboard/movies/${movieBeforeProcessing.id}`,
                        method: 'GET',
                        success: function (movieWhileProcessing) {

                            //     $('#movie__upload-status').html('Processing').addClass('bg-warning text-white p-1');
                            //     $('#movie__upload-progress').css('width', movieWhileProcessing.percent + '%');
                            //     $('#movie__upload-progress').html(movieWhileProcessing.percent + '%');

                            // if (movieWhileProcessing.percent == 100) {
                                clearInterval(interval); //break interval
                                $('#movie__upload-status').html('Done Processing').removeClass('bg-warning').addClass('bg-success');
                                $('#movie__upload-progress').parent().css('display', 'none');
                                $('#movie__submit-btn').css('display', 'block');
                            // }
                        },
                    });//end of ajax call

                }, 3000)

            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round(evt.loaded / evt.total * 100) + "%";
                        $('#movie__upload-progress').css('width', percentComplete).html(percentComplete)
                    }
                }, false);
                return xhr;
            },
        });//end of ajax call
        // movie__upload-progress
    });


});
