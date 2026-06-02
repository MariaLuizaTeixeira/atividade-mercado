function validarForm() {

    let valido = true;

    document.querySelectorAll(".obrigatorio").forEach(campo => {

        if(campo.value.trim() === "") {
            campo.classList.add("is-invalid");
            valido = false;
        } else {
            campo.classList.remove("is-invalid");
        }

    });

    return valido;
}