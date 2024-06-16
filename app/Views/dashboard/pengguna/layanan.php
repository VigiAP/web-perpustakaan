<?= $this->extend('layout/l_dashboard'); ?>

<?= $this->section('konten'); ?>


<div class="container" >
    <section>
        <div class="d-flex justify-content-center flex-column">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h2 class="text-center">Contact Us</h2>
                        </div>
                        <div class="card-body">
                            <form id="contactForm">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="sendEmail()">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function sendEmail() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    var mailtoLink = 'mailto:contoh@email.com'
                    + '?subject=' + encodeURIComponent('New Contact Us Message')
                    + '&body=' + encodeURIComponent('Name: ' + name + '\nEmail: ' + email + '\n\nMessage:\n' + message);

    window.location.href = mailtoLink;
}
</script>
<?= $this->endSection(); ?>