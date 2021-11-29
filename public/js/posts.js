$(document).ready(function () {




    let sizeOfPosts;
    $.getJSON("/post",
        function (textStatus, jqXHR) {
            sizeOfPosts = Object.keys(textStatus).length;
        }
    );


    setInterval(function () {

        $.ajax({
            type: "get",
            url: "/post",
            // dataType: "json",
            success: function (response) {
                let newSizeOfPosts = Object.keys(response).length;

                if (newSizeOfPosts > sizeOfPosts) {
                    let numberOfPosts = newSizeOfPosts - sizeOfPosts;
                    $("#posts-alert").show();
                    if (numberOfPosts == 1)
                        $("#post-text-alert").text("There is " + numberOfPosts + " new post!");
                    else if (numberOfPosts > 1)
                        $("#post-text-alert").text("There are " + numberOfPosts + " new posts!");

                }
            }
        });

    }, 3000);
});
