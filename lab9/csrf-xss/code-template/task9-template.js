<script type="text/javascript"> 
window.onload = function () {
    // 构造发布留言的HTTP请求 
    var sendurl=***;
    
    // 构造并发送Ajax请求
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET",sendurl,true); 
    xhttp.setRequestHeader("Host","www.researchforum.com");
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    xhttp.send();
}
</script>
