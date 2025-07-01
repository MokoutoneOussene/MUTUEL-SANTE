@extends('layout.master')

@section('content')

<style>
    .table-striped-custom tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
    }

    .table-striped-custom tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    .table-striped-custom tbody tr:hover {
        background-color: #e6f4ea;
    }

    .table-header-custom th {
        background-color: #14532d !important;
        color: white !important;
    }

    .pagination .page-link {
        color: #14532d;
        border: 1px solid #14532d;
    }

    .pagination .page-item.active .page-link {
        background-color: #14532d;
        border-color: #14532d;
        color: white;
    }
</style>

<div class="container my-5">
    <div class="card shadow-sm border border-success p-4">
        <div class="card-body">
            <h4 class="text-success mb-4">Liste des utilisateurs</h4>

            <!-- 🔎 Recherche -->
            <div class="row mb-3 justify-content-center">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom, email, pays...">
                </div>
            </div>

            <!-- 📋 Tableau -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped-custom" id="userTable">
                    <thead class="table-header-custom">
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Pays</th>
                            <th>Rôle</th>
                            <th>Documents</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $utilisateurs = [
                                ['nom' => 'Alice Kaboré', 'email' => 'alice@example.com', 'tel' => '70 00 00 01', 'pays' => 'Burkina Faso', 'role' => 'Admin'],
                                ['nom' => 'Jean Diallo', 'email' => 'jean@example.com', 'tel' => '70 00 00 02', 'pays' => 'Mali', 'role' => 'Utilisateur'],
                                ['nom' => 'Fatou Traoré', 'email' => 'fatou@example.com', 'tel' => '70 00 00 03', 'pays' => 'Sénégal', 'role' => 'Utilisateur'],
                                ['nom' => 'Idriss Sawadogo', 'email' => 'idriss@example.com', 'tel' => '70 00 00 04', 'pays' => 'Burkina Faso', 'role' => 'Comptable'],
                                ['nom' => 'Mariam Ouattara', 'email' => 'mariam@example.com', 'tel' => '70 00 00 05', 'pays' => 'Côte d\'Ivoire', 'role' => 'Utilisateur'],
                                ['nom' => 'Alice Kaboré', 'email' => 'alice@example.com', 'tel' => '70 00 00 01', 'pays' => 'Burkina Faso', 'role' => 'Admin'],
                                ['nom' => 'Jean Diallo', 'email' => 'jean@example.com', 'tel' => '70 00 00 02', 'pays' => 'Mali', 'role' => 'Utilisateur'],
                                ['nom' => 'Fatou Traoré', 'email' => 'fatou@example.com', 'tel' => '70 00 00 03', 'pays' => 'Sénégal', 'role' => 'Utilisateur'],
                                ['nom' => 'Idriss Sawadogo', 'email' => 'idriss@example.com', 'tel' => '70 00 00 04', 'pays' => 'Burkina Faso', 'role' => 'Comptable'],
                                ['nom' => 'Mariam Ouattara', 'email' => 'mariam@example.com', 'tel' => '70 00 00 05', 'pays' => 'Côte d\'Ivoire', 'role' => 'Utilisateur'],
                                ['nom' => 'Alice Kaboré', 'email' => 'alice@example.com', 'tel' => '70 00 00 01', 'pays' => 'Burkina Faso', 'role' => 'Admin'],
                                ['nom' => 'Jean Diallo', 'email' => 'jean@example.com', 'tel' => '70 00 00 02', 'pays' => 'Mali', 'role' => 'Utilisateur'],
                                ['nom' => 'Fatou Traoré', 'email' => 'fatou@example.com', 'tel' => '70 00 00 03', 'pays' => 'Sénégal', 'role' => 'Utilisateur'],
                                ['nom' => 'Idriss Sawadogo', 'email' => 'idriss@example.com', 'tel' => '70 00 00 04', 'pays' => 'Burkina Faso', 'role' => 'Comptable'],
                                ['nom' => 'Mariam Ouattara', 'email' => 'mariam@example.com', 'tel' => '70 00 00 05', 'pays' => 'Côte d\'Ivoire', 'role' => 'Utilisateur'],
                            ];
                        @endphp
                        @foreach($utilisateurs as $i => $user)
                        <tr>
                            <td>{{ $user['nom'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['tel'] }}</td>
                            <td>{{ $user['pays'] }}</td>
                            <td><span class="badge bg-success">{{ $user['role'] }}</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" title="Voir document" onclick="showDocumentModal('{{ asset('documents/'.$user['nom'].'.pdf') }}')"><i class="bi bi-file-earmark-text"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-success" title="Valider" onclick="validerUtilisateur('{{ $user['email'] }}')"><i class="bi bi-check2-circle"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <div id="noDataMessage" class="text-center text-muted my-3 d-none">
                    <strong>Aucune donnée trouvée.</strong>
                </div>
            </div>

            <!-- 📄 Pagination -->
            <div class="d-flex justify-content-end mt-3">
                <nav>
                    <ul class="pagination pagination-sm" id="pagination"></ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- 📄 Modal Document -->
<div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="documentModalLabel">Document de l'utilisateur</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body p-0">
        <iframe id="documentFrame" src="" width="100%" height="600px" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    const rowsPerPage = 5;
    let currentPage = 1;

    document.addEventListener("DOMContentLoaded", function () {
        paginateTable();
    });

    const input = document.getElementById("searchInput");
    input.addEventListener("keyup", function () {
        currentPage = 1;
        paginateTable();
    });

    function paginateTable() {
        const inputValue = input.value.toLowerCase();
        const table = document.getElementById("userTable");
        const tbody = table.querySelector("tbody");
        const rows = Array.from(tbody.getElementsByTagName("tr"));

        let filteredRows = rows.filter(row => {
            const text = row.innerText.toLowerCase();
            return text.includes(inputValue);
        });

        rows.forEach(row => row.style.display = "none");
        filteredRows.forEach((row, index) => {
            row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? "" : "none";
        });

        document.getElementById("noDataMessage").classList.toggle("d-none", filteredRows.length > 0);
        updatePagination(filteredRows.length);
    }

    function updatePagination(filteredCount) {
    const totalPages = Math.ceil(filteredCount / rowsPerPage);
    const pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    if (totalPages <= 1) {
        pagination.style.display = "none";
        return;
    }

    // Bouton "Précédent"
    const prevLi = document.createElement("li");
    prevLi.className = "page-item" + (currentPage === 1 ? " disabled" : "");
    prevLi.innerHTML = `<a class="page-link" href="#">Précédent</a>`;
    prevLi.addEventListener("click", function (e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            paginateTable();
        }
    });
    pagination.appendChild(prevLi);

    // Pages numérotées
    for (let i = 1; i <= totalPages; i++) {
        const li = document.createElement("li");
        li.className = "page-item" + (i === currentPage ? " active" : "");
        li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        li.addEventListener("click", function (e) {
            e.preventDefault();
            currentPage = i;
            paginateTable();
        });
        pagination.appendChild(li);
    }

    // Bouton "Suivant"
    const nextLi = document.createElement("li");
    nextLi.className = "page-item" + (currentPage === totalPages ? " disabled" : "");
    nextLi.innerHTML = `<a class="page-link" href="#">Suivant</a>`;
    nextLi.addEventListener("click", function (e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            paginateTable();
        }
    });
    pagination.appendChild(nextLi);

    pagination.style.display = "flex";
}


    // 📄 Afficher le document PDF
    function showDocumentModal(url) {
        const frame = document.getElementById("documentFrame");
        frame.src = url;
        const modal = new bootstrap.Modal(document.getElementById("documentModal"));
        modal.show();
    }

    // ✅ Valider utilisateur (POST AJAX simulé ici)
    function validerUtilisateur(email) {
        if (!confirm("Confirmer la validation de cet utilisateur ?")) return;

        fetch("/valider-inscription", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email })
        })
        .then(response => {
            if (!response.ok) throw new Error("Erreur serveur");
            return response.json();
        })
        .then(data => {
            alert(data.message || "Utilisateur validé avec succès !");
        })
        .catch(error => {
            alert("Erreur lors de la validation.");
            console.error(error);
        });
    }
</script>
@endsection

