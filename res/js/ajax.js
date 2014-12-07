/* Estudos Ajax */


function alertSelecionada(){
	var disciplinaSelecionada = document.getElementById("disciplinaSelecionada").value;
	var result = document.getElementById("selectTurmaSelecionada");

	var xmlreq = criaRequest();

	result.innerHTML = '<img src="../res/loading.gif"/>';

	xmlreq.open("GET", "../class/Disciplina.php?disciplinaSelecionada=" + disciplinaSelecionada, true);

xmlreq.onreadystatechange = function(){
	if(xmlreq.readyState == 4){
		if(xmlreq.status == 200){
			result.innerHTML = xmlreq.responseText;
		}else{
			result.innerHTML = "Erro: " + xmlreq.statusText;

		} 
	}
};
xmlreq.send(null);
}
function getBotao(){
	var turmaSelecionada = document.getElementById("turmaSelecionada").value;
	var disciplinaSelecionada = document.getElementById("disciplinaSelecionada").value;


	result = document.getElementById("alunosNotas");
	result.innerHTML="<br /><a class='btn btn-primary' href='insertNota.php?turmaSelecionada="+turmaSelecionada+"&disciplinaSelecionada="+disciplinaSelecionada+"'>Ok</a>"
}
// function getAlunosDisciplina(){
// 	var turmaSelecionada = document.getElementById("turmaSelecionada").value;
// 	var disciplinaNota = document.getElementById("disciplinaSelecionada").value;

// 	var result = document.getElementById("alunosNotas");
// 	result.innerHTML="<a href='insertNota.php'></a>"
// 	var xmlreq = criaRequest();

// 	xmlreq.open("GET", "../class/Disciplina.php?turmaSelecionada=" + turmaSelecionada +"&disciplinaNota="+ disciplinaNota, true);
// 	xmlreq.onreadystatechange = function(){
// 	if(xmlreq.readyState == 4){
// 		if(xmlreq.status == 200){
// 			result.innerHTML = xmlreq.responseText;
// 		}else{
// 			result.innerHTML = "Erro: " + xmlreq.statusText;

// 		} 
// 	}
// };
// xmlreq.send(null);
// }

function criaRequest(){
	try{
		request = new XMLHttpRequest();
	}catch (IEAtual){
		try{
			request = new ActiveXObject("Msxm12.XMLHTTP");
		}catch(IEAntigo){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(falha){
				request = false;
			}
		}
	}

	if(!request)
		alert("Seu navegador é incompatível com Ajax!");
	else
		return request;
}

function getProfessor(){
var nome = document.getElementById("nomeProfessor").value;
var result = document.getElementById("Resultado");
var xmlreq = criaRequest();

//Imagem de Loading
result.innerHTML = '<img src="../res/loading.gif"/>';

//Iniciar uma requisição ao PHP
xmlreq.open("GET", "../class/Professor.php?nomeProfessor=" + nome, true);

//Atribui uma função para ser executada sempre que houver uma mudança

xmlreq.onreadystatechange = function(){
	//Verifica se foi concluida a requisição e fechada a conexão
	if(xmlreq.readyState == 4){
		//Verifica se encontrou com sucesso os dados
		if(xmlreq.status == 200){
			result.innerHTML = xmlreq.responseText;
		}else{
			result.innerHTML = "Erro: " + xmlreq.statusText;

		} 
	}
};
xmlreq.send(null);
}

function getAluno(){
	var nome = document.getElementById("nomeAluno").value;
	var result = document.getElementById("Resultado");
	var xmlreq = criaRequest();

	result.innerHTML = '<img src="../res/loading.gif"/>';
	xmlreq.open("GET", "../class/Aluno.php?nomeAluno=" +nome, true);

	xmlreq.onreadystatechange = function(){
		if(xmlreq.readyState == 4){
			if(xmlreq.status == 200){
				result.innerHTML = xmlreq.responseText;
			}else{
				result.innerHTML="Erro: " + xmlreq.statusText;
			}
		}
	};
	xmlreq.send(null);
}


function cadastraTurma(){
	var nome = document.getElementById("nomeTurma").value;
	var resultado = document.getElementById("resultado");
	xmlreq = criaRequest();

	resultado.innerHTML = '<img src="../res/loading.gif"/>';
	xmlreq.open("GET", "../class/Turma.php?nomeTurma=" +nome, true);

	xmlreq.onreadystatechange = function(){
		if(xmlreq.readyState == 4){
			if(xmlreq.status == 200){
				resultado.innerHTML = xmlreq.responseText;
			}else{
				resultado.innerHTML="Erro: " + xmlreq.statusText;
			}
		}
	};
	xmlreq.send(null)

}	

function removeAluno(){
	var idRemover = document.getElementById("idAlunoRemover").value;
	var resultado = document.getElementById("resultadoRemover").value;

	xmlreq=criaRequest();
	xmlreq.open("GET", "../class/Aluno.php?idAlunoRemover=" +idRemover,true);
	
	xmlreq.onreadystatechange = function(){
		if(xmlreq.readyState == 4){
			if(xmlreq.status == 200){
				resultado.innerHTML = xmlreq.responseText;
			}else{
				resultado.innerHTML="Erro: " + xmlreq.statusText;
			}
		}
	};
	xmlreq.send(null)


}



// function adicionarAviso(Remetente){
// 	var remetente = Remetente;
// 	var destinatario = document.getElementById("turmaSelecionada").value;
// 	var conteudoAviso = document.getElementById("novoAviso").value;

// 	xmlreq = criaRequest();
// 	resultado.innerHTML = '<img src="../res/loading.gif"/>';
// 	xmlreq.open("GET", "../class/Aviso.php?remetente="+)
// }
// function  cadastraAviso(){
// 	var aviso = document.getElementById("aviso").value;
// 	var resultado = document.getElementById("resultado");
// 	xmlreq = criaRequest();

// 	resultado.innerHTML = '<img src="../res/loading.gif"/>';
// 	xmlreq.open("GET", "../class/Aviso.php?avisoadd=" +aviso, true);

// 	xmlreq.onreadystatechange = function(){
// 		if(xmlreq.readyState == 4){
// 			if(xmlreq.status == 200){
// 				resultado.innerHTML = xmlreq.responseText;
// 			}else{
// 				resultado.innerHTML="Erro: " + xmlreq.statusText;
// 			}
// 		}
// 	};
// 	xmlreq.send(null)
	
// }



// function getTurmas(){
// 	var result = document.getElementById("turmas_change");
// 	var xmlreq = criaRequest;

// 	xmlreq.open("GET", "../class/Turmas.php")

// 	xmlreq.onreadystatechange = function(){
// 		if(xmlreq.readyState == 4){
// 			if(xmlreq.status == 200){
// 				result.innerHTML = xmlreq.responseText; 
// 			}else{
// 				result.innerHTML ="Erro: "+ xmlreq.statusText;
// 			}
// 		}
// 	}
// }