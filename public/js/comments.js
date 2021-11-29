$(document).ready(function () {


    $('.comment-button').click(function (e) {
        e.preventDefault();

        let test = true;

        let postId = $(this).attr('id');



        if ($(this).parents('#' + $(this).attr('id').length)) {
            let text = $(this).text();
            $(this).text(
                text == "Hide comments" ? "Show comments" : "Hide comments");
            $.ajax({
                type: "get",
                url: "post/" + postId,
                data: "data",
                success: function (response) {

                    // console.log(response);
                    $("#list-" + postId).toggleClass('d-none', 'd-done');


                    if (!$('#list-' + postId).hasClass('loaded')) {

                        response.forEach(element => {

                            if (element.post_id == postId) {
                                let html_comment = '<div class="card p-3">' +
                                    '<div class="d-flex justify-content-between align-items-center">' +
                                    '<div class="user d-flex flex-row align-items-center">' +
                                    '<img src="" width="30" class="user-img rounded-circle mr-2">' +
                                    '<span><small id="user_data-' + element.id + '" class="font-weight-bold text-primary"></small><br>' +
                                    '<small id="comment_content-'+element.id+'" class="font-weight-bold"></small></span>' +
                                    '</div> <small></small>' +
                                    '</div>' +
                                    '</div>';

                                $("#list-" + postId).append(html_comment);
                                $("#user_data-" + element.id).text(element.user_name + " " + element.last_name);
                                $('#comment_content-'+element.id).text(element.content);
                            }
                        });
                    }
                    if (!$('#list-' + postId).hasClass('loaded'))
                        $('#list-' + postId).addClass('loaded');
                }
            });

        }

    });

});
