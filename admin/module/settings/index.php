<?php $page_title = 'Settings'; ?>
<main class="main-content">
  <div class="container-fluid">
    <h1 class="mb-4">Settings</h1>
    <p class="text-muted mb-4">Manage your website's vision, mission, and contact information</p>

    <div class="row">
      <div class="col-md-8">
        <!-- Vision & Mission Section -->
        <div class="card mb-4">
          <div class="card-header bg-light border-bottom">
            <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Vision & Mission</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label"><strong>Vision</strong></label>
              <textarea class="form-control" rows="3" placeholder="Enter your company vision">To be the leading innovator in our industry, transforming how people interact with technology and creating lasting positive impact in communities worldwide.</textarea>
            </div>
            <div class="mb-3">
              <label class="form-label"><strong>Mission</strong></label>
              <textarea class="form-control" rows="3" placeholder="Enter your company mission">We strive to develop cutting-edge solutions that empower individuals and organizations to achieve their full potential through innovative technology, exceptional service, and sustainable practices.</textarea>
            </div>
            <button class="btn btn-primary">
              <i class="fas fa-save me-1"></i>Save Vision & Mission
            </button>
          </div>
        </div>

        <!-- Contact Information Section -->
        <div class="card">
          <div class="card-header bg-light border-bottom">
            <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Contact Information</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label"><strong>Address</strong></label>
              <input type="text" class="form-control" value="123 Innovation Street, Tech District, Silicon Valley, CA 94025">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Phone Number</strong></label>
                <input type="tel" class="form-control" value="+1 (555) 123-4567">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label"><strong>Email Address</strong></label>
                <input type="email" class="form-control" value="contact@company.com">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label"><strong>YouTube Channel</strong></label>
              <input type="text" class="form-control" value="@CompanyChannel">
            </div>
            <button class="btn btn-primary">
              <i class="fas fa-save me-1"></i>Save Contact Information
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
