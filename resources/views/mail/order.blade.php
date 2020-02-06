<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-size: 18px;
        }
    </style>
</head>
<body>
<table style="margin-bottom: 20px; margin-left:auto;margin-right:auto;">
    <tr>
        <td>Service:</td>
        <td>{{$data['subservice']}}</td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>{{$data['date']}}</td>
    </tr>
    @if(array_key_exists('treatments',$data))
        <tr>
            <td>Treatments:</td>
            <td>{{$data['treatments']}}</td>
        </tr>
    @endif
    @if(array_key_exists('comment',$data))
        <tr>
            <td>Comment:</td>
            <td>{{$data['comment']}}</td>
        </tr>
    @endif
</table>
@if(array_key_exists('url',$data))
    <table style="margin-left:auto;margin-right:auto;">
        <tr>
            <td>
                <a style="color: white; padding: 10px 15px; background: #eb3223; text-decoration: none; border-radius: 5px 5px 5px 5px;"
                   href="{{$data['url']}}">Delete order</a></td>
        </tr>
    </table>
@endif
</body>
</html>
