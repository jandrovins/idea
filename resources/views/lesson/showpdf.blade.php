<!--Author: Adrian Alberto Gutierrez Leal-->
<!DOCTYPE html>
<html>
    <head>
        <h1>{{ $data["lesson"]->getTitle() }}</h1>
    </head>
    <body>
        <p> {{ $data["lesson"]->getBody() }} </p>
    </body>
</html>
