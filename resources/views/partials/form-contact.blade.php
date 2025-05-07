<form id="contact-form" method="POST" class="space-y-6 max-w-xl mx-auto p-8">
    <input type="hidden" name="my_ajax_action" value="ajax_contact_form">
    <input type="hidden" name="_ajax_nonce" value="{{ wp_create_nonce('kontakt_form') }}">
    <input type="text" name="website" style="display: none;">

    <div class="relative">
        <input type="text" name="name" id="name" required placeholder=" "
            class="peer w-full border border-gray-300 px-4 pt-6 pb-2 text-sm rounded focus:outline-none focus:border-primary">
        <label for="name"
            class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
      peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
      peer-placeholder-shown:translate-y-[-50%] peer-focus:top-2 peer-focus:text-sm peer-focus:text-primary peer-focus:translate-y-0">Name</label>
    </div>

    <div class="relative">
        <input type="email" name="email" id="email" required placeholder=" "
            class="peer w-full border border-gray-300 px-4 pt-6 pb-2 text-sm rounded focus:outline-none focus:border-primary">
        <label for="email"
            class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
      peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
      peer-placeholder-shown:translate-y-[-50%] peer-focus:top-2 peer-focus:text-sm peer-focus:text-primary peer-focus:translate-y-0">E-Mail</label>
    </div>

    <div class="relative">
        <textarea name="message" id="message" rows="4" required placeholder=" "
            class="peer w-full border border-gray-300 px-4 pt-6 pb-2 text-sm rounded focus:outline-none focus:border-primary"></textarea>
        <label for="message"
            class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
      peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
      peer-placeholder-shown:translate-y-0 peer-focus:top-2 peer-focus:text-sm peer-focus:text-primary">Nachricht</label>
    </div>

    <p class="text-sm text-gray-600">
        Informationen zum Umgang mit deinen Daten findest du in unserer <a href="/datenschutz"
            class="underline">Datenschutzerklärung</a>.
    </p>

    <button type="submit"
        class="bg-primary text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        Nachricht senden
    </button>
</form>

<div id="form-status" class="mt-4"></div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contact-form');
        const statusBox = document.getElementById('form-status');

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            formData.append('action', 'ajax_contact_form'); // Das ist entscheidend!

            const button = form.querySelector('button');
            const originalText = button.innerText;
            button.innerText = 'Wird gesendet...';
            button.disabled = true;

            try {
                const response = await fetch('{{ esc_url(admin_url('admin-ajax.php')) }}', {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();

                if (result.success) {
                    statusBox.innerHTML =
                        '<div class="p-4 text-green-700 bg-green-100 border border-green-200 rounded">✅ Nachricht erfolgreich gesendet.</div>';
                    form.reset();
                } else {
                    statusBox.innerHTML =
                        '<div class="p-4 text-red-700 bg-red-100 border border-red-200 rounded">❌ Es gab ein Problem. Bitte versuche es erneut.</div>';
                }
            } catch (error) {
                console.error(error);
                statusBox.innerHTML =
                    '<div class="p-4 text-red-700 bg-red-100 border border-red-200 rounded">❌ Netzwerkfehler. Bitte später erneut versuchen.</div>';
            }

            button.innerText = originalText;
            button.disabled = false;
        });
    });
</script>
