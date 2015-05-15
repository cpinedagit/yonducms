/**
 * Customized Menu
 * Author : Allan Perez
 * Copyright 2015
 * 
 */

$(document).ready(function ()
{

    // changes name and url textboxes if clicked
    $('.nestable-lists .dd-item').each(function () {
        $(this).mousedown(function (e) {
            // enable text input
            $('#menu_label').attr('readonly', false);
            $("#clear_btn").attr('disabled', false);

            // automatic focus
            $('#menu_label').focus();
            $('#saveMenuChanges').attr('disabled', false);
            
            var mousetarget = e.target;
            $('#menu_id').val($(mousetarget).closest('.dd-item').attr('data-menu_id'));
//           $('#menu_label').val($(mousetarget).closest('.dd-item').attr('data-label'));
            $('#menu_label').val(mousetarget.closest('.dd-handle').innerText);

//            $('#menu_label').val($(mousetarget).closest('.dd-handle').innerHtml);
//                $('#menu-label').val(mousetarget.closest('.dd-handle').innerHTML);
//                $('#menu-link').val($(mousetarget).closest('.dd-item').attr('data-url'));
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

    $('#nestable-menu').on('click', function (e)
    {
        var target = $(e.target),
                action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });



    function updateTips(t) {
        tips
                .text(t)
                .addClass("ui-state-highlight");
        setTimeout(function () {
            tips.removeClass("ui-state-highlight", 1500);
        }, 500);
    }


//    var dialog, form,
////            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
//            menu_var = $("#menu"),
//            url_var = $("#url"),
//            allFields = $([]).add(menu_var).add(url_var),
//            tips = $(".validateTips");

//    function checkLength(o, n, min) {
//        if (o.val().length < min) {
//            o.addClass("ui-state-error");
//            updateTips("Length of " + n + " must be atleast " +
//                    min);
//            return false;
//        } else {
//            return true;
//        }
//    }
//
//    function checkRegexp(o, regexp, n) {
//        if (!(regexp.test(o.val()))) {
//            o.addClass("ui-state-error");
//            updateTips(n);
//            return false;
//        } else {
//            return true;
//        }
//    }

//    function addMenu() {
//        var valid = true;
//        allFields.removeClass("ui-state-error");
//        // valid lenght of string must have atleast 1
//        valid = valid && checkLength(menu_var, "menu", 1);
//        valid = valid && checkLength(url_var, "url", 1);
//        // use this as reference for menu html tag
//        var tagitem = document.getElementsByClassName('dd-item');
//        // get the last number and increment by 1 for the id of nxt append li element
//        var nestablecount = tagitem.length + 1;
//        if (valid) {
//            $('#list-cont').append('<li class="dd-item" data-id="' + nestablecount + '" data-menu="' + menu_var.val() + '" data-url="' + url_var.val() + '"><div class="dd-handle">' + menu_var.val() + '</div><div class="dd-remove dd3-remove"></div></li>');
//            nestablecount++;
//            updateOutput($('#nestable').data('output', $('#nestable-output')));
//            dialog.dialog("close");
//        }
//        return valid;
//    }

//    dialog = $("#dialog-form").dialog({
//        autoOpen: false,
//        height: 380,
//        width: 350,
//        modal: true,
//        buttons: {
//            "Create menu": addMenu,
//            Cancel: function () {
//                dialog.dialog("close");
//            }
//        },
//        close: function () {
//            form[ 0 ].reset();
//            allFields.removeClass("ui-state-error");
//        }
//    });

//    form = dialog.find("form").on("submit", function (event) {
//        event.preventDefault();
//        addMenu();
//    });

//    $("#create-menu").button().on("click", function () {
//        dialog.dialog("open");
//    });


});


