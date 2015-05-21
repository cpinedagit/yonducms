@extends('cms.home')
@section('content')
<!-- Add your site or application content here -->
<div class="main-container">
        <div class='main-container__content__title'>
            <h2>Banner</h2>
            <input id ='addBanner' type="submit" value="Add New" class='btn btn-add'>
        </div>
        <div class="main-container__content__breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Banner</a></li>
                <li class="active">View List</li>
            </ol>
        </div>
        <div class='main-container__content__info'>
            <div class="main-container__content__info__summary">
                <span>
                    <strong>All</strong> ({{ $bannersCount }})
                </span>
                <span>
                    <strong>Main Banner</strong> ({{ $getAllMainBannerCount }})
                </span>
                <span>
                    <strong>Sub Banner</strong> ({{ $getAllSubBannerCount }})
                </span>
            </div>
            <table id="example" class="table table-striped table--data table--lastaction">
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
        </div>
</div>
<footer class='footer footer--fixed'>
    <small class='copyright'>&copy; 2015 Yondu Website Service</small>
</footer>
</form>

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