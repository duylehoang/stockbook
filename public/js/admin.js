$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $('.confirm-delete').click(function(e){
        e.preventDefault();
        $("#deleteButton").val($(this).attr('href'));
        $('#deleteModal').modal('show');
    });

    $("#deleteButton").click(function () {
        let url = $(this).val();
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function (data) {
                $("#deleteModal").modal("hide");
                if (data.status === 'success') {
                    location.reload();
                } else {
                    iziToast.error({
                        title: "Error:",
                        message: data.message,
                        position: 'topRight'
                    });
                }
            },
            error: function (xhr, status, error) {
                let errorMessage = xhr.status + ': ' + xhr.statusText;
                alert(errorMessage);
            }
        });
    });

    $('.convert-to-slug').focusout(function(){
        let slug = convertToSlug(this.value);
        $(this).val(slug);
    });

    $('#post-bg').change(function(e){
        $('.list-post-bg > img').addClass('disabled');
        if(this.value) {
            $('.list-post-bg').find('#' + this.value).removeClass('disabled');
        } 
    });

    $("#change-pwd-button").click(function(e){
        $('.change-pwd').toggleClass('disabled');
    });

    $('.card-toggle').click(function(){
        $(this).closest('.card').find('.card-body').slideToggle(); 
        
        if ($(this).hasClass('fa-chevron-down')) {
            $(this).removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else {
            $(this).removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });

    $("#loadImageFrame").click(function () {
        let url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $("#imageFrame").find('.modal-body').html(response);
                $("#imageFrame").modal("show");
            },
            error: function (xhr, status, error) {
                let errorMessage = xhr.status + ': ' + xhr.statusText;
                alert(errorMessage);
            }
        });
    });

    $(".view").click(function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let diary_date = $(this).data('date');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $("#tradingView").find('.modal-title').text(diary_date);
                $("#tradingView").find('.modal-body').html(response);
                $("#tradingView").modal("show");
            },
            error: function (xhr, status, error) {
                let errorMessage = xhr.status + ': ' + xhr.statusText;
                alert(errorMessage);
            }
        });
    });

    var content =  document.getElementById('content');
    if (typeof(content) !== undefined && content !== null)
    {
        var ck_image =  document.getElementById('ck_image');
        if (typeof(ck_image) !== undefined && ck_image !== null) {
            CKEDITOR.replace('content', {
                language: 'vi',
                height: '500px',
                filebrowserUploadUrl: document.getElementById('ck_image').value,
                filebrowserUploadMethod: 'form',
            });
        } else {
            CKEDITOR.replace('content', {
                language: 'vi',
                height: '400px',
            });
        }
    }
});

$(document)
.on('click', '.img-card', function (e) {
    $('.img-card').removeClass('selected');
    $(this).addClass('selected');
    $("#imageFrame").find('.modal-footer').text($(this).attr('src'));
});

function convertToSlug(str) {
    // Chuy???n h???t sang ch??? th?????ng
	str = str.toLowerCase();     
 
	// x??a d???u
	str = str
	    .normalize('NFD') // chuy???n chu???i sang unicode t??? h???p
		.replace(/[\u0300-\u036f]/g, ''); // x??a c??c k?? t??? d???u sau khi t??ch t??? h???p
 
	// Thay k?? t??? ????
	str = str.replace(/[????]/g, 'd');
	
	// X??a k?? t??? ?????c bi???t
	str = str.replace(/([^0-9a-z-\s])/g, '');
 
	// X??a kho???ng tr???ng thay b???ng k?? t??? -
	str = str.replace(/(\s+)/g, '-');
	
	// X??a k?? t??? - li??n ti???p
	str = str.replace(/-+/g, '-');
 
	// x??a ph???n d?? - ??? ?????u & cu???i
	str = str.replace(/^-+|-+$/g, '');
 
	// return
	return str;
}

function readURL(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#reviewImage').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
