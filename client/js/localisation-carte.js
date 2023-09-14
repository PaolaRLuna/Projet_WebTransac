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
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11179.379231841116!2d-73.62031518344403!3d45.533328468249444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9196d14bf06b7%3A0x6a6f8db96da6f3f0!2sPetite%20Italie%2C%20Montr%C3%A9al%2C%20QC!5e0!3m2!1sfr!2sca!4v1694725815061!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>`;
}

