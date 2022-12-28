/*!
* Start Bootstrap - Clean Blog v6.0.8 (https://startbootstrap.com/theme/clean-blog)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-clean-blog/blob/master/LICENSE)
*/
window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                console.log(123);
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
})

$(document).ready(function(){
    // Pre Loader
    let loading = $('.overloading').hide();
    $(document).ajaxStart(function () {
        loading.show();
    })
    .ajaxStop(function () {
        loading.hide();
    });

    $('.card-toggle').click(function(){
        $(this).closest('.card').find('.card-body').slideToggle(); 
        
        if ($(this).hasClass('fa-chevron-down')) {
            $(this).removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else {
            $(this).removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });

    // Popup image
    $("article img").click(function () {
        $("#full-image").attr("src", $(this).attr("src"));
        $('#image-viewer').show();
    });

    $("#image-viewer .close").click(function () {
        $('#image-viewer').hide();
    });

    $("#sendContact").submit(function(e){
        e.preventDefault();
        var form = $(this);
        let action = form.attr('action');
        console.log(form.serialize());
        $.ajax({
            url: action,
            type: "POST",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': form.find('input[name="_token"]').attr('value')
            },
            data: form.serialize(),
            success: function (data) {
                if (data.status == 'error') {
                    alert(data.message);
                } else {
                    $('#contact_container').html(data.html);
                }
            },
            error: function (error) {
                if (error.status === 422) { // when status code is 422, it's a validation issue
                    listError = error.responseJSON.errors
                    $(".invalid").empty();
                    $.each(listError, function (key, val) {
                        $("#error_" + key).text(val[0]);
                    });
                } else {
                    alert(error.statusText);
                }
            }
        });
    });
});


