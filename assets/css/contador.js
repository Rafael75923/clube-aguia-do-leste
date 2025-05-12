// Defina a data e hora do próximo evento (formato: YYYY-MM-DDTHH:MM:SS)
const dataEvento = new Date("2025-05-31T08:16:00").getTime();

function atualizarContagem() {
  const agora = new Date().getTime();
  const tempoRestante = dataEvento - agora;

  if (tempoRestante < 0) {
    const contador = document.getElementById("contador");
    if (contador) contador.innerHTML = "Evento em andamento!";
    return;
  }

  const dias = Math.floor(tempoRestante / (1000 * 60 * 60 * 24));
  const horas = Math.floor((tempoRestante % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutos = Math.floor((tempoRestante % (1000 * 60 * 60)) / (1000 * 60));
  const segundos = Math.floor((tempoRestante % (1000 * 60)) / 1000);

  document.getElementById("dias").innerText = String(dias).padStart(2, "0");
  document.getElementById("horas").innerText = String(horas).padStart(2, "0");
  document.getElementById("minutos").innerText = String(minutos).padStart(2, "0");
  document.getElementById("segundos").innerText = String(segundos).padStart(2, "0");
}

// Atualiza imediatamente ao carregar
atualizarContagem();

// Atualiza a cada segundo
setInterval(atualizarContagem, 1000);
