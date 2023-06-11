<html>
    <head></head>
    <style>
        *{
            padding: 0;
            margin:0;
        }
        body{
            text-align: center
        }
        .box{
            width: 16vw;
            display: flex;
            justify-content: space-between;
            margin-top:10px;
        }
        .infor{
            display: inline-block;
        }
    </style>
    <body>
        <h1>Upate student infor</h1>
        <form action="/student/create" method="post">
            @csrf
            <div class="infor">
                <div class="box">
                    <div>Name:</div>
                    <div class="content">
                        <input type="text" name="name">
                    </div>
                </div>
                <div class="box">
                    <div>Hometown:</div>
                    <div class="content">
                        <input type="text" name="hometown">
                    </div>
                </div>
                <div class="box">
                    <div>Phone:</div>
                    <div class="content">
                        <input type="text" name="phone" >
                    </div>
                </div>
            </div>
            <div class="submit">
                <button type="submit" style="margin-top: 10px">Add</button>
            </div>
        </form>
        <button style="margin-top: 10px"><a href="/student">Back to home</a></button>
    </body>
</html>
