document.getElementById("data_backup").addEventListener('change', function(){
    document.getElementById("origin_path").required = this.checked ;
});
document.getElementById("full_backup").addEventListener('change', function(){
    document.getElementById("origin_path").required = !this.checked ;
});
document.getElementById("data_backup2").addEventListener('change', function(){
    document.getElementById("origin_path2").required = this.checked ;
});
document.getElementById("full_backup2").addEventListener('change', function(){
    document.getElementById("origin_path2").required = !this.checked ;
});
document.getElementById("send_mail_radio").addEventListener('change', function(){
    document.getElementById("sendmail_text").required = this.checked ;
});
document.getElementById("send_mail_radio2").addEventListener('change', function(){
    document.getElementById("sendmail_text2").required = this.checked ;
});
