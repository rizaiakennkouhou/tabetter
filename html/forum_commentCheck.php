<script>
    alert("コメントを入力してください！");
    var urlParams = new URLSearchParams(window.location.search);
    var forumid = urlParams.get('forumid');
    var redirectUrl = "http://localhost/tabetter/html/forumDetail.php?forumid=" + encodeURIComponent(forumid);
    location.href = redirectUrl;
</script>
