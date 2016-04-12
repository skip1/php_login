<html>
    <head>
        <title>Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="js/libs/quiz.css">
    </head>
    <body><div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron"><h1 class="text-center">Register</h1>
                        <form action="reg.php" method="post">
                            Name:<input type="text" name="username" id="username" /><br/>
                            <div id="msgbox"></div>
                            Password: <input type="password" name="password" /><br/>
                            <button type="submit" id="submit" class="btn btn-lg btn-primary" value="Submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="js/libs/quiz11.js"></script>
        <script>$(document).ready(function () {
             var user; 
                $("#username").blur(function () {
                    user = $("#username").val();
                    console.log(user);

                    var username = $(this).val();
                    console.log(username);
                    var allowedChars = /^[a-z0-9_-]{3,30}$/;

                    $("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
                    $.post("checkuser.php", {
                        
                            username: username} ,function(data){
                                    console.log(username);
                                    var obj = jQuery.parseJSON(data);
                                    console.log(obj);
                                  
                                  if (obj.exists)   {
                                $("#msgbox").fadeTo(200, 0.1, function () {
                                    $(this).html('This username already exists').addClass('messageboxerror').fadeTo(900, 1);

                                });
                            } else if (data == 'empty') {
                                $("#msgbox").fadeTo(200, 0.1, function () {
                                    $(this).html('Not a valid username!').addClass('messageboxerror').fadeTo(900, 1);

                                });
                            } else if (!allowedChars.test(username)) {
                                $("#msgbox").fadeTo(200, 0.1, function () {
                                    $(this).html('Only use lowercase letters, numbers and dashes (3-30 charachters)').addClass('messageboxerror').fadeTo(900, 1);

                                });
                            } else {
                                $("#msgbox").fadeTo(200, 0.1, function () {
                                    $(this).html('Username available').addClass('messageboxok').fadeTo(900, 1);
                                    $("#submit").removeClass('disabled');

                                });
                            }
                        });

                    });
                });
        </script>
    </body>
</html>