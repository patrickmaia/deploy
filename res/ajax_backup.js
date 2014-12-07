/* Estudos Ajax */

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