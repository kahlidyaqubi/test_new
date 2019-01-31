<meta http-equiv='Content-Type' charset=utf-8 content='text/html'>
<style type="text/css">
    *, body, table, th, tr, td, tbody {
        font-family: 'examplefont', sans-serif;
        text-align: right;

    }

    td {
        padding: 7px
    }
</style>
<body>
<br><br><br><br><br><br>
<table border="1" style="text-align:right;width: 100%;margin: 45px">
        <thead>
        <tr>

            <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهاتف</th>
            <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم المستخدم</th>
            <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد
                الالكتروني
            </th>

            <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستخدم</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $a)
            <tr>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"
                    class="text-left" dir="ltr">{{$a->mobile}}</td>

                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->name}}</td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->email}}</td>
                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->full_name}}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
</body>