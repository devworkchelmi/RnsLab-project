import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["form", "successMessage"];

    connect() {
        console.log("🟢 Stimulus Contact Form Controller connecté !");
    }

    submitForm(event) {
        event.preventDefault(); // Empêche le rechargement normal du formulaire

        let formData = new FormData(this.formTarget);

        fetch(this.formTarget.action, {
            method: this.formTarget.method,
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            cache: 'no-cache'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                console.log("✅ Message envoyé avec succès !");
                
                // Afficher un message de confirmation
                this.successMessageTarget.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                
                // Scroll automatique vers le formulaire
                setTimeout(() => {
                    window.location.hash = "#contact-form";
                }, 300);

                // Réinitialiser le formulaire
                this.formTarget.reset();
            }
        })
        .catch(error => console.error("❌ Erreur lors de la requête AJAX :", error));
    }
}
