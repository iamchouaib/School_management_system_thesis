@extends('../layout/' . $layout)

@section('subhead')
    <title>Student - Smart School - With Multi Filtration</title>
@endsection

@section('subcontent')

    <head>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <style>
            .kbw-signature { width: 100%; height: 180px;}
            #signaturePad canvas{
                width: 100% !important;
                height: auto;
            }
        </style>
    </head>

    <div class="grid grid-cols-12 gap-6 pb- my-5 w-full border border-primary">
        <div class="my-auto col-span-3 offset-md-3 mt-5"></div>
            <div class="my-auto col-span-6 offset-md-3 mt-5">

                    <div class="intro-y flex items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">Save Your Signature</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('signature_control.store') }}">
                            @csrf

                                <div id="signaturePad" ></div>
                                <br/>
                                <button id="clear" class="btn btn-danger">Clear Signature</button>

                            <label
                                for="signature64"></label>
                            <textarea class="border border" id="signature64" name="signed" style="display: none ;border:2px solid red;"></textarea>




                            <button class="btn btn-success">Save</button>
                        </form>
                    </div>



    </div>

    </div>

        last signature
        <img class="w-1/4" src="{{asset('storage/signature62a70c00b5904.png')}}" alt="" srcset="">




    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <script type="text/javascript">
        var signaturePad = $('#signaturePad').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            signaturePad.signature('clear');
            $("#signature64").val('');
        });
    </script>



@endsection


