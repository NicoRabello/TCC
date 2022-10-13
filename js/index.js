var usuarios = [
    {"login": "*******", "Senha": "******"},
    {"login": "admin", "senha": "admin"},//usuários teste
];
function Login(){
    var usuario=document.getElementsByName('username')[0].value.toLowerCase();
    var senha=document.getElementsByName('password') [0].value;//verificação de usuário

    for (var u in usuarios){
        var us = usuarios[u];
        if (us.login === usuario && us.senha === senha){
            window.location = "page1.html";
            return true;//confirmação de usuário
        }
    }
    alert ("Dados incorretos");//alert dados errados
return false
}