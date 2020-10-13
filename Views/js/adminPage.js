$(document).ready(function(){

    $.ajax({
        url: "/admin/get",
        dataType: "json",
        success: function (response) {

            fillTable(response);

        }
    });
$(document).on('keyup','#search', function () {

    var search = $('#search').val();
    $('.column-row').remove();
    $.ajax({
        url: "/admin/search",
        type: "POST",
        dataType: "json",

        data:{search:search},
        success: function (response) {

            fillTable(response);

        }
    });

});
function fillTable(data) {
    $(data.users).each(function (row,values) {
        var verefied = '';
        if(values.verified == '1'){
            verefied = 'verefied'
        }else {
            verefied = '<a href="verify/'+ values.token +'" class="btn btn-primary"> Verify </a>'
        }
        $("tbody").append('<tr class="column-row">' +
            '<td>' + values.id +'</td>' +
            '<td> <img src="'+data.path+ values.photo_name+'" alt="avatar"></td>'+
            '<td>'+ values.email +'</td>' +
            '<td>'+ verefied +'</td>' +
            '<td id="role'+values.id+'">' + values.name + '</td>' +
            '<td>' + '<a href="admin/edit/'+ values.id +'" class="btn btn-primary">Edit</a>' + '</td>' +
            '</tr>')

        if (data.role == 1) {
            $("#role"+values.id+"").append('<form  action="admin/changerole" method="post">' +
                '<p><select name="role" size="3" class="select-role form-control">' +
                '<option disabled>Roles</option>' +
                '' +
                '</select></p>' +
                '<p><input type="submit" value="Add role" class="btn btn-primary"></p>' +
                ' <input type="hidden" name="userId" value="' + values.id + '">' +
                '</form>')

        }
    })
    console.log(data.role);
    if (data.role == 1){

        $(data.roles).each(function (row,values) {
            $('<option value="'+ values.id +'">'+ values.name +'</option>').appendTo(".select-role");
        })
    }

}
});
