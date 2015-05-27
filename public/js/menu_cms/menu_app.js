/**
 * Customized Menu
 * Author : Allan Perez
 * Copyright 2015
 * 
 */

$(document).ready(function ()
{
    functionReadyToEditMenu();
// add menu from pages
    $('#addPagestonavi').click(function () {
        var tagitem = document.getElementsByClassName('dd-item');
        var nestablecount = tagitem.length + 1;

        var len = $("input[name='pages[]']:checked").length;
        $('.check_pages:checked').each(function () {

            var label = $(this).val();
            var page_id = $(this).data('page_id');
            var slug = $(this).data('url');

            $.ajax({
                type: 'POST',
                url: window.location + "/addpagetomenu",
                data: {'label': label, 'page_id': page_id, 'order_id': nestablecount, '_token': $('[name=_token').val()},
                beforeSend: function () {
                    $(".loader-container").addClass('show');
                },
                success: function (response) {

                    var htmlmenu = "<li id='idli_" + response['last_id'] + "' class='dd-item' data-menu_id='" + response['last_id'] + "' data-page_id='" + page_id + "' data-parent_id='0' data-label='" + label + "' data-url='" + slug + "'  data-url_origin='slug'><div class='dd-handle'  id='target_" + response['last_id'] + "'>" + label + "</div><button class='circle btn--remove-menu delete-item' onclick='delThis(" + response['last_id'] + ")'></button></li>";

                    $(htmlmenu).hide().appendTo("#list-cont").fadeIn(1000);
                    nestablecount++;
                    updateOutput($('#nestable').data('output', $('#nestable-output')));

                    len--;
                    if (len === 0)
                    {
                        functionReadyToEditMenu();
                    }
                    $(".loader-container").removeClass('show');

                },
                error: function () { // if error occured
                    alert("Error: try again");
                    $(".loader-container").removeClass('show');

                }
            });

        });

    });


// add menu from external links
    $('#addExternalLink').click(function () {
        var tagitem = document.getElementsByClassName('dd-item');
        var nestablecount = tagitem.length + 1;

        var label = $('#external_label').val();
        var external_link = $('#external_link').val();
        console.log(external_link);
        $.ajax({
            type: 'POST',
            url: window.location + "/addexternallink",
            data: {'label': label, 'external_link': external_link, 'order_id': nestablecount, '_token': $('[name=_token').val()},
            beforeSend: function () {
                $(".loader-container").addClass('show');
            },
            success: function (response) {

                var htmlmenu = "<li id='idli_" + response['last_id'] + "' class='dd-item' data-menu_id='" + response['last_id'] + "' data-page_id='0' data-parent_id='0' data-label='" + label + "' data-url='" + external_link + "'  data-url_origin='external'><div class='dd-handle'  id='target_" + response['last_id'] + "'>" + label + "</div><button class='circle btn--remove-menu delete-item' onclick='delThis(" + response['last_id'] + ")'></button></li>";

                $(htmlmenu).hide().appendTo("#list-cont").fadeIn(1000);
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                // call this function for ready edit menu
                functionReadyToEditMenu();
                autoClear();

                $(".loader-container").removeClass('show');
            },
            error: function () { // if error occured
                alert("Error: try again");
                $(".loader-container").removeClass('show');

            }
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
                    $(this).index() + 1, //1 menu order
                    $(this).attr('data-page_id'), // page table id
                    $(this).attr('data-label') // label menu
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
//end of document ready function

function functionReadyToEditMenu() {
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

                if ($(mousetarget).closest('.dd-item').attr('data-url_origin') === 'slug') {
                    $('#menu-link').attr('readonly', true);
                } else {
                    $('#menu-link').attr('readonly', false);
                }
                $('#menu_id').val($(mousetarget).closest('.dd-item').attr('data-menu_id'));
                $('#menu_label').val(mousetarget.closest('.dd-handle').innerText);
                $('#menu-link').val($(mousetarget).closest('.dd-item').attr('data-url'));

            }

        });
    });
}

$('#saveMenuChanges').click(function () {
    var data = $("#menu_form").serialize();
    data_id = $('#menu_id').val();
    var label_text = $('#menu_label').val();
    var label_link = $('#menu-link').val();

    $.ajax({
        type: 'POST',
        url: window.location + "/updatelabel",
        data: data,
        beforeSend: function () {
            $("div #target_" + data_id).addClass('highlight-menu').css({'background-color': 'white'});
        },
        success: function () {
            $("#idli_" + data_id).attr('data-url', label_link);
            $("div #target_" + data_id).html(label_text).removeClass('highlight-menu').css({'background-color': '#bcbcbc'});
            autoClear();
        },
        error: function () { // if error occured
            alert("Error: select menu and try again");
        }
    });
});

function saveMenuStructure() {
    var data = $("#structure_menu").serialize();
    $.ajax({
        type: 'POST',
        url: window.location + "/updatemenu",
        data: data,
        beforeSend: function () {
            $(".loader-container").addClass('show');
        },
        success: function () {
            $(".loader-container").removeClass('show');
        },
        error: function () { // if error occured
            alert("Error: try again");
            $(".loader-container").removeClass('show');

        }
    });
}
// checkbox type input from page management to menu management
$('.checkbox input[type="checkbox"]').click(function (event) {
    var checkedAtLeastOne = false;
    $('.checkbox input[type="checkbox"]').each(function () {
        if ($(this).is(":checked")) {
            checkedAtLeastOne = true;
        }
    });
    if (checkedAtLeastOne === true) {
        $('#addPagestonavi').attr('disabled', false);
    } else {
        $('#addPagestonavi').attr('disabled', true);
    }
});

// select all page data
$('#selectUs').click(function (event) {
    if (this.checked) { // check select status
        $('.checkbox input[type="checkbox"]').each(function () { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1" 
            $('#addPagestonavi').attr('disabled', false);
        });
    } else {
        $('.checkbox input[type="checkbox"]').each(function () { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox1"  
            $('#addPagestonavi').attr('disabled', true);
        });
    }
});

// set menu layout position id
$('#menuposition').change(function () {
    var posi_id = $('#menuposition').val();
    $.ajax({
        type: 'POST',
        url: window.location + "/setmenupos",
        data: {'idpos': posi_id, '_token': $('[name=_token').val()},
        success: function () {
            $(".loader-container").removeClass('show');
        },
        error: function () { // if error occured
            alert("Error: try again");
            $(".loader-container").removeClass('show');

        }
    });
});

// button validation for adding external menu tab
$('#external_label, #external_link').keyup(function () {
    if ($('#external_label, #external_link').val() !== '') {
        $("#addExternalLink").attr('disabled', false);
    }
});

$('#external_label, #external_link').focusout(function () {
    if ($('#external_label, #external_link').val() === '') {
        $("#addExternalLink").attr('disabled', true);
    }
});
// end button

function autoClear() {
    $('#saveMenuChanges').attr('disabled', true);
    $('#menu_label').attr('readonly', true);
    $("#clear_btn").attr('disabled', true);
    $('#menu_id').val('');
    $('#menu_label').val('');
    $('#menu-link').val('');
    $('#menu-link').attr('readonly', true);
    $('#external_label, #external_link').val(''); // for auto clear text external menu
    $("#addExternalLink").attr('disabled', true);
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
