/*Funções JS do Projeto*/
/*Retorna a hora atual em um elemento com o ID chamado hora*/
function relogio()
{
    var agora = new Date();
    var d = verificaNumero(agora.getDate());
    var m = verificaNumero(agora.getMonth());
    var y = verificaNumero(agora.getFullYear());
    var h = verificaNumero(agora.getHours());
    var mi = verificaNumero(agora.getMinutes());
    var s = verificaNumero(agora.getSeconds());
    document.getElementById('hora').innerHTML = d + "/" + m + "/" + y + " " + h + ":" + mi + ":" + s;
    var t = setTimeout(relogio, 500);
}

/* Verifica se o número é menor que zero e adicionar um zero a esquerda do mesmo */
function verificaNumero(i)
{
    if (i < 10)
    {
        i = "0" + i
    };
    return i;
}

/* Conta o número de caracteres faltantes no texto */
function contaCaractere(val, divId, tamanho)
{
    var len = $('#' + val).val().length;
    if (len > tamanho) $('#' + divId).html("Máximo de caracteres <strong>atingidos</strong> para o campo! <br>Os dados serão <strong>perdidos</strong>!");
    else
    {
        var a = tamanho - len;
        var count = "<span style='color:red'>" + a + "</span>";
        var text = "Restam";
        var count1 = "<span style='color:grey'>" + text + "</span>";
        var text1 = "caracteres";
        var count2 = "<span style='color:grey'>" + text1 + "</span>";
        $('#' + divId).html(count1 + " " + count + " " + count2);
    }
}

function alunoProfessor()
{
    $(document).ready(function()
    {
        $('input:radio[name="radioAlunoProfessor"]').on("change", function()
        {
            nivel = document.getElementById('nivel');
            if (this.checked && this.value === '1')
            {
                $("#inputProfessor").show();
                $("#inputAluno").hide();
                nivel.value = this.value;
                $('#inputProfessor').mask('9999999');
            }
            else
            {
                $("#inputAluno").show();
                $("#inputProfessor").hide();
                nivel.value = this.value;
                $('#inputAluno').mask('999999999');
            }
        });
    });
};