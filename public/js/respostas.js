
(function(win,doc){
    'use strict';

    function confirmDel(event)
    {
        event.preventDefault();
        console.log(event.target.parentNode.href);

        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo excluir esta enquete?")){
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE",event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN',token);
            ajax.onreadystatechange=function(){
                if(ajax.readyState === 4 && ajax.status === 200){
                    location.reload();
                }
            };
            ajax.send();
        }else{
            return false;
        }

    }
    if(doc.querySelector('.js-del')){
        let btn=doc.querySelectorAll('.js-del');
        for(let i=0; i < btn.length; i++){
            btn[i].addEventListener('click',confirmDel,false);
        }
    }
})(window,document);

function habilitarDataFinal() {
    var dtInicio = document.getElementById("dtInicio").value;
    var dtFim = document.getElementById("dtFim");

    if (dtInicio !== "") {
        dtFim.disabled = false;
        dtFim.min = dtInicio;
    } else {
        dtFim.disabled = true;
        dtFim.value = "";
        dtFim.removeAttribute('min');
    }
}

function validarDataFinal() {
    var dtInicio = new Date(document.getElementById("dtInicio").value);
    var dtFim = new Date(document.getElementById("dtFim").value);

    if (dtFim < dtInicio) {
        alert("A data final não pode ser menor que a data inicial.");
        document.getElementById("dtFim").value = "";
    }
}


//=====================CADASTRAR=======================
function divrespostasEditar(acao, este) {

    var divRespostas = document.getElementById('divrepostas');
    let contadorRespostas = document.querySelectorAll('.divresposta').length;
    switch (acao) {
        case 'mais':
            if (contadorRespostas < 30) {
                var divResposta = document.querySelector('.divresposta');
                var cloneDivResposta = divResposta.cloneNode(true);
                cloneDivResposta.querySelector('input#respostas').removeAttribute('value');
                cloneDivResposta.querySelector('input#idbd').removeAttribute('value');
                divRespostas.appendChild(cloneDivResposta);
            }
            break;
        case 'menos':
            if (contadorRespostas > 3) {
                var divResposta = document.querySelector('.divresposta:last-child');
                console.log(divResposta);

                divResposta.style.display = "none";
                divResposta.querySelector('input#respostas').remove();
                divResposta.querySelector('input#idbd').name ='aExcluir[]';
                divResposta.querySelector('input#idbd').id ='aExcluir';
                divResposta.className = "divexcluirbd";
            
            }
            break;
        case 'excluir':
            var divResposta = este.closest('.divresposta');
            if (divResposta && contadorRespostas > 3) {
                divResposta.style.display = "none";
                divResposta.querySelector('input#respostas').remove();
                divResposta.querySelector('input#idbd').name ='aExcluir[]';
                divResposta.querySelector('input#idbd').id ='aExcluir';
                divResposta.className = "divexcluirbd";
            }
            break;
        case 'sobe':
            var divResposta = este.closest('.divresposta');
            var divAnterior = divResposta.previousElementSibling;
            if (divAnterior !== null) {
                divAnterior.before(divResposta);
            }
            break;
        case 'desce':
            var divResposta = este.closest('.divresposta');
            var divSeguinte = divResposta.nextElementSibling;
            if (divSeguinte !== null) {
                divSeguinte.after(divResposta);
            }
            break;
        default:
            break;
    }
}

//=====================EDITAR=======================
function divrespostasCadastrar(acao, este) {

    var divRespostas = document.getElementById('divrepostas');
    let contadorRespostas = document.querySelectorAll('.divresposta').length;
    switch (acao) {
        case 'mais':
            if (contadorRespostas < 30) {
                var divResposta = document.querySelector('.divresposta');
                var cloneDivResposta = divResposta.cloneNode(true);
                cloneDivResposta.querySelector('input').value = '';
                divRespostas.appendChild(cloneDivResposta);
            }
            break;
        case 'menos':
            if (contadorRespostas > 3) {
                divRespostas.removeChild(divRespostas.lastElementChild);
            }
            break;
        case 'excluir':
            var divResposta = este.closest('.divresposta');
            if (divResposta && contadorRespostas > 3) {
                divResposta.remove();
            }
            break;
        case 'sobe':
            var divResposta = este.closest('.divresposta');
            var divAnterior = divResposta.previousElementSibling;
            if (divAnterior !== null) {
                divAnterior.before(divResposta);
            }
            break;
        case 'desce':
            var divResposta = este.closest('.divresposta');
            var divSeguinte = divResposta.nextElementSibling;
            if (divSeguinte !== null) {
                divSeguinte.after(divResposta);
            }
            break;
        default:
            break;
    }
}
