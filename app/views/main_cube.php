<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rappit Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <h1>Cube Summation</h1>
    <div class="row">
        <div class="col-md-8">
            <h2>Input Test</h2>
                <textarea class="span6 col-md-8" id="inputCube" rows="10" placeholder="Input for Cube Summation" form="cubeForm" required></textarea>
                <button onclick="submitInput()" class="btn btn-default col-md-8">Submit</button>
        </div>
        <div class="col-md-8">
            <h2>Output Test</h2>
            <textarea class="span6 col-md-8" rows="10" id="outputCube" placeholder="Result of Cube Summation" readonly></textarea>
        </div>
    </div>

</div>

<script>
    function submitInput() {
        var inputCubeText =   $('#inputCube').val();
        if(inputCubeText != ''){
            $.ajax({
                url: 'cube',
                type: 'POST',
                data: {inputCube: inputCubeText},
                dataType: 'text',
                success: function (data) {
                    $('#outputCube').val(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

    }
</script>

</body>
</html>

