<?php 
require_once __DIR__ . '/../includes/header.php'; 
?>

<!-- Page Header -->
<section class="page-header">
  <div class="container">
    <h1>Contact Us</h1>
    <p class="breadcrumb">Home > Contact</p>
  </div>
</section>

<!-- Contact Content -->
<section class="content-section">
  <div class="container">
    
    <!-- Intro -->
    <div class="section-intro">
      <h2>Get in Touch with Ragavi College</h2>
      <div class="divider"></div>
      <p class="lead-text">We're here to answer your questions and provide the information you need. Whether you're a prospective student, parent, or partner, we'd love to hear from you.</p>
    </div>

    <!-- Contact Grid -->
    <div class="contact-wrapper">
      
      <!-- Contact Form -->
      <div class="contact-form-section">
        <h3>Send Us a Message</h3>
        <form class="contact-form" action="#" method="POST">
          <div class="form-row">
            <div class="form-group">
              <label for="name">Full Name *</label>
              <input type="text" id="name" name="name" required placeholder="Enter your full name">
            </div>
            <div class="form-group">
              <label for="email">Email Address *</label>
              <input type="email" id="email" name="email" required placeholder="your.email@example.com">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="phone">Phone Number *</label>
              <input type="tel" id="phone" name="phone" required placeholder="+91 98765 43210">
            </div>
            <div class="form-group">
              <label for="subject">Subject *</label>
              <select id="subject" name="subject" required>
                <option value="">Select a subject</option>
                <option value="admission">Admission Inquiry</option>
                <option value="academic">Academic Information</option>
                <option value="placement">Placement & Career</option>
                <option value="scholarship">Scholarships</option>
                <option value="general">General Query</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="message">Your Message *</label>
            <textarea id="message" name="message" rows="6" required placeholder="Write your message here..."></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary btn-large">Send Message</button>
        </form>
      </div>

      <!-- Contact Information -->
      <div class="contact-info-section">
        <h3>Contact Information</h3>
        
        <div class="info-box">
          <div class="info-icon">📍</div>
          <div class="info-content">
            <h4>Campus Address</h4>
            <p>Ragavi College Campus<br>
Sector 15, Knowledge Park<br>
City Center, Mumbai - 400021<br>
India</p>
          </div>
        </div>

        <div class="info-box">
          <div class="info-icon">📞</div>
          <div class="info-content">
            <h4>Phone Numbers</h4>
            <p>
              <strong>Main Office:</strong> +91 755 1234567<br>
              <strong>Admissions:</strong> +91 755 1234568<br>
              <strong>HR Department:</strong> +91 755 1234569<br>
              <strong>Toll Free:</strong> 1800-123-4567
            </p>
          </div>
        </div>

        <div class="info-box">
          <div class="info-icon">✉️</div>
          <div class="info-content">
            <h4>Email Addresses</h4>
            <p>
              <strong>General:</strong> info@Ragavicollege.edu<br>
              <strong>Admissions:</strong> admissions@Ragavcollege.edu.in<br>
              <strong>Placements:</strong> placements@Ragavicollege.edu.in<br>
              <strong>Principal:</strong> principal@Ragavicollege.edu.in
            </p>
          </div>
        </div>

        <div class="info-box">
          <div class="info-icon">🕐</div>
          <div class="info-content">
            <h4>Office Hours</h4>
            <p>
              <strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM<br>
              <strong>Saturday:</strong> 9:00 AM - 2:00 PM<br>
              <strong>Sunday:</strong> Closed<br>
              <em>(During admission season, extended hours apply)</em>
            </p>
          </div>
        </div>

        <div class="social-links">
          <h4>Connect With Us</h4>
          <div class="social-icons">
            <a href="#" class="social-icon" title="Facebook">📘</a>
            <a href="#" class="social-icon" title="Twitter">🐦</a>
            <a href="#" class="social-icon" title="LinkedIn">💼</a>
            <a href="#" class="social-icon" title="Instagram">📷</a>
            <a href="#" class="social-icon" title="YouTube">▶️</a>
          </div>
        </div>

      </div>
    </div>

    <!-- Department Contacts -->
    <div class="departments-contact">
      <h3 class="section-title">Department Contacts</h3>
      <div class="dept-contact-grid">
        <div class="dept-contact-card">
          <h4>💻 Computer Science</h4>
          <p><strong>HOD:</strong> Dr. Rajesh Kumar</p>
          <p><strong>Email:</strong> cs.dept@Ragavicollege.edu.in</p>
          <p><strong>Phone:</strong> +91 755 1234571</p>
        </div>
        <div class="dept-contact-card">
          <h4>⚙️ Engineering</h4>
          <p><strong>HOD:</strong> Dr. Priya Singh</p>
          <p><strong>Email:</strong> engg.dept@Ragavicollege.edu.in</p>
          <p><strong>Phone:</strong> +91 755 1234572</p>
        </div>
        <div class="dept-contact-card">
          <h4>💼 Management</h4>
          <p><strong>HOD:</strong> Prof. Amit Sharma</p>
          <p><strong>Email:</strong> mba.dept@Ragavicollege.edu.in</p>
          <p><strong>Phone:</strong> +91 755 1234573</p>
        </div>
        <div class="dept-contact-card">
          <h4>🔬 Science</h4>
          <p><strong>HOD:</strong> Dr. Meena Patel</p>
          <p><strong>Email:</strong> science.dept@Ragavicollege.edu.in</p>
          <p><strong>Phone:</strong> +91 755 1234574</p>
        </div>
      </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
      <h3 class="section-title">Find Us on Map</h3>
      <div class="map-container">
        <div class="map-placeholder">
          <!-- In real implementation, embed Google Maps iframe here -->
          <div class="map-info">
            <h4>Ragavi College Campus Location</h4>
            <p>Sector 15, Knowledge Park,City Center Mumbai - 400021 ,India</p>
            <a href="https://maps.google.com" target="_blank" class="btn btn-secondary">Open in Google Maps</a>
          </div>
        </div>
      </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
      <h3 class="section-title">Frequently Asked Questions</h3>
      <div class="faq-grid">
        <div class="faq-item">
          <h4>How can I schedule a campus visit?</h4>
          <p>You can schedule a campus visit by calling our admissions office at +91 755 1234568 or emailing admissions@Ragavicollege.edu.in. We conduct guided tours every weekday at 11:00 AM and 3:00 PM.</p>
        </div>
        <div class="faq-item">
          <h4>What is the best way to inquire about admissions?</h4>
          <p>For admission-related queries, please email admissions@Ragavicollege.edu.in or call our dedicated admissions helpline. You can also fill out the inquiry form on this page.</p>
        </div>
        <div class="faq-item">
          <h4>How do I get information about scholarships?</h4>
          <p>Scholarship information is available on our Admissions page. You can also contact our financial aid office at scholarships@Ragavicollege.edu.in for personalized assistance.</p>
        </div>
        <div class="faq-item">
          <h4>Can international students contact you?</h4>
          <p>Yes! International students can reach us via email at international@Ragavicollege.edu.in. We also offer WhatsApp support at +91 98765 43210 for quick queries.</p>
        </div>
      </div>
    </div>

  </div>
</section>

<style>
  /* ================================
   GENERAL PAGE STYLES
================================ */
.page-header {
  background: #2563eb;
  color: #fff;
  padding: 60px 0;
  text-align: center;
}

.page-header h1 {
  font-size: 2.8rem;
  margin-bottom: 10px;
}

.page-header .breadcrumb {
  font-size: 1rem;
  opacity: 0.9;
}

/* Section wrapper */
.content-section {
  padding: 60px 0;
}

.section-intro {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 50px;
}

.section-intro h2 {
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 10px;
}

.section-intro .divider {
  width: 60px;
  height: 4px;
  background: #1A73E8;
  margin: 15px auto;
}

.lead-text {
  font-size: 1.1rem;
  color: #444;
}

/* ================================
   CONTACT GRID LAYOUT
================================ */
.contact-wrapper {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 40px;
}

@media (max-width: 900px) {
  .contact-wrapper {
    grid-template-columns: 1fr;
  }
}

/* ================================
   CONTACT FORM STYLING
================================ */
.contact-form-section h3 {
  font-size: 1.8rem;
  margin-bottom: 20px;
}

.contact-form {
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 3px 12px rgba(0,0,0,0.08);
}

.form-row {
  display: flex;
  gap: 20px;
}

@media (max-width: 600px) {
  .form-row {
    flex-direction: column;
  }
}

.form-group {
  flex: 1;
  margin-bottom: 20px;
}

.form-group label {
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 6px;
  display: block;
}

.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 1rem;
  transition: border 0.2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-color: #1A73E8;
}

.btn-primary {
  background: #1A73E8;
  padding: 12px 24px;
  border-radius: 8px;
  color: #fff;
  border: none;
  cursor: pointer;
  font-size: 1.05rem;
  font-weight: 600;
}

.btn-primary:hover {
  background: #155FC4;
}

/* ================================
   CONTACT INFO SIDEBAR
================================ */
.contact-info-section h3 {
  font-size: 1.7rem;
  margin-bottom: 20px;
}

.info-box {
  display: flex;
  gap: 15px;
  padding: 18px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.06);
  margin-bottom: 20px;
}

.info-icon {
  font-size: 2rem;
}

.info-content h4 {
  margin-bottom: 5px;
  font-size: 1.2rem;
}

/* ================================
   SOCIAL LINKS
================================ */
.social-links h4 {
  margin: 20px 0 10px;
}

.social-icons {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.social-icon {
  font-size: 1.6rem;
  text-decoration: none;
  transition: transform 0.2s;
}

.social-icon:hover {
  transform: scale(1.2);
}

/* ================================
   DEPARTMENT CONTACTS
================================ */
.departments-contact {
  margin-top: 50px;
}

.section-title {
  font-size: 1.9rem;
  margin-bottom: 20px;
  text-align: center;
}

.dept-contact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
  gap: 20px;
  margin-top: 25px;
}

.dept-contact-card {
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.07);
}

.dept-contact-card h4 {
  font-size: 1.2rem;
  margin-bottom: 10px;
}

/* ================================
   MAP SECTION
================================ */
.map-section {
  margin-top: 50px;
}

.map-container {
  margin-top: 20px;
}

.map-placeholder {
  background: #F5F7FA;
  padding: 40px;
  border-radius: 12px;
  text-align: center;
  box-shadow: inset 0 0 15px rgba(0,0,0,0.05);
}

.map-info h4 {
  font-size: 1.4rem;
  margin-bottom: 8px;
}

.btn-secondary {
  background: #444;
  color: #fff;
  padding: 10px 20px;
  border-radius: 6px;
  display: inline-block;
  margin-top: 12px;
}

.btn-secondary:hover {
  background: #222;
}

/* ================================
   FAQ STYLING
================================ */
.faq-section {
  margin-top: 50px;
}

.faq-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 20px;
  margin-top: 25px;
}

.faq-item {
  background: #fff;
  padding: 22px;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.06);
}

.faq-item h4 {
  font-size: 1.15rem;
  margin-bottom: 8px;
}

/* Gradient Buttons + Press Effect */
.btn{
  border:none;
  background:linear-gradient(45deg,#4a6cf7,#6f9cf7);
  color:#fff !important;
  padding:.6rem .95rem;
  border-radius:8px;
  cursor:pointer;
  transition:all .25s ease;
  box-shadow:0 4px 12px rgba(0,0,0,.15);
  transform:translateY(0);
}
.btn:hover{
  background:linear-gradient(45deg,#6f9cf7,#4a6cf7);
  box-shadow:0 8px 22px rgba(0,0,0,.2);
  transform:translateY(-3px);
}
.btn:active{
  transform:scale(.96);
  box-shadow:0 2px 6px rgba(0,0,0,.2);
}

.btn{border:2px solid #0b6efd;}
.btn:hover{background:#fff !important;color:#0b6efd !important;border-color:#0b6efd !important;box-shadow:0 8px 20px rgba(0,0,0,0.1) !important;transform:translateY(-3px) !important;}
</style>

<?php 
require_once __DIR__ . '/../includes/footer.php'; 
?>