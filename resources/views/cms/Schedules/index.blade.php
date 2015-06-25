@extends('cms.home')
@section('title')
<h2>Schedule</h2>
<a href="{!! URL::route('cms.scheduler.add') !!}" class="btn btn-add">Add New</a>
@stop
@section('content')
<!-- Add your site or application content here -->
<div class="main-container">
    <div class='main-container__content__info'>
        <div class="main-container__content__info__summary">
            <span>
                <strong>All</strong> ({{ $countAllSchedules}})
            </span>
        </div>
        
        <div class="main-container__content__info__filter">
            <select name="" id="action" class="form-control">
                <option value="" disabled selected>Choose Action</option>
                <option value="Delete">Delete</option>
            </select>
            <input id='apply' type="button" class='btn btn-filter' value="Apply">
        </div>

        <table id="example" class="superTable table table-striped table--data table--lastaction ">
            <thead>
                <tr>
                    <th><input type="checkbox" id='selecctall'></th>
                    <th> Title</th>
                    <th> Image</th>
                    <th>Schedule</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td><input type="checkbox" name="checkbox" value="{!! $schedule->id !!}"></td>
                    <td>{!! $schedule->title !!}</td>
                    <td> {!! HTML::image('public/scheduleImages/'.$schedule->image,null,['width' => '100px']) !!}</td>
                    <td>
                        <?php
                        date_default_timezone_set('Asia/Manila');
                        $sched = new DateTime($schedule->schedule);
                        echo $sched->format('H:i a');
                        ?>
                    </td>
                    <td class='action'>
                        <i class="fa fa-chevron-left"></i>
                        <ul class="list-unstyled action-list">
                            <li><a href="scheduler/{{ $schedule->id }}/edit" class="edit" id = "">edit</a></li>
                            <li><a href ="{!! URL::to('/') !!}/cms/schedulepreview" target="_blank">preview</a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).on("click", '#apply', function () {
        var action = $('#action').val();
        if (action === 'Delete') {
            var checked = new Array();
            $("input:checkbox[name=checkbox]:checked").each(function () {
                checked.push($(this).val());
                console.log(checked);
            });
            if (confirm('do you really want to delete selected schedule?') == true) {
                $.ajax({
                    type: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {checked: checked},
                    url: "{!! URL::to('/') !!}" + '/cms/deleteSchedule',
                    dataType: "json",
                    success: (function () {
                        window.location = ("scheduler");
                    })
                });
            } else {
                return false;
            }
        }
    });
</script>


@stop