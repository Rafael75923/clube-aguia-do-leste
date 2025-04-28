const albuns = {
    "AcampADL": { pasta: "AcampADL", prefixo: "adl1", extensao: "jpg" },
    "AcampADL3": { pasta: "AcampADL3", prefixo: "adl1", extensao: "jpg" },
    "AcampADL 5": { pasta: "AcampADL 5", prefixo: "adl1", extensao: "jpg" },
    "Cerimonias": { pasta: "Cerimonias", prefixo: "cer1", extensao: "jpeg" },
    "Instruções": { pasta: "Instrucoes", prefixo: "inst1", extensao: "jpeg" },
    "AcampADL 2": { pasta: "AcampADL 2", prefixo: "adl1", extensao: "jpg" },
    "Acampamentos": { pasta: "Acampamentos", prefixo: "aca1", extensao: "jpg" },
    "Ação Social": { pasta: "AcaoSocial", prefixo: "aca1", extensao: "jpg" },
    "AcampADL4": { pasta: "AcampADL4", prefixo: "adl1", extensao: "jpg" },
    "Reuniões Regulares": { pasta: "ReunioesRegulares", prefixo: "Reu1", extensao: "jpg" },
    "Treinamento": { pasta: "Treinamento", prefixo: "tre1", extensao: "jpeg" }
  };
  
  const albunsContainer = document.getElementById('albuns');
  const fotosContainer = document.getElementById('fotos');
  
  // Gerar botões de álbuns
  for (const album in albuns) {
    const button = document.createElement('button');
    button.textContent = album;
    button.onclick = () => mostrarFotos(album);
    albunsContainer.appendChild(button);
  }
  
  function mostrarFotos(album) {
    fotosContainer.innerHTML = ""; // limpa fotos anteriores
    const { pasta, prefixo, extensao } = albuns[album];
  
    for (let i = 1; i <= 474; i++) {
      const img = document.createElement('img');
      img.src = `assets/img/${pasta}/${prefixo} (${i}).${extensao}`;
      img.alt = album;
      img.onclick = () => abrirLightbox(img.src);
      fotosContainer.appendChild(img);
    }
  }
  
  // Funções para abrir e fechar o lightbox
  function abrirLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    lightboxImg.src = src;
    lightbox.style.display = 'flex';
  }
  
  function fecharLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
  }
  
