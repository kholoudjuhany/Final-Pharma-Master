<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="width: 230px;">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/dashboard">
                <div class="sb-nav-link-icon"><span class="material-icons">analytics</span></div>
                Dashboard
            </a>
            <a class="nav-link" href="/users">
                <div class="sb-nav-link-icon"><span class="material-icons">group</span></div>
                Users
            </a>
            <a class="nav-link" href="/hics">
                <div class="sb-nav-link-icon"><span class="material-icons">apartment</span></div>
                Health Insurance Companies
            </a>
            <a class="nav-link" href="/categories">
                <div class="sb-nav-link-icon"><span class="material-icons">category</span></div>
                Medicine Categories
            </a>
            
            <!-- Medicines Section -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMedicines" aria-expanded="false" aria-controls="collapseMedicines">
                <div class="sb-nav-link-icon"><span class="material-icons">medication</span></div>
                Medicines
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseMedicines" aria-labelledby="headingMedicines" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('medicines.storePage') }}"><span class="material-icons">medication_liquid
                    </span>Med Store</a>
                    <a class="nav-link" href="/medicines"><span class="material-icons">table_rows</span>Med Table</a>
                </nav>
            </div>

            
            <!-- Prescriptions Section -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePrescriptions" aria-expanded="false" aria-controls="collapsePrescriptions">
                <div class="sb-nav-link-icon"><span class="material-icons">description</span></div>
                Prescriptions
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePrescriptions" aria-labelledby="headingPrescriptions" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('requests.index') }}">
                        <div class="sb-nav-link-icon"><span class="material-icons">assignment_add</span></div>
                        Requests
                        @php
                            $pendingCount = App\Models\Prescription::where('status', 'pending')->count(); // Ensure to import the model at the top
                        @endphp
                        @if($pendingCount > 0)
                            <span class="badge bg-danger">{{ $pendingCount }}</span> <!-- Badge for notification -->
                        @endif
                    </a>
                    <a class="nav-link" href="/prescriptions"><span class="material-icons">table_rows</span>Prescriptions</a>
                    <a class="nav-link" href="{{ route('premeds.index') }}"><span class="material-icons">send
                    </span>Send</a>
                </nav>
            </div>

            <a class="nav-link" href="/orders">
                <div class="sb-nav-link-icon"><span class="material-icons">inventory_2</span></div>
                Orders
            </a>
            
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
