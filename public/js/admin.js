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

    var content =  document.getElementById('content');
    if (typeof(content) !== undefined && content !== null)
    {
        CKEDITOR.replace('content', {
            language: 'vi',
            height: '500px',
            filebrowserUploadUrl: document.getElementById('blog-image').value,
            filebrowserUploadMethod: 'form',
        });
    }
});

$(document)
.on('click', '.img-card', function (e) {
    $('.img-card').removeClass('selected');
    $(this).addClass('selected');
    $("#imageFrame").find('.modal-footer').text($(this).attr('src'));
});

function convertToSlug(str) {
    // Chuyển hết sang chữ thường
	str = str.toLowerCase();     
 
	// xóa dấu
	str = str
	    .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
		.replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
 
	// Thay ký tự đĐ
	str = str.replace(/[đĐ]/g, 'd');
	
	// Xóa ký tự đặc biệt
	str = str.replace(/([^0-9a-z-\s])/g, '');
 
	// Xóa khoảng trắng thay bằng ký tự -
	str = str.replace(/(\s+)/g, '-');
	
	// Xóa ký tự - liên tiếp
	str = str.replace(/-+/g, '-');
 
	// xóa phần dư - ở đầu & cuối
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
