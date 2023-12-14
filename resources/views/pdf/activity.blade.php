<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

      <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
   
</head>

<body>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid #000;">ID</th>
                <th style="border: 1px solid #000;">User</th>
                <th style="border: 1px solid #000;">Event</th>
                <th style="border: 1px solid #000;">Subject Type</th>
                <th style="border: 1px solid #000;">Properties</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($activity as $item)
                <tr>
                    <td style="border: 1px solid #000;">{{ $item['id'] }}</td>
                    <td style="border: 1px solid #000;">{{ EmailOfUser($item['causer_id']) }}</td>
                    <td style="border: 1px solid #000;">{{ $item['event'] }}</td>
                    <td style="border: 1px solid #000;">{{ $item['subject_type'] }}</td>
                    <td style="border: 1px solid #000;">{{ $item['properties'] }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
