function UserService (birthDate) {

    const diff = Date.now() - new Date(birthDate).getTime();
    const age = new Date(diff); 

    return Math.abs(age.getUTCFullYear() - 1970);
}

export default UserService;