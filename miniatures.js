$(function() {
    console.log("JS loaded");

    var data = [];
    var imgNameArray = [];
    function get_files(callback){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "get_images.php",
            cache: false,
            data:data,
            success: function(data){
                //console.log("Ajax done");
                //console.log(data);
                $.each(data, function(k, v) {
                    if(v != "." && v != "..")
                    {
                    var html = "<div class='miniatureImage' id='mini_"+k+"'>" +
                        "<img src='img/small/"+v+"'/>" +
                        "</div>";
                    //console.log("Key "+k+" Value "+v);

                    $('#miniatures').append(html);
                    }
                    imgNameArray.push(v);
                });
                callback();
            }
        });
    }

    function setHover() {
        $('.miniatureImage').mouseover(function()
        {
            var id = $(this).attr("id");
            id = id.replace("mini_","");
            var image = imgNameArray[id];
            var html = "<img src='img/large/"+image+"'/>";
            $('#maxiature').html(html)
        });
        }

    get_files(setHover);
});
