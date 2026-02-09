function toggleLogin() {
    const role = document.getElementById('role').value;

    document.getElementById('email').style.display = role === 'admin' ? 'block' : 'none';
    document.getElementById('nip').style.display = role === 'guru' ? 'block' : 'none';
    document.getElementById('nis').style.display = role === 'wali' ? 'block' : 'none';
}

function toggleRegister(role) {
    document.getElementById('reg-nip').style.display = role === 'guru' ? 'block' : 'none';
    document.getElementById('reg-nis').style.display = role === 'wali' ? 'block' : 'none';
}
