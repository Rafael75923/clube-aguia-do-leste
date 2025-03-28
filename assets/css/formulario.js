function enviarFormulario() {
    const form = document.getElementById('formulario');
    const formData = new FormData(form);
  
    // Verifique os dados no console antes de enviar
    console.log([...formData]); // Apenas para ver os dados que estão sendo enviados
  
    fetch('URL_DO_SEU_WEB_APP', { // Substitua com a URL do seu Web App
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Sucesso:', data);
    })
    .catch((error) => {
        console.error('Erro:', error);
    });
}
