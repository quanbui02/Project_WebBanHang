<html>
    <head></head>
    <style>
        body{
            text-align: center;
        }
        table {
            width: 100%;
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }
        th, td {
           padding: 8px;
           text-align: center;
           border-top: 1px solid #dee2e6;
        }
        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
    <body>
        <div class="header">
            <h1>List Student</h1>
        </div>
        <div class="table-list">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Quê quán</th>
                    <th>Số điện thoại</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                @for($i=0;$i<count($students);$i++)
                <tr>
                    <th>{{ $students[$i]->id }}</th>
                    <th>{{ $students[$i]->name }}</th>
                    <th>{{ $students[$i]->hometown }}</th>
                    <th>{{ $students[$i]->phone }}</th>
                    <th><button><a href="/student/edit/{{ $students[$i]->id }}">Edit</a></button></th>
                    <th><button><a href="/student/delete/{{ $students[$i]->id }}">Delete</a></button></th>
                </tr>
                @endfor
            </table>
        </div>
        <div class="navigation" style="margin-top:50px">
            <div class="create"><button><a href="/student/create" style="text-decoration: none;">Add student</a></button></div>
        </div>
    </body>
</html>
