const montrerCarte= () => {
    document.getElementById('carteForm').innerHTML = modalCarte();

    const carte = new bootstrap.Modal('#montrerCarte', {
   });
   carte.show();
}


const modalCarte = () => {
    return `<div class="modal fade modal-lg" id="montrerCarte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <h1 id="titre-carte">Plan de localisation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                       </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>`;
}

