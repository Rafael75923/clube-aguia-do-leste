// Função para abrir o lightbox
function abrirLightbox(imagem) {
  const lightbox = document.getElementById("lightbox");
  const imagemAmpliada = document.getElementById("imagem-ampliada");

  if (lightbox && imagemAmpliada) {
    // Define a imagem do lightbox como a mesma da imagem clicada
    imagemAmpliada.src = imagem.src;

    // Exibe o lightbox
    lightbox.style.display = "flex";
  } else {
    console.error("Lightbox ou imagem ampliada não encontrada no DOM.");
  }
}

// Função para fechar o lightbox
function fecharLightbox() {
  const lightbox = document.getElementById("lightbox");
  const imagemAmpliada = document.getElementById("imagem-ampliada");

  if (lightbox && imagemAmpliada) {
    // Oculta o lightbox
    lightbox.style.display = "none";

    // Limpa o src da imagem ampliada
    imagemAmpliada.src = "";
  } else {
    console.error("Lightbox ou imagem ampliada não encontrada no DOM.");
  }
}
