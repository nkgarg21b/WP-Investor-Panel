document.addEventListener('DOMContentLoaded', function () {

    console.log('WP Investor Panel Admin Initialized');

    const investorForm = document.getElementById('wip-investor-form');

    if (!investorForm) {
        return;
    }

    investorForm.addEventListener('submit', function (event) {

        event.preventDefault();

        const formData = new FormData(investorForm);

        formData.append('action', 'wip_save_investor');
        formData.append('nonce', document.getElementById('wip_nonce').value);

        fetch(ajaxurl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            const messageBox = document.getElementById('wip-investor-message');

            if (data.success) {
                messageBox.innerHTML = '<p style="color:green;">' + data.data.message + '</p>';
                investorForm.reset();
                window.location.reload();
            } else {
                messageBox.innerHTML = '<p style="color:red;">' + data.data.message + '</p>';
            }
        })
        .catch(error => {
            console.error(error);
        });
    });
});
