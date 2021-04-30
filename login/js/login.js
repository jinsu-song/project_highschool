function check_input()
{
    // 아이디와 비밀번호를 입력했는지 안했는지 경고하는 함수
    if (!document.login_form.id.value)
    {
        alert("아이디를 입력하세요");    
        document.login_form.id.focus();
        return;
    }

    if (!document.login_form.pass.value)
    {
        alert("비밀번호를 입력하세요");    
        document.login_form.pass.focus();
        return;
    }
    
    //submit 하게되면 login.php로 간다.
    document.login_form.submit();
}