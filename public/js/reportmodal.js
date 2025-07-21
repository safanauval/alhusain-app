// For Add Report Modal
document.getElementById("nisn").addEventListener("change", function () {
    const selected = this.options[this.selectedIndex];
    document.getElementById("display-nama").textContent =
        selected.dataset.nama || "NAMA SISWA";
    document.getElementById("display-tahun").textContent =
        selected.dataset.tahun_ajaran || "TAHUN";
    document.getElementById("display-kelas").textContent =
        selected.dataset.kelas || "KELAS";
    document.getElementById("guru_kelas").textContent =
        selected.dataset.guru_kelas || "Nama Guru";
    document.getElementById("display-semester").textContent =
        selected.dataset.semester || "-";
    document.getElementById("display-kelas").value =
        selected.dataset.kelas || "";
    document.getElementById("tahun_ajaran").value =
        selected.dataset.tahun_ajaran || "TAHUN";
});

// View report button handler
document.addEventListener("DOMContentLoaded", function () {
    const viewReportButtons = document.querySelectorAll(".view-report-btn");
    viewReportButtons.array.forEach((button) => {
        button.addEventListener("click", function () {
            const nisn = this.getAttribute("data-nisn");
            const nama = this.getAttribute("data-nama");
            const kelas = this.getAttribute("data-kelas");
            const tahun_ajaran = this.getAttribute("data-tahun_ajaran");

            document.getElementById("view-nama").textContent = nama;
            document.getElementById("view-nisn").textContent = nisn;
            document.getElementById("view-kelas").textContent = kelas;
            document.getElementById("view-tahun-ajaran").textContent =
                tahun_ajaran;

            document.getElementById(
                "viewReportForm"
            ).action = `reports/index/${nisn}`;
        });
    });
});

// Edit report button handler
document.querySelectorAll(".edit-report-btn").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        const nisn = this.getAttribute("data-nisn");
        const nama = this.getAttribute("data-nama");
        const kelas = this.getAttribute("data-kelas");
        const tahun_ajaran = this.getAttribute("data-tahun_ajaran");

        document.getElementById("reportNameToDelete").textContent = nama;
        document.getElementById(
            "editReportModal"
        ).action = `reports/index/${nisn}`;
    });
});

// Delete Student Modal
const deleteButtons = document.querySelectorAll(".delete-report-btn");
deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
        const nisn = this.getAttribute("data-nisn");
        const nama = this.getAttribute("data-nama");

        document.getElementById("reportNameToDelete").textContent = nama;
        document.getElementById("deleteReportForm").action = `/reports/${nisn}`;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Handle print modal checkboxes
    const printModal = document.getElementById("printReportModal");
    if (printModal) {
        printModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const reportName = button.getAttribute("data-report-name");
            const nisn = button.getAttribute("data-nisn");

            document.getElementById("reportNameToPrint").textContent =
                reportName;
            document.getElementById(
                "printReportForm"
            ).action = `/reports/pdf/${nisn}`;
        });

        // Update hidden inputs when checkboxes change
        document
            .getElementById("includeSignature")
            .addEventListener("change", function () {
                document.querySelector(
                    '#printReportForm input[name="include_signature"]'
                ).value = this.checked ? "1" : "0";
            });

        document
            .getElementById("includeComments")
            .addEventListener("change", function () {
                document.querySelector(
                    '#printReportForm input[name="include_comments"]'
                ).value = this.checked ? "1" : "0";
            });
    }
});
