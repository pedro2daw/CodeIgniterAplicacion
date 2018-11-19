//peticionHttp = new XMLHttpRequest();

        function checkUser(){
            var queryString;
            var user;

            user = document.getElementById('user').value;
            

            peticionHttp.onreadystatechange = showResultCheckUser;
            peticionHttp.open('POST', 'Ajax/check_user/'+user, true);
            peticionHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            peticionHttp.send(null);
        }

        function showResultCheckUser(){
            if(peticionHttp.readyState == 4){
                if(peticionHttp.status == 200){
                    document.getElementById("ajax").innerHTML = peticionHttp.responseText;
                }
            }
        }