@extends('template.londinium')
@section('page-header')
<div class="page-header">
	<div class="page-title">
		<h3>Email <small>Kirim email</small></h3>
	</div>

	
</div>
@endsection
@section('content')     
    <div class="block">
            <div class="chat-member-heading clearfix">
				<h6 class="pull-left"><i class="icon-bubble6"></i> {{\Auth::user()->name }} <small>&nbsp;/&nbsp; {{\Auth::user()->roles[0]->name }}</small></h6>
				<div class="pull-right">
					<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
					<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
					<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-user"></i></a>
					<a href="#" class="btn btn-primary btn-icon btn-xs"><i class="icon-plus-circle"></i></a>
				</div>
            </div>
                        	
            <div class="chat" id="chat">
                <div class="message">
                    <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                    <div class="message-body">
						<span class="typing"></span>
                    </div>
                </div>

                <div class="message reversed">
                    <a class="message-img" href="#"><img src="http://placehold.it/300" alt=""></a>
                    <div class="message-body">
                        Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames.
                        <span class="attribution">14:23pm, 4th Dec 2010</span>
                    </div>
                </div>

                <div class="moment">10 Nov, 2013</div>

            </div>

            <textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
            <div class="message-controls">
	            <span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
	            <div class="pull-right">
	                <div class="upload-options">
		                <a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a>
		                <a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a>
		                <a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
	                </div>
	                <button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">Submit</button>
	            </div>
	        </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            checkcookie();chooseusername('{{ \Auth::user()->username }}'); update();
            alert('LOADE');
        }
        var msginput = document.getElementById("msginput");
        var msgarea = document.getElementById("chat");

        function chooseusername(setname) {
            var user = document.getElementById("cusername").value;
            document.cookie="messengerUname=" + setname
            checkcookie()
        }

        function showlogin() {
            document.getElementById("whitebg").style.display = "inline-block";
            document.getElementById("loginbox").style.display = "inline-block";
        }

        function hideLogin() {
            document.getElementById("whitebg").style.display = "none";
            document.getElementById("loginbox").style.display = "none";
        }

        function checkcookie() {
            if (document.cookie.indexOf("messengerUname") == -1) {
                showlogin();
            } else {
                hideLogin();
            }
        }

        function getcookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
            }
            return "";
        }

        function escapehtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
        }

        function update() {
            
            var xmlhttp=new XMLHttpRequest();
            var username = getcookie("messengerUname");
            var output = "";
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        var response = xmlhttp.responseText.split("\n")
                        var rl = response.length
                        var item = "";
                        for (var i = 0; i < rl; i++) {
                            item = response[i].split("\\");
                            if (item[1] != undefined) {
                                if (item[0] == username) {
                                    output += "<div class=\"message\"> <a class=\"message-img\" href=\"#\"><img src=\"http://placehold.it/300\" alt=\"\"></a> <div class=\"message-body\">" + item[1] + "<span class=\"attribution\">"+ item[2] +"</span></div> <div class=\"msgsentby msgsentbyfrom\">Sent by " + item[0] + "</div> </div>";
                                } else {
                                    output += "<div class=\"message reversed\"> <a class=\"message-img\" href=\"#\"><img src=\"http://placehold.it/300\" alt=\"\"></a> <div class=\"message-body\">" + item[1] + "<span class=\"attribution\">"+ item[2] +"</span></div>  <div class=\"msgsentby\">Sent by " + item[0] + "</div> </div>";
                                }

                            }
                        }

                        msgarea.innerHTML = output;
                        msgarea.scrollTop = msgarea.scrollHeight;

                    }
                }
                xmlhttp.open("GET","messages/" + username,true);
                xmlhttp.send();
        }

        function sendmsg() {

            var message = msginput.value;
            if (message != "") {
                // alert(msgarea.innerHTML)
                // alert(getcookie("messengerUname"))

                var username = getcookie("messengerUname");

                var xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        message = escapehtml(message)
                        msgarea.innerHTML += "<div class=\"msgc\" style=\"margin-bottom: 30px;\"> <div class=\"msg msgfrom\">" + message + "</div> <div class=\"msgarr msgarrfrom\"></div> <div class=\"msgsentby msgsentbyfrom\">Sent by " + username + "</div> </div>";
                        msginput.value = "";
                    }
                }
                xmlhttp.open("GET","chat/updatemessages/" + username + "/" + message,true);
                xmlhttp.send();
            }

        }
        
        setInterval(function(){ update() }, 5000);
    </script>
@endsection
@stop