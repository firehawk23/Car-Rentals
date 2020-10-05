<html>

    <head>
            <link type="text/css" rel="stylesheet" href="css/homepage.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
    </head>

    <body>
            <div class="bg-image"></div>

            <div style="position: absolute;top:5%;width:100%;height:100%;"> 
        
        <div class="image">
                <img src="https://icon-library.net/images/admin-icon/admin-icon-0.jpg">
        </div>
        <a href="homepage.html" style="margin-left:5%;"><i class="fa fa-reply" style="font-size:25px;"></i></a>;
            <div class="buttons">
                    <button type="button" onclick="signup()" class=" button signup">Add Car</button>
                    <button type="button" onclick="login()" class="button login">View Bookings</button><br/>
                    <button type="button" onclick="avail()" class="button login" style="margin-top:2%;margin-left:15%;">Available Cars</button>
            </div>
        </div>
    </body>
    <script>
            function signup(){
                location.replace("adminhome.php");
            }
            function login(){
                location.replace("admin_book.php");
            }
            function avail(){
                location.replace("available_admin.php");
            }
            </script>
    
</html>