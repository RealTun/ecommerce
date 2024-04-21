function storageChange (event) {
    let state = window.localStorage.getItem("isLogin");
    // console.log(state);
    if(event.key === 'isLogin' && state == "no") {
        Swal.fire({
            icon: "warning",
            title: "Vui lòng đăng nhập lại để tiếp tục!",
            showConfirmButton: true,
        }).then(result => {
            if(result.isConfirmed){
                window.location = "/login";
            }
        });
    }
}
window.addEventListener('storage', storageChange, false)