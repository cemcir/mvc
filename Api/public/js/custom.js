function succesMessage(success) {
    if(success) {
        alertify.success("işlem başarılı");
    }
}

function errorMessage(error) {
    if(error!=null) {
        alertify.error(error);
    }
}