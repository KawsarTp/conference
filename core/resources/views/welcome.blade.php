<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$data->banner->title}}
    {{$data->banner->subtitle}}



    {{$data->about->title}}


    @foreach($data->tab->tabs as $tab)

    {{$tab->title}}
    {{@$tab->details}}
    {{@$tab->subtitle}}
    

    @endforeach
    
</body>
</html>