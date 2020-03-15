
$('#form').on('submit', function(){
    var formData = new FormData(this);
    $.ajax({
          type: "POST",
          url: "../controllers/form.php",
          data:  formData,
          processData: false,
          contentType: false,
          success: function(data){
            $('#form')[0].reset();
            $('.form_answer').addClass("form_answer-ok");
            $('.form_answer').append("Ваш отзыв успешно добавлен!");
            setTimeout(function(){
                $('.form_answer').removeClass("form_answer-ok");
            }, 2000);
            
            var answer = eval(data);
            
            if(answer.image){
                var image = '<img src="../uploads/' + answer.image +'">';
            }else{
                var image = '<div class="no-img">?</div>';
            };

            $('.reviews').prepend('<div class="reviews_item">' + image + '<p>' + answer.review + '</p><h6>' + answer.name + ' '+ answer.publictime +'</h6></div>');
            
          },
          dataType : "json"
     });
    return false;
});

$("#form-mail").change(function(){
    $("#form-mail").on('keyup',function(e){
        var mail = $("#form-mail").val();
        if (mail.match(/@/)) {
            $(this).removeClass("form-txt_error");
            $(".submit").removeClass("no-submit");
        } else {
            $(this).addClass("form-txt_error");
            $(".submit").addClass("no-submit");
            if ($(this).val() == "") $(this).removeClass("form-txt_error");
        }
    })
    $("#form-mail").keyup();
});