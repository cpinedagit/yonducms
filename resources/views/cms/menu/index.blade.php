<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <title>Menu Management</title>
        <link href="{{ asset('public/css/menu_cms/nestable.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->

        <script src="{{ asset('public/js/jquery.js') }}"></script>
        <script src="{{ asset('public/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('public/js/menu_cms/jquery.nestable.js') }}"></script>
        <script src="{{ asset('public/js/menu_cms/menu_app.js') }}"></script>

    </head>
    <body>

        <div id="dialog-form" title="Create a menu">
            <p class="validateTips"></p>

            <form>
                <fieldset>
                    <label for="menu">Menu title</label>
                    <input type="text" name="menu" id="menu" class="text ui-widget-content ui-corner-all">
                    <label for="url">URL</label>
                    <input type="text" name="url" id="url" class="text ui-widget-content ui-corner-all">

                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>
        </div>



        <menu id="nestable-menu">
            <button type="button" data-action="expand-all">Expand All</button>
            <button type="button" data-action="collapse-all">Collapse All</button>
            <a href="../"><button type="button">Open Site</button></a>

        </menu>
        <button id="create-menu">Add menu</button>

        <div class="cf nestable-lists">

            <div class="dd" id="nestable">
                <ol class="dd-list" id="list-cont">
                    @if(isset($innerHtml))
                    {!! $innerHtml !!}
                    @endif
<!--                    <li class="dd-item" data-id="1" data-menu="one" data-url="home/one">
                        <div class="dd-handle">Item 1</div>
                    </li>

                    <li class="dd-item" data-id="2" data-menu="two" data-url="home/two">
                        <div class="dd-handle">Item 2</div>
                        <ol class="dd-list">

                            <li class="dd-item" data-name="asda" data-id="3" data-menu="three" data-url="home/three"><div class="dd-handle">Item 3</div></li>

                            <li class="dd-item" data-id="4" data-menu="four" data-url="home/four"><div class="dd-handle">Item 4</div></li>

                            <li class="dd-item" data-id="5" data-menu="five" data-url="home/five">
                                <div class="dd-handle">Item 5</div>

                                <ol class="dd-list">

                                    <li class="dd-item" data-id="6" data-menu="six" data-url="home/six"><div class="dd-handle">Item 6</div></li>

                                    <li class="dd-item" data-id="7" data-menu="seven" data-url="home/seven"><div class="dd-handle">Item 7</div></li>

                                    <li class="dd-item" data-id="8" data-menu="eight" data-url="home/eight"><div class="dd-handle">Item 8</div></li>

                                </ol>

                            </li>

                            <li class="dd-item" data-id="9" data-menu="nine" data-url="home/nine"><div class="dd-handle">Item 9</div></li>

                            <li class="dd-item" data-id="10" data-menu="ten" data-url="home/ten"><div class="dd-handle">Item 10</li>


                        </ol>
                    </li>-->

                    <!-- for remove button
                     <div class="dd-remove dd3-remove"></div>
                    -->

                </ol>
            </div>
        </div>

        {!! Form::open(array('route' => 'decode', 'method' => 'POST', 'class' => 'form')) !!}
        <input type="hidden" name="serialize_menu" id="nestable-output">
        {!! Form::submit('Save', array('id'=>'blah')) !!}
        {!! Form::close() !!}
        <p>&nbsp;</p>

    </body>
</html>





