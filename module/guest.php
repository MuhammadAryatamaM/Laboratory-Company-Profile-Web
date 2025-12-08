<section id="contact-guest-section" class="contact-guest-section">
    <div class="contact-guest-container single-column">

        <!-- GUEST BOOK ONLY -->
        <div class="form-column" id="guest">
            <h2 class="form-heading">Guest Book</h2>

            <form class="form-card guest-form reveal" data-reveal-delay="150" action="module/contact_aksi.php" method="post">
                <input type="hidden" name="type" value="guestbook">

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="guest-name" class="form-label">Name</label>
                        <input type="text" id="guest-name" name="name" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="guest-inst" class="form-label">Institution</label>
                        <input type="text" id="guest-inst" name="institution" class="form-input">
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="guest-phone" class="form-label">Phone Number</label>
                        <input type="text" id="guest-phone" name="phone" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="guest-email" class="form-label">Email</label>
                        <input type="email" id="guest-email" name="email" class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="guest-message" class="form-label">Message</label>
                    <textarea id="guest-message" name="message" rows="3" class="form-textarea"></textarea>
                </div>

                <div class="form-btn-wrapper">
                    <button type="submit" class="submit-btn">
                        Submit <span class="btn-icon">✈</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
