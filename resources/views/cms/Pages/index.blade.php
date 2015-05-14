@extends('cms.home')
@section('content')
<body>
    <ul class="nav nav-pills nav-tabs">
        <li role="presentation">{!! HTML::link('cms/editor', 'Code Editor') !!}</li>
        <li role="presentation">{!! HTML::link('cms/image','Images') !!}</li>
        <li role="presentation">{!! HTML::link('cms/banners','Banner Management') !!}</li> 
        <li role="presentation" class='active'>{!! HTML::link('cms/pages','Page Management') !!}</li> 
    </ul>
    <div class="border">
        <h2>Pages</h2>           
        <table border='1'>
            <thead>
                <tr>
                    <th> TITLE</th>    
                    <th> DATE PUBLISHED</th>
                    <th> ACTION</th>
                </tr>
            </thead>
            <tbody>    
                @foreach($pages as $page)
                <tr>
                    <td>{!! $page['title'] !!}</td>
                    <td><?php echo date('M d ,Y', strtotime($page['created_at'])); ?></td>
                    <td><a href ="pages/{!! $page['id'] !!}/edit">edit</a><a href ="#" onclick = ""></a> | {!! HTML::link("$page[url]",'preview',['target' => '_blank']) !!}</td>
                </tr>
                @endforeach                
            </tbody>
        </table>
        <button id ='addPage' type='button' class="btn btn-success">Add Page</button>
    </div>
    @stop
    {!! HTML::script('js/jquery.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
    <script>
        function del(id)
        {
            $.ajax({
                type: "DELETE",
                url: 'cms/banners' + "/" + id,
                dataType: "json",
                success: (function (data) {
                    window.location('cms/banners');
                })
            });
        }

        $(document).ready(function () {

            $(document).on('click', '#addPage', function () {
                window.location = ('addPage');
            });
        });
    </script>


