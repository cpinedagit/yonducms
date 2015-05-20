/**
 * Customized Menu
 * Author : Allan Perez
 * Copyright 2015
 * 
 */

$(document).ready(function ()
{

// add menu from pages
    $('#addPagestonavi').click(function () {
        var tagitem = document.getElementsByClassName('dd-item');
        var nestablecount = tagitem.length + 1;

        var len = $("input[name='pages[]']:checked").length;

        $('.check_pages:checked').each(function () {

            var label = $(this).val();
            var page_id = $(this).data('page_id');
            $.ajax({
                type: 'POST',
                url: window.location + "/addpagetomenu",
                data: {'label': label, 'page_id': page_id, 'order_id': nestablecount, '_token': $('[name=_token').val()},
                success: function (response) {

                    var htmlmenu = "<li id='idli_" + response['last_id'] + "' class='dd-item' data-menu_id='" + response['last_id'] + "' data-page_id='" + page_id + "' data-parent_id='0' data-label='" + label + "'><div class='dd-handle'  id='target_" + response['last_id'] + "'>" + label + "</div><button class='circle btn--remove-menu' onclick='delThis(" + response['last_id'] + ")'></button></li>";

                    $(htmlmenu).hide().appendTo("#list-cont").fadeIn(1000);
                    nestablecount++;
                    updateOutput($('#nestable').data('output', $('#nestable-output')));

                    len--;
                    if (len === 0)
                    {
                        $(".nestable-lists .dd-item").mousedown(function (e) {
                            var mousetarget = e.target;

                            // enable text input
                            if ($(mousetarget).hasClass('delete-item')) {
                            } else {

                                $('#menu_label').attr('readonly', false);
                                $("#clear_btn").attr('disabled', false);

                                $('#saveMenuChanges').attr('disabled', false);

                                $('#menu_id').val($(mousetarget).closest('.dd-item').attr('data-menu_id'));
                                $('#menu_label').val(mousetarget.closest('.dd-handle').innerText);
                            }


                        });
                    }

                },
                error: function () { // if error occured
                    alert("Error: try again");
                }
            });

        });

    });

    // activate Nestable for list
    $('#nestable').nestable();

    var updateOutput = function ()
    {
        getval = new Array();
        countr = 0;
        $('#nestable').find('li').each(function () {
            getval[countr] = Array(
                    $(this).attr('data-menu_id'), //PK
                    $(this).parent().parent().attr('data-menu_id'), //parent id
                    $(this).index() + 1, //1 page order
                    $(this).attr('data-page_id'),
                    $(this).attr('data-label')
                    );
            countr++;
        });
        $('#nestable-output').val(JSON.stringify(getval));
    };

    // activate Nestable for list
    $('#nestable').nestable({
    })
            .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    function updateTips(t) {
        tips
                .text(t)
                .addClass("ui-state-highlight");
        setTimeout(function () {
            tips.removeClass("ui-state-highlight", 1500);
        }, 500);
    }
});

// changes name and url textboxes if clicked
$('.nestable-lists .dd-item').each(function () {
    $(this).mousedown(function (e) {
        var mousetarget = e.target;
//            console.log(mousetarget);
        // enable text input
        if ($(mousetarget).hasClass('delete-item')) {
        } else {
            $('#menu_label').attr('readonly', false);
            $("#clear_btn").attr('disabled', false);

            $('#saveMenuChanges').attr('disabled', false);
            $('#menu_id').val($(mousetarget).closest('.dd-item').attr('data-menu_id'));
            $('#menu_label').val(mousetarget.closest('.dd-handle').innerText);
        }

    });
});


$('#saveMenuChanges').click(function () {
    var data = $("#menu_form").serialize();

    $.ajax({
        type: 'POST',
        url: window.location + "/updatelabel",
        data: data,
        success: function () {
            data_id = $('#menu_id').val();
            $("div #target_" + data_id).html($('#menu_label').val());
            autoClear();
        },
        error: function () { // if error occured
            alert("Error: select menu and try again");
        },
    });

});


function saveMenuStructure() {
    var data = $("#structure_menu").serialize();
    $.ajax({
        type: 'POST',
        url: window.location + "/updatemenu",
        data: data,
        success: function () {
           // $("#alertSaveData").show().delay(1000).fadeOut();
        },
        error: function () { // if error occured
            alert("Error: try again");
        },
    });
}

$('#selectUs').click(function (event) {
    if (this.checked) { // check select status
        $('.checkbox input[type="checkbox"]').each(function () { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1"               
        });
    } else {
        $('.checkbox input[type="checkbox"]').each(function () { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
        });
    }
});



function autoClear() {
    $('#menu_id').val('');
    $('#menu_label').val('');
    $('#saveMenuChanges').attr('disabled', true);
    $('#menu_label').attr('readonly', true);
    $("#clear_btn").attr('disabled', true);
}

function delThis(idMenu) {
    if (confirm('this action will affect to data record permanently, are you sure of this?')) {
        autoClear();

        $.ajax({
            type: 'POST',
            url: window.location + "/deletemenu",
            data: {'del_id': idMenu, '_token': $('[name=_token').val()},
            success: function () {
                $("#idli_" + idMenu).remove();
            },
            error: function () {
                alert("Error: try again");
            }
        });

    }
}
