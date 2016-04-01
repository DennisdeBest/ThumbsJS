$(function() {
    console.log("JS loaded");

    var data = [];
    var imgNameArray = [];
    function get_files(callback){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "thumbs/get_images.php",
            cache: false,
            data:data,
            success: function(data){
                //console.log("Ajax done");
                //console.log(data);
                $.each(data, function(k, v) {
                    var html = "<div class='thumbnail' id='mini_"+k+"'>" +
                        "<img src='thumbs/img/small/"+v+"'/>" +
                        "</div>";
                    //console.log("Key "+k+" Value "+v);

                    $('#thumbnails').append(html);
                    imgNameArray.push(v);
                });
                callback();
            }
        });
    }

    function setHover() {
        $('.thumbnail').mouseover(function()
        {
            var id = $(this).attr("id");
            id = id.replace("mini_","");
            var image = imgNameArray[id];
            var html = "<img src='thumbs/img/large/"+image+"'/>";
            $('#largeImg').html(html)
        });
        }

    get_files(setHover);
});
