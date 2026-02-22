function fecharModal() {
  document.getElementById("modalAviso").style.display = "none";
}

function verificarCompromisso() {
  fetch("ajax/check_appointments.php")
    .then((res) => res.json())
    .then((data) => {
      if (data.tem) {
        document.getElementById("textoCompromisso").innerText = data.mensagem;
        document.getElementById("modalAviso").style.display = "flex";
      }
    });
}

setInterval(verificarCompromisso, 10000);

// CHAT EM TEMPO REAL

function enviarMensagem(destinatario) {
  let msg = document.getElementById("msg").value;

  fetch("ajax/send_message.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `destinatario=${destinatario}&mensagem=${msg}`,
  });

  document.getElementById("msg").value = "";
}

function carregarMensagens(destinatario) {
  fetch("ajax/load_messages.php?destinatario=" + destinatario)
    .then((res) => res.text())
    .then((data) => {
      document.getElementById("chat-box").innerHTML = data;
    });
}

setInterval(() => carregarMensagens(1), 2000);
