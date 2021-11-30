$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $('.comment-button').click(function (e) {
        e.preventDefault();



        let postId = $(this).attr('id');
        $("#list-" + postId).toggleClass('d-none', 'd-done');


        if ($(this).parents('#' + $(this).attr('id').length)) {
            let text = $(this).text();
            $(this).text(
                text == "Hide comments" ? "Show comments" : "Hide comments");

                getComments(postId);
        }

    });


    $('.add-comment').click(function (e) {
        e.preventDefault();
        let id = $(this).attr("id");
        form_data = $("#comment-form-"+id).serialize()
        $.ajax({
            type: "post",
            url: "comment",
            data: form_data,
            success: function (response) {
                $("#comment_content-"+id).val("");
                $('#list-' + id).removeClass('loaded');
                getComments(id);
            }
        });
    });
});


function getComments(postId){
    $.ajax({
        type: "get",
        url: "post/" + postId,
        data: "data",
        success: function (response) {

            // console.log(response);



            if (!$('#list-' + postId).hasClass('loaded')) {

                response.forEach(element => {

                   if(!$("#"+element.id).hasClass('comment-loaded')){


                    if (element.post_id == postId) {
                        let html_comment = '<div id="'+element.id+'" class="card p-3 comment-loaded">' +
                            '<div class="d-flex justify-content-between align-items-center">' +
                            '<div class="user d-flex flex-row align-items-center">' +
                            '<img src="" width="30" class="user-img rounded-circle mr-2">' +
                            '<span><small id="user_data-' + element.id + '" class="font-weight-bold text-primary"></small><br>' +
                            '<small id="comment_content-' + element.id + '" class="font-weight-bold"></small></span>' +
                            '</div> <small></small>' +
                            '</div>' +
                            '</div>';

                        $("#list-" + postId).append(html_comment);
                        $("#user_data-" + element.id).text(element.user_name + " " + element.last_name);
                        $('#comment_content-' + element.id).text(element.content);
                    }
                }
                });

            }
            if (!$('#list-' + postId).hasClass('loaded'))
                $('#list-' + postId).addClass('loaded');
        }
    });
}
