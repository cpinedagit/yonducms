@extends('cms.home')
@section('content')
<div class="border">
    <h2>Banners</h2>           
    <table border='1'>
        <thead>
            <tr>
                <th> ID</th>
                <th> Title</th>
                <th> Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>                   
            @foreach($banners as $banner)
            <tr>
                <td>{!! $banner->id !!}</td>
                <td> {!! $banner->title !!}</td>
                <td> {!! $banner->type !!}</td>
                <td><a href="banners/{{ $banner->id }}/edit" class="edit" id = "">edit</a> | <a href ="#" onclick ="del({{ $banner->id }})">del</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button id ='addBanner' type='button' class="btn btn-success">Add Banner</button>
</div>
<script>
            function del(id){
//            console.log($('meta[name="csrf-token"]').attr('content'));
            if (confirm('are you really want to delete this banner') == true)
            {
            $.ajax({
            type:"DELETE",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:  'banners' + "/" + id,
                    dataType: "json",
                    success:(function(data) {
                    window.location = ("banners");
                    })
            });
            } else{
            return false;
            }

            }
    $(document).ready(function(){

    $(document).on('click', '#addBanner', function(){

    window.location = ('addBanner');
    });
    });


</script>


@stop