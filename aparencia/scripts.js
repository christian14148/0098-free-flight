function confSubmit(form) {
    if (confirm("Tem certeza que deseja alterar os dados?")) {
    form.submit();
    }

    else {
        alert("Você decidiu não alterar!");
    }
}