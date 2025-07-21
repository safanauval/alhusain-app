// Javasript Student Modal
document.addEventListener("DOMContentLoaded", function () {
    // Edit Student Modal
    const editButtons = document.querySelectorAll(".edit-student-btn");
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const nisn = this.getAttribute("data-nisn");
            const nama = this.getAttribute("data-nama");
            const kelas = this.getAttribute("data-kelas");
            const guru_kelas = this.getAttribute("data_guru_kelas");
            const tahun_lahir = this.getAttribute("data-tahun_lahir");
            const jenis_kelamin = this.getAttribute("data-jenis_kelamin");
            const tahun_ajaran = this.getAttribute("data-tahun_ajaran");

            document.getElementById("edit_nisn").value = nisn;
            document.getElementById("edit_nama").value = nama;
            document.getElementById("edit_kelas").value = kelas;
            document.getElementById("edit_guru_kelas").value = guru_kelas;
            document.getElementById("edit_tahun_lahir").value = tahun_lahir;
            document.getElementById("edit_jenis_kelamin").value = jenis_kelamin;
            document.getElementById("edit_tahun_ajaran").value = tahun_ajaran;

            document.getElementById(
                "editStudentForm"
            ).action = `/students/${nisn}`;
        });
    });

    // Delete Student Modal
    const deleteButtons = document.querySelectorAll(".delete-student-btn");
    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const nisn = this.getAttribute("data-nisn");
            const nama = this.getAttribute("data-nama");

            document.getElementById("studentNameToDelete").textContent = nama;
            document.getElementById(
                "deleteStudentForm"
            ).action = `/students/${nisn}`;
        });
    });
});
