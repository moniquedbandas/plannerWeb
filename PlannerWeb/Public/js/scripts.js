let compromissos = [];
document
  .getElementById("adicionarCompromisso")
  .addEventListener("click", function () {
    // Captura os valores dos campos de entrada
    let data = document.getElementById("data").value;
    let hora = document.getElementById("hora").value;
    let descricao = document.getElementById("descricao").value;

    if (data == "" || hora == "" || descricao == "") {
      alert("Preencha os dados do compromisso corretamente");
      return false;
    }

    // Cria uma nova linha na tabela com os valores capturados
    let table = document.getElementById("tabelaCompromissos");
    if (table.rows.length >= 7) {
      alert("voce atingiu o limite de compromissos gratuitos");
      return;
    }

    compromissos.push({ dataComp: data, hora: hora, descricao: descricao });

    let newRow = table.insertRow(-1); // Insere a linha no final da tabela

    let cell1 = newRow.insertCell(0);
    let cell2 = newRow.insertCell(1);
    let cell3 = newRow.insertCell(2);

    // Define o conteúdo das células com os valores capturados
    cell1.innerHTML = data;
    cell2.innerHTML = hora;
    cell3.innerHTML = descricao;
  });

document.getElementById("limparTabela").addEventListener("click", function () {
  let table = document.getElementById("tabelaCompromissos");
  let rowCount = table.rows.length;
  for (let i = 1; i < rowCount; i++) {
    table.deleteRow(1);
  }
  compromissos = [];
});

document.getElementById("formComp").addEventListener("submit", function () {
  let compromissosJson = JSON.stringify(compromissos);
  document.getElementById("compromissos").value = compromissosJson;
});

function validarFormulario() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (document.activeElement.value == "SIGN IN") {
    if (username == "" || password == "") {
      alert("Preencha todos os campos");
      return false;
    }
    document.getElementById("form").action =
      "./App/controller/ProcessarUsuario.php?op=autenticar";
  } else if (document.activeElement.value == "SIGN UP") {
    document.getElementById("form").action =
      "./App/controller/ProcessarUsuario.php?op=criarTela";
  }
  return true;
}

function acoesCompromisso() {
  var dataCompromisso = document.getElementById("data").value;
  var hora = document.getElementById("hora").value;
  var descricao = document.getElementById("descricao").value;

  if (document.activeElement.value == "SALVAR") {
    if (dataCompromisso == "" || hora == "" || descricao == "") {
      alert("Preencha todos os campos do compromisso.");
      return false;
    }
    document.getElementById("formComp").action =
      "./App/controller/ProcessarCompromisso.php?oc=cadastrarCompromisso";
  } else if (document.activeElement.value == "LISTAR") {
    document.getElementById("formComp").action =
      "./App/controller/ProcessarCompromisso.php?oc=listarTela";
  } else if (document.activeElement.value == "EDITAR") {
    document.getElementById("formComp").action =
      "./App/controller/ProcessarCompromisso.php?oc=alterarCompromisso?idCompromisso";
  } else if (document.activeElement.value == "DELETAR") {
    document.getElementById("formComp").action =
      "./App/controller/ProcessarCompromisso.php?oc=deletarCompromisso";
  }
  return true;
}
