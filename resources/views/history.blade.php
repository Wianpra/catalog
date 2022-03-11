<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Verdana;
        }
        .container {
            position: relative;
            text-align: justify;
            color: #404040;
            font-size: 20px;
        }
        .centered {
            position: absolute;
            line-height:32px;
            top: 20%;
            left: 42.3%;
            right: 8%;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="pdf_page-0001.jpg" alt="Snow" style="width:100%;">
        <div class="centered">
            @php
            echo $about->history;
            @endphp
        </div>
    </div>
    
</body>
</html>