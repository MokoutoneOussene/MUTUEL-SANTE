@extends('layout.master')

@section('content')

<style>
    /* ✅ Effet zébré */
    .table-striped-custom tbody tr:nth-child(odd) {
        background-color: #f8f9fa !important;  /* Gris clair */
    }

    .table-striped-custom tbody tr:nth-child(even) {
        background-color: #ffffff !important;  /* Blanc */
    }

    /* ✅ Survol de ligne */
    .table-striped-custom tbody tr:hover {
        background-color: #e6f4ea !important;  /* Vert pâle */
    }

    /* ✅ En-tête de tableau */
    .table-header-custom {
        background-color: #198754 !important;
        color: white !important;
    }
</style>

<div class="container my-5">
    <div class="card shadow-sm border border-success p-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-success">Mes cotisations annuelles</h4>
    </div>

    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher ...">
        </div>
    </div>


    <div class="card shadow-sm">
        <div class="card-body p-0">
        <table class="table table-bordered table-hover table-striped-custom mb-0 overflow-hidden">

        <thead class="table-header-custom">
 
                    <tr>
                        <th>Nom</th>
                        <th>Montant</th>
                        <th>Année</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="cotisationTable"></tbody>
            </table>
        </div>
    </div>

    <div class="mt-3 text-end">
        <nav>
            <ul class="pagination justify-content-end" id="pagination"></ul>
        </nav>
    </div>
</div>


</div>
@endsection
@section('scripts')
<script>
    const cotisations = [
        { id: 1, nom: 'Alice Kaboré', montant: 15000, annee: '2019', date: '2019-01-10' },
        { id: 2, nom: 'Alice Kaboré', montant: 20000, annee: '2020', date: '2020-01-12' },
        { id: 3, nom: 'Alice Kaboré', montant: 18000, annee: '2021', date: '2021-01-15' },
        { id: 4, nom: 'Alice Kaboré', montant: 16000, annee: '2022', date: '2022-01-18' },
        { id: 5, nom: 'Alice Kaboré', montant: 22000, annee: '2023', date: '2023-01-21' },
        { id: 6, nom: 'Alice Kaboré', montant: 17000, annee: '2024', date: '2024-01-23' },
       ];

    let filteredCotisations = [...cotisations];
    let currentPage = 1;
    const rowsPerPage = 5;

    function displayTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginated = filteredCotisations.slice(start, end);
    const tbody = document.getElementById("cotisationTable");
    tbody.innerHTML = "";

    if (paginated.length === 0) {
        tbody.innerHTML = `<tr><td colspan="5" class="text-center text-muted py-3"> <strong>Aucune cotisation trouvée.</strong></td></tr>`;
    } else {
        paginated.forEach(c => {
            tbody.innerHTML += `
                <tr>
                    <td>${c.nom}</td>
                    <td>${c.montant.toLocaleString()} F CFA</td>
                    <td>${c.annee}</td>
                    <td>${c.date}</td>
                </tr>
            `;
        });
    }

    updatePagination();
}


    function updatePagination() {
        const pagination = document.getElementById("pagination");
        const totalPages = Math.ceil(filteredCotisations.length / rowsPerPage);
        let html = "";

        html += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" style="color:#14532d;" onclick="changePage(${currentPage - 1})">Précédent</a>
        </li>`;

        for (let i = 1; i <= totalPages; i++) {
            html += `<li class="page-item ${currentPage === i ? 'active' : ''}">
                <a class="page-link" href="#" style="color:${currentPage === i ? 'white' : '#14532d'}; background-color:${currentPage === i ? '#14532d' : '#e6f4ea'}; border-color:#14532d" onclick="changePage(${i})">${i}</a>
            </li>`;
        }

        html += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" style="color:#14532d;" onclick="changePage(${currentPage + 1})">Suivant</a>
        </li>`;

        pagination.innerHTML = html;
    }

    function changePage(page) {
        const totalPages = Math.ceil(filteredCotisations.length / rowsPerPage);
        if (page >= 1 && page <= totalPages) {
            currentPage = page;
            displayTable();
        }
    }

    document.getElementById("searchInput").addEventListener("keyup", function () {
        const value = this.value.toLowerCase();
        filteredCotisations = cotisations.filter(c =>
            c.nom.toLowerCase().includes(value) || c.montant.toString().includes(value)
        );
        currentPage = 1;
        displayTable();
    });

    document.addEventListener("DOMContentLoaded", displayTable);
</script>
@endsection
