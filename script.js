folder_list();

function folder_list(){
    var action = "fetch";
    $.ajax({
        url: "",
        method: "POST",
        data: {action: action},
        success: function(data){
            $('#').html(data);
        }
    })
}

$(document).on('click', '#creste-new-subject', function(){
    $('')
});